<?php

namespace Vendor\Core\Template;

class Html
{
    public const DIV_OPEN_BASE_TAG = '<%s %s >';
    public const INPUT_BASE_TAG = '<%s %s value="%s">';
    public const DIV_CLOSE_BASE_TAG = '<%s %s>%s</%s>';

    public function make_base_tag($tag_name,$attribute,$content,$component_template = self::DIV_CLOSE_BASE_TAG)
    {
        $base_component = '';
        switch ($component_template){
            case self::DIV_CLOSE_BASE_TAG:
                if ($tag_name == 'select'){
                    $content = $this->prepare_select_options($content);
                }
                $base_component = sprintf($component_template,$tag_name,$this->prepare_attribute($attribute),$content,$tag_name);
                break;
            case self::DIV_OPEN_BASE_TAG:
                $base_component = sprintf($component_template,$tag_name,$this->prepare_attribute($attribute));
                break;
            case self::INPUT_BASE_TAG:
                $base_component = sprintf($component_template,$tag_name,$this->prepare_attribute($attribute),$content);
                break;
            default: break;
        }
        return $base_component;
    }
    public function prepare_attribute($attribute_list)
    {
        $result = '';
        foreach ($attribute_list as $attribute_key=>$attribute_value){
            $result .= sprintf('%s="%s" ',$attribute_key,$attribute_value);
        }
        return $result;
    }
    public function prepare_select_options($option_list=[])
    {
        $result = '';
        foreach ($option_list as $option_key => $option_value){
            $result .= sprintf('<option value="%s">%s</option>',$option_key,$option_value);
        }
        return $result;
    }
}