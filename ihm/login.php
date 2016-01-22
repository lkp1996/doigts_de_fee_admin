<?php
    /**
     * @author Luke Perrottet
     * @version 1.0
     * @copyright Janvier 2016
     *
     * Cette page est la page de login.
     */

    // si l'utilisateur est déjà connecté
    if(isset($_SESSION["utilisateur"])){
    	if($_SESSION["utilisateur"] != ""){
            // on revient sur la page d'accueil
    		header("Location: index.php");
 	   }
	}
	include("header.php");
?>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Veuillez vous connecter</h3>
                    </div>
                    <div class="panel-body">
                    	<form role="form" method="POST" action="../ctrl/ctrl.php">
                    		<fieldset>
                    			<div class="form-group">
									<input class="form-control" placeholder="Nom d'utilisateur" type="text" name="input_nom_utilisateur" autofocus>
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Mot de passe"  type="password" name="input_mot_de_passe">
								</div>
								<input class="btn btn-lg btn-success btn-block" type="submit" value="Connexion">
							</fieldset>
						</form>
                        <?php
                            // s'il y a une erreur
                            if(isset($_GET["e"])){
                                if($_GET["e"] == 1){
                                    // on affiche l'erreur
                        ?>
                            <div class="alert alert-danger" role="alert">Nom d'utilisateur et/ou mot de passe incorrect(s)</div>
                        <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
	include("footer.php");
?>
