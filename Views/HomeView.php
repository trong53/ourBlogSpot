
<?php  include 'Views/includes/header.php'; ?>	

<main>
    
    <?php 
    
    if (!empty($_SESSION)) {
        include 'Views/includes/main_user.php';

    }else{
        include 'Views/includes/main.php';

        include 'Views/includes/bar_hotNews.php';
    }
    ?>

</main>

<?php include 'Views/includes/footer.php'; ?>