<?php
/**
 * @author Luke Perrottet
 * @version 1.0
 * @copyright Janvier 2016
 *
 * Cette classe est le sous-worker pour les actions en rapport avec les clientes.
 */


class WrkCliente{

	private $connexion;

	/**
	 * Cette méthode retourne la liste des clientes.
	 * @param BDConnexion $bd_connexion : la connexion à la BD
	 */
	public function get_liste_clientes(BDConnexion $bd_connexion){
		$this->connexion = new mysqli($bd_connexion->get_serveur(), $bd_connexion->get_nom_utilisateur(), $bd_connexion->get_mot_de_passe(), $bd_connexion->get_nom_bd());
		$this->connexion->set_charset("utf8");

		if($this->connexion->connect_error){
			die("Connection failed: " . $this->connexion->connect_error);
		}

		$sql = "SELECT * FROM Cliente";
		$resultat = $this->connexion->query($sql);

		if ($resultat->num_rows > 0) {
			
			echo "<table class='table table-bordered table-hover table-striped'><thead><tr><th>Nom</th><th>Prénom</th><th>Natel</th><th>Email</th></tr></thead><tbody>";
			while($row = $resultat->fetch_assoc()) {
				echo "<tr><td>" . $row["Nom"] . "</td><td>" . $row["Prenom"] . "</td><td>" . $row["Natel"] . "</td><td>" . $row["Email"] . "</td></tr>";
			}
			echo "</tbody></table>";
		} else {
			echo "<p>Aucune séance disponible</p>";
		}

		mysqli_close($this->connexion);
	}

	public function add_cliente(BDConnexion $bd_connexion, $nom, $prenom, $natel, $email){
		$message = "";
		$this->connexion = new mysqli($bd_connexion->get_serveur(), $bd_connexion->get_nom_utilisateur(), $bd_connexion->get_mot_de_passe(), $bd_connexion->get_nom_bd());
		$this->connexion->set_charset("utf8");

		if($this->connexion->connect_error){
			die("Connection failed: " . $this->connexion->connect_error);
		}

		$sql = "INSERT INTO `doigtsdefee`.`Cliente` (`PK_Cliente`, `Nom`, `Prenom`, `Natel`, `Email`) VALUES (NULL, '$nom', '$prenom', '$natel', '$email')";
		if($this->connexion->query($sql)){
			$message = "OK";
		}else{
			$message = "KO";
		}
		
		mysqli_close($this->connexion);
		return $message;
	}
}

?>