<?php

require 'config.php';
require 'db_create.php';

$host = $config['host'];

try {

$PDO_connect = new PDO ("mysql: host=$host; dbname=$db_name; charset=utf8", $config['user'], $config['pwd']);

$PDO_connect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch (PDOException $e) {
    echo "ERROR! Error sur PDO";
    file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
}