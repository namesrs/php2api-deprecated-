<?php
namespace NameISP\Whmcs;

use NameISP\Whmcs\Exception\AuthFailedException;
use NameISP\Whmcs\Exception\InvalidApiResponseException;

class AuthManager
{
    use ParseRequestTrait;

    /** @var string */
    protected $apiKey;
    /** @var string|null */
    protected $token = null;

    public function __construct($apiKey, $client)
    {
        $this->apiKey = $apiKey;
        $this->client = $client;
    }

    /**
     * @throws AuthFailedException
     */
    public function auth()
    {
        $url = 'authenticate/login/'.$this->apiKey;

        // TODO: try/catch
        $response = $this->client->get($url);

        try {
            $result = $this->parseRequest($response);
        } catch (InvalidApiResponseException $e) {
            throw new AuthFailedException($e->getMessage());
        }

        if (!isset($result['parameters']['token'])) {
            throw new AuthFailedException('Can\'t find a token in the auth response');
        }

        // TODO: save externally
        $this->token = $result['parameters']['token'];
    }

    public function getToken()
    {
        return $this->token;
    }

    public function isAuthorized()
    {
        return $this->token !== null;
    }
}
