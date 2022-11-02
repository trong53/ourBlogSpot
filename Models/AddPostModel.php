<?php

function insertPost($title, $content, $image, $user_id, $is_public, $viewed, $createdate, $updatedate) {
    require './database/db_connect.php';

    $insertPost = $PDO_connect->prepare("INSERT INTO posts (title, content, image, user_id, is_public, viewed, createdate, updatedate ) 
            VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)");
    $insertPost->bindParam(1, $title, PDO::PARAM_STR);
    $insertPost->bindParam(2, $content, PDO::PARAM_STR);
    $insertPost->bindParam(3, $image, PDO::PARAM_STR);
    $insertPost->bindParam(4, $user_id, PDO::PARAM_INT);
    $insertPost->bindParam(5, $is_public, PDO::PARAM_INT);
    $insertPost->bindParam(6, $viewed, PDO::PARAM_INT);
    $insertPost->bindParam(7, $createdate, PDO::PARAM_STR);
    $insertPost->bindParam(8, $updatedate, PDO::PARAM_STR);

    $insertPost -> execute();
}
