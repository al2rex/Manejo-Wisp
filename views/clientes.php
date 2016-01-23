<?php
require_once("../models/planes.php");
require_once("../models/nodos.php");
session_start();
//print_r($_SESSION);
 if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='yes') 
{
  $obj = new planes();
  $tra = new nodos();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
   	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Manejo Wisp ..:: Clientes ::..</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />	
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/css/estilos.css">

</head>
<body onload="listar_clientes('');">

<?php include('header.php') ?>
	


<section class="main container">
			<div class="row">
				<section class="jumbotron ">
					<div class="container">
						<h1 class="texto-h1">Clientes</h1>
						<p class="texto-h1">Manejo Wisp</p>
					</div>
				</section>
				<div class="form-group">
                    <div class="col-sm-4  text-right">
                        <label for="buscar" class="control-label">Buscar:</label>
                    </div>
                <div class="col-sm-4">
                    <input  type="text" name="buscar" id="buscar" onkeyup ="listar_clientes(this.value);" class="form-control" placeholder="Ingrese nombre o identificacion del cliente"/>
                </div>
                <div class="col-sm-4">
                    	<button class="btn btn-default" data-toggle="modal" data-target="#ingresar_clientes">Agregar Clientes</button>
                    </div>
				</div>

				<div class="col-xs-12">
					<div class="table-responsive">
						<div id="lista"></div>
						<div id="paginacion"></div>
					</div>
				</div>
		</section>

	<div class="modal fade" id="ingresar_clientes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" onload="alert('ok');">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center">Ingresar Clientes</h3>
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
                  <span class="glyphicon glyphicon-ok"> </span><span> El nombre del nodo que intenta ingresar, ya se encuentra registrado</span>
                </div>
                <form class="form-horizontal" id="formClientes">
                 <div class="form-group">
                    <label for="identificacion" class="control-label col-xs-5"># Identificacion :</label>
                    <div class="col-xs-5">
                      <input id="dni" name="dni"  type="number" class="form-control" placeholder="Ingrese numero identificacion">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nombrecliente" class="control-label col-xs-5">Nombre Completo :</label>
                    <div class="col-xs-5">
                      <input type="hidden" id="idNodo" name="idNodo" />
                      <input id="nombre_cliente" name="nombre_cliente" type="text" class="form-control" placeholder="Ingrese nombre completo">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="dir" class="control-label col-xs-5">Direccion Domicilio :</label>
                    <div class="col-xs-5">
                      <input id="direccion" name="direccion"  type="text" class="form-control" placeholder="Ingrese direccion domicilio">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="telefono" class="control-label col-xs-5">Telefono Contacto :</label>
                    <div class="col-xs-5">
                        <input id="telefono_contacto" name="telefono_contacto" type="text" class="form-control" placeholder="Ingrese telefono contacto">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="control-label col-xs-5">Correo Electronico :</label>
                    <div class="col-xs-5">
                        <input id="correo" name="correo" type="email" class="form-control" placeholder="Ingrese correo electronico">
                    </div>
                  </div>
  
                  <div class="form-group">
                    <label for="rangoip" class="control-label col-xs-5">Rango Direccion :</label>
                    <div class="col-xs-5">
                        <input id="rango" name="rango" type="text" class="form-control" placeholder="Ingrese rango direccion ip">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="usuah" class="control-label col-xs-5">Usuario Hotspot :</label>
                    <div class="col-xs-5">
                        <input id="usuarioh" name="usuarioh" type="text" class="form-control" placeholder="Ingrese usuario Hotspot">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="passh" class="control-label col-xs-5">Password Hotspot :</label>
                    <div class="col-xs-5">
                        <input id="passwordh" name="passwordh" type="text" class="form-control" placeholder="Ingrese password Hotspot">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="frecuencia" class="control-label col-xs-5">Frecuencia :</label>
                    <div class="col-xs-5">
                        <input id="frecuen" name="frecuen" type="text" class="form-control" placeholder="Ingrese frecuencia en la que opera">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="obser" class="control-label col-xs-5">Observacion :</label>
                    <div class="col-xs-5">
                        <textarea id="observacion" name="observacion" class="form-control" placeholder="Observacion"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nod" class="control-label col-xs-5">Seleccione Nodo  :</label>
                    <div class="col-xs-5">
                        <select name="nodo" id="nodo" class="form-control">
                            <option value="0">Seleccione Nodo</option>
                           <?php
                            $datosNodo = $tra->listarNodos();
                           for($i=0;$i<sizeof($datosNodo);$i++){
                            ?>
                            <option value="<?php echo $datosNodo[$i]["id_nodo"] ?>"><?php echo $datosNodo[$i]["nombre_nodo"] ?></option>
                            <?php
                           }
                           ?>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nod" class="control-label col-xs-5">Seleccione Plan  :</label>
                    <div class="col-xs-5">
                        <select name="plan" id="plan" class="form-control">
                            <option value="0">Seleccione Plan</option>
                             <?php
                              $datos = $obj->listarPlanes();
                              print_r($datos);
                              for($i=0;$i<sizeof($datos);$i++){
                            ?>
                            <option value="<?php echo $datos[$i]["id_plan"] ?>"><?php echo $datos[$i]["nombre_plan"]." - ".number_format($datos[$i]["precio_plan"]) ?></option>
                            <?php
                              }
                            ?>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nod" class="control-label col-xs-5">Seleccione Estado  :</label>
                    <div class="col-xs-5">
                        <select name="estado" id="estado" class="form-control">
                            <option value="0">Seleccione Estado</option>
                            <option value="Activo">Activo</option>
                            <option value="No Activo">No Activo</option>
                        </select>
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">  
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button onclick="registrar();" type="button" class="btn btn-success">Ingresar Datos</button>
                <div id="cargar1" style="display:none;"><i class="fa fa-refresh fa-spin"></i> </span> </div>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>

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