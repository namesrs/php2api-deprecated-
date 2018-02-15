<?php
namespace NameISP\API3\Request;

class DomainDetailsRequest extends AbstractRequest
{
    protected $method = 'get';
    protected $url = 'domain/domaindetails/';

    public function __construct($itemId)
    {
        $this->options = [
            'query' => [
                'itemid' => $itemId
            ]
        ];
    }
}
