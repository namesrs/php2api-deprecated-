<?php
namespace NameISP\API3;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use NameISP\API3\Exception as Exception;
use NameISP\API3\Request as Request;

class Client
{
    use ParseRequestTrait;

    /** @var ClientInterface */
    protected $client;
    /** @var AuthManager */
    protected $authManager;

    /**
     * Client constructor.
     * @param string $baseUrl
     * @param string $apiKey
     */
    public function __construct($baseUrl, $apiKey)
    {
        $client = new \GuzzleHttp\Client([
                'base_uri' => $baseUrl,
            ]);
        $this->client = $client;
        $this->authManager = new AuthManager($apiKey, $client);

        $this->baseUrl = rtrim($baseUrl, '/').'/';
        $this->apiKey = $apiKey;
    }

    /**
     * @param array|string $domainName
     * @return array
     * @throws Exception\BaseException
     */
    public function searchDomain($domainName)
    {
        return $this->execute(new Request\SearchDomainRequest($domainName));
    }

    /**
     * @param string|null $domainName
     * @param int $start
     * @param int $limit
     * @return array|mixed
     * @throws Exception\BaseException
     */
    public function domainList($domainName = null, $start = 0, $limit = 100)
    {
        return $this->execute(new Request\DomainListRequest($domainName, $start, $limit));
    }

    /**
     * @param Request\AbstractRequest $request
     * @return array
     * @throws Exception\BaseException
     */
    protected function execute(Request\AbstractRequest $request)
    {
        // Check session taken
        if (!$this->authManager->isAuthorized()) {
            $this->authManager->auth();
        }

        try {
            $result = $this->send($request);
        } catch (Exception\ApiException $e) {
            if ($e->getCode() != 2200) {
                throw $e;
            }

            // Try to re-authorize
            $this->authManager->auth();
            $result = $this->send($request);
        }

        // TODO: store session expire time

        // Clean unnecessarily fields
        foreach (['code', 'desc', 'runtime', 'session'] as $field) {
            unset($result[$field]);
        }

        return count($result) > 1 ? $result : current($result);
    }

    /**
     * @param Request\AbstractRequest $request
     * @return array
     * @throws Exception\ApiException
     * @throws Exception\InvalidApiResponseException
     * @throws Exception\NetworkException
     */
    protected function send($request)
    {
        $token = $this->authManager->getToken();

        $url = $request->getUrl().$token.'/';

        try {
            $response = $this->client->request($request->getMethod(), $url, $request->getOptions());
        } catch (GuzzleException $e) {
            throw new Exception\NetworkException($e->getMessage(), $e->getCode(), $e);
        }

        $result = $this->parseRequest($response);

        // Check response code
        if (!isset($result['code'])) {
            throw new Exception\InvalidApiResponseException('API response doesn\'t contains a code');
        }

        if (!in_array($result['code'], [1000, 1300])) {
            $message = isset($result['desc']) ? $result['desc'] : 'Unknown reason';
            throw new Exception\ApiException($message, $result['code']);
        }

        return $result;
    }
}
