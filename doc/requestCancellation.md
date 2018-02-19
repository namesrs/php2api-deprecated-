```php
$api->requestCancellation(737845);
// Result:
array (9) [
    'status' => array (1) [
        2000 => string (6) "Closed"
    ]
    'created' => string (19) "2018-02-15 09:05:53"
    'domainname' => string (16) "whmcsmodule.name"
    'auth' => string (4) "code"
    'reqType' => string (22) "create-domain-transfer"
    'ordernr' => string (8) "O1528720"
    'substatus' => array (1) [
        501 => string (16) "Cancelled - User"
    ]
    'error' => array (1) [
        0 => array (4) [
            'shortdesc' => string (23) "Fix_Request_Faulty_Code"
            'desc' => string (72) "The used authcode is incorrect, please reenter it or generate a new one."
            'field' => string (4) "auth"
            'validation' => string (2) ".*"
        ]
    ]
    'available-actions' => array (3) [
        'updateable' => string (1) "0"
        'resetable' => string (1) "0"
        'cancelable' => string (1) "0"
    ]
]
```
