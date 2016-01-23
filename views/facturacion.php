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
	<title>Manejo Wisp ..:: Facturación ::..</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />	
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/css/estilos.css">

</head>
<body>
<?php include('header.php') ?>


<section class="main container">
	<div class="row">
		<section class="jumbotron ">
			<div class="container">
				<h1 class="texto-h1">Facturación</h1>
				<p class="texto-h1">Manejo Wisp</p>
			</div>
		</section>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
                <label for="fecha_inicial" class="control-label">Fecha Inicial :</label>
                <input id="fecha_ini" name="fecha_ini" type="date" class="form-control" placeholder="Ingrese fecha inicial de la facturacion">
            </div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
                <label for="fecha_final" class="control-label">Fecha Final :</label>
                <input id="fecha_fin" name="fecha_fin" type="date" class="form-control" placeholder="Ingrese fecha final de la facturacion">
            </div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
                <button class="btn btn-success btn-lg btn-block" onclick="generar_facturas();">Generar Facturas</button>
            </div>
		</div>
	</div>
		
	
				
		</section>	
</section>

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