function listar_clientes(valor){
	$.ajax({
		url:'../controllers/clientesControllers.php',
		type:'POST',
		data:'valor='+valor+'&boton=buscar',
	}).done(function(resp){
		//console.log(resp)
		var valores = eval(resp);
		html = "<table class='table table-bordered'>"+
			   	"<thead>"+
			   		"<tr>"+
			   			"<th>#</th>"+
			   			"<th>Identificacion</th>"+
			   			"<th>Nombre</th>"+
			   			"<th>Direccion</th>"+
			   			"<th>Telefono</th>"+
			   			"<th>Email</th>"+
			   			"<th>Estado</th>"+
			   			"<th>Equipo</th>"+
			   			"<th>Actualizar</th>"+
			   			"<th>Eliminar</th>"+
			   		"</tr>"+
			   	"</thead>"+
			   	"<tbody>";
		for(i=0;i<valores.length;i++){
			//var datos = valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3];
			html+= "<tr><td>"+valores[i][0]+"</td>"+
				   "<td><a href='../views/detallesclientes.php?token="+valores[i][1]+" '>"+valores[i][1]+"</a></td>"+
				   "<td>"+valores[i][2]+"</td>"+
				   "<td>"+valores[i][3]+"</td>"+
				   "<td>"+valores[i][4]+"</td>"+
				   "<td>"+valores[i][5]+"</td>"+
				   "<td>"+valores[i][13]+"</td>"+
				   "<td><button class='btn btn-info' data-toggle='modal' data-target='#actualizarnodos' onclick='#'>Asignar Equipos</span></button></td></td>"+
				   "<td><button class='btn btn-warning' data-toggle='modal' data-target='#actualizarnodos' onclick='#'><span class='glyphicon glyphicon-pencil'></span></button></td></td>"+
				   "<td><button class='btn btn-danger' data-toggle='modal' data-target='#actualizarnodos' onclick='#'><span class='glyphicon glyphicon-pencil'></span></button></td></td>";
		}
		html+= "</tbody></table>";
		$('#lista').html(html);
	});
}

