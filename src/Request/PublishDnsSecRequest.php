<?php
namespace NameISP\API3\Request;

class PublishDnsSecRequest extends AbstractRequest
{
    protected $method = 'post';
    protected $url = 'dns/publishdnssec/';

    public function __construct($domainName, $dnsKey, $flags, $alg)
    {
        $this->options = [
            'form_params' => [
                'domainname' => $domainName,
                'dnskey' => $dnsKey,
                'flags' => $flags,
                'alg' => $alg
            ]
        ];
    }
}
