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
	<title>Manejo Wisp ..:: Facturas ::..</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />	
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/css/estilos.css">

</head>
<body onload="listar_facturas('');">

<?php include('header.php') ?>
	


<section class="main container">
			<div class="row">
				<section class="jumbotron ">
					<div class="container">
						<h1 class="texto-h1">Facturas</h1>
						<p class="texto-h1">Manejo Wisp</p>
					</div>
				</section>
				<div class="form-group">
                    <div class="col-sm-4  text-right">
                        <label for="buscar" class="control-label">Buscar:</label>
                    </div>
                <div class="col-sm-4">
                    <input  type="text" name="buscar" id="buscar" onkeyup ="listar_facturas(this.value);" class="form-control" placeholder="Ingrese numero de identificación"/>
                </div>
				</div>

				<div class="col-xs-12">
					<div class="table-responsive">
						<div id="lista"></div>
						<div id="paginacion"></div>
					</div>
				</div>
		</section>

	

	<!-- VENTANA MODAL PARA ACTUALIZAR -->

	<div class="modal fade" id="actualizarnodos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center">Actualizar Nodos</h3>
              </div>
              <div class="modal-body">
                <div class="alert alert-success text-center" id="exito_act" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span> Actualizacion Exitoso</span>
                </div>
                <div class="alert alert-danger text-center" id="campos_vacios_act" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span> Debes rellenar todos los campos</span>
                </div>
                <div class="alert alert-danger text-center" id="campos_error_act" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span> Error al ingresar los registros</span>
                </div>
                <form class="form-horizontal" id="formNodoAct">
                  <div class="form-group">
                    <label for="nombresnodo" class="control-label col-xs-5">Nombre Nodo :</label>
                    <div class="col-xs-5">
                      <input type="hidden" id="idNodo" name="idNodo" />
                      <input id="nombre_nodo_act" name="nombre_nodo_act" disabled="disabled" type="text" class="form-control" placeholder="Ingrese nombre nodo">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="descripcion-nodo" class="control-label col-xs-5">Descripcion Nodo :</label>
                    <div class="col-xs-5">
                      <input id="descripcion_nodo_act" name="descripcion_nodo_act"  type="text" class="form-control" placeholder="Ingrese descripcion nodo">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="direccion-nodo" class="control-label col-xs-5">Direccion Nodo :</label>
                    <div class="col-xs-5">
                        <input id="direccion_nodo_act" name="direccion_nodo_act" type="text" class="form-control" placeholder="Ingrese direccion nodo">
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
	<script src="../resources/js/facturacion.js"></script>
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