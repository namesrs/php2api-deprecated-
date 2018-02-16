```php
$api->contactList([
    'firstname' => 'John',
    'lastname' => 'Brown'
]);
// Result:
array (2) [
    'resulttotals' => array (2) [
        'unfiltered' => array (4) [
            'registrant' => array (2) [
                'statusid' => string (4) "1200"
                'value' => integer 1
            ]
            'contact' => array (2) [
                'statusid' => string (4) "1201"
                'value' => integer 1
            ]
            'unassigned' => array (2) [
                'statusid' => string (4) "1400"
                'value' => integer 2
            ]
            'total' => array (1) [
                'value' => integer 4
            ]
        ]
        'filtered' => array (4) [
            'registrant' => array (2) [
                'statusid' => string (4) "1200"
                'value' => integer 0
            ]
            'contact' => array (2) [
                'statusid' => string (4) "1201"
                'value' => integer 0
            ]
            'unassigned' => array (2) [
                'statusid' => string (4) "1400"
                'value' => integer 2
            ]
            'total' => array (1) [
                'value' => integer 2
            ]
        ]
    ]
    'contacts' => array (1) [
        0 => array (13) [
            'status' => array (1) [
                1400 => string (10) "Unassigned"
            ]
            'type' => integer 0
            'firstname' => string (6) "John"
            'lastname' => string (6) "Brown"
            'orgnr' => string (5) "12345"
            'address1' => string (7) "xx"
            'zipcode' => string (6) "xx"
            'city' => string (5) "London"
            'countrycode' => string (2) "ru"
            'phone' => string (13) "+7.909xxxxx"
            'email' => string (12) "xxx@xx.xx"
            'itemconnections' => integer 0
            'contactid' => integer 1233512
        ]
    ]
]
```
