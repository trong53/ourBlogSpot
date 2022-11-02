<?php
require './Models/SigninModel.php';

if (!empty($_POST['SubmitSignin'])) {

    checkSignIn($_POST['username'], $_POST['pass']);

    if (!empty($_SESSION)) {
        require './Controllers/HomeController.php';
    }else{
        $messageSignin = 'Error: username and/or password incorrect';
        require './Views/SigninView.php';
    }
}else{
    $messageSignin = '';
    require './Views/SigninView.php';
}

