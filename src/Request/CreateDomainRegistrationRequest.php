<?php
namespace NameISP\API3\Request;

class CreateDomainRegistrationRequest extends AbstractRequest
{
    protected $method = 'post';
    protected $url = 'domain/create_domain_registration/';

    public function __construct($domainName, $itemYear, $ownerId, $adminId = null, $techId = null, $autoRenew = null, $shieldWhoIs = null, $trustee = null, $tmchacceptance = null)
    {
        $post = [
            'domainname' => $domainName,
            'itemyear' => $itemYear,
            'ownerid' => $ownerId,
            'adminid' => $adminId,
            'techid' => $techId,
            'autorenew' => ($autoRenew !== null) ? (int)$autoRenew : null,
            'shieldwhois' => ($shieldWhoIs !== null) ? (int)$shieldWhoIs : null,
            'trustee' => ($trustee !== null) ? (int)$trustee : null,
            'tmchacceptance' => ($tmchacceptance !== null) ? (int)$tmchacceptance : null
        ];

        $this->options = [
            'form_params' => $this->filterEmpty($post)
        ];
    }
}
