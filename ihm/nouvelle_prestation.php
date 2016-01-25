<?php
	/**
	 * @author Luke Perrottet
	 * @version 1.0
	 * @copyright Janvier 2016
	 *
	 * Cette page est la page d'ajout de nouvelles prestations.
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
					<h1 class="page-header">Nouvelle Prestation</h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
			<div class="row">
				<form method="POST" action="../ctrl/ctrl.php">
					<div class="form-group input-group">
						<span class="input-group-addon">Date :</span>
						<input type="Date" class="form-control" name="date_prestation" >
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon">Cliente :</span>
						<?php
							$ctrl = new Ctrl();
							$ctrl->affiche_liste_clientes_dropdown(0);
						?>
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon">Prestataire :</span>
						<?php
							$ctrl = new Ctrl();
							$ctrl->affiche_liste_utilisateurs_dropdown(0);
						?>
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon">Remarque :</span>
						<textarea class="form-control" name="remarque_prestation" ></textarea>
					</div>
					<div class="form-group input-group">
						<input type="submit" class="btn btn-success" value="Ajouter">
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