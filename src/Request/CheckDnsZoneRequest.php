<?php
namespace NameISP\API3\Request;

class CheckDnsZoneRequest extends AbstractRequest
{
    protected $method = 'post';
    protected $url = 'dns/checkdnszone/';

    public function __construct($domainName, $nameServer)
    {
        $this->options = [
            'form_params' => [
                'domainname' => $domainName,
                'nameserver' => $nameServer
            ]
        ];
    }
}
