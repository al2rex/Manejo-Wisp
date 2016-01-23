<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
   	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Aplicacion Web</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/css/estilos.css">

</head>
 
<body>
  
    <div class="container">
        <div class="row row-centered">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">MANEJO WISP</div>
                    <div class="panel-body"> 
                        <div class="alert alert-danger text-center" style="display:none;" id="error">
                            <p>Usuario o Password no identificados</p>
                        </div> 
                        <div class="alert alert-danger text-center" style="display:none;" id="error1">
                            <p>rellene todos los campos, son necesarios</p>
                        </div>                     
                        <form role="form">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    <input type="nick" class="form-control" id="nick" placeholder="Example@gmail.com">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
                                    <input type="password" class="form-control" id="password" placeholder="Password">
                                </div>
                            </div>                     
                            <button type="button" class="btn btn-success" onclick='ingresar();'><span class="glyphicon glyphicon-lock"></span> Entrar</button>   
                        </form>
                        <div id="cargar" style="display:none;"><i class="fa fa-refresh fa-spin"></i> </span> Cargando...</div>
                        <div class="alert alert-success text-center" id="exito" style="display:none;">
                          <span class="glyphicon glyphicon-ok"> </span><span> Su cuenta ha sido registrada</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
	<script src="../resources/js/jquery-1.11.2.js"></script>
	<script src="../resources/js/bootstrap.min.js"></script>
 	<script type="text/javascript">
 	function ingresar(){
 		var nick = $("#nick").val();
 		var pass = $("#password").val();
 		//console.log(nick+pass);
 		$.ajax({
 			url:'../controllers/usuariosControllers.php',
 			type:'POST',
 			data:'nick='+nick+'&pass='+pass+'&boton=ingresar' ,
 			beforeSend:function(){
                $('#cargar').show();
            }
 		}).done(function(resp){
 			console.log(resp);
            var resp = eval(resp);
            switch(resp){
                case 1:
                    $("#error1").show();
                break;
                case 2:
                    $("#error").show();
                break;
                case 3:
                    location.href='home.php';
                break;
            }
        }).always(function(){
            setTimeout(function(){
                $("#error").hide();
                $("#error1").hide();
                $("#cargar").hide();
            },2000)
        });
 	}

 	</script>	
</body>
</html>