<?php
/**
 * @author Luke Perrottet
 * @version 1.0
 * @copyright Janvier 2016
 *
 * Cette classe est le sous-worker pour les actions en rapport avec les prestations.
 */


class WrkPrestation{

	private $connexion;

	/**
	 * Cette méthode retourne la liste des prestations.
	 * @param BDConnexion $bd_connexion : la connexion à la BD
	 */
	public function get_liste_prestations(BDConnexion $bd_connexion){
		$this->connexion = new mysqli($bd_connexion->get_serveur(), $bd_connexion->get_nom_utilisateur(), $bd_connexion->get_mot_de_passe(), $bd_connexion->get_nom_bd());
		$this->connexion->set_charset("utf8");

		if($this->connexion->connect_error){
			die("Connection failed: " . $this->connexion->connect_error);
		}

		$sql = "SELECT PK_Prestation, DATE_FORMAT(Prestation.Date, '%d/%m/%Y') AS 'Date', Cliente.Nom AS 'Nom_Cliente', Cliente.Prenom AS 'Prenom_Cliente', Login.Prenom AS 'Prestataire', Remarque FROM Prestation INNER JOIN Cliente ON FK_Cliente = Cliente.PK_Cliente INNER JOIN Login ON FK_Login = Login.PK_Login ORDER BY Prestation.Date DESC";
		$resultat = $this->connexion->query($sql);

		if ($resultat->num_rows > 0) {
			$i = 0;
			echo "<table id='tableau_prestations' class='table table-bordered table-hover table-striped'><thead><tr><th>Date</th><th>Cliente</th><th>Prestataire</th><th>Remarque</th><th></th></tr></thead><tbody>";
			while($row = $resultat->fetch_assoc()) {
				echo "<tr id='" . $i . "'><td id='date_" . $i . "'>" . $row["Date"] . "</td><td id='cliente_" . $i . "'>" . $row["Prenom_Cliente"] . " " . $row["Nom_Cliente"] . "</td><td id='prestataire_" . $i . "'>" . $row["Prestataire"] . 
				"</td><td>" . $row["Remarque"] . "</td><td><a href='update_prestation.php?i=" . $row["PK_Prestation"] . "'><button class='btn btn-primary'>Modifier</button></a><form method='POST' action='../ctrl/ctrl.php'><input type='text' name='prestation_supp' value=" . 
				$row["PK_Prestation"] . " hidden><input type='submit' class='btn btn-danger' value='Supprimer'></form></td></tr>";
				$i += 1;
			}
			echo "</tbody></table>";
		} else {
			echo "<p>Aucune prestation disponible</p>";
		}

		$this->connexion->close();
	}

	public function add_prestation(BDConnexion $bd_connexion, $date, $cliente, $prestataire, $remarque){
		$message = "";
		$this->connexion = new mysqli($bd_connexion->get_serveur(), $bd_connexion->get_nom_utilisateur(), $bd_connexion->get_mot_de_passe(), $bd_connexion->get_nom_bd());
		$this->connexion->set_charset("utf8");

		if($this->connexion->connect_error){
			die("Connection failed: " . $this->connexion->connect_error);
		}

		$sql = "INSERT INTO `doigtsdefee`.`Prestation` (`PK_Prestation`, `Date`, `FK_Cliente`, `FK_Login`, `Remarque`) VALUES (NULL, '$date', '$cliente', '$prestataire', '$remarque')";
		if($this->connexion->query($sql)){
			$message = "OK";
		}else{
			$message = "KO";
		}
		
		$this->connexion->close();
		return $message;
	}

	public function delete_prestation(BDConnexion $bd_connexion, $pk_prestation){
		$message = "";
		$this->connexion = new mysqli($bd_connexion->get_serveur(), $bd_connexion->get_nom_utilisateur(), $bd_connexion->get_mot_de_passe(), $bd_connexion->get_nom_bd());
		$this->connexion->set_charset("utf8");

		if($this->connexion->connect_error){
			die("Connection failed: " . $this->connexion->connect_error);
		}

		$sql = "DELETE FROM `doigtsdefee`.`Prestation` WHERE `Prestation`.`PK_Prestation` = $pk_prestation";
		if($this->connexion->query($sql)){
			$message = "OK";
		}else{
			$message = "KO";
		}

		$this->connexion->close();
		return $message;
	}

	public function update_prestation(BDConnexion $bd_connexion, $pk_prestation, $nouvelle_date, $nouvelle_cliente, $nouveau_prestataire, $nouvelle_remarque){
		$message = "";
		$this->connexion = new mysqli($bd_connexion->get_serveur(), $bd_connexion->get_nom_utilisateur(), $bd_connexion->get_mot_de_passe(), $bd_connexion->get_nom_bd());
		$this->connexion->set_charset("utf8");

		if($this->connexion->connect_error){
			die("Connection failed: " . $this->connexion->connect_error);
		}

		$sql = "UPDATE `doigtsdefee`.`Prestation` SET `Date` = '$nouvelle_date', `FK_Cliente` = '$nouvelle_cliente', `FK_Login` = '$nouveau_prestataire', `Remarque` = '$nouvelle_remarque' WHERE `Prestation`.`PK_Prestation` = $pk_prestation";
		if($this->connexion->query($sql)){
			$message = "OK";
		}else{
			$message = "KO";
		}

		$this->connexion->close();
		return $message;
	}

	public function get_liste_prestations_modifiables(BDConnexion $bd_connexion, $pk_prestation){
		$this->connexion = new mysqli($bd_connexion->get_serveur(), $bd_connexion->get_nom_utilisateur(), $bd_connexion->get_mot_de_passe(), $bd_connexion->get_nom_bd());
		$this->connexion->set_charset("utf8");

		if($this->connexion->connect_error){
			die("Connection failed: " . $this->connexion->connect_error);
		}

		$sql = "SELECT * FROM Prestation WHERE PK_Prestation = $pk_prestation";
		$resultat = $this->connexion->query($sql);

		if ($resultat->num_rows > 0) {

			if($row = $resultat->fetch_assoc()) {

				return $row;
			}
		}

		$this->connexion->close();
	}

}

?>