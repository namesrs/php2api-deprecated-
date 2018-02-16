```php
$api->requestList('example.com');
// Result:
array (2) [
    'resulttotals' => array (2) [
        'unfiltered' => array (5) [
            'pending' => array (2) [
                'statusid' => string (1) "1"
                'value' => integer 0
            ]
            'processing' => array (2) [
                'statusid' => string (2) "11"
                'value' => integer 2
            ]
            'action required' => array (2) [
                'statusid' => string (4) "4000"
                'value' => integer 1
            ]
            'closed' => array (2) [
                'statusid' => string (4) "2000"
                'value' => integer 4
            ]
            'total' => array (1) [
                'value' => integer 7
            ]
        ]
        'filtered' => array (5) [
            'pending' => array (2) [
                'statusid' => string (1) "1"
                'value' => integer 0
            ]
            'processing' => array (2) [
                'statusid' => string (2) "11"
                'value' => integer 2
            ]
            'action required' => array (2) [
                'statusid' => string (4) "4000"
                'value' => integer 0
            ]
            'closed' => array (2) [
                'statusid' => string (4) "2000"
                'value' => integer 3
            ]
            'total' => array (1) [
                'value' => integer 5
            ]
        ]
    ]
    'requests' => array (5) [
        0 => array (9) [
            'status' => array (1) [
                2000 => string (6) "Closed"
            ]
            'created' => string (19) "2018-02-15 16:13:08"
            'domainname' => string (19) "example.com"
            'nameserver' => string (16) "ns1.nameisp.info"
            'ordernr' => string (8) "O1528942"
            'reqType' => string (17) "update-domain-dns"
            'substatus' => array (1) [
                2001 => string (9) "Completed"
            ]
            'available-actions' => array (3) [
                'resetable' => integer 0
                'updateable' => integer 0
                'cancelable' => integer 0
            ]
            'requestid' => integer 738338
        ]
        1 => array (9) [
            'status' => array (1) [
                2000 => string (6) "Closed"
            ]
            'created' => string (19) "2018-02-15 09:02:05"
            'domainname' => string (19) "example.com"
            'itemyear' => string (1) "2"
            'ordernr' => string (8) "O1528715"
            'reqType' => string (19) "update-domain-renew"
            'substatus' => array (1) [
                2001 => string (9) "Completed"
            ]
            'available-actions' => array (3) [
                'resetable' => integer 0
                'updateable' => integer 0
                'cancelable' => integer 0
            ]
            'requestid' => integer 737840
        ]
        2 => array (10) [
            'status' => array (1) [
                11 => string (10) "Processing"
            ]
            'created' => string (19) "2018-02-15 08:58:10"
            'domainname' => string (19) "example.com"
            'nameserver' => string (20) "ns1.digitalocean.com"
            'ordernr' => string (8) "O1528709"
            'reqType' => string (17) "update-domain-dns"
            'substatus' => array (1) [
                4003 => string (18) "Already Registered"
            ]
            'statusicon' => array (1) [
                'icon' => string (7) "newicon"
            ]
            'available-actions' => array (3) [
                'resetable' => integer 0
                'updateable' => integer 0
                'cancelable' => integer 0
            ]
            'requestid' => integer 737832
        ]
        3 => array (14) [
            'status' => array (1) [
                11 => string (10) "Processing"
            ]
            'created' => string (19) "2018-02-14 17:48:31"
            'autorenew' => string (1) "0"
            'domainname' => string (19) "example.com"
            'itemyear' => string (1) "1"
            'nameserver' => string (16) "ns2.nameisp.info"
            'ordernr' => string (8) "O1528625"
            'ownerid' => string (7) "1233512"
            'reqType' => string (26) "create-domain-registration"
            'shieldwhois' => string (1) "0"
            'substatus' => array (1) [
                4003 => string (18) "Already Registered"
            ]
            'statusicon' => array (1) [
                'icon' => string (7) "newicon"
            ]
            'available-actions' => array (3) [
                'resetable' => integer 0
                'updateable' => integer 0
                'cancelable' => integer 0
            ]
            'requestid' => integer 737270
        ]
        4 => array (13) [
            'status' => array (1) [
                2000 => string (6) "Closed"
            ]
            'created' => string (19) "2018-02-14 17:48:04"
            'autorenew' => string (1) "0"
            'domainname' => string (19) "example.com"
            'itemyear' => string (1) "1"
            'nameserver' => string (16) "ns2.nameisp.info"
            'ordernr' => string (8) "O1528624"
            'ownerid' => string (7) "1233512"
            'reqType' => string (26) "create-domain-registration"
            'shieldwhois' => string (1) "0"
            'substatus' => array (1) [
                2001 => string (9) "Completed"
            ]
            'available-actions' => array (3) [
                'resetable' => integer 0
                'updateable' => integer 0
                'cancelable' => integer 0
            ]
            'requestid' => integer 737269
        ]
    ]
]
```
