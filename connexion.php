<?php
session_start();
$hostnameDB = "localhost";
$database = "doigtsdefee";
$usernameDB = "root";
$passwordDB = "root";

$connexion = new mysqli($hostnameDB, $usernameDB, $passwordDB, $database);
$connexion->set_charset("utf8");

$nomutilisateur = $_POST["input_nom_utilisateur"];
$motdepasse = $_POST["input_mot_de_passe"];

if ($connexion->connect_error) {

	die("Connection failed: " . $connexion->connect_error);

}else{
	$sql = "SELECT * From Login WHERE Nom_Utilisateur = '$nomutilisateur' AND Mot_de_Passe = '" . md5($motdepasse, FALSE) . "'";
	$result = $connexion->query($sql);
	if($result->num_rows > 0){
		// echo $nomutilisateur;
		$_SESSION["utilisateur"] = $nomutilisateur;
		header("Location: index.php");
	}else{
		// echo "KO";
		$_SESSION["utilisateur"] = NULL;
		header("Location: login.php?e=1");
	}
}

$connexion->close();

?>