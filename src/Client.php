<?php
namespace NameISP\API3;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use NameISP\API3\Exception as Exception;
use NameISP\API3\Request as Request;

class Client
{
    use ParseRequestTrait;

    /** @var ClientInterface */
    protected $client;
    /** @var AuthManager */
    protected $authManager;

    /**
     * Client constructor.
     * @param string $baseUrl
     * @param string $apiKey
     */
    public function __construct($apiKey, $baseUrl = 'https://api.domainname.systems')
    {
        $client = new \GuzzleHttp\Client([
                'base_uri' => $baseUrl,
            ]);
        $this->client = $client;
        $this->authManager = new AuthManager($apiKey, $client);

        $this->baseUrl = rtrim($baseUrl, '/').'/';
        $this->apiKey = $apiKey;
    }

    /**
     * @param array|string $domainName
     * @return array
     * @throws Exception\BaseException
     */
    public function searchDomain($domainName)
    {
        return $this->execute(new Request\SearchDomainRequest($domainName));
    }

    /**
     * @param string $domainName
     * @param int $limit default: 100, min: 1 max: 1000, invalid values are ignored and default value is used
     * @param int $start default: 0
     * @return array
     * @throws Exception\BaseException
     */
    public function domainList($domainName = null, $limit = null, $start = null)
    {
        return $this->execute(new Request\DomainListRequest($domainName, $limit, $start));
    }

    /**
     * @param int $itemid
     * @return array
     * @throws Exception\BaseException
     */
    public function domainDetails($itemid)
    {
        return $this->execute(new Request\DomainDetailsRequest($itemid));
    }

    /**
     * @param array|string $domainName must be fully qualified domain name
     * @param bool $setAutoRenew
     * @param bool $setShieldWhoIs
     * @param array $addLabel
     * @param array $removeLabel
     * @return array
     * @throws Exception\BaseException
     */
    public function editDomain($domainName, $setAutoRenew = null, $setShieldWhoIs = null, array $addLabel = null, array $removeLabel = null)
    {
        return $this->execute(new Request\EditDomainRequest($domainName, $setAutoRenew, $setShieldWhoIs, $addLabel, $removeLabel));
    }

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
     * @return array
     * @throws Exception\BaseException
     */
    public function createDomainRegistration($domainName, $itemYear, $ownerId, $adminId = null, $techId = null, $autoRenew = null, $shieldWhoIs = null, $trustee = null, $tmchacceptance = null)
    {
        return $this->execute(new Request\CreateDomainRegistrationRequest($domainName, $itemYear, $ownerId, $adminId, $techId, $autoRenew, $shieldWhoIs, $trustee, $tmchacceptance));
    }

    /**
     * @param string $domainName must be fully qualified domain name
     * @param int $itemYear
     * @return array
     * @throws Exception\BaseException
     */
    public function updateDomainRenew($domainName, $itemYear)
    {
        return $this->execute(new Request\updateDomainRenewRequest($domainName, $itemYear));
    }

    /**
     * @param string $domainName must be fully qualified domain name
     * @param array $nameServer
     * @return array
     * @throws Exception\BaseException
     */
    public function updateDomainDNS($domainName, array $nameServer)
    {
        return $this->execute(new Request\UpdateDomainDNSRequest($domainName, $nameServer));
    }

    /**
     * @param string $domainName must be fully qualified domain name
     * @param string $auth
     * @return array
     * @throws Exception\BaseException
     */
    public function createDomainTransfer($domainName, $auth = false)
    {
        return $this->execute(new Request\CreateDomainTransferRequest($domainName, $auth));
    }

    /**
     * @param string $domainName
     * @return array
     * @throws Exception\BaseException
     */
    public function domainGenAuthCode($domainName)
    {
        return $this->execute(new Request\DomainGenAuthCodeRequest($domainName));
    }

    /**
     * ContactList
     *
     * Note:
     * Valid $filters keys:
     * firstname, lastname, organization, orgnr, address1, zipcode, city, countrycode, phone, fax, email
     *
     * @param array $filters key-value array with filters
     * @param int $limit default: 100, min: 1 max: 1000, invalid values are ignored and default value is used
     * @param int $start default: 0
     * @param string $searchString is a free text search parameter, use this parameter to search every field. If this parameter is used all other parameters are ignored.
     * @return array
     * @throws Exception\BaseException
     */
    public function contactList(array $filters = [], $searchString = null, $limit = null, $start = null)
    {
        return $this->execute(new Request\ContactListRequest($filters, $searchString, $limit, $start));
    }

