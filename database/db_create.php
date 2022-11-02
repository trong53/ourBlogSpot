<?php

require 'PDO_connect.php';

$db_name = 'siteblog';  // define the database Name

try {

/************************* Create Database if not existed ************************/

$sql = "CREATE DATABASE IF NOT EXISTS $db_name CHARACTER SET utf8 COLLATE utf8_general_ci";
$PDO_connect->exec($sql);

}
catch (PDOException $e) {
    echo "ERROR! Error sur PDO";
    file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
}