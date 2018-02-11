<?php
namespace NameISP\Whmcs;

use GuzzleHttp\ClientInterface;
use NameISP\Whmcs\Exception as Exception;
use NameISP\Whmcs\Request as Request;
use Psr\Http\Message\ResponseInterface;

class Client
{
    use ParseRequestTrait;

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
     * @throws Exception\WhmcsException
     */
    public function searchDomain($domainName)
    {
        return $this->execute(new Request\SearchDomainRequest($domainName));
    }

    /**
     * @throws Exception\WhmcsException
     */
    public function domainList($domainName = null, $start = 0, $limit = 100)
    {
        return $this->execute(new Request\DomainListRequest($domainName, $start, $limit));
    }

    /**
     * @throws Exception\WhmcsException
     */
    protected function execute(Request\AbstractRequest $request)
    {
        // Check session taken
        if (!$this->authManager->isAuthorized()) {
            $this->authManager->auth();
        }

        $token = $this->authManager->getToken();

        $url = $request->getUrl().$token.'/';

//        // TODO: try/catch
        $response = $this->client->request($request->getMethod(), $url, $request->getOptions());

        $result = $this->parseRequest($response);

        // Check response code
        if (!isset($result['code'])) {
            throw new Exception\InvalidApiResponseException('API response doesn\'t contains a code');
        }

        if (!in_array($result['code'], [1000, 1300])) {
            $message = isset($result['desc']) ? $result['desc'] : 'Unknown reason';
            throw new Exception\ApiException($message, $result['code']);
        }

        // TODO: check if token is invalid

        d($result);

        // TODO: return array
        // TODO: throw exception if code isn't success
    }
}
