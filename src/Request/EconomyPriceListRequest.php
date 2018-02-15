<?php
namespace NameISP\API3\Request;

class EconomyPriceListRequest extends AbstractRequest
{
    protected $method = 'get';
    protected $url = 'economy/pricelist/';

    public function __construct($print = null, $skipRules = null, $tldName = null, $priceTypes = null, $limit = null, $start = null)
    {
        $query = [
            'print' => ($print !== null) ? (int)$print : null,
            'skiprules' => $skipRules,
            'tldname' => $tldName,
            'pricetypes' => $priceTypes,
            'limit' => $limit,
            'start' => $start
        ];

        $this->options = [
            'query' => $this->filterEmpty($query)
        ];
    }
}
