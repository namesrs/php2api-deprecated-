<?php
namespace NameISP\API3\Request;

class DomainGenAuthCodeRequest extends AbstractRequest
{
    protected $method = 'post';
    protected $url = 'domain/genauthcode/';

    public function __construct($domainName)
    {
        $this->options = [
            'form_params' => [
                'domainname' => $domainName
            ]
        ];
    }
}
