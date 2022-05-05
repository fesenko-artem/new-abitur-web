<?php
return [
    'cache_engine'=>'memcached',
    'server_list'=>[
        ['127.0.0.1',11211]
    ],
    'types_cache'=>[
        'template'=>['lifetime'=>360, 'prefix'=>'memc.template.key-%s'],
        'db_requests'=>['lifetime'=>60, 'prefix'=>'memc.database.key-%s'],
        'table'=>['lifetime'=>3600, 'prefix'=>'table.%s'],
        'dict'=>['lifetime'=>3600, 'prefix'=>'dict.%s'],
        'kladr'=>['lifetime'=>36000, 'prefix'=>'kladr.%s'],
        'log_type'=>['lifetime'=>10200, 'prefix'=>'log_type.%s']
    ]
];