<?php
namespace NameISP\Whmcs;

use GuzzleHttp\ClientInterface;
use NameISP\Whmcs\Exception as Exception;
use NameISP\Whmcs\Request as Request;
use Psr\Http\Message\ResponseInterface;

class Client
{
    /** @var string */
    protected $apiKey;
    /** @var \GuzzleHttp\Client|ClientInterface */
    protected $client;
    /** @var string */
    protected $token = null;

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
     * @throws Exception\InvalidApiResponseException
     */
    private function auth()
    {
        $url = 'authenticate/login/'.$this->apiKey;

        // TODO: try/catch
        $response = $this->client->get($url);
        $result = $this->parseRequest($response);

        if (!isset($result['parameters']['token'])) {
            throw new InvalidApiResponseException('Can\'t find a token in the auth response');
        }

        // TODO: save externally
        $this->token = $result['parameters']['token'];
    }

    /**
     * @throws Exception\WhmcsException
     */
    protected function execute(Request\AbstractRequest $request)
    {
        // Check session taken
        if ($this->token === null) {
            $this->auth();
        }

        $url = $request->getUrl().$this->token.'/';

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

        var_dump($result);

        // TODO: return array
        // TODO: throw exception if code isn't success
    }

    /**
     * Extract JSON from guzzle response
     *
     * @throws Exception\InvalidApiResponseException
     */
    protected function parseRequest(ResponseInterface $response)
    {
        $result = json_decode($response->getBody(), true);

        if ($result === null) {
            throw new Exception\InvalidApiResponseException('Error decoding JSON response from API');
        }

        return $result;
    }
}
