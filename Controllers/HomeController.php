<?php

$filter = (empty($_GET['filter']) || $_GET['filter'] == 'Date' ) ? 'Date' : $_GET['filter'];

$page = (empty($_GET['page']) || $_GET['page'] == 1 ) ? 1 : $_GET['page'];  // if existed

$search = (!empty($_GET['search'])) ? $_GET['search'] : '';

require './Models/HomeModel.php';

$filter_arr = [
    'Date'      => ['p.updatedate', 'DESC'],
    'Title'     => ['p.title', 'ASC'],
    'View'      => ['p.viewed', 'DESC']
];
$filter_selected = $filter_arr[$filter][0];
$filter_sort = $filter_arr[$filter][1];

/********************** Main for articles for all users **************************/

if (empty($_SESSION)) {

    if (!empty($search)) {

        if ($page == 1) {
            $query = "SELECT p.id, p.title, p.content, p.image, p.updatedate, p.viewed, u.fullname 
                        FROM posts AS p, users AS u 
                        WHERE u.id = p.user_id AND p.is_public = 1 AND (p.title LIKE '%$search%' OR p.content LIKE '%$search%')
                        ORDER BY $filter_selected $filter_sort
                        LIMIT 13";
        }else{
            $start = ($page-1)*12+1;
            $query = "SELECT p.id, p.title, p.content, p.image, p.updatedate, p.viewed, u.fullname 
                        FROM posts AS p, users AS u 
                        WHERE u.id = p.user_id AND p.is_public = 1 AND (p.title LIKE '%$search%' OR p.content LIKE '%$search%')
                        ORDER BY $filter_selected $filter_sort
                        LIMIT $start, 12";
        }

        $query_count = "SELECT count(*) FROM posts WHERE is_public = 1 AND (title LIKE '%$search%' OR content LIKE '%$search%')";

    }else{
        if ($page == 1) {
            $query = "SELECT p.id, p.title, p.content, p.image, p.updatedate, p.viewed, u.fullname 
                        FROM posts AS p, users AS u 
                        WHERE u.id = p.user_id AND p.is_public = 1
                        ORDER BY $filter_selected $filter_sort
                        LIMIT 13";
        }else{
            $start = ($page-1)*12+1;
            $query = "SELECT p.id, p.title, p.content, p.image, p.updatedate, p.viewed, u.fullname 
                        FROM posts AS p, users AS u 
                        WHERE u.id = p.user_id AND p.is_public = 1
                        ORDER BY $filter_selected $filter_sort
                        LIMIT $start, 12";
        }

        $query_count = "SELECT count(*) FROM posts WHERE is_public = 1";
        
    }
    $totalArticle = countArticles($query_count);
    $articles = getPosts($query);

    /******************* Bar for most viewed **********************/
    $query_mostviewed = "SELECT p.id, p.title, p.image, p.updatedate, p.viewed, u.fullname 
                            FROM posts AS p, users AS u 
                            WHERE u.id = p.user_id AND p.is_public = 1
                            ORDER BY p.viewed DESC
                            LIMIT 10";

    $articles_mostviewed = getPosts($query_mostviewed);

    /******************* Pagination **********************/

    $totalPage = ceil(($totalArticle-13)/12)+1;

    $backward = false;
    if ($page >= 4) {
        $backward = true;
    }else{
        $backward = false;
    }
    
    if ($totalPage == 1) {
        $pagination = 0;
    }elseif($totalPage == 2) {
        $pagination = 2;
    }else{
        $pagination = 3;
    }

    $forward = false;
    if ($pagination == 3) {
        if ($page < $totalPage) {
            $forward = true;
        }else{
            $forward = false;
        }
    }

        /***************** Count articles for first page and middle pages and last page *******************/
    if ($page == 1) {
        $j = 0;
        if ($totalPage > 1) {
            $articles_perPage = 12;
        }else{
            $articles_perPage = $totalArticle-1;
        }
    }else{
        $j = 1;
        if ($page < $totalPage) {
            $articles_perPage = 12-$j;
        }elseif($page == $totalPage) {
            $articles_perPage = $totalArticle - $start - 1;
        }
    }

    require './Views/HomeView.php';
}

/********************** Main for articles for identified user ($_SESSION) **************************/

if (!empty($_SESSION)) {
    $numberarticles_perPage = 12;
    $user_id = $_SESSION['id'];
    $start = ($page-1)*$numberarticles_perPage;

    if (!empty($search)) {

        $query = "SELECT p.id, p.title, p.content, p.image, p.updatedate, p.viewed, u.fullname 
                    FROM posts AS p, users AS u 
                    WHERE u.id = p.user_id AND p.user_id = $user_id AND (p.title LIKE '%$search%' OR p.content LIKE '%$search%')
                    ORDER BY $filter_selected $filter_sort
                    LIMIT $start, $numberarticles_perPage";
        
        $query_count = "SELECT count(*) FROM posts WHERE user_id = $user_id AND (title LIKE '%$search%' OR content LIKE '%$search%')";
        
    }else{
        $query = "SELECT p.id, p.title, p.content, p.image, p.updatedate, p.viewed, u.fullname 
                    FROM posts AS p, users AS u 
                    WHERE u.id = p.user_id AND p.user_id = $user_id
                    ORDER BY $filter_selected $filter_sort
                    LIMIT $start, $numberarticles_perPage";

        $query_count = "SELECT count(*) FROM posts WHERE user_id = $user_id";        
    }
    $totalArticle = countArticles($query_count);
    $articles = getPosts($query);
    // echo '<pre>';
    // print_r($articles);
    // die;

    /******************* Pagination **********************/

    $totalPage = ceil($totalArticle/$numberarticles_perPage);

    $backward = false;
    if ($page >= 4) {
        $backward = true;
    }else{
        $backward = false;
    }
    
    if ($totalPage == 1) {
        $pagination = 0;
    }elseif($totalPage == 2) {
        $pagination = 2;
    }else{
        $pagination = 3;
    }

    $forward = false;
    if ($pagination == 3) {
        if ($page < $totalPage) {
            $forward = true;
        }else{
            $forward = false;
        }
    }

    /***************** Count articles for every page *******************/
    if ($page < $totalPage) {
        $articles_perPage = $numberarticles_perPage-1;
    }elseif($page == $totalPage) {
        $articles_perPage = $totalArticle - $start - 1;
    }

    require './Views/HomeView.php';
}