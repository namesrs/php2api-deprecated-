<?php
namespace NameISP\API3\Request;

class SearchDomainRequest extends AbstractRequest
{
    protected $method = 'post';
    protected $url = 'domain/searchdomain/';

    public function __construct($domainName)
    {
        if (!is_array($domainName)) {
            $domainName = [$domainName];
        }

        $this->options = [
            'form_params' => [
                'domainname' => array_values($domainName)
            ]
        ];
    }
}
