<?php
namespace NameISP\API3\Request;

abstract class AbstractRequest
{
    protected $method = 'get';
    protected $url;
    protected $options = [];

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }
}
