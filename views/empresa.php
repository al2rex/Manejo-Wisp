<?php
//session_start();
//session_destroy();
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
	<title>Manejo Wisp ..:: Empresa ::..</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />	
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/css/estilos.css">

</head>
<body onload="datosEmpresa()">
<?php include('header.php') ?>


<section class="main container">
			<div class="row">
				<section class="jumbotron ">
					<div class="container">
						<h1 class="texto-h1">Empresa</h1>
						<p class="texto-h1">Manejo Wisp</p>
					</div>
				</section>
			<div class="col-md-4">
				
			</div>
			<div class="col-md-4">
				
                    <div class="form-group">
                        <label for="nit">Nit / Rut:</label>
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-menu-hamburger"></span></span>
                            <input type="text" class="form-control" id="nit" name="nit" disabled="disabled">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" class="form-control" id="nombre" name="nombre" disabled="disabled">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Direccion:</label>
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
                            <input type="nick" class="form-control" id="direccion" name="direccion" disabled="disabled">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono:</label>
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-phone-alt"></span></span>
                            <input type="text" class="form-control" id="tel" name="tel" disabled="disabled">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-exclamation-sign"></span></span>
                            <input type="nick" class="form-control" id="email" name="email" disabled="disabled">
                        </div>
                    </div>
                    <div class="form-group">
                    	 <button class="btn btn-success" data-toggle="modal" data-target="#actualizarEmpresa" onclick="mostrar()">Datos Empresa</button>
                    </div>
                
			</div>
			<div class="col-md-4">
				
			</div>
				
			</div>

		</section>
<div class="modal fade" id="actualizarEmpresa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center">Datos Empresa</h3>
              </div>
              <div class="modal-body">
                <div class="alert alert-success text-center" id="exito" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span> Los datos se guardaron exitosamente</span>
                </div>
                <div class="alert alert-danger text-center" id="no_exito" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span> Ocurrio un error al momento de guardar los datos</span>
                </div>
                <div class="alert alert-success text-center" id="update_exito" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span> los datos se actualizaron exitosamente</span>
                </div>
                <div class="alert alert-danger text-center" id="update_no_exito" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span> Ocurrio un error al momento de actualizar los datos</span>
                </div>
                <form class="form-horizontal" id="formEmpresa">
                  <div class="form-group">
                    <label for="nit" class="control-label col-xs-5"> Nit / Rut:</label>
                    <div class="col-xs-5">
                      <input type="hidden" id="idempresa" name="idempresa" />
                      <input id="nit_act" name="nit_act"  type="text" class="form-control" placeholder="Ingrese Nit / Rut empresa">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nombre" class="control-label col-xs-5">Nombre empresa :</label>
                    <div class="col-xs-5">
                      <input id="nombre_act" name="nombre_act"  type="text" class="form-control" placeholder="Ingrese nombre empresa">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="direccion" class="control-label col-xs-5">Direccion empresa :</label>
                    <div class="col-xs-5">
                        <input id="direccion_act" name="direccion_act" type="text" class="form-control" placeholder="Ingrese direccion empresa">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="telefono" class="control-label col-xs-5">Telefono empresa :</label>
                    <div class="col-xs-5">
                        <input id="tel_act" name="tel_act" type="text" class="form-control" placeholder="Ingrese telefono empresa">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="correo" class="control-label col-xs-5">Email Empresa :</label>
                    <div class="col-xs-5">
                        <input id="correo_act" name="correo_act" type="email" class="form-control" placeholder="Ingrese correo empresa">
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">  
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button onclick="guardar();" type="button" class="btn btn-success">Guardar</button>
                <div id="cargar1" style="display:none;"><i class="fa fa-refresh fa-spin"></i> </span> </div>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
	
	<?php include("footer.php"); ?>

	<script src="../resources/js/jquery-1.11.2.js"></script>
	<script src="../resources/js/bootstrap.min.js"></script>
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
	function datosEmpresa(){
		//alert("listo");
		$.ajax({
			url:'../controllers/empresaControllers.php',
			type:'POST',
			data:'boton=cargar',
		}).done(function(resp){
			var arraydatos = resp.split("*");
			var datos = eval(arraydatos[0]);
			for(i=0;i<datos.length;i++){
				var valores = datos[i][0]+"*"+datos[i][1]+"*"+datos[i][2]+"*"+datos[i][3]+"*"+datos[i][4]+"*"+datos[i][5];
			}
			var d = valores.split("*");
			//console.log(d[4]);
			
			$("#nit").val(d[1]);
			$("#nombre").val(d[2]);
			$("#direccion").val(d[3]);
			$("#tel").val(d[4]);
			$("#email").val(d[5]);
		});
	}
	function mostrar(){
		$.ajax({
			url:'../controllers/empresaControllers.php',
			type:'POST',
			data:'boton=cargar',
		}).done(function(resp){
			var arraydatos = resp.split("*");
			var datos = eval(arraydatos[0]);
			for(i=0;i<datos.length;i++){
				var valores = datos[i][0]+"*"+datos[i][1]+"*"+datos[i][2]+"*"+datos[i][3]+"*"+datos[i][4]+"*"+datos[i][5];
			}
			var d = valores.split("*");
			//console.log(d[4]);
			
			$("#idempresa").val(d[0]);
			$("#nit_act").val(d[1]);
			$("#nombre_act").val(d[2]);
			$("#direccion_act").val(d[3]);
			$("#tel_act").val(d[4]);
			$("#correo_act ").val(d[5]);
		});
	}
	function guardar(){
		//alert("listo");
		var datosForm = $("#formEmpresa").serialize();
		$.ajax({
			url:'../controllers/empresaControllers.php',
			type:'POST',
			data:datosForm+'&boton=guardar',
			success:''
		}).done(function(resp){
			var respuesta = eval(resp);
			console.log(respuesta);
			switch(respuesta){
				case 1:
					$("#exito").show();
					datosEmpresa();
				break;
				case 2:
					$("#no_exito").show();
				break;
				case 3:
					$("#update_exito").show();
					datosEmpresa();
				break;
				case 4:
					$("#update_no_exito").show();
				break;
			}
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