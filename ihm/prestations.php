<?php
	/**
	 * @author Luke Perrottet
	 * @version 1.0
	 * @copyright Janvier 2016
	 *
	 * Cette page est la page des prestations.
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
					<h1 class="page-header">Prestations</h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
			<?php $ctrl = new Ctrl(); ?>
			<div class="row">
  				<div class="col-lg-6">
    				<div class="input-group">
    					<div class="form-group input-group">
							<span class="input-group-addon">Trier par dates :</span>
							<select id='list_dates' class='form-control' onchange="search_date()">
								<option>-- Choisir date --</option>
								<option>Aujourd'hui</option>
								<option>Cette semaine</option>
								<option>Ce mois</option>
								<option>Cette Année</option>
							</select>
						</div>
    					<div class="form-group input-group">
							<span class="input-group-addon">Trier par clientes :</span>
							<?php $ctrl->affiche_liste_clientes_dropdown(); ?>
						</div>
						<div class="form-group input-group">
							<span class="input-group-addon">Trier par prestataires :</span>
							<?php $ctrl->affiche_liste_utilisateurs_dropdown(); ?>
						</div>
					</div>
				</div>
			</div>
			<?php
				$ctrl->affiche_liste_prestations();
			?>
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
	<script src="js/recherche.js"></script>

<?php
	include("footer.php");
?>