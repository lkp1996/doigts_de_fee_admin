<?php
/**
 * @author Luke Perrottet
 * @version 1.0
 * @copyright Mai 2015
 *
 * Le controller
 * Il gère les requêtes POST de l'IHM et posède une classe
 * avec des fonctions qui sont appelées dans l'IHM.
 */

include("../wrk/wrk.php");
session_start();

$wrk = new Wrk();

// La connexion
if(isset($_POST["input_nom_utilisateur"]) && isset($_POST["input_mot_de_passe"])){

	$nom_utilisateur = $_POST["input_nom_utilisateur"];
	$mot_de_passe = $_POST["input_mot_de_passe"];

	$resultat = $wrk->connexion($nom_utilisateur, $mot_de_passe);
	if($resultat == "OK"){

		header("Location: ../ihm/index.php");
		$_SESSION["utilisateur"] = $nom_utilisateur;

	}else{

		$_SESSION["utilisateur"] = "";
		header("Location: ../ihm/login.php?e=1");

	}

// La déconnexion
}else if(isset($_POST["deconnexion"])){

	$wrk->deconnexion();

// Mise à jour du mot de passe
}else if(isset($_POST["nom_cliente"]) && isset($_POST["prenom_cliente"]) && isset($_POST["natel_cliente"]) && isset($_POST["email_cliente"])){

	$nom_cliente = $_POST["nom_cliente"];
	$prenom_cliente = $_POST["prenom_cliente"];
	$natel_cliente = $_POST["natel_cliente"];
	$email_cliente = $_POST["email_cliente"];

	if($nom_cliente != "" || $prenom_cliente != "" || $natel_cliente != "" || $email_cliente != ""){
		$resultat = $wrk->add_cliente($nom_cliente, $prenom_cliente, $natel_cliente, $email_cliente);
	}else{
		header("Location: ../ihm/nouvelle_cliente.php?e=1");
	}

	if($resultat == "OK"){

		header("Location: ../ihm/clientes.php");

	}else{
		header("Location: ../ihm/nouvelle_cliente.php?e=2");
	}

}

class Ctrl{

	private $wrk;

	/**
	 * Le constructeur du ctrl
	 */
	public function __construct(){
		$this->wrk = new Wrk();
	}

	public function affiche_liste_clientes(){
		$this->wrk->get_liste_clientes();
	}
}

?>