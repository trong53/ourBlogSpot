<?php
require './Models/PostModel.php';
require './Models/HomeModel.php';

$id = $_GET['id'];

$selected_article = getPost($id);

$query = "SELECT p.id, p.title, p.content, p.image, p.updatedate, p.viewed, u.fullname 
                    FROM posts AS p, users AS u 
                    WHERE u.id = p.user_id AND p.is_public = 1
                    ORDER BY p.updatedate DESC
                    LIMIT 5";
$recent_articles = getRecentPosts($query);

// echo '<pre>';
// print_r($selected_article);

require './Views/PostView.php';