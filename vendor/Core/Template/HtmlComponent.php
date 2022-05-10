<?php

namespace Vendor\Core\Template;

class HtmlComponent extends Html
{
    public function form_floating($type,$identifier,$label_text,$placeholder)
    {
        return $this->make_base_tag(
            'div',
            ['class'=>'form-floating'],
            $this->make_base_tag(
                'input',
                ['type'=>$type,'class'=>'form-control','id'=>$identifier,'name'=>$identifier,'placeholder'=>$placeholder],
                '',
                $this::INPUT_BASE_TAG
            ).
            $this->make_base_tag(
                'label',
                ['for'=>$identifier],
                $label_text,
                $this::DIV_CLOSE_BASE_TAG
            ),
            $this::DIV_CLOSE_BASE_TAG
        );
    }

    public function input_group($base_classes,$content)
    {
        return $this->make_base_tag(
            'div',
            ['class'=>'input-group '.$base_classes],
            $content,
            $this::DIV_CLOSE_BASE_TAG
        );
    }
}