<?php

    function checkSignIn($username, $password) {
        $_SESSION = [];
        require './database/db_connect.php';
        $query = "SELECT * FROM users WHERE username = ? AND password = ?";
		$sign_in = $PDO_connect->prepare($query);
        $sign_in->bindParam(1, $username, PDO::PARAM_STR);
        $sign_in->bindParam(2, $password, PDO::PARAM_STR);
        $sign_in->execute();
        $sign_in = $sign_in->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($sign_in[0])){
            $_SESSION = $sign_in[0];
        }
        return $_SESSION;
    }