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
	<title>Manejo Wisp ..:: Cambio Contraseña ::..</title>
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
						<h1 class="texto-h1">Cambio Contraseña</h1>
						<p class="texto-h1">Manejo Wisp</p>
					</div>
				</section>
				

				<div class="col-xs-6">
          <div class="form-group">
              <label for="nusuario">Nombre Usuario:</label>
              <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
              <input type="text" class="form-control" id="nombreusuario" name="nombreusuario">
              </div>
           </div>
           <div class="form-group">
              <label for="nombrecompleto">Nombre Completo:</label>
              <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
              <input type="text" class="form-control" id="ncompleto" name="ncompleto" >
              </div>
           </div>
          <div class="form-group">
              <label for="dcorreo">Direccion Correo</label>
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
                <input type="email" class="form-control" id="direccioncorreo" name="direccioncorreo">
              </div>
          </div>
          <div class="form-group">
              <label for="permiso">Permiso:</label>
              <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
              <input type="text" class="form-control" id="permisousuario" name="permisousuario">
              </div>
           </div>
           <div class="form-group">
              <label for="estado">Estado:</label>
              <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
              <input type="text" class="form-control" id="estadouser" name="estadouser">
              </div>
           </div>
          <div class="form-group">
              <label for="fregistro">Fecha Registro</label>
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
                <input type="date" class="form-control" id="fecharegistro" name="fecharegistro" >
              </div>
          </div>
      
        </div>
        <div class="col-xs-6">
          <img src="../resources/img/logo.png">
        </div>
		</section>

	

	
	
	
	<?php include("footer.php"); ?>

	<script src="../resources/js/jquery-1.11.2.js"></script>
	<script src="../resources/js/bootstrap.min.js"></script>
	<!--<script src="../resources/js/facturacion.js"></script>-->
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