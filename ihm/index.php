<?php
	/**
	 * @author Luke Perrottet
	 * @version 1.0
	 * @copyright Janvier 2016
	 *
	 * Cette page est la page d'accueil.
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
					<h1 class="page-header">Accueil</h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
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