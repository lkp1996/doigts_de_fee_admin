<?php
	/**
	 * @author Luke Perrottet
	 * @version 1.0
	 * @copyright Janvier 2016
	 *
	 * Cette page est la page des clientes.
	 */
	
	include("../ctrl/ctrl.php");
	// si l'utilisateur n'est pas connecté
	if(!isset($_COOKIE["utilisateur"]) || $_COOKIE["utilisateur"] == ""){
		// on retourne sur la page de login
		header("Location: login.php");
	}
	include("header.php");
	include("header_connecte.php");
?>
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Clientes</h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
						<input type="search" id="search_name" class="form-control" onkeyup="search_name()">
					</div>
					<div class="form-group input-group">
						<form method="POST" action="../ctrl/ctrl.php">
							<input type="submit" value="Exporter emails" name="export_email" class="btn btn-primary">
						</form>
					</div>
				</div>
			</div>
			
			<?php
				$ctrl = new Ctrl();
				$ctrl->affiche_liste_clientes();
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