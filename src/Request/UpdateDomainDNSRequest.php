<?php
namespace NameISP\API3\Request;

class UpdateDomainDNSRequest extends AbstractRequest
{
    protected $method = 'post';
    protected $url = 'domain/update_domain_dns/';

    public function __construct($domainName, array $nameServer)
    {
        $this->options = [
            'form_params' => [
                'domainname' => $domainName,
                'nameserver' => $nameServer,
            ]
        ];
    }
}
