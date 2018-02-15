<?php
namespace NameISP\API3\Request;

class ContactListRequest extends AbstractRequest
{
    protected $method = 'get';
    protected $url = 'contact/contactlist/';

    public function __construct($firstName = null, $lastName = null, $organization = null, $orgnr = null, $address1 = null, $zipCode = null, $city = null, $countryCode = null, $phone = null, $fax = null, $email = null, $limit = null, $start = null, $searchString = null)
    {
        $query = [
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
            'email' => $email,
            'limit' => $limit,
            'start' => $start,
            'searchstring' => $searchString
        ];

        $this->options = [
            'query' => $this->filterEmpty($query)
        ];
    }
}
