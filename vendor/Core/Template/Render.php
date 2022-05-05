<?php


namespace Vendor\Core\Template;


class Render
{
    public function getGomponent($tag,$param=[],$data='')
    {
        $element = '';
        $parameter = '';
        foreach ($param as $key=>$value){
            $parameter = $parameter." $key='$value'";
        }
        switch ($tag){
            case 'meta':
            case 'img':
            case 'input':
                $element = "<{$tag}$parameter>";
                break;
            case 'hr':
            case 'br':
                $element = "<$tag>";
                break;
            default:
                $element = "<{$tag}$parameter>$data</{$tag}>";
                break;
        }
        return $element;
    }
}