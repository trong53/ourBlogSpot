<?php

$messageAddPost = '';

if (isset($_POST['AddPostsubmit'])) {
    
    require './Models/AddPostModel.php';

    // echo '<pre>';
    // print_r($_POST);
    // die;

    $title = $_POST['title'];
    $content = $_POST['content'];

    $is_public = 0;
    if (isset($_POST['is_public'])) {
        $is_public = $_POST['is_public'];
    }

    $image = '';
    $viewed = 0;
    $user_id = $_SESSION['id'];
    
    $actual_date = date('Y-m-d', time());
    $createdate = $actual_date;
    $updatedate = $actual_date;

    if (!empty($_POST['title']) && !empty($_POST['content'])) {

        insertPost($title, $content, $image, $user_id, $is_public, $viewed, $createdate, $updatedate);
        $messageAddPost = "Congratulation ! Your article has been saved";
        
    }else{
        $messageAddPost = "Error ! Title or Description has to be filled";
    }

    require './Views/AddPostView.php';
}else{
    require './Views/AddPostView.php';
}

