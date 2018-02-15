<?php
namespace NameISP\API3\Request;

class UpdateLabelRequest extends AbstractRequest
{
    protected $method = 'post';
    protected $url = 'miscellaneous/updatelabel/';

    public function __construct($labelId, $parameter, $value)
    {
        $this->options = [
            'form_params' => [
                'labelid' => $labelId,
                'parameter' => $parameter,
                'value' => $value
            ]
        ];
    }
}
