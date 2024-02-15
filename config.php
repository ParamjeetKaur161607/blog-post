<?php
return [
    'database'=>[
        'DB_NAME'=>'blog',
        'USER_NAME'=>'root',
        'PASSWORD'=>'',
        'CONNECTION'=>'mysql:host=localhost',
        'OPTIONS'=>[
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
        ]
    ]
];