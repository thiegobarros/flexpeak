<?php

return [
    //local
    // 'class' => 'yii\db\Connection',
    // 'dsn' => 'pgsql:host=localhost;port=5432;dbname=postgres',
    // 'username' => 'postgres',
    // 'password' => 'thiego91',
    // 'charset' => 'utf8',

    //heroku
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=ec2-107-22-162-8.compute-1.amazonaws.com;port=5432;dbname=d29361ec3967cd',
    'username' => 'avmvoosycsepzr',
    'password' => 'bcf90ee149d940cafb0e96161db1384cb5457ef036aeb5757b923c50950dd3c4',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
