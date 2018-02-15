<?php
namespace NameISP\API3\Request;

class DnsUpdateRecordRequest extends AbstractRequest
{
    protected $method = 'post';
    protected $url = 'dns/updaterecord/';

    public function __construct($recordId, $domainName, $name, $type, $content, $ttl, $prio = null, $redirectType = null)
    {
        $post = [
            'recordid' => $recordId,
            'domainname' => $domainName,
            'name' => $name,
            'type' => $type,
            'content' => $content,
            'ttl' => $ttl,
            'prio' => $prio,
            'redirecttype' => $redirectType
        ];

        $this->options = [
            'form_params' => $this->filterEmpty($post)
        ];
    }
}
