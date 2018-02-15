<?php
namespace NameISP\API3\Request;

class UpdateContactRequest extends AbstractRequest
{
    protected $method = 'post';
    protected $url = 'contact/updatecontact/';

    public function __construct($contactId, $firstName = null, $lastName = null, $organization = null, $address1 = null, $zipCode = null, $city = null, $countryCode = null, $phone = null, $fax = null, $email = null)
    {
        $post = [
            'contactid' => $contactId,
            'firstname' => $firstName,
            'lastname' => $lastName,
            'organization' => $organization,
            'address1' => $address1,
            'zipcode' => $zipCode,
            'city' => $city,
            'countrycode' => $countryCode,
            'phone' => $phone,
            'fax' => $fax,
            'email' => $email
        ];

        $this->options = [
            'form_params' => $this->filterEmpty($post)
        ];
    }
}
