<?php
namespace NameISP\Whmcs;

use GuzzleHttp\ClientInterface;
use NameISP\Whmcs\Exception\InvalidAPIResponseException;
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
     * @throws InvalidAPIResponseException
     */
    public function searchDomain($domainName)
    {
        return $this->execute(new Request\SearchDomainRequest($domainName));
    }

    /**
     * @throws InvalidAPIResponseException
     */
    public function domainList($domainName = null, $start = 0, $limit = 100)
    {
        return $this->execute(new Request\DomainListRequest($domainName, $start, $limit));
    }

    /**
     * @throws InvalidAPIResponseException
     */
    private function auth()
    {
        $url = 'authenticate/login/'.$this->apiKey;

        // TODO: try/catch
        $response = $this->client->get($url);
        $result = $this->parseRequest($response);

        if (!isset($result['parameters']['token'])) {
            throw new InvalidAPIResponseException();
        }

        // TODO: save externally
        $this->token = $result['parameters']['token'];
    }

    /**
     * @throws InvalidAPIResponseException
     */
//    protected function execute($responseClass, $url, $method, $body = null, $query = null)
    protected function execute(Request\AbstractRequest $request)
    {
        // Check session taken
        if ($this->token === null) {
            $this->auth();
        }

        $url = $request->getUrl().$this->token.'/';

//        // TODO: try/catch
//        // TODO: check if token is invalid
        $response = $this->client->request($request->getMethod(), $url, $request->getOptions());

        $result = $this->parseRequest($response);

        var_dump($result);

        // TODO: return array
        // TODO: throw exception if code isn't success
    }

    /**
     * Extract JSON from guzzle response
     *
     * @throws InvalidAPIResponseException
     */
    protected function parseRequest(ResponseInterface $response)
    {
        $result = json_decode($response->getBody(), true);

        if ($result === null) {
            throw new InvalidAPIResponseException();
        }

        return $result;
    }
}
