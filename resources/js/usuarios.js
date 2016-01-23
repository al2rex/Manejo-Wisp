function listar_usuarios(valor){
	$.ajax({
		url:'../controllers/usuariosControllers.php',
		type:'POST',
		data:'valor='+valor+'&boton=buscar',
	}).done(function(resp){
		var arraydatos = resp.split("*");
		var valores = eval(arraydatos[0]);

		html = "<table class='table table-bordered'>"+
			   	"<thead>"+
			   		"<tr>"+
			   			"<th>#</th>"+
			   			"<th>Nick </th>"+
			   			"<th>Nombre</th>"+
			   			"<th>Correo Electronico</th>"+
			   			"<th>Permiso</th>"+
			   			"<th>Estado</th>"+
			   			"<th>Actualizar</th>"+
			   		"</tr>"+
			   	"</thead>"+
			   	"<tbody>";
		for(i=0;i<valores.length;i++){
			var roll = eval(valores[i][4]);
			var permiso;
			switch(roll){
				case 1:
					permiso="Administrador";
				break;

				case 2:
					permiso="Moderador";
				break;

				case  3:
					permiso="Tecnico";
				break;
			}
			
			var datos = valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3];
			html+= "<tr><td>"+valores[i][0]+"</td>"+
				   "<td>"+valores[i][1]+"</td>"+
				   "<td>"+valores[i][2]+"</td>"+
				   "<td>"+valores[i][3]+"</td>"+
				   "<td>"+permiso+"</td>"+
				   "<td>"+valores[i][5]+"</td>"+
				   "<td><button class='btn btn-warning' data-toggle='modal' data-target='#actualizarnodos' onclick='mostrar("+'"'+datos+'"'+");'><span class='glyphicon glyphicon-pencil'></span></button></td></td>";
		}
		html+= "</tbody></table>";
		$('#lista').html(html);
	});	
}
function registrar_usuarios(){
	var nick = $("#nickusua").val();
	var pass1 = $("#pass_1").val();
	var pass2 = $("#pass_2").val();
	var nombrec = $("#nombre_completo").val();
	var correo = $("#email").val();
	var permisos = $("#permisos").val();
	var estado = $("#estado").val();

	if( (nick=="") || (pass1=="") || (pass2=="") || (nombrec=="") || (correo=="") ){
		alert("Debe rellenar todos los campos, son necesarios");
	}else{
		if( (permisos==0) || estado==0 ){
			alert("Debe seleccionar los elementos de las listas desplegables");
		}else{
			if(pass1===pass2){
				$.ajax({
					url:'../controllers/usuariosControllers.php',
					type:'POST',
					data:'nick='+nick+'&pass1='+pass1+'&nombrec='+nombrec+'&correo='+correo+'&permisos='+permisos+'&estado='+estado+'&boton=registrar',
				}).done(function(resp){
					var resp = eval(resp);
					switch(resp){
						case 1:
							$("#campos_vacios").show();
						break;
						case 2:
							$("#campos_repetidos").show();
						break;
						case 3:
							$("#exito").show();
							$("#formUsuarios")[0].reset();
							listar_usuarios('');
						break;
						case 4:
							$("#campos_error").show();
						break;
					}
				}).always(function(){
					setTimeout(function(){
						$("#campos_vacios").hide();
						$("#campos_repetidos").hide();
						$("#exito").hide();
						$("#campos_error").hide();
					},3000)
				});
			}else{
				alert("Los contraseñas deben coincidir.");
			}
		}
	}
}