    /**
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param string $orgnr
     * @param string $address1
     * @param string $zipCode
     * @param string $city
     * @param string $countryCode
     * @param string $phone
     * @param string $organization
     * @param string $fax
     * @return array
     * @throws Exception\BaseException
     */
    public function createContact($firstName, $lastName, $email, $orgnr, $address1, $zipCode, $city, $countryCode, $phone, $organization = null, $fax = null)
    {
        return $this->execute(new Request\CreateContactRequest($firstName, $lastName, $email, $orgnr, $address1, $zipCode, $city, $countryCode, $phone, $organization, $fax));
    }

    /**
     * UpdateContact
     *
     * Notes:
     * Private persons can’t update $firstName or $lastName
     * Organization can’t update $organization
     * No one can update orgnr
     * if value does not exist, value is added else it is updated
     *
     * Possible $fields keys:
     * firstname, lastname, organization, address1, zipcode, city, countrycode, phone, fax, email
     *
     * @param int $contactId
     * @param array $fields
     * @return array
     * @throws Exception\BaseException
     */
    public function updateContact($contactId, array $fields)
    {
        return $this->execute(new Request\UpdateContactRequest($contactId, $fields));
    }

    /**
     * @param string $domainName
     * @param string $reqType
     * @param int $limit default: 100, min: 1 max: 1000, invalid values are ignored and default value is used
     * @param int $start default: 0
     * @return array
     * @throws Exception\BaseException
     */
    public function requestList($domainName = null, $reqType = null, $limit = null, $start = null)
    {
        return $this->execute(new Request\RequestListRequest($domainName, $reqType, $limit, $start));
    }

    /**
     * @param int $reqId
     * @return array
     * @throws Exception\BaseException
     */
    public function requestDetails($reqId)
    {
        return $this->execute(new Request\RequestDetailsRequest($reqId));
    }

    /**
     * @param int $reqId
     * @param string $error <parameter from error list>
     * @return array
     * @throws Exception\BaseException
     */
    public function requestUpdate($reqId, $error)
    {
        return $this->execute(new Request\RequestUpdateRequest($reqId, $error));
    }

    /**
     * RequestCancellation
     *
     * Note:
     * Only statuses with cancelable flag are cancelable.
     *
     * @param int $reqId
     * @return array
     * @throws Exception\BaseException
     */
    public function requestCancellation($reqId)
    {
        return $this->execute(new Request\RequestCancellationRequest($reqId));
    }

    /**
     * PriceList
     *
     * Note:
     * Using $print will ignore $limit and $start parameters, WARNING using $print = 1 will result with a large JSON object, it’s recommended to use $print = 1 together with $skipRules = 1 to limit the JSON size.
     *
     * @param bool $print
     * @param bool $skipRules
     * @param string $tldName
     * @param int $priceTypes
     * @param int $limit
     * @param int $start
     * @return array
     * @throws Exception\BaseException
     */
    public function priceList($print = null, $skipRules = null, $tldName = null, $priceTypes = null, $limit = null, $start = null)
    {
        return $this->execute(new Request\PriceListRequest($print, $skipRules, $tldName, $priceTypes, $limit, $start));
    }

    /**
     * @param string $domainName
     * @return array
     * @throws Exception\BaseException
     */
    public function dnsGetRecords($domainName)
    {
        return $this->execute(new Request\DnsGetRecordsRequest($domainName));
    }

    /**
     * DnsAddRecord
     *
     * Notes:
     * Using $type = redirect will create a redirect
     *  - Valid values for $redirectType are 301, 302 & frame. Default: 301
     *  - Forward url is to be entered in content ex. http://www.example.com
     * Using $type = mailforward will create a mailforward
     *  - Valid values for name is full qualified email address for the domainname
     *  - Forward email is to be entered in content ex. example@example.com
     *
     * @param string $domainName
     * @param string $name
     * @param string $type
     * @param string $content
     * @param int $ttl
     * @param int $prio
     * @param string $redirectType
     * @return array
     * @throws Exception\BaseException
     */
    public function dnsAddRecord($domainName, $name, $type, $content, $ttl, $prio = null, $redirectType = null)
    {
        return $this->execute(new Request\DnsAddRecordRequest($domainName, $name, $type, $content, $ttl, $prio, $redirectType));
    }

    /**
     * DnsUpdateRecord
     *
     * Notes:
     * Using type = redirect will create a redirect
     *  - Valid values for redirecttype are 301, 302 & frame. Default: 301
     *  - Forward url is to be entered in content ex. http://www.example.com
     *
     * @param int $recordId
     * @param string $domainName
     * @param string $name
     * @param string $type
     * @param string $content
     * @param int $ttl
     * @param int $prio
     * @param string $redirectType
     * @return array
     * @throws Exception\BaseException
     */
    public function dnsUpdateRecord($recordId, $domainName, $name, $type, $content, $ttl, $prio = null, $redirectType = null)
    {
        return $this->execute(new Request\DnsUpdateRecordRequest($recordId, $domainName, $name, $type, $content, $ttl, $prio, $redirectType));
    }

