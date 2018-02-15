```php
$api->domainList();
// Result:
array (2) [
    'resulttotals' => array (1) [
        'unfiltered' => array (6) [
            'active' => array (2) [
                'statusid' => string (3) "200"
                'value' => integer 1
            ]
            'transferaway' => array (2) [
                'statusid' => string (3) "300"
                'value' => integer 0
            ]
            'inactive' => array (2) [
                'statusid' => string (3) "400"
                'value' => integer 0
            ]
            'expired' => array (2) [
                'statusid' => string (3) "500"
                'value' => integer 0
            ]
            'archive' => array (2) [
                'statusid' => string (5) "10000"
                'value' => integer 0
            ]
            'total' => array (1) [
                'value' => integer 1
            ]
        ]
    ]
    'items' => array (1) [
        0 => array (12) [
            'domainname' => string (19) "example.com"
            'tldrules' => array (5) [
                'autorenew' => array (1) [
                    0 => string (1) "1"
                ]
                'maxNS' => array (1) [
                    0 => string (2) "16"
                ]
                'minNS' => array (1) [
                    0 => string (1) "2"
                ]
                'renewY' => array (9) [
                    0 => string (1) "1"
                    1 => string (1) "2"
                    2 => string (1) "3"
                    3 => string (1) "4"
                    4 => string (1) "5"
                    5 => string (1) "6"
                    6 => string (1) "7"
                    7 => string (1) "8"
                    8 => string (1) "9"
                ]
                'shieldwhois' => array (1) [
                    0 => string (1) "1"
                ]
            ]
            'prices' => array (1) [
                'Retail' => array (1) [
                    'Renew' => array (7) [
                        'desc' => string (5) "Renew"
                        'pricetype' => string (1) "1"
                        'price' => double 146.3228
                        'vat' => integer 0
                        'total' => double 146.3228
                        'currency' => string (3) "SEK"
                        'currencies' => array (2) [
                            'EUR' => array (3) [
                                'price' => double 14.2648
                                'vat' => integer 0
                                'total' => double 14.2648
                            ]
                            'USD' => array (3) [
                                'price' => double 16.8255
                                'vat' => integer 0
                                'total' => double 16.8255
                            ]
                        ]
                    ]
                ]
            ]
            'created' => string (19) "2018-02-14 17:49:22"
            'expires' => string (19) "2019-02-14 16:49:03"
            'renewaldate' => string (10) "2019-02-14"
            'status' => array (1) [
                200 => string (6) "Active"
            ]
            'shieldwhois' => string (1) "0"
            'autorenew' => string (1) "0"
            'available-actions' => array (5) [
                'resetable' => integer 0
                'updateable' => integer 0
                'cancelable' => integer 0
                'restoreable' => integer 0
                'manageable' => integer 1
            ]
            'itemstatus' => array (1) [
                200 => string (6) "Active"
            ]
            'itemID' => integer 357293
        ]
    ]
]
```
