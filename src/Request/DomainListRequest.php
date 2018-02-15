<?php
namespace NameISP\API3\Request;

class DomainListRequest extends AbstractRequest
{
    protected $method = 'get';
    protected $url = 'domain/domainlist/';

    public function __construct($domainName = null, $start = null, $limit = null)
    {
        $query = [
            'domainname' => $domainName,
            'start' => $start,
            'limit' => $limit
        ];

        $this->options = [
            'query' => $this->filterEmpty($query)
        ];
    }
}