    /**
     * @param int $recordId
     * @param string $domainName
     * @return array
     * @throws Exception\BaseException
     */
    public function dnsDeleteRecord($recordId, $domainName)
    {
        return $this->execute(new Request\DnsDeleteRecordRequest($recordId, $domainName));
    }

    /**
     * @param string $domainName
     * @param string $nameServer
     * @return bool
     * @throws Exception\BaseException
     */
    public function checkDnsZone($domainName, $nameServer)
    {
        try {
            $this->execute(new Request\CheckDnsZoneRequest($domainName, $nameServer));
            return true;
        } catch (Exception\ApiException $e) {
            if ($e->getCode() == 2303) {
                return false;
            }

            throw $e;
        }
    }

    /**
     * PublishDnsSec
     *
     * Notes:
     * $flags
     *  - 256 ZSK
     *  - 257 KSK
     * $alg can at the time of writing use one of the following integers:
     *  - 5 RSA/SHA-1
     *  - 7 RSASHA1-NSEC3-SHA1
     *  - 8 RSA/SHA-256
     *  - 10 RSA/SHA-512
     *  - 12 GOST R 34.10-2001
     *  - 13 ECDSA/SHA-256
     *  - 14 ECDSA/SHA-384
     *
     * @param string $domainName
     * @param string $dnsKey
     * @param int $flags
     * @param int $alg
     * @return array
     * @throws Exception\BaseException
     */
    public function publishDnsSec($domainName, $dnsKey, $flags, $alg)
    {
        return $this->execute(new Request\PublishDnsSecRequest($domainName, $dnsKey, $flags, $alg));
    }

    /**
     * @param string $domainName
     * @return array
     * @throws Exception\BaseException
     */
    public function unpublishDnsSec($domainName)
    {
        return $this->execute(new Request\UnpublishDnsSecRequest($domainName));
    }

    /**
     * @return array
     * @throws Exception\BaseException
     */
    public function getLabels()
    {
        return $this->execute(new Request\GetLabelsRequest());
    }

    /**
     * @param string $label
     * @param integer $starred
     * @return array
     * @throws Exception\BaseException
     */
    public function createLabel($label, $starred = null)
    {
        return $this->execute(new Request\CreateLabelRequest($label, $starred));
    }

    /**
     * @param int $labelId
     * @return array
     * @throws Exception\BaseException
     */
    public function deleteLabel($labelId)
    {
        return $this->execute(new Request\DeleteLabelRequest($labelId));
    }

    /**
     * UpdateLabel
     *
     * Note:
     * Valid parameter values are name, starred
     *
     * @param int $labelId
     * @param string $parameter
     * @param string $value
     * @return array
     * @throws Exception\BaseException
     */
    public function updateLabel($labelId, $parameter, $value)
    {
        return $this->execute(new Request\UpdateLabelRequest($labelId, $parameter, $value));
    }

    /**
     * @param Request\AbstractRequest $request
     * @return array
     * @throws Exception\BaseException
     */
    protected function execute(Request\AbstractRequest $request)
    {
        // Check session taken
        if (!$this->authManager->isAuthorized()) {
            $this->authManager->auth();
        }

        try {
            $result = $this->send($request);
        } catch (Exception\ApiException $e) {
            if ($e->getCode() != 2200) {
                throw $e;
            }

            // Try to re-authorize
            $this->authManager->auth();
            $result = $this->send($request);
        }

        // TODO: store session expire time

        // Clean unnecessarily fields
        foreach (['code', 'desc', 'runtime', 'session'] as $field) {
            unset($result[$field]);
        }

        // Return one field if we have exactly 1 key in the array or we have 'resulttotals' field
        if (isset($result['resulttotals']) || count($result) !== 1) {
            return $result;
        } else {
            return current($result);
        }
    }

    /**
     * @param Request\AbstractRequest $request
     * @return array
     * @throws Exception\ApiException
     * @throws Exception\InvalidApiResponseException
     * @throws Exception\NetworkException
     */
    protected function send($request)
    {
        $token = $this->authManager->getToken();

        $url = $request->getUrl().$token.'/';

        try {
            $response = $this->client->request($request->getMethod(), $url, $request->getOptions());
        } catch (GuzzleException $e) {
            throw new Exception\NetworkException($e->getMessage(), $e->getCode(), $e);
        }

        $result = $this->parseRequest($response);

        // Check response code
        if (!isset($result['code'])) {
            throw new Exception\InvalidApiResponseException('API response doesn\'t contains a code');
        }

        if (!in_array($result['code'], [1000, 1300])) {
            $message = isset($result['desc']) ? $result['desc'] : 'Unknown reason';
            throw new Exception\ApiException($message, $result['code']);
        }

        return $result;
    }
}
