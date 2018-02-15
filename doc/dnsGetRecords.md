```php
$api->dnsGetRecords('example.com');
// Result:
array (3) [
    'example.com' => array (3) [
        'dnstype' => string (8) "BasicDNS"
        'zone' => array (1) [
            0 => array (7) [
                'primary_ns' => string (16) "ns1.nameisp.info"
                'responsible_party' => string (20) "registry@nameisp.com"
                'serial' => string (10) "1518629179"
                'refresh' => string (5) "43200"
                'retry' => string (4) "3600"
                'expire' => string (6) "604800"
                'ttl' => string (4) "3600"
            ]
        ]
        'records' => array (6) [
            0 => array (7) [
                'recordid' => string (8) "16992196"
                'name' => string (19) "example.com"
                'type' => string (2) "NS"
                'content' => string (16) "ns1.nameisp.info"
                'ttl' => string (5) "86400"
                'prio' => null
                'change_date' => null
            ]
            1 => array (7) [
                'recordid' => string (8) "16992197"
                'name' => string (19) "example.com"
                'type' => string (2) "NS"
                'content' => string (16) "ns2.nameisp.info"
                'ttl' => string (5) "86400"
                'prio' => null
                'change_date' => null
            ]
            2 => array (7) [
                'recordid' => string (8) "16992202"
                'name' => string (21) "*.example.com"
                'type' => string (1) "A"
                'content' => string (7) "1.1.1.1"
                'ttl' => string (4) "3600"
                'prio' => null
                'change_date' => null
            ]
            3 => array (7) [
                'recordid' => string (8) "16992206"
                'name' => string (21) "*.example.com"
                'type' => string (1) "A"
                'content' => string (7) "1.1.1.1"
                'ttl' => string (4) "3600"
                'prio' => null
                'change_date' => null
            ]
            4 => array (7) [
                'recordid' => string (8) "16992210"
                'name' => string (21) "*.example.com"
                'type' => string (1) "A"
                'content' => string (7) "1.1.1.1"
                'ttl' => string (4) "3600"
                'prio' => null
                'change_date' => null
            ]
            5 => array (7) [
                'recordid' => string (8) "16992198"
                'name' => string (21) "*.example.com"
                'type' => string (1) "A"
                'content' => string (7) "1.1.1.1"
                'ttl' => string (4) "3600"
                'prio' => null
                'change_date' => null
            ]
        ]
    ]
    'available-types' => array (11) [
        0 => array (2) [
            'type' => string (1) "A"
            'name' => string (1) "A"
        ]
        1 => array (2) [
            'type' => string (4) "AAAA"
            'name' => string (4) "AAAA"
        ]
        2 => array (2) [
            'type' => string (2) "MX"
            'name' => string (2) "MX"
        ]
        3 => array (2) [
            'type' => string (5) "CNAME"
            'name' => string (5) "CNAME"
        ]
        4 => array (2) [
            'type' => string (3) "TXT"
            'name' => string (3) "TXT"
        ]
        5 => array (2) [
            'type' => string (3) "SRV"
            'name' => string (3) "SRV"
        ]
        6 => array (2) [
            'type' => string (8) "REDIRECT"
            'name' => string (8) "REDIRECT"
        ]
        7 => array (2) [
            'type' => string (3) "PTR"
            'name' => string (3) "PTR"
        ]
        8 => array (2) [
            'type' => string (11) "MAILFORWARD"
            'name' => string (11) "MAILFORWARD"
        ]
        9 => array (2) [
            'type' => string (2) "NS"
            'name' => string (2) "NS"
        ]
        10 => array (2) [
            'type' => string (3) "CAA"
            'name' => string (3) "CAA"
        ]
    ]
    'available-ttl' => array (6) [
        0 => array (3) [
            'ttl' => integer 0
            'premium' => boolean false
            'desc' => string (11) "ttl-default"
        ]
        1 => array (3) [
            'ttl' => integer 600
            'premium' => boolean true
            'desc' => string (7) "ttl-600"
        ]
        2 => array (3) [
            'ttl' => integer 1800
            'premium' => boolean true
            'desc' => string (8) "ttl-1800"
        ]
        3 => array (3) [
            'ttl' => integer 3600
            'premium' => boolean false
            'desc' => string (8) "ttl-3600"
        ]
        4 => array (3) [
            'ttl' => integer 7200
            'premium' => boolean false
            'desc' => string (8) "ttl-7200"
        ]
        5 => array (3) [
            'ttl' => string (6) "custom"
            'premium' => boolean true
            'desc' => string (10) "ttl-custom"
        ]
    ]
]
```
