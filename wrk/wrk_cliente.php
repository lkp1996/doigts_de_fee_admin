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
			
			echo "<table class='table table-bordered table-hover table-striped'><thead><tr><th>Nom</th><th>Prénom</th><th>Natel</th><th>Email</th><th></th></tr></thead><tbody>";
			while($row = $resultat->fetch_assoc()) {
				echo "<tr><td>" . $row["Nom"] . "</td><td>" . $row["Prenom"] . "</td><td>" . $row["Natel"] . 
				"</td><td>" . $row["Email"] . "</td><td><a href='update_cliente.php?i=" . $row["PK_Cliente"] . "'><button class='btn btn-primary'>Modifier</button></a><form method='POST' action='../ctrl/ctrl.php'><input type='text' name='cliente_supp' value=" . 
				$row["PK_Cliente"] . " hidden><input type='submit' class='btn btn-danger' value='Supprimer'></form></td></tr>";
			}
			echo "</tbody></table>";
		} else {
			echo "<p>Aucune séance disponible</p>";
		}

		$this->connexion->close();
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
		
		$this->connexion->close();
		return $message;
	}

	public function delete_cliente(BDConnexion $bd_connexion, $pk_cliente){
		$message = "";
		$this->connexion = new mysqli($bd_connexion->get_serveur(), $bd_connexion->get_nom_utilisateur(), $bd_connexion->get_mot_de_passe(), $bd_connexion->get_nom_bd());
		$this->connexion->set_charset("utf8");

		if($this->connexion->connect_error){
			die("Connection failed: " . $this->connexion->connect_error);
		}

		$sql = "DELETE FROM `doigtsdefee`.`Cliente` WHERE `Cliente`.`PK_Cliente` = $pk_cliente";
		if($this->connexion->query($sql)){
			$message = "OK";
		}else{
			$message = "KO";
		}

		$this->connexion->close();
		return $message;
	}

	public function update_cliente(BDConnexion $bd_connexion, $pk_cliente, $nouveau_nom, $nouveau_prenom, $nouveau_natel, $nouveau_email){
		$message = "";
		$this->connexion = new mysqli($bd_connexion->get_serveur(), $bd_connexion->get_nom_utilisateur(), $bd_connexion->get_mot_de_passe(), $bd_connexion->get_nom_bd());
		$this->connexion->set_charset("utf8");

		if($this->connexion->connect_error){
			die("Connection failed: " . $this->connexion->connect_error);
		}

		$sql = "UPDATE `doigtsdefee`.`Cliente` SET `Nom` = '$nouveau_nom', `Prenom` = '$nouveau_prenom', `Natel` = '$nouveau_natel', `Email` = '$nouveau_email' WHERE `cliente`.`PK_Cliente` = $pk_cliente";
		if($this->connexion->query($sql)){
			$message = "OK";
		}else{
			$message = "KO";
		}

		$this->connexion->close();
		return $message;
	}

	public function get_liste_clientes_modifiables($pk_cliente){
		$this->connexion = new mysqli("localhost", "root", "root", "doigtsdefee");
		$this->connexion->set_charset("utf8");

		if($this->connexion->connect_error){
			die("Connection failed: " . $this->connexion->connect_error);
		}

		$sql = "SELECT * FROM Cliente WHERE PK_Cliente = $pk_cliente";
		$resultat = $this->connexion->query($sql);

		if ($resultat->num_rows > 0) {

			if($row = $resultat->fetch_assoc()) {

				$pk_cliente = $row["PK_Cliente"];
				$nom = $row["Nom"];
				$prenom = $row["Prenom"];
				$natel = $row["Natel"];
				$email = $row["Email"];

				echo "<div class='row'>
				<form method='POST' action='../ctrl/ctrl.php'>
					<input type='text' name='pk_cliente_modif' value='$pk_cliente' hidden>
					<div class='form-group input-group'>
						<span class='input-group-addon'>Nom :</span>
						<input type='text' class='form-control' name='nom_cliente_modif' value='$nom'>
					</div>
					<div class='form-group input-group'>
						<span class='input-group-addon'>Prénom :</span>
						<input type='text' class='form-control' name='prenom_cliente_modif' value='$prenom'>
					</div>
					<div class='form-group input-group'>
						<span class='input-group-addon'>Natel :</span>
						<input type='text' class='form-control' name='natel_cliente_modif'  value='$natel'>
					</div>
					<div class='form-group input-group'>
						<span class='input-group-addon'>Email :</span>
						<input type='text' class='form-control' name='email_cliente_modif'  value='$email'>
					</div>
					<div class='form-group input-group'>
						<input type='submit' class='btn btn-success' value='Sauvegarder'>
					</div>
				</form>
			</div>";
			}
		}

		$this->connexion->close();
	}
}

?>