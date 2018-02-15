<?php
namespace NameISP\API3\Request;

class EditDomainRequest extends AbstractRequest
{
    protected $method = 'post';
    protected $url = 'domain/editdomain/';

    public function __construct($domainName, $setAutoRenew = null, $setShieldWhoIs = null, $addLabel = null, $removeLabel = null)
    {
        if (!is_array($domainName)) {
            $domainName = [$domainName];
        }

        $post = [
            'domainname' => array_values($domainName),
            'setautorenew' => ($setAutoRenew !== null) ? (int)$setAutoRenew : null,
            'setshieldwhois' => ($setShieldWhoIs !== null) ? (int)$setShieldWhoIs : null,
            'addlabel' => $addLabel,
            'removelabel' => $removeLabel
        ];

        $this->options = [
            'form_params' => $this->filterEmpty($post)
        ];
    }
}
