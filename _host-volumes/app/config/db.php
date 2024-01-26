<?php
// Created By @hoaaah * Copyright (c) 2020 belajararief.com

$env = parse_ini_file('.env');

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=host.docker.internal:3306;dbname=newdesign',
    'username' => 'newdesign',
    'password' => $env["MYSQL_PASSWORD"],
    'charset' => 'utf8',
];