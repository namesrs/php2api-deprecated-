# WHMCS API v.3.0 client

### Installation
You need [composer](https://getcomposer.org/) to install this library.
```bash
composer require nameisp/api3-lib
```

### Usage
```php
use NameISP\API3\Client;

$api = new Client('YOUR_API_KEY');
```

If you want to use non-default another base URL for api, you could pass it as second parameter:
```php
$api = new Client('YOUR_API_KEY', 'https://example.com/api');
```

### Error handling
There are some types of exceptions, that you are able to catch:

**NameISP\API3\Exception\BaseException**

If you want to catch all exception types from this library, you should use this exception class:
```php
use NameISP\API3\Exception\BaseException;

try {
    $api->searchDomain('example.org');
} catch (BaseException $e) {
    // Do something...
}
```

This should be enought for a basic application. But if you need more control you could also catch these exceptions:

**NameISP\API3\Exception\ApiException**

When API returns non-succesful response. You are able to get API error code and message from that exception:
```php
use NameISP\API3\Exception\ApiException;

try {
    $api->searchDomain('example.org');
} catch (ApiException $e) {
    var_dump($e->getCode()); // int(2303)
    var_dump($e->getMessage()); // string(21) "Object does not exist"
}
```

**NameISP\API3\Exception\AuthFailedException**

This exception throws when authorization was failed with your API token.

**NameISP\API3\Exception\NetworkException**

Any network exception. If you need more details, you could get original [Guzzle](http://docs.guzzlephp.org/en/latest/index.html) exception by using `$e->getPrevious();`


## Methods
All methods return an array as result.

### searchDomain
```php
/**
 * @param array|string $domainName
 */
public function searchDomain($domainName)
    
// Example output:
array (2) [
    'example.org' => array (2) [
        'status' => string (11) "unavailable"
        'tld' => string (3) "org"
    ]
    'asdadasdadasdad.com' => array (2) [
        'status' => string (9) "available"
        'tld' => string (3) "com"
    ]
]
```

### domainList
```php
/**
 * @param string|null $domainName
 * @param int $start
 * @param int $limit
 */
public function domainList($domainName = null, $start = 0, $limit = 100)

// Example output:
array (1) [
    'unfiltered' => array (6) [
        'active' => array (2) [
            'statusid' => string (3) "200"
            'value' => integer 0
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
            'value' => integer 0
        ]
    ]
]
```
