<?php
/**
 * @author Luke Perrottet
 * @version 1.0
 * @copyright Mai 2015
 *
 * Cette classe est le Bean de la connexion à la base de données
 */

class BDConnexion{

	private $nom_bd;
	private $nom_utilisateur;
	private $mot_de_passe;
	private $serveur;

	/**
	 * Le constructeur de la classe
	 * @param $nom_bd : le nom de la base de données 
	 * @param $nom_utilisateur : le nom d'utilisateur
	 * @param $mot_de_passe : le mot de passe
	 * @param $serveur : le serveur
	 */
	public function __construct($nom_bd, $nom_utilisateur, $mot_de_passe, $serveur){
		$this->nom_bd = $nom_bd;
		$this->nom_utilisateur = $nom_utilisateur;
		$this->mot_de_passe = $mot_de_passe;
		$this->serveur = $serveur;
	}

	public function get_nom_bd(){
		return $this->nom_bd;
	}

	/**
	 * @param $nom_bd
	 */
	public function set_nom_bd($nom_bd){
		$this->nom_bd = $nom_bd;
	}

	public function get_nom_utilisateur(){
		return $this->nom_utilisateur;
	}

	/**
	 * @param $nom_utilisateur
	 */
	public function set_nom_utilisateur($nom_utilisateur){
		$this->nom_utilisateur = $nom_utilisateur;
	}

	public function get_mot_de_passe(){
		return $this->mot_de_passe;
	}

	/**
	 * @param $mot_de_passe
	 */
	public function set_mot_de_passe($mot_de_passe){
		$this->mot_de_passe = $mot_de_passe;
	}

	public function get_serveur(){
		return $this->serveur;
	}

	/**
	 * @param $serveur
	 */
	public function set_serveur($serveur){
		$this->serveur = $serveur;
	}
}
?>