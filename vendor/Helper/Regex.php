<?php

namespace Vendor\Helper;

class Regex
{
    const RE_NUMBERIC = "0-9";
    const RE_LATINIC_LOWER = "a-z";
    const RE_LATINIC_UPPER = "A-Z";
    const RE_CYRILIC_LOWER = "а-я";
    const RE_CYRILIC_UPPER = "А-Я";
    const RE_SPECIALITY_SYMBOLS = "_\-\!\@\#\$\%\^\&\*\(\)\{\}\[\]\|\:\;\/";
    const RE_EMAIL = self::RE_NUMBERIC.self::RE_LATINIC_LOWER.self::RE_LATINIC_UPPER."]+@[".self::RE_LATINIC_LOWER.self::RE_LATINIC_LOWER;
    const RE_PASSWORD = self::RE_NUMBERIC.self::RE_LATINIC_LOWER.self::RE_LATINIC_UPPER.self::RE_SPECIALITY_SYMBOLS;
    const RE_TIMESTAMP_DB =  '/^\d\d\d\d\-\d\d\-\d\d\ \d\d\:\d\d\:\d\d/';
    public static function check(string|array $regex,string $string, bool $group = true)
    {
        $check = true;
        switch ($group){
            case false:
                $check = preg_match($regex, $string);
                break;
            default:
                if (is_string($regex)){
                    $check = preg_match("/[$regex]/",$string);
                } elseif (is_array($regex)){
                    $result = [];
                    $check = true;
                    foreach ($regex as $key=>$value){
                        $result[] = preg_match("/[$value]/", $string);
                    }
                    foreach ($result as $k=>$v){
                        if (!$v){
                            $check = false;
                        }
                    }
                }
                break;
        }
        if (!$check){
            if (is_array($regex)){
                $regex = implode(' ', $regex);
            }
            $check = 'Данные не соответствуют шаблону '. $regex;
        }
        return $check;
    }
}