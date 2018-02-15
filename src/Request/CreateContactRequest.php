<?php
namespace NameISP\API3\Request;

class CreateContactRequest extends AbstractRequest
{
    protected $method = 'post';
    protected $url = 'contact/createcontact/';

    public function __construct($firstName, $lastName, $email, $orgnr, $address1, $zipCode, $city, $countryCode, $phone, $organization = null, $fax = null)
    {
        $post = [
            'firstname' => $firstName,
            'lastname' => $lastName,
            'organization' => $organization,
            'orgnr' => $orgnr,
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
