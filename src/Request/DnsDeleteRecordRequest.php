<?php
namespace NameISP\API3\Request;

class DnsDeleteRecordRequest extends AbstractRequest
{
    protected $method = 'post';
    protected $url = 'dns/deleterecord/';

    public function __construct($recordId, $domainName)
    {
        $this->options = [
            'form_params' => [
                'recordid' => $recordId,
                'domainname' => $domainName
            ]
        ];
    }
}
