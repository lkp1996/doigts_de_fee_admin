<?php
/**
 * @author Luke Perrottet
 * @version 1.0
 * @copyright Mai 2015
 *
 * Cette classe est le sous-worker pour les actions en rapport avec les utilisateurs.
 */

class WrkUtilisateur{

	private $connexion;

	/**
	 * Cette méthode est la méthode pour le login. On vérifie que l'utilisateur qui veut se connecter existe vraiment.
	 * @param BDConnexion $bd_connexion : la connexion à la BD
	 * @param $nom_utilisateur : le nom d'utilisateur
	 * @param $mot_de_passe : le mot de passe
	 * @return OK si la connexion a marché, sinon KO
	 */
	public function connexion(BDConnexion $bd_connexion, $nom_utilisateur, $mot_de_passe){
		$this->connexion = new mysqli($bd_connexion->get_serveur(), $bd_connexion->get_nom_utilisateur(), $bd_connexion->get_mot_de_passe(), $bd_connexion->get_nom_bd());
		if ($this->connexion->connect_error) {
			die("Connection failed: " . $this->connexion->connect_error);
		}

		$sql = "SELECT * FROM Login WHERE Nom_Utilisateur = '$nom_utilisateur' AND Mot_de_Passe = '" . md5($mot_de_passe, FALSE) . "'";
		$resultat = $this->connexion->query($sql);

		if ($resultat->num_rows > 0) {
			return "OK";
		} else {
			return "KO";
		}

		$this->connexion->close();
	}

}

?>