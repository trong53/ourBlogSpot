<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./assets/style/style.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="./assets/style/ckeditor/ckeditor.js"></script>
    <title>News website project</title>
</head>
<body>
    <header>
	
        <div class="logo">  <a href = "/"> ourBlogSpot </a>  </div>

        <div class="sign user">  
            <?= (!empty($_SESSION)) ? '[ '.strtoupper($_SESSION['fullname']).' ]' : ''; ?>
        </div>

        <div class="sign signin">  
            <?php

                if (empty($_SESSION)) { ?>
                    <a href = "/?controller=signin"> SignIn </a>
                <?php } else { ?>
                    <a href = "/?controller=signout"> SignOut </a>
                <?php } ?>
         </div>
        
         <div class="sign signup"> 
            <a href = "/?controller=signup"> 
                <?= (empty($_SESSION)) ? 'SignUp' : ''; ?>
            </a>
        </div>
		
    </header>