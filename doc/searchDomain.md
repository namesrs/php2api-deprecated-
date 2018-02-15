```php
$api->searchDomain([
    'example.com',
    'asdadasdadasdad.com'
]);
// Result:
array (2) [
    'example.com' => array (2) [
        'status' => string (11) "unavailable"
        'tld' => string (3) "com"
    ]
    'asdadasdadasdad.com' => array (2) [
        'status' => string (9) "available"
        'tld' => string (3) "com"
    ]
]
```
