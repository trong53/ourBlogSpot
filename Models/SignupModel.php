<?php

function validate(string $name, string $pattern) : bool {
	if (preg_match($pattern, trim($name))) {
		return true;
	}else{
		return false;
	}
}

function insertUser($username, $password, $name, $email, $date){
    require './database/db_connect.php';
	$query = "INSERT INTO users (username, password, fullname, email, createdate) VALUES (?, ?, ?, ?, ?)";
	$sql = $PDO_connect->prepare($query);
	$sql->bindParam(1, $username, PDO::PARAM_STR);
	$sql->bindParam(2, $password, PDO::PARAM_STR);
	$sql->bindParam(3, $name, PDO::PARAM_STR);
	$sql->bindParam(4, $email, PDO::PARAM_STR);
	$sql->bindParam(5, $date, PDO::PARAM_STR);
	$sql -> execute();
}

function checkExist ($fieldTochecked, $param) {
	require './database/db_connect.php';

	$sql = $PDO_connect->prepare("SELECT * FROM users WHERE $fieldTochecked = ?");
	$sql->bindParam(1, $param, PDO::PARAM_STR);
	$sql->execute();
	$exists = $sql->fetchColumn();  // either 1 or null
	
	return $exists;
}


