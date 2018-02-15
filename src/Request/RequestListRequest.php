<?php
namespace NameISP\API3\Request;

class RequestListRequest extends AbstractRequest
{
    protected $method = 'get';
    protected $url = 'request/requestlist/';

    public function __construct($domainName = null, $reqType = null, $limit = null, $start = null)
    {
        $query = [
            'domainname' => $domainName,
            'reqtype' => $reqType,
            'limit' => $limit,
            'start' => $start
        ];

        $this->options = [
            'query' => $this->filterEmpty($query)
        ];
    }
}
