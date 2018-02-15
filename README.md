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


# Methods
If some argument is null by default, it's optional, others are required.

If you want to unset boolean flag, you should pass `false` (e.g. `$setAutoRenew` argument in the `editDomain` method)

All methods return an array as result.

## Domains
### createDomainRegistration
```php
/**
 * @param string $domainName must be fully qualified domain name
 * @param int $itemYear
 * @param int $ownerId
 * @param int $adminId
 * @param int $techId
 * @param bool $autoRenew
 * @param bool $shieldWhoIs
 * @param bool $trustee
 * @param bool $tmchacceptance is only required if the domain name has a claim. If there is no claim this parameter is ignored.
 */
public function createDomainRegistration($domainName, $itemYear, $ownerId, $adminId = null, $techId = null, $autoRenew = null, $shieldWhoIs = null, $trustee = null, $tmchacceptance = null)
```
[Example](doc/createDomainRegistration.md)

### createDomainTransfer
```php
/**
 * @param string $domainName must be fully qualified domain name
 * @param string $auth
 */
public function createDomainTransfer($domainName, $auth = false)
```
[Example](doc/createDomainTransfer.md)

### domainDetails
```php
/**
 * @param int $itemid
 */
public function domainDetails($itemid)
```
[Example](doc/domainDetails.md)

### domainGenAuthCode
```php
/**
 * @param string $domainName
 */
public function domainGenAuthCode($domainName)
```
[Example](doc/domainGenAuthCode.md)

### domainList
```php
/**
 * @param string $domainName
 * @param int $start default: 0
 * @param int $limit default: 100, min: 1 max: 1000, invalid values are ignored and default value is used
 */
public function domainList($domainName = null, $start = null, $limit = null)
```
[Example](doc/domainList.md)

### editDomain
```php
/**
 * @param array|string $domainName must be fully qualified domain name
 * @param bool $setAutoRenew
 * @param bool $setShieldWhoIs
 * @param array $addLabel
 * @param array $removeLabel
 */
public function editDomain($domainName, $setAutoRenew = null, $setShieldWhoIs = null, array $addLabel = null, array $removeLabel = null)
```
Example:
```php
$api->editDomain('example.com', false, null, ['label']);
```

### searchDomain
```php
/**
 * @param array|string $domainName
 */
public function searchDomain($domainName)
```
[Example](doc/searchDomain.md)

### updateDomainDNS
```php
/**
 * @param string $domainName must be fully qualified domain name
 * @param array $nameServer
 */
public function updateDomainDNS($domainName, array $nameServer)
```
[Example](doc/updateDomainDNS.md)

### updateDomainRenew
```php
/**
 * @param string $domainName must be fully qualified domain name
 * @param int $itemYear
 */
public function updateDomainRenew($domainName, $itemYear)
```
[Example](doc/updateDomainRenew.md)
