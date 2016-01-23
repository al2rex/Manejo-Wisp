<?php
session_start();
//print_r($_SESSION);
if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='yes') 
{
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
   	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Manejo Wisp ..:: Equipos ::..</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />	
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/css/estilos.css">

</head>
<body onload="listar_equipos('','1');">

<?php include('header.php') ?>
	


<section class="main container">
			<div class="row">
				<section class="jumbotron ">
					<div class="container">
						<h1 class="texto-h1">Equipos</h1>
						<p class="texto-h1">Manejo Wisp</p>
					</div>
				</section>
				<div class="form-group">
                    <div class="col-sm-4  text-right">
                        <label for="buscar" class="control-label">Buscar:</label>
                    </div>
                <div class="col-sm-4">
                    <input  type="text" name="buscar" id="buscar" class="form-control" onkeyup="listar_equipos(this.value,'1');" placeholder="Ingrese nombre equipo o marca"/>
                </div>
                <div class="col-sm-4">
                    	<button class="btn btn-default" data-toggle="modal" data-target="#responsive">Agregar Equipos</button>
                    </div>
				</div>

				<div class="col-xs-12">
					<div class="table-responsive">
						<div id="lista"></div>
						<div id="paginacion"></div>
					</div>
				</div>
		</section>

	<div class="modal fade" id="responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center">Ingresar Equipos</h3>
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
                  <span class="glyphicon glyphicon-ok"> </span><span> La serie del equipo que intenta ingresar, ya se encuentra registrado</span>
                </div>
                <form class="form-horizontal" id="formAntena">
                  <div class="form-group">
                    <label for="nombres" class="control-label col-xs-5">Nombre Equipo :</label>
                    <div class="col-xs-5">
                      <input id="nombre_antena" name="nombre_antena" type="text" class="form-control" placeholder="Ingrese nombre equipo">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="apellidos" class="control-label col-xs-5">Tipo Equipo :</label>
                    <div class="col-xs-5">
                      <input id="tipo_antena" name="tipo_antena"  type="text" class="form-control" placeholder="Ingrese tipo equipo">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email2" class="control-label col-xs-5">Marca Equipo:</label>
                    <div class="col-xs-5">
                        <input id="marca_antena" name="marca_antena" type="email" class="form-control" placeholder="Ingrese marca equipo">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pass" class="control-label col-xs-5">Serial Equipo:</label>
                    <div class="col-xs-5">
                        <input id="serial_antena" name="serial_antena" type="text" class="form-control" placeholder="Ingrese serial equipo">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pass2" class="control-label col-xs-5">Mac Equipo:</label>
                    <div class="col-xs-5">
                        <input id="mac_antena" name="mac_antena" type="text" class="form-control" placeholder="Ingrese direccion mac equipo">
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">  
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button onclick="registrar();" type="button" class="btn btn-success">Guardar</button>
                <div id="cargar1" style="display:none;"><i class="fa fa-refresh fa-spin"></i> </span> </div>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>

	<!-- VENTANA MODAL PARA ACTUALIZAR -->

	<div class="modal fade" id="actualizar_Antena_act" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center">Actualizar Equipos</h3>
              </div>
              <div class="modal-body">
                <div class="alert alert-success text-center" id="exito_act" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span>Actualizacion exitosa</span>
                </div>
                <div class="alert alert-danger text-center" id="campos_vacios" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span> Debes rellenar todos los campos</span>
                </div>
                <div class="alert alert-danger text-center" id="error" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span> Error al actualizar registro</span>
                </div>
                <form class="form-horizontal" id="formAntena_act">
                  <div class="form-group">
                    <label for="nombres" class="control-label col-xs-5">Nombre Equipo :</label>
                    <div class="col-xs-5">
                      <input  type="hidden" id="idAntena_act" name="idAntena_act"/>
                      <input id="nombre_antena_act" name="nombre_antena_act" type="text" class="form-control" placeholder="Ingrese nombre equipoequipo">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="apellidos" class="control-label col-xs-5">Tipo Equipo :</label>
                    <div class="col-xs-5">
                      <input id="tipo_antena_act" name="tipo_antena_act"  type="text" class="form-control" placeholder="Ingrese tipo equipo">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email2" class="control-label col-xs-5">Marca Equipo:</label>
                    <div class="col-xs-5">
                        <input id="marca_antena_act" name="marca_antena_act" type="email" class="form-control" placeholder="Ingrese marca equipo">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pass" class="control-label col-xs-5">Serial Equipo:</label>
                    <div class="col-xs-5">
                        <input id="serial_antena_act" disabled="disabled" name="serial_antena_act" type="text" class="form-control" placeholder="Ingrese serial equipo">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pass2" class="control-label col-xs-5">Mac Equipo:</label>
                    <div class="col-xs-5">
                        <input id="mac_antena_act" name="mac_antena_act" type="text" class="form-control" placeholder="Ingrese direccion mac equipo">
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">  
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button onclick="actualizar();" type="button" class="btn btn-success">Guardar</button>
                <div id="cargar1" style="display:none;"><i class="fa fa-refresh fa-spin"></i> </span> </div>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
	
	
	<?php include("footer.php"); ?>

	<script src="../resources/js/jquery-1.11.2.js"></script>
	<script src="../resources/js/bootstrap.min.js"></script>
	<script src="../resources/js/equipos.js"></script>
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