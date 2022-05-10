<?php
return [
    'save_handler'=>'files',
    'save_path' => '/home/artem/.www/new-abitur-web/tmp/session',//"127.0.0.1:11211",
    'use_strict_mode' => 0,
    'use_cookies'=>1,
    'use_only_cookies'=>1,
    'name'=>'SID',
    'auto_start'=>0,
    'cookie_lifetime' => 7200,
    'cookie_path' => '/',
    'cookie_domain'=>'serverok.keenetic.link',
    'cookie_httponly'=>'',
    'cookie_samesite'=>'',
    'serialize_handler'=>'php',
    'gc_probability'=>1,
    'gc_divisor'=>1000,
    'gc_maxlifetime'=>7200,
    'referer_check'=>'',
    'cache_limiter'=>'nocache',
    'cache_expire'=>180,
    'use_trans_sid'=>0,
    'sid_length'=>26,
    'trans_sid_tags'=>'a=href,area=href,frame=src,form=',
    'sid_bits_per_character' => 5,
    'base_session'=>[
        'CSRF',
        'AUTH'=>'N',
        'EMAIL',
        'LAST_POSITION',
        'LAST_ACTIVITY',
        'DATE_REG',
        'ROLE_LIST'=>[],
        'IS_ADMIN',
        'AUTH_DRIVER',
        'IP_ADDRESS'
    ]
];
/*
session.save_handler = memcached ;files
session.save_path = "127.0.0.1:11211" ;"/home/artem/www/phptmp"
session.use_strict_mode = 0
session.use_cookies = 1
session.use_only_cookies = 1
session.name = PHPSESSID
session.auto_start = 0
session.cookie_lifetime = 0
session.cookie_path = /
session.cookie_domain =
session.cookie_httponly =
session.cookie_samesite =
session.serialize_handler = php
session.gc_probability = 1
session.gc_divisor = 1000
session.gc_maxlifetime = 1440
session.referer_check =
;session.cache_limiter = nocache
session.cache_expire = 180
session.use_trans_sid = 0
session.sid_length = 26
session.trans_sid_tags = "a=href,area=href,frame=src,form="
session.sid_bits_per_character = 5
 */