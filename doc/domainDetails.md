```php
$api->domainDetails(357293);
// Result:
array (1) [
    357293 => array (15) [
        'tld' => array (2) [
            'tldid' => string (3) "411"
            'tld' => string (3) "com"
        ]
        'domainname' => string (19) "example.com"
        'prices' => array (1) [
            'Retail' => array (5) [
                'Registration' => array (7) [
                    'desc' => string (12) "Registration"
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
                'Restore' => array (7) [
                    'desc' => string (7) "Restore"
                    'pricetype' => string (1) "2"
                    'price' => double 705.5076
                    'vat' => integer 0
                    'total' => double 705.5076
                    'currency' => string (3) "SEK"
                    'currencies' => array (2) [
                        'EUR' => array (3) [
                            'price' => double 68.779
                            'vat' => integer 0
                            'total' => double 68.779
                        ]
                        'USD' => array (3) [
                            'price' => double 81.1255
                            'vat' => integer 0
                            'total' => double 81.1255
                        ]
                    ]
                ]
                'Transfer' => array (7) [
                    'desc' => string (8) "Transfer"
                    'pricetype' => string (1) "2"
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
                'OwnerChange' => array (7) [
                    'desc' => string (11) "OwnerChange"
                    'pricetype' => string (1) "2"
                    'price' => integer 0
                    'vat' => integer 0
                    'total' => integer 0
                    'currency' => string (3) "SEK"
                    'currencies' => array (2) [
                        'EUR' => array (3) [
                            'price' => integer 0
                            'vat' => integer 0
                            'total' => integer 0
                        ]
                        'USD' => array (3) [
                            'price' => integer 0
                            'vat' => integer 0
                            'total' => integer 0
                        ]
                    ]
                ]
            ]
        ]
        'owner' => array (12) [
            'editable' => integer 1
            'contactid' => string (7) "1233512"
            'created' => string (19) "2018-02-14 16:14:41"
            'firstname' => string (6) "John"
            'lastname' => string (6) "Brown"
            'orgnr' => string (5) "12345"
            'address1' => string (7) "xx"
            'zipcode' => string (6) "xxx"
            'city' => string (5) "London"
            'countrycode' => string (2) "ru"
            'phone' => string (13) "+7.909xxxxx"
            'email' => string (12) "xxx@xx.xx"
        ]
        'admin' => null
        'tech' => null
        'billing' => null
        'created' => string (19) "2018-02-14 17:49:22"
        'expires' => string (19) "2019-02-14 16:49:03"
        'renewaldate' => string (10) "2019-02-14"
        'status' => array (1) [
            200 => string (6) "Active"
        ]
        'shieldwhois' => string (1) "0"
        'autorenew' => string (1) "0"
        'tldrules' => array (19) [
            'agreement' => array (1) [
                0 => string (60) "https://www.nameisp.com/content/downloads/gtld_agreement.pdf"
            ]
            'autorenew' => array (1) [
                0 => string (1) "1"
            ]
            'countrycode' => array (1) [
                0 => string (0) ""
            ]
            'countryconnection' => array (1) [
                0 => string (0) ""
            ]
            'description' => array (1) [
                0 => string (0) ""
            ]
            'dnssec' => array (1) [
                0 => string (1) "1"
            ]
            'idn' => array (1) [
                0 => string (1) "1"
            ]
            'maxLen' => array (1) [
                0 => string (2) "63"
            ]
            'maxNS' => array (1) [
                0 => string (2) "16"
            ]
            'minLen' => array (1) [
                0 => string (1) "3"
            ]
            'minNS' => array (1) [
                0 => string (1) "2"
            ]
            'namesimilarity' => array (1) [
                0 => string (0) ""
            ]
            'regtime' => array (1) [
                0 => string (0) ""
            ]
            'regY' => array (10) [
                0 => string (1) "1"
                1 => string (1) "2"
                2 => string (1) "3"
                3 => string (1) "4"
                4 => string (1) "5"
                5 => string (1) "6"
                6 => string (1) "7"
                7 => string (1) "8"
                8 => string (1) "9"
                9 => string (2) "10"
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
            'tldGroup' => array (2) [
                0 => string (7) "POPULAR"
                1 => string (11) "RECOMMENDED"
            ]
            'trustee' => array (1) [
                0 => string (1) "0"
            ]
            'useAuthcode' => array (1) [
                0 => string (1) "1"
            ]
        ]
        'nameservers' => array (2) [
            0 => array (1) [
                'nameserver' => string (16) "ns1.nameisp.info"
            ]
            1 => array (1) [
                'nameserver' => string (16) "ns2.nameisp.info"
            ]
        ]
    ]
]
```
