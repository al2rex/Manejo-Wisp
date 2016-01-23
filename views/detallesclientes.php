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
	<title>Manejo Wisp ..:: Detalle Clientes ::..</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />	
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/css/estilos.css">

</head>
<body onload="clientes_por_id(<?php if(isset($_GET["token"]) ) { echo $_GET["token"]; }else{ echo 0; } ?>);">

<?php include('header.php') ?>
	


<section class="main container">
			<div class="row">
				<section class="jumbotron ">
					<div class="container">
						<h1 class="texto-h1">Datos Clientes</h1>
						<p class="texto-h1">Manejo Wisp</p>
					</div>
				</section>
				

				<div class="col-xs-12">
	                <div class="alert alert-danger text-center" id="error" style="display:none;">
	                  <span class="glyphicon glyphicon-remove"> </span><span> No se encontraron registros asociados</span>
	                  <button class="btn btn-danger" onclick="window.location='../views/clientes.php'">Regresar</button>
	                </div>
					<div class="table-responsive">
						<div id="lista"></div>
					</div>
				</div>
			</div>
		</section>
<!-- datos de la observacion -->
<div class="modal fade" id="observacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center">Observacion Cliente</h3>
              </div>
              <div class="modal-body">
               <div id="obser">
                	
                </div>
              </div>
              <div class="modal-footer">  
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
<!-- datos del nodo -->
<div class="modal fade" id="nodos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center">Datos Del Nodo</h3>
              </div>
              <div class="modal-body">
                <div class="table-responsive">
                	<div id="datosnodos">
                		<div class="alert alert-danger text-center" id="no_equipo_nodo" style="display:none;">
			                <span class="glyphicon glyphicon-remove"> </span><span>El Nodo no tiene equipos asociado div</span>
			            </div>
                	</div>
                </div>
              </div>
              <div class="modal-footer">  
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
<!-- datos del equipo -->
<div class="modal fade" id="equipos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center">Equipos Cliente</h3>
              </div>
              <div class="modal-body">
                <div class="table-responsive">
                	<div id="datosequipos">
                		 <div class="alert alert-danger text-center" id="no_equipo" style="display:none;">
		                  <span class="glyphicon glyphicon-remove"> </span><span>No se le ha asignado equipo alguno al cliente.</span>
		                </div>
                	</div>
                </div>
              </div>
              <div class="modal-footer">  
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
	
	
	<?php include("footer.php"); ?>

	<script src="../resources/js/jquery-1.11.2.js"></script>
	<script src="../resources/js/bootstrap.min.js"></script>
	<script src="../resources/js/clientes.js"></script>
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