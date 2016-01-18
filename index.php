<?php
session_start();
if(!isset($_SESSION["utilisateur"])){
	header("Location: login.php");
}
?>
<html lang="fr">
<head>
	<title>Accueil</title>
</head>
<body>
<form method="POST" action="deconnexion.php">
	<input type="submit" value="Déconnexion">
</form>
<h1>Accueil</h1>
</body>
</html>