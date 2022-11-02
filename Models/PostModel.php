<?php

function getPost($id) : array {
    require './database/db_connect.php';

    $query = "SELECT p.id, p.title, p.content, p.image, p.updatedate, p.viewed, u.fullname 
                    FROM posts AS p, users AS u 
                    WHERE u.id = p.user_id AND p.id = ?";
    $selected_article = $PDO_connect->prepare($query);
    $selected_article->bindParam(1, $id, PDO::PARAM_INT);
    $selected_article->execute();
    $selected_article = $selected_article->fetchAll(PDO::FETCH_ASSOC);

    return $selected_article;
}

function getRecentPosts($query) : array {
    require './database/db_connect.php';

    $recent_articles = $PDO_connect->prepare($query);
    $recent_articles->execute();
    $recent_articles = $recent_articles->fetchAll(PDO::FETCH_ASSOC);

    return $recent_articles;
}