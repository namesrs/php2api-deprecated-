<?php
namespace NameISP\API3\Request;

class UnpublishDnsSecRequest extends AbstractRequest
{
    protected $method = 'post';
    protected $url = 'dns/unpublishdnssec/';

    public function __construct($domainName)
    {
        $this->options = [
            'form_params' => [
                'domainname' => $domainName
            ]
        ];
    }
}
