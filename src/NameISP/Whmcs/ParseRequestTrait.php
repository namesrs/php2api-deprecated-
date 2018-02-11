<?php
namespace NameISP\Whmcs;

use Psr\Http\Message\ResponseInterface;

trait ParseRequestTrait
{
    protected $client;

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