function clientes_por_id(cedula){
	$.ajax({
		url:'../controllers/clientesControllers.php',
		type:'POST',
		data:'valor='+cedula+'&boton=buscar_id',
	}).done(function(resp){
		var valores = eval(resp);
		if(valores=="no_registro"){
			$("#error").show();
		}else{
			//console.log(valores[0]);
			var datos = valores[0][0]+"*"+valores[0][1]+"*"+valores[0][10]+"*"+valores[0][11];
			html = "<div class='col-md-6'>";				
				html+= "<div class='form-group'>"+
	                       "<label for='nit'>Identificacion:</label>"+
	                        "<div class='input-group'>"+
		                        "<span class='input-group-addon'><span class='glyphicon glyphicon-menu-hamburger'></span></span>"+
		                        "<input type='text' class='form-control' value="+valores[0][1]+" disabled='disable'>"+
	                        "</div>"+
                        "</div>"+
                        "<div class='form-group'>"+
	                       "<label for='nit'>Direccion:</label>"+
	                        "<div class='input-group'>"+
		                        "<span class='input-group-addon'><span class='glyphicon glyphicon-menu-hamburger'></span></span>"+
		                        "<input type='text' class='form-control' value='"+valores[0][3]+"' disabled='disable'>"+
	                        "</div>"+
                        "</div>"+
                        "<div class='form-group'>"+
	                       "<label for='nit'>Email:</label>"+
	                        "<div class='input-group'>"+
		                        "<span class='input-group-addon'><span class='glyphicon glyphicon-menu-hamburger'></span></span>"+
		                        "<input type='text' class='form-control' value='"+valores[0][5]+"' disabled='disable'>"+
	                        "</div>"+
                        "</div>"+
                        "<div class='form-group'>"+
	                       "<label for='nit'>Usuario Hospot:</label>"+
	                        "<div class='input-group'>"+
		                        "<span class='input-group-addon'><span class='glyphicon glyphicon-menu-hamburger'></span></span>"+
		                        "<input type='text' class='form-control' value='"+valores[0][7]+"' disabled='disable'>"+
	                        "</div>"+
                        "</div>"+
                        "<div class='form-group'>"+
	                       "<label for='nit'>Frecuencia:</label>"+
	                        "<div class='input-group'>"+
		                        "<span class='input-group-addon'><span class='glyphicon glyphicon-menu-hamburger'></span></span>"+
		                        "<input type='text' class='form-control' value='"+valores[0][9]+"' disabled='disable'>"+
	                        "</div>"+
                        "</div>"+
                        "<div class='form-group'>"+
	                       "<label for='nit'>Estado:</label>"+
	                        "<div class='input-group'>"+
		                        "<span class='input-group-addon'><span class='glyphicon glyphicon-menu-hamburger'></span></span>"+
		                        "<input type='text' class='form-control' value='"+valores[0][13]+"' disabled='disable'>"+
	                        "</div>"+
                        "</div>"+

                    "</div>"+
                    "<div class='col-md-6'>"+
	                    "<div class='form-group'>"+
		                    "<label for='nit'>Nombre:</label>"+
		                    "<div class='input-group'>"+
			                    "<span class='input-group-addon'><span class='glyphicon glyphicon-menu-hamburger'></span></span>"+
			                    "<input type='text' class='form-control' value='"+valores[0][2]+"' disabled='disable'>"+
		                    "</div>"+
		                "</div>"+
		                "<div class='form-group'>"+
		                    "<label for='nit'>Contacto:</label>"+
		                    "<div class='input-group'>"+
			                    "<span class='input-group-addon'><span class='glyphicon glyphicon-menu-hamburger'></span></span>"+
			                    "<input type='text' class='form-control' value='"+valores[0][4]+"' disabled='disable'>"+
		                    "</div>"+
		                "</div>"+
		                "<div class='form-group'>"+
		                    "<label for='nit'>Rango Direccion:</label>"+
		                    "<div class='input-group'>"+
			                    "<span class='input-group-addon'><span class='glyphicon glyphicon-menu-hamburger'></span></span>"+
			                    "<input type='text' class='form-control' value='"+valores[0][6]+"' disabled='disable'>"+
		                    "</div>"+
		                "</div>"+
		                "<div class='form-group'>"+
	                       "<label for='nit'>Password Hospot:</label>"+
	                        "<div class='input-group'>"+
		                        "<span class='input-group-addon'><span class='glyphicon glyphicon-menu-hamburger'></span></span>"+
		                        "<input type='text' class='form-control' value='"+valores[0][8]+"' disabled='disable'>"+
	                        "</div>"+
                        "</div>"+
                        "<div class='form-group'>"+
	                       "<label for='nit'>Plan Contratado:</label>"+
	                        "<div class='input-group'>"+
		                        "<span class='input-group-addon'><span class='glyphicon glyphicon-menu-hamburger'></span></span>"+
		                        "<input type='text' class='form-control' value='"+valores[0][21]+" - $"+dar_formato(valores[0][26])+"' disabled='disable'>"+
	                        "</div>"+
                        "</div>"+

                    "</div>";
			
			html+= "</div>"+
				   "<div class='col-md-12'>"+
					   "<table class='table table-bordered'> "+
						   "<thead>"+
							   "<tr>"+
							   	"<th><button class='btn btn-default' data-toggle='modal' data-target='#observacion' onclick='mostrar_obser("+'"'+datos+'"'+");'>Observaciones</button></th>"+
							   	"<th><button class='btn btn-default' data-toggle='modal' data-target='#nodos' onclick='mostrar_nodos("+'"'+datos+'"'+");'>Datos Nodo</button></th>"+
							   	"<th><button class='btn btn-default' data-toggle='modal' data-target='#equipos' onclick='mostrar_equipos("+'"'+datos+'"'+");'>Datos Equipo</button></th>"+
							   	"<th><button class='btn btn-info' onclick=window.location='../views/clientes.php'>Regresar</button</th>"+
							   "</tr>"+
							"<thead>"+
					   " </table> "+
				   "</div>";
			$('#lista').html(html);
			}
	});
}
function mostrar_obser(datos){
	//console.log(datos);
	var d = datos.split("*");
	$("#obser").html(d[2]);
}

