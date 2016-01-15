<?php

$hostnameDB = "localhost";
$database = "doigtsdefee";
$usernameDB = "root";
$passwordDB = "root";

$connexion = new mysqli($hostnameDB, $usernameDB, $passwordDB, $database);
$connexion->set_charset("utf8");

if ($connexion->connect_error) {

	die("Connection failed: " . $connexion->connect_error);

}else{
	// $sql = "SELECT";
	// $result = $connexion->query($sql);
	echo "OK";
}

$connexion->close();

?>