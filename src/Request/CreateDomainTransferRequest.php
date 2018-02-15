<?php
namespace NameISP\API3\Request;

class CreateDomainTransferRequest extends AbstractRequest
{
    protected $method = 'post';
    protected $url = 'domain/create_domain_transfer/';

    public function __construct($domainName, $auth = null)
    {
        $post = [
            'domainname' => $domainName,
            'auth' => $auth
        ];

        $this->options = [
            'form_params' => $this->filterEmpty($post)
        ];
    }
}
