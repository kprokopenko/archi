<?php
/**
 * Application configuration shared by all test types
 */
return [
    'components' => [
        'db' => [
            'dsn' => 'mysql:host=mysql-test;dbname=yii2_basic_tests',
        ],
        'urlManager' => [
            'showScriptName' => true,
        ],
    ],
];
