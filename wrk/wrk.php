<?php
/**
 * @author Luke Perrottet
 * @version 1.0
 * @copyright Janvier 2016
 *
 * Le worker, c'est ici que la connexion à la base de données est faite.
 * Les fonctions ci-dessous sont appelées dans le controller.
 */

include("../beans/bd_connexion.php");
include("wrk_cliente.php");
include("wrk_utilisateur.php");

class Wrk{

	private $bd_connexion;
	private $wrk_cliente;
	private $wrk_utilisateur;

	/**
	 * Le constructeur de la classe
	 */
	public function __construct(){
		$this->bd_connexion = new BDConnexion("doigtsdefee", "root", "root", "localhost");
		$this->wrk_cliente = new WrkCliente();
		$this->wrk_utilisateur = new WrkUtilisateur();
	}

	public function connexion($nom_utilisateur, $mot_de_passe){
		return $this->wrk_utilisateur->connexion($this->bd_connexion, $nom_utilisateur, $mot_de_passe);
	}

	/**
	 * Cette méthode permet à l'utilisateur de se déconnecter.
	 */
	public function deconnexion(){
		session_destroy();
		header("Location: ../ihm/login.php");
	}

	public function get_liste_clientes(){
		return $this->wrk_cliente->get_liste_clientes($this->bd_connexion);
	}

	public function add_cliente($nom, $prenom, $natel, $email){
		return $this->wrk_cliente->add_cliente($this->bd_connexion, $nom, $prenom, $natel, $email);
	}

	public function delete_cliente($pk_cliente){
		return $this->wrk_cliente->delete_cliente($this->bd_connexion, $pk_cliente);
	}

	public function update_cliente($pk_cliente, $nouveau_nom, $nouveau_prenom, $nouveau_natel, $nouveau_email){
		return $this->wrk_cliente->update_cliente($this->bd_connexion, $pk_cliente, $nouveau_nom, $nouveau_prenom, $nouveau_natel, $nouveau_email);
	}

	public function get_liste_clientes_modifiables($pk_cliente){
		return $this->wrk_cliente->get_liste_clientes_modifiables($this->bd_connexion, $pk_cliente);
	}

	/**
	 * Cette méthode est la méthode pour mettre à jour son mot de passe.
	 * @param $nouveau_mot_de_passe : le nouveau mot de passe
	 * @param $nom_utilisateur : le nom d'utilisateur
	 * @return update_mot_de_passe de wrk utilisateur
	 */
	public function update_mot_de_passe($nouveau_mot_de_passe, $nom_utilisateur){
		return $this->wrk_utilisateur->update_mot_de_passe($this->bd_connexion, $nouveau_mot_de_passe, $nom_utilisateur);
	}

	/**
	 * Cette méthode est la méthode pour récuperer le mot de passe
	 * @param $nom_utilisateur : le nom d'utilisateur
	 * @return get_mot_de_passe de wrk utilisateur
	 */
	public function get_mot_de_passe($nom_utilisateur){
		return $this->wrk_utilisateur->get_mot_de_passe($this->bd_connexion, $nom_utilisateur);
	}
}

?>