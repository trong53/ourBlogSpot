<?php
session_start();

$controllerName = !empty($_GET['controller']) ? $_GET['controller'] : 'home';

$controllerName = ucfirst(strtolower(trim($controllerName))) . 'Controller';

require "./Controllers/$controllerName.php";
