<?php

require_once 'data.php';

require_once 'db_connect.php';

require_once 'table_create.php';

/****************** query INSERT of data *********************/

try {

    $PDO_connect->exec("set names utf8");  // set CHARACTER SET utf8 qui support the french language
    
    foreach ($data as $key => $value) {

        $title = $value['title'];
        $content = $value['content'];
        $created_at = $value['created_at'];

        $db_insert = "INSERT INTO $table_name (title, content, created_at) 
                    VALUES ('$title', '$content', '$created_at')";
        
        $PDO_connect->exec($db_insert);
    }*/
}
catch (PDOException $e) {
    echo "ERROR! Error PDO migration";
    file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
}
