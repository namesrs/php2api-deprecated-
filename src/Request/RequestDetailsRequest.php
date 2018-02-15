<?php
namespace NameISP\API3\Request;

class RequestDetailsRequest extends AbstractRequest
{
    protected $method = 'get';
    protected $url = 'request/requestdetails/';

    public function __construct($reqId)
    {
        $this->options = [
            'query' => [
                'reqid' => $reqId
            ]
        ];
    }
}
