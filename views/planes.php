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
  <title>Manejo Wisp ..:: Planes ::..</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />  
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/css/estilos.css">

</head>
<body onload="lista_planes('');">

<?php include('header.php') ?>
  


<section class="main container">
      <div class="row">
        <section class="jumbotron ">
          <div class="container">
            <h1 class="texto-h1">Planes</h1>
            <p class="texto-h1">Manejo Wisp</p>
          </div>
        </section>
        <div class="form-group">
                    <div class="col-sm-4  text-right">
                        <label for="buscar" class="control-label">Buscar:</label>
                    </div>
                <div class="col-sm-4">
                    <input  type="text" name="buscar" id="buscar" onkeyup ="lista_planes(this.value)" class="form-control" placeholder="Ingrese nombre plan"/>
                </div>
                <div class="col-sm-4">
                      <button class="btn btn-default" data-toggle="modal" data-target="#ingresarplanes">Agregar Planes</button>
                    </div>
        </div>

        <div class="col-xs-12">
          <div class="table-responsive">
            <div id="lista"></div>
            <div id="paginacion"></div>
          </div>
        </div>
    </section>

  <div class="modal fade" id="ingresarplanes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center">Ingresar Planes</h3>
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
                  <span class="glyphicon glyphicon-ok"> </span><span> El nombre del plan que intenta ingresar, ya se encuentra registrado</span>
                </div>
                <form class="form-horizontal" id="formPlanes">
                  <div class="form-group">
                    <label for="nombres_plan" class="control-label col-xs-5">Nombre plan :</label>
                    <div class="col-xs-5">
                      <input id="nombre_plan" name="nombre_plan" type="text" class="form-control" placeholder="Ingrese nombre del plan">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="vel_bajada" class="control-label col-xs-5">Velocidad bajada :</label>
                    <div class="col-xs-5">
                      <input id="vel_bajada" name="vel_bajada"  type="text" class="form-control" placeholder="Ingrese velocidad de bajada">
                    </div>
                    <div class="col-xs-2">
                        <select class="form-control" id="tipo_bajada" name="tipo_bajada">
                          <option></option>
                          <option>Kb</option>
                          <option>Mb</option>
                          <option>Gb</option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="vel_subida" class="control-label col-xs-5">Velocidad subida :</label>
                    <div class="col-xs-5">
                        <input id="vel_subida" name="vel_subida" type="text" class="form-control" placeholder="Ingrese velocidad de subida">
                    </div>
                    <div class="col-xs-2">
                        <select class="form-control" id="tipo_subida" name="tipo_subida">
                          <option></option>
                          <option>Kb</option>
                          <option>Mb</option>
                          <option>Gb</option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="precio_plan" class="control-label col-xs-5">Precio plan :</label>
                    <div class="col-xs-5">
                        <input id="precio_plan" name="precio_plan" type="number" class="form-control" placeholder="Ingrese precio plan">
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
  <script src="../resources/js/planes.js"></script>
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