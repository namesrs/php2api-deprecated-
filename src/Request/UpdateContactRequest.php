<?php
namespace NameISP\API3\Request;

class UpdateContactRequest extends AbstractRequest
{
    protected $method = 'post';
    protected $url = 'contact/updatecontact/';

    public function __construct($contactId, array $fields)
    {
        $validFields = [
            'firstname',
            'lastname',
            'organization',
            'address1',
            'zipcode',
            'city',
            'countrycode',
            'phone',
            'fax',
            'email',
        ];

        $post = array_merge(
            [
                'contactid' => $contactId
            ],
            array_intersect_key($fields, array_flip($validFields))
        );

        $this->options = [
            'form_params' => $post,
        ];
    }
}
