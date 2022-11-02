<?php

require 'db_connect.php';

$table_01 = 'users';
$table_02 = 'admin';
$table_03 = 'posts';

/************************* Create table if not existed ************************/
try {
    
    // $PDO_connect->exec("use $db_name");   // using "use" statement

    $sql_table1 = "CREATE TABLE IF NOT EXISTS $table_01 
    (
        id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL UNIQUE,
        fullname VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
        createdate DATETIME NOT NULL,
        is_block TINYINT(4) NOT NULL DEFAULT '0',
        permision TINYINT(4) NOT NULL DEFAULT '0'
    )";
    $PDO_connect->exec($sql_table1);

    $sql_table2 = "CREATE TABLE IF NOT EXISTS $table_02
    (
        id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL UNIQUE,
        fullname VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
        createdate DATETIME NOT NULL,
        is_block TINYINT(4) NOT NULL DEFAULT '0',
        permision TINYINT(4) NOT NULL DEFAULT '0'
    )";
    $PDO_connect->exec($sql_table2);

    $sql_table3 = "CREATE TABLE IF NOT EXISTS $table_03
    (
        id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(500) NOT NULL COLLATE 'utf8_general_ci',
        content TEXT COLLATE 'utf8_general_ci',
        image VARCHAR(500) COLLATE 'utf8_general_ci',
        user_id INT(11) NOT NULL,
        is_public TINYINT(4) NOT NULL DEFAULT '0',
        createdate DATETIME NOT NULL,
        updatedate DATETIME NOT NULL
    )";
    $PDO_connect->exec($sql_table3);

}
catch (PDOException $e) {
    echo "ERROR! Error sur PDO - creation of tables";
    file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
}
