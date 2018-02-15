<?php
namespace NameISP\API3\Request;

class DeleteLabelRequest extends AbstractRequest
{
    protected $method = 'post';
    protected $url = 'miscellaneous/deletelabel/';

    public function __construct($labelId)
    {
        $this->options = [
            'form_params' => [
                'labelid' => $labelId
            ]
        ];
    }
}
