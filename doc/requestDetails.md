```php
$api->requestDetails(737832);
// Result:
array (1) [
    737832 => array (8) [
        'status' => array (1) [
            11 => string (10) "Processing"
        ]
        'created' => string (19) "2018-02-15 08:58:10"
        'domainname' => string (19) "example.com"
        'nameserver' => string (20) "ns1.digitalocean.com"
        'reqType' => string (17) "update-domain-dns"
        'ordernr' => string (8) "O1528709"
        'substatus' => array (1) [
            4003 => string (18) "Already Registered"
        ]
        'available-actions' => array (3) [
            'updateable' => string (1) "0"
            'resetable' => string (1) "0"
            'cancelable' => string (1) "0"
        ]
    ]
]
```
