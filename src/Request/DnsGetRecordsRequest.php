<?php
namespace NameISP\API3\Request;

class DnsGetRecordsRequest extends AbstractRequest
{
    protected $method = 'get';
    protected $url = 'dns/getrecords/';

    public function __construct($domainName)
    {
        $this->options = [
            'query' => [
                'domainname' => $domainName
            ]
        ];
    }
}
