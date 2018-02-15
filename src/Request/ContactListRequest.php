<?php
namespace NameISP\API3\Request;

class ContactListRequest extends AbstractRequest
{
    protected $method = 'get';
    protected $url = 'contact/contactlist/';

    public function __construct(array $filters = [], $searchString = null, $limit = null, $start = null)
    {
        $validFields = [
            'firstname',
            'lastname',
            'organization',
            'orgnr',
            'address1',
            'zipcode',
            'city',
            'countrycode',
            'phone',
            'fax',
            'email'
        ];

        $query = array_merge(
            // Get only allowed columns from the $filters
            array_intersect_key($filters, array_flip($validFields)),
            [
                'searchstring' => $searchString,
                'limit' => $limit,
                'start' => $start
            ]
        );

        $this->options = [
            'query' => $this->filterEmpty($query)
        ];
    }
}
