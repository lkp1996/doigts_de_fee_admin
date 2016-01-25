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

		/**
	 * Cette méthode est la méthode pour mettre à jour son mot de passe.
	 * @param BDConnexion $bd_connexion : la connexion à la BD
	 * @param $nouveau_mot_de_passe : le nouveau mot de passe
	 * @param $nom_utilisateur : le nom d'utilisateur
	 * @return OK si le changement de mot de passe a marché, sinon KO
	 */
	public function update_mot_de_passe(BDConnexion $bd_connexion, $nouveau_mot_de_passe, $nom_utilisateur){
		$this->connexion = new mysqli($bd_connexion->get_serveur(), $bd_connexion->get_nom_utilisateur(), $bd_connexion->get_mot_de_passe(), $bd_connexion->get_nom_bd());
		if ($this->connexion->connect_error) {
			die("Connection failed: " . $this->connexion->connect_error);
		}

		$sql = "UPDATE Login SET Mot_de_Passe = '$nouveau_mot_de_passe' WHERE Nom_Utilisateur = '$nom_utilisateur'";
		
		if ($this->connexion->query($sql)) {
			return "OK";
		} else {
			return "KO";
		}

		$this->connexion->close();

	}

	/**
	 * Cette méthode est la méthode pour récuperer le mot de passe
	 * @param BDConnexion $bd_connexion : la connexion à la BD
	 * @param $nom_utilisateur : le nom d'utilisateur
	 * @return le mot de passe si l'utilisateur existe, sinon KO
	 */
	public function get_mot_de_passe(BDConnexion $bd_connexion, $nom_utilisateur){
		$this->connexion = new mysqli($bd_connexion->get_serveur(), $bd_connexion->get_nom_utilisateur(), $bd_connexion->get_mot_de_passe(), $bd_connexion->get_nom_bd());
		if ($this->connexion->connect_error) {
			die("Connection failed: " . $this->connexion->connect_error);
		}

		$sql = "SELECT * FROM Login WHERE Nom_Utilisateur = '$nom_utilisateur'";
		$resultat = $this->connexion->query($sql);

		if ($resultat->num_rows > 0) {
			if($row = $resultat->fetch_assoc()) {
				return $row["Mot_de_Passe"];
			}
		} else {
			return "KO";
		}

		$this->connexion->close();
	}

	public function get_liste_utilisateurs_dropdown(BDConnexion $bd_connexion, $pk_login){
		$this->connexion = new mysqli($bd_connexion->get_serveur(), $bd_connexion->get_nom_utilisateur(), $bd_connexion->get_mot_de_passe(), $bd_connexion->get_nom_bd());
		$this->connexion->set_charset("utf8");

		if($this->connexion->connect_error){
			die("Connection failed: " . $this->connexion->connect_error);
		}

		$sql = "SELECT * FROM Login ORDER BY Prenom";
		$resultat = $this->connexion->query($sql);

		if ($resultat->num_rows > 0) {
			
			echo "<select class='form-control' name='prestataire_prestation'><option value='0'>-- Choisir prestataire --</option>";
			while($row = $resultat->fetch_assoc()) {
				if($row["PK_Login"] == $pk_login){
					echo "<option value='" . $row["PK_Login"] . "' selected='selected'>" . $row["Prenom"] . "</option>";
				}else{
					echo "<option value='" . $row["PK_Login"] . "'>" . $row["Prenom"] . "</option>";
				}
			}
			echo "</select>";
		} else {
			echo "<p>Aucun prestataire disponible</p>";
		}

		$this->connexion->close();
	}


}

?>