<?php
namespace NameISP\API3\Request;

class RequestUpdateRequest extends AbstractRequest
{
    protected $method = 'post';
    protected $url = 'request/requestupdate/';

    public function __construct($reqId, $error)
    {
        $this->options = [
            'form_params' => [
                'reqid' => $reqId,
                'error' => $error
            ]
        ];
    }
}
