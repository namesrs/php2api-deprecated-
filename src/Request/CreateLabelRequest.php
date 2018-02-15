<?php
namespace NameISP\API3\Request;

class CreateLabelRequest extends AbstractRequest
{
    protected $method = 'post';
    protected $url = 'miscellaneous/createlabel/';

    public function __construct($label, $starred = null)
    {
        $post = [
            'label' => $label,
            'starred' => $starred
        ];

        $this->options = [
            'form_params' => $this->filterEmpty($post)
        ];
    }
}
