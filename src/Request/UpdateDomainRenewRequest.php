<?php
namespace NameISP\API3\Request;

class UpdateDomainRenewRequest extends AbstractRequest
{
    protected $method = 'post';
    protected $url = 'domain/update_domain_renew/';

    public function __construct($domainName, $itemYear)
    {
        $this->options = [
            'form_params' => [
                'domainname' => $domainName,
                'itemyear' => $itemYear,
            ]
        ];
    }
}