function mostrar_nodos(datos){
	var d = datos.split("*");
	var id_nodo = d[3];
	//console.log(id_nodo);
	$.ajax({
		url:'../controllers/clientesControllers.php',
		type:'POST',
		data:'id_nodo='+id_nodo+'&boton=nodo',
	}).done(function(resp){
		var valores = eval(resp);
		if(valores=="no_registro"){
			$("#no_equipo_nodo").show();
		}else{
			html = "<table class='table table-bordered'>"+
			   	"<thead>"+
			   		"<tr>"+
			   			"<th>#</th>"+
			   			"<th>Nombre Nodo</th>"+
			   			"<th>Nombre Equipo</th>"+
			   			"<th>Tipo</th>"+
			   			"<th>Marca</th>"+
			   			"<th>Serial</th>"+
			   			"<th>Mac</th>"+
			   		"</tr>"+
			   	"</thead>";
			for(i=0;i<valores.length;i++){
				//var datos = valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3];
				html+= "<tr>"+
					   "<td>"+(i+1)+"</td>"+
					   "<td>"+valores[i][9]+"</td>"+
					   "<td>"+valores[i][1]+"</td>"+
					   "<td>"+valores[i][2]+"</td>"+
					   "<td>"+valores[i][3]+"</td>"+
					   "<td>"+valores[i][4]+"</td>"+
					   "<td>"+valores[i][5]+"</td>"+
					   "</tr>";
			}
			html+= "</tbody></table>";
			$('#datosnodos').html(html);
		}
	});

}
function mostrar_equipos(datos){
	var d = datos.split("*");
	var id = d[1];
	//console.log(id);
	$.ajax({
		url:'../controllers/clientesControllers.php',
		type:'POST',
		data:'id='+id+'&boton=equipos',
	}).done(function(resp){
		//console.log(resp);
		var valores = eval(resp);
		if(valores=="no_registro"){
			$("#no_equipo").show();
		}else{
			html = "<table class='table table-bordered'>"+
			   	"<thead>"+
			   		"<tr>"+
			   			"<th>#</th>"+
			   			"<th>Nombre Equipo</th>"+
			   			"<th>Tipo</th>"+
			   			"<th>Marca</th>"+
			   			"<th>Serial</th>"+
			   			"<th>Mac</th>"+
			   			"<th>Eliminar</th>"+
			   		"</tr>"+
			   	"</thead>";
			for(i=0;i<valores.length;i++){
				//var datos = valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3];
				html+= "<tr>"+
					   "<td>"+(i+1)+"</td>"+
					   "<td>"+valores[i][1]+"</td>"+
					   "<td>"+valores[i][2]+"</td>"+
					   "<td>"+valores[i][3]+"</td>"+
					   "<td>"+valores[i][4]+"</td>"+
					   "<td>"+valores[i][5]+"</td>"+
					   "<th><button class='btn btn-default'>Eliminar</button></th>"+
					   "</tr>";
			}
			html+= "</tbody></table>";
			$('#datosequipos').html(html);
		}
	});
}


function dar_formato(num){  
 var cadena = ""; var aux;  
 var cont = 1,m,k;  
 if(num<0) aux=1; else aux=0;  
num=num.toString();  
 for(m=num.length-1; m>=0; m--){  
  cadena = num.charAt(m) + cadena;  
  if(cont%3 == 0 && m >aux)  cadena = "." + cadena; else cadena = cadena;  
  if(cont== 3) cont = 1; else cont++;  
 }  
 cadena = cadena.replace(/.,/,",");   
 return cadena;  
 }

 function registrar(){
 	//alert("listo esperando");
 	var dni = $("#dni").val();
 	var nombrec = $("#nombre_cliente").val();
 	var direccion = $("#direccion").val();
 	var telefonoc = $("#telefono_contacto").val();
 	var correo = $("#correo").val();
 	var rango = $("#rango").val();
 	var usuarioh = $("#usuarioh").val();
 	var passwordh = $("#passwordh").val();
 	var frecuencia = $("#frecuen").val();
 	var obser = $("#observacion").val();
 	var nodo = $("#nodo").val();
 	var plan = $("#plan").val();
 	var estado = $("#estado").val();

 	//alert(dni+" - "+nombrec+" - "+direccion+" - "+telefonoc+" - "+correo+" - "+rango+" - "+usuarioh+" - "+passwordh+" - "+frecuencia+" - "+obser+" - "+nodo+" - "+plan+" - "+estado);

 	if(dni==""){
 		$("#dni").focus();
 		alert( "El campo identificacion debe ser rellenado" );
 	}else{
 		if(nombrec==""){
 			$("#nombre_cliente").focus();
 			alert( "El campo nombre completo debe ser rellenado" );
 		}else{
 			if(direccion==""){
 				$("#direccion").focus();
 				alert( "El campo direccion debe ser rellenado" );
 			}else{
 				if(telefonoc==""){
 					$("#telefono_contacto").focus();
 					alert( "El campo telefono debe ser rellenado" );
 				}else{
 					if(correo==""){
 						$("#correo").focus();
 						alert( "El campo correo electronico debe ser rellenado" );
 					}else{
 						if(nodo=="0"){
 							$("#nodo").focus();
 							alert( "Selecciopne un nodo para el cliente" );
 						}else{
 							if(plan=="0"){
 								$("#plan").focus();
 								alert( "Seleccione un plan para el cliente" );
 							}else{
 								if(estado=="0"){
 									$("#estado").focus();
 									alert( "Seleccione estado para el cliente " );
 								}else{
 									$.ajax({
 										url:'../controllers/clientesControllers.php',
 										type:'POST',
 										data:'cedula='+dni+"&nombrec="+nombrec+"&direccion="+direccion+"&telefono="+telefonoc+"&correo="+correo+"&rango="+rango+"&usuarioh="+usuarioh+"&passwordh="+passwordh+"&frecuencia="+frecuencia+"&obser="+obser+"&nodo="+nodo+"&plan="+plan+"&estado="+estado+"&boton=registrar",
 									}).done(function(resp){
 										console.log(resp);
 									});
 								}
 							}
 						}
 					}
 				}
 			}
 		}
 	}




 }