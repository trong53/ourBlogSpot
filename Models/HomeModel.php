<?php

function getPosts($query): array {
    /***************************
    $PDO_connect = connexion_database();
    ***************************/
    require './database/db_connect.php';

    $articles = $PDO_connect->prepare($query);
    $articles->execute();
    $articles = $articles->fetchAll(PDO::FETCH_ASSOC);

    return $articles;
}

function countArticles($query_count) : int {
    require './database/db_connect.php';

    $countArticles = $PDO_connect->prepare($query_count);
    $countArticles->execute();
    $countArticles = $countArticles->fetchColumn(); // countID is s string(2) 21

    return (int)$countArticles; // transform string into integer
}

function getString($numberWords, $string) {
    $i=0;
    $space = 0;
    while ($space<$numberWords && $i < strlen($string)-1) {
        $i++;
        if ($string[$i] === ' ') {
            $space++;
        }
    }
   $getstring= substr($string, 0, $i+1);
   if ($getstring == $string) {
    return $string;
   }else{
    return $getstring.'.....';
   }
}