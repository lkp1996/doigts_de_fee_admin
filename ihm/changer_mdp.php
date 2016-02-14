<?php
	/**
	 * @author Luke Perrottet
	 * @version 1.0
	 * @copyright Janvier 2016
	 *
	 * Cette page est la page permettant de changer son mot de passe.
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
					<h1 class="page-header">Nouveau mot de passe</h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
			<form id="form_deconnexion" method="POST" action="../ctrl/ctrl.php">
				<input type="text" name="deconnexion" hidden>
			</form>
			<form role="form" method="POST" action="../ctrl/ctrl.php">
				<div class="form-group input-group">
					<span class="input-group-addon">Ancien mot de passe : </span>
					<input class="form-control" type="password" name="input_ancien_mot_de_passe">
				</div>
				<div class="form-group input-group">
					<span  class="input-group-addon">Nouveau mot de passe : </span>
					<input class="form-control" type="password" name="input_nouveau_mot_de_passe_1">
				</div>
				<div class="form-group input-group">
					<span  class="input-group-addon">Retapez nouveau mot de passe : </span>
					<input class="form-control" type="password" name="input_nouveau_mot_de_passe_2">
				</div>
				<div class="form-group input-group">
					<input class="btn btn-success" type="submit">
				</div>
			</form>
			<?php
				// si il y a une erreur
				if(isset($_GET["e"])){
					if($_GET["e"] == 1){
						//on affiche l'erreur
			?>
				<div class="alert alert-danger" role="alert">Votre ancien mot de passe est incorrect</div>
			<?php
					}else if($_GET["e"] == 2){
			?>
				<div class="alert alert-danger" role="alert">Les deux cases "nouveau mot de passe" doivent être indentiques</div>
			<?php
					}else if($_GET["e"] == 3){
			?>
				<div class="alert alert-danger" role="alert">Le nouveau mot de passe doit être différent de l'ancien</div>
			<?php
					}
				}else if(isset($_GET["i"])){
					if($_GET["i"] == 1){
			?>
				<div class="alert alert-success" role="alert">Votre mot de passe a bien été modifié</div>
			<?php
					}
				}
			?>
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