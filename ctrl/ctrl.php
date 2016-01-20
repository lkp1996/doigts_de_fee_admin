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

}else if(isset($_POST["nom_cliente"]) && isset($_POST["prenom_cliente"]) && isset($_POST["natel_cliente"]) && isset($_POST["email_cliente"])){

	$nom_cliente = $_POST["nom_cliente"];
	$prenom_cliente = $_POST["prenom_cliente"];
	$natel_cliente = $_POST["natel_cliente"];
	$email_cliente = $_POST["email_cliente"];

	if($nom_cliente != "" && $prenom_cliente != "" && $natel_cliente != "" && $email_cliente != ""){
		
		$resultat = $wrk->add_cliente($nom_cliente, $prenom_cliente, $natel_cliente, $email_cliente);

		if($resultat == "OK"){

			header("Location: ../ihm/clientes.php");

		}else{
			header("Location: ../ihm/nouvelle_cliente.php?e=2");
		}

	}else{
		header("Location: ../ihm/nouvelle_cliente.php?e=1");
	}

	

}else if(isset($_POST["cliente_supp"])){
	$resultat = $wrk->delete_cliente($_POST["cliente_supp"]);

	if($resultat == "OK"){
		header("Location: ../ihm/clientes.php");
	}else{
		header("Location: ../ihm/clientes.php?e=3");
	}
}else if(isset($_POST["pk_cliente_modif"]) && isset($_POST["nom_cliente_modif"]) && isset($_POST["prenom_cliente_modif"]) && isset($_POST["natel_cliente_modif"]) && isset($_POST["email_cliente_modif"])){
	$pk_cliente_modif = $_POST["pk_cliente_modif"];
	$nom_cliente_modif = $_POST["nom_cliente_modif"];
	$prenom_cliente_modif = $_POST["prenom_cliente_modif"];
	$natel_cliente_modif = $_POST["natel_cliente_modif"];
	$email_cliente_modif = $_POST["email_cliente_modif"];

	if($nom_cliente_modif != "" && $prenom_cliente_modif != "" && $natel_cliente_modif != "" && $email_cliente_modif != ""){
		$resultat = $wrk->update_cliente($pk_cliente_modif, $nom_cliente_modif, $prenom_cliente_modif, $natel_cliente_modif, $email_cliente_modif);
		if($resultat == "OK"){
			header("Location: ../ihm/clientes.php");
		}else{
			header("Location: ../ihm/update_cliente.php?e=4");
		}

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
		return $this->wrk->get_liste_clientes();
	}

	public function affiche_liste_clientes_modifiables($pk_cliente){
		return $this->wrk->get_liste_clientes_modifiables($pk_cliente);
	}
}

?>