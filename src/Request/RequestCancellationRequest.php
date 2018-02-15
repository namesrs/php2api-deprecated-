<?php
namespace NameISP\API3\Request;

class RequestCancellationRequest extends AbstractRequest
{
    protected $method = 'get';
    protected $url = 'request/requestcancellation/';

    public function __construct($reqId)
    {
        $this->options = [
            'query' => [
                'reqid' => $reqId
            ]
        ];
    }
}
