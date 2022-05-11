<?php

namespace Vendor\Core\DateTime;

class DateTime extends \DateTime
{
    public $timestamp;
    public $timezone;
    public const DB_DATETIMESTAMP = 'Y-m-d\ H:i:s';
    public const RU_DATETIMESTAMP = 'd-m-Y\ H:i:s';
    public const RU_DATE = 'd-m-Y';
    public const RU_TIME = 'H:i:s';
    public function __construct($timestamp = 'now',$timezone = null)
    {
        $this->timestamp = new \DateTime($timestamp,$timezone);
        $this->timezone = $timezone;
    }

    public function get($format)
    {
        return $this->timestamp->format($format);
    }
}