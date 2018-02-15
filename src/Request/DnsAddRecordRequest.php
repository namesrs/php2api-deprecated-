<?php
namespace NameISP\API3\Request;

class DnsAddRecordRequest extends AbstractRequest
{
    protected $method = 'post';
    protected $url = 'dns/addrecord/';

    public function __construct($domainName, $name, $type, $content, $ttl, $prio = null, $redirectType = null)
    {
        $post = [
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
