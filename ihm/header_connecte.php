<body>

	<div id="wrapper">

		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">Ô Doigts de Fée Administration</a>
			</div>
			<!-- /.navbar-header -->
			<ul class="nav navbar-top-links navbar-right">
				
				
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-user">
						<li><a href="changer_mdp.php"><i class="fa fa-gear fa-fw"></i> Changer son mot de passe</a>
						</li>
						<li class="divider"></li>
						<li><a href="javascript:deconnexion()"><i class="fa fa-sign-out fa-fw"></i> Déconnexion</a>
						</li>
					</ul>
					<!-- /.dropdown-user -->
				</li>
				<!-- /.dropdown -->
			</ul>
			<!-- /.navbar-top-links -->

			<div class="navbar-default sidebar" role="navigation">
				<div class="sidebar-nav navbar-collapse">
					<ul class="nav" id="side-menu">
						<li>
							<a href="index.php"><i class="glyphicon glyphicon-home"></i> Accueil</a>
						</li>
						<li>
                            <a href="clientes.php"><i class="glyphicon glyphicon-user"></i> Clientes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse in" aria-expanded="true">
                                <li>
                                    <a href="clientes.php"><i class="glyphicon glyphicon-list"></i> Les clientes</a>
                                </li>
                                <li>
                                    <a href="nouvelle_cliente.php"><i class="glyphicon glyphicon-plus"></i> Nouvelle cliente</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="prestations.php"><i class="glyphicon glyphicon-book"></i> Prestations<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse in" aria-expanded="true">
                                <li>
                                    <a href="prestations.php"><i class="glyphicon glyphicon-list"></i> Les prestations</a>
                                </li>
                                <li>
                                    <a href="nouvelle_prestation.php"><i class="glyphicon glyphicon-plus"></i> Nouvelle prestation</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
					</ul>
				</div>
				<!-- /.sidebar-collapse -->
			</div>
			<!-- /.navbar-static-side -->
		</nav>