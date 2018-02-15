```php
$api->updateDomainDNS('example.com', [
    'ns1.example.com',
    'ns2.example.com'
]);
// Result:
array (2) [
    'requestID' => array (1) [
        0 => string (6) "737832"
    ]
    'orderID' => array (1) [
        0 => string (8) "O1528709"
    ]
]
```
