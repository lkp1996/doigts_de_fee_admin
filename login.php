<?php
session_start();
?>
<html lang="fr">
<head>
	<title>Connexion</title>
</head>
<body>
<form method="POST" action="connexion.php">
Nom d'utilisateur : <input type="text" name="input_nom_utilisateur" autofocus>
Mot de passe : <input type="password" name="input_mot_de_passe">
<input type="submit" value="connexion">
</form>
<?php
if(isset($_GET["e"])){
	if($_GET["e"] == 1){
?>
	<div class="alert alert-danger" role="alert">Nom d'utilisateur et/ou mot de passe incorrect(s)</div>
<?php
	}
}
?>
</body>
</html>