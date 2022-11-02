<?php
session_start();

$controllerName = !empty($_GET['controller']) ? $_GET['controller'] : 'home';

$controllerName = ucfirst(strtolower(trim($controllerName))) . 'Controller';

//$action = !empty($_GET['action']) ? $_GET['action'] : '';

require "./Controllers/$controllerName.php";

/*

controller = home ou rien  => homeController
require 'Views/homeView.php';
require 'Views/signinView.php';
require 'Views/signupView.php';

*/