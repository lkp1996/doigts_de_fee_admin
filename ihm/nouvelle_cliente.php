<?php
	/**
	 * @author Luke Perrottet
	 * @version 1.0
	 * @copyright Janvier 2016
	 *
	 * Cette page est la page d'ajout de nouvelles clientes.
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
					<h1 class="page-header">Nouvelle Cliente</h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
			<div class="row">
				<form method="POST" action="../ctrl/ctrl.php">
					<div class="form-group input-group">
						<span class="input-group-addon">Nom :</span>
						<input type="text" class="form-control" name="nom_cliente" >
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon">Prénom :</span>
						<input type="text" class="form-control" name="prenom_cliente" >
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon">Natel :</span>
						<input type="text" class="form-control" name="natel_cliente" >
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon">Email :</span>
						<input type="email" class="form-control" name="email_cliente" >
					</div>
					<div class="form-group input-group">
						<input type="submit" class="btn btn-success" value="Ajouter">
					</div>
				</form>
			</div>
			
		<form id="form_deconnexion" method="POST" action="../ctrl/ctrl.php">
			<input type="text" name="deconnexion" hidden>
		</form>
		<?php
            // s'il y a une erreur
            if(isset($_GET["e"])){
                if($_GET["e"] == 1){
                    // on affiche l'erreur
        ?>
            <div class="alert alert-danger" role="alert">Veuillez remplir tous les champs</div>
        <?php
                }else if($_GET["e"] == 2){
        ?>
            <div class="alert alert-danger" role="alert">Erreur lors de l'ajout de la cliente</div>
        <?php
        	   }else if($_GET["e"] == 3){
        ?>
            <div class="alert alert-danger" role="alert">Veuillez remplir un numéro de téléphone valide</div>
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