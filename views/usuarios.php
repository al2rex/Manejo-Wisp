<?php
session_start();
 if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='yes') 
  {
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
   	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Manejo Wisp ..:: Usuarios ::..</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />	
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/css/estilos.css">

</head>
<body onload="listar_usuarios('');">
<?php include('header.php') ?>


<section class="main container">
	<div class="row">
				<section class="jumbotron ">
					<div class="container">
						<h1 class="texto-h1">Usuarios</h1>
						<p class="texto-h1">Manejo Wisp</p>
					</div>
				</section>
				<div class="form-group">
                    <div class="col-sm-4  text-right">
                        <label for="buscar" class="control-label">Buscar:</label>
                    </div>
                <div class="col-sm-4">
                    <input  type="text" name="buscar" id="buscar" onkeyup ="listar_usuarios(this.value)" class="form-control" placeholder="Ingrese nombre usuario"/>
                </div>
                <div class="col-sm-4">
                    	<button class="btn btn-default" data-toggle="modal" data-target="#ingresarusuarios">Agregar Ususarios</button>
                    </div>
				</div>

				<div class="col-xs-12">
					<div class="table-responsive">
						<div id="lista"></div>
						<div id="paginacion"></div>
					</div>
				</div>
		</section>
	<div class="modal fade" id="ingresarusuarios" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center">Ingresar Ususarios</h3>
              </div>
              <div class="modal-body">
                <div class="alert alert-success text-center" id="exito" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span> Registro Exitoso</span>
                </div>
                <div class="alert alert-danger text-center" id="campos_vacios" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span> Debes rellenar todos los campos</span>
                </div>
                <div class="alert alert-danger text-center" id="campos_error" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span> Error al ingresar los registros</span>
                </div>
                <div class="alert alert-danger text-center" id="campos_repetidos" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span> El nombre de usuario o email de usuario ya se encuentra registrado, cambielos e intente nuevamente.</span>
                </div>
                <form class="form-horizontal" id="formUsuarios">
                  <div class="form-group">
                    <label for="nick" class="control-label col-xs-5">Nombre Usuario :</label>
                    <div class="col-xs-5">
                      <input id="nickusua" name="nickusua" type="text" class="form-control" placeholder="Ingrese nombre usuario">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pass_1" class="control-label col-xs-5">Password :</label>
                    <div class="col-xs-5">
                      <input id="pass_1" name="pass_1"  type="password" class="form-control" placeholder="Ingrese password usuario">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pass_2" class="control-label col-xs-5">Rep. Password :</label>
                    <div class="col-xs-5">
                      <input id="pass_2" name="pass_2"  type="password" class="form-control" placeholder="Ingrese rep. password">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nombreCompleto" class="control-label col-xs-5">Nombre Completo :</label>
                    <div class="col-xs-5">
                        <input id="nombre_completo" name="nombre_completo" type="text" class="form-control" placeholder="Ingrese nombre completo">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email2" class="control-label col-xs-5">Correo Electronico :</label>
                    <div class="col-xs-5">
                        <input id="email" name="email" type="email" class="form-control" placeholder="Ingrese email de usuario">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email2" class="control-label col-xs-5">Permisos :</label>
                    <div class="col-xs-5">
                        <select id="permisos" name="permisos" class="form-control">
                        	<option value="0">SELECCIONE</option>
                        	<option value="1">ADMINISTRADOR</option>
                        	<option value="2">MODERADOR</option>
                        	<option value="3">TECNICO</option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email2" class="control-label col-xs-5">Estado :</label>
                    <div class="col-xs-5">
                         <select id="estado" name="estado" class="form-control">
                        	<option value="0"> SELECCIONE</option>
                        	<option value="activo">ACTIVO</option>
                        	<option value="no_activo">NO ACTIVO</option>
                        </select>
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">  
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button onclick="registrar_usuarios();" type="button" class="btn btn-success">Guardar</button>
                <div id="cargar1" style="display:none;"><i class="fa fa-refresh fa-spin"></i> </span> </div>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>

	<?php include("footer.php"); ?>

	<script src="../resources/js/jquery-1.11.2.js"></script>
	<script src="../resources/js/bootstrap.min.js"></script>
	<script src="../resources/js/usuarios.js"></script>
	<script type="text/javascript">
	function cerrar(){
		$.ajax({
			url:'../controllers/usuariosControllers.php',
			type:'POST',
			data:'boton=cerrar',
		}).done(function(resp){
			location.href='../views/';
		});
	}
	</script>
</body>
</html>
<?php
}else
{
	header("location: ./");
}
?>