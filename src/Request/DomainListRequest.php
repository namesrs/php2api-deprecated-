<?php
namespace NameISP\API3\Request;

class DomainListRequest extends AbstractRequest
{
    protected $method = 'get';
    protected $url = 'domain/domainlist/';

    public function __construct($domainName = null, $start = 0, $limit = 100)
    {
        $query = [
            'start' => $start,
            'limit' => $limit
        ];

        if ($domainName !== null) {
            $query['domainname'] = $domainName;
        }

        $this->options = [
            'query' => $query
        ];
    }
}
