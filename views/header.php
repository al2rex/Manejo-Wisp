<header>
			<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
				<div class="container">
					<div class="navbar-header"><!-- para que aparesca el boton en los moviles -->
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-fm">
							<span class="sr-only">Desplegar / Ocultar Menu</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="#" class="navbar-brand">Manejo Wisp</a>
					</div>
					<!-- Inicia Menu -->
					<div class="collapse navbar-collapse" id="navegacion-fm">
						<ul class="nav navbar-nav">
							<li><a href="../views/home.php">Home</a></li>
							<li><a href="../views/empresa.php">Empresa</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
									Infraestructura  <span class="caret"></span>
								</a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="../views/clientes.php">Clientes</a></li>
									<li class="divider"></li>
									<li><a href="../views/equipos.php">Equipos</a></li>
									<li><a href="../views/nodos.php">Nodos</a></li>
									<li class="divider"></li>
									<li><a href="#">Reportes</a></li>		
								</ul>
							</li>
							<li><a href="../views/planes.php">Planes</a></li>
							<li><a href="../views/usuarios.php">Usuarios</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
									Gestión  <span class="caret"></span>
								</a>
								<ul class="dropdown-menu" role="menu">
									<li class="dropdown-header">Facturación</li>
									<li class="divider"></li>
									<li><a href="../views/facturacion.php">Facturacion Total</a></li>
									<li><a href="../views/facturaindividual.php">Facturacion Individual</a></li>
									<li class="divider"></li>
									<li><a href="../views/facturas.php">Facturas</a></li>
									<li><a href="../views/cobros.php">Cobros</a></li>	
									<li><a href="../views/recibocaja.php">Recibo Caja</a></li>
									<li><a href="../views/estadocuenta.php">Estado Cuentas</a></li>	
								</ul>
						</ul>
						
						<div class="collapse navbar-collapse navbar-right" id="navegacion-fm">
						<ul class="nav navbar-nav">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
									Perfil  <span class="caret"></span>
								</a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="../views/cuenta.php">Cuenta</a></li>
									<li><a href="../views/cambioclave.php">Cambiar Contraseña</a></li>
									<li class="divider"></li>
									<li><a href="javascript:void(0);" onclick="cerrar();">Cerrar Sesion</a></li>	
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</header>