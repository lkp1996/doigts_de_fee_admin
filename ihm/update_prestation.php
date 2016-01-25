<?php
	/**
	 * @author Luke Perrottet
	 * @version 1.0
	 * @copyright Janvier 2016
	 *
	 * Cette page est la page de màj d'une prestation.
	 */
	
	include("../ctrl/ctrl.php");
	// si l'utilisateur n'est pas connecté
	if(!isset($_SESSION["utilisateur"]) || $_SESSION["utilisateur"] == ""){
		// on retourne sur la page de login
		header("Location: login.php");
	}
	include("header.php");
	include("header_connecte.php");
?>
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Modifier Prestation</h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
			<?php
			$ctrl = new Ctrl();
			if(isset($_GET["i"])){
				$prestation = $ctrl->affiche_liste_prestations_modifiables($_GET["i"]);
			}
			?>
			<div class="row">
				<form method="POST" action="../ctrl/ctrl.php">
					<input type='text' name='pk_prestation_modif' value=<?php echo $prestation['PK_Prestation']; ?> hidden>
					<div class="form-group input-group">
						<span class="input-group-addon">Date :</span>
						<input type="Date" class="form-control" name="date_prestation_modif" value=<?php echo $prestation['Date']; ?>>
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon">Cliente :</span>
						<?php
							$ctrl = new Ctrl();
							$ctrl->affiche_liste_clientes_dropdown($prestation["FK_Cliente"]);
						?>
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon">Prestataire :</span>
						<?php
							$ctrl = new Ctrl();
							$ctrl->affiche_liste_utilisateurs_dropdown($prestation["FK_Login"]);
						?>
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon">Remarque :</span>
						<textarea class="form-control" name="remarque_prestation_modif" ><?php echo $prestation["Remarque"]; ?></textarea>
					</div>
					<div class="form-group input-group">
						<input type="submit" class="btn btn-success" value="Sauvegarder">
					</div>
				</form>
			</div>
			
		<form id="form_deconnexion" method="POST" action="../ctrl/ctrl.php">
			<input type="text" name="deconnexion" hidden>
		</form>
		</div>
		<!-- /#page-wrapper -->

	</div>
	<!-- /#wrapper -->
	<script type="text/javascript">
	function deconnexion(){
		document.forms["form_deconnexion"].submit();
	}
	</script>

<?php
	include("footer.php");
?>