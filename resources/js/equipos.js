function listar_equipos(valor,inicio){
	var inicio = Number(inicio);
	$.ajax({
		url:'../controllers/equiposControllers.php',
		type:'POST',
		data:'valor='+valor+'&inicio='+inicio+'&boton=buscar'
	}).done(function(resp){
		//alert(resp);
		var arreglodatos = resp.split("*");
		var valores = eval(arreglodatos[0]);
		html = " <table class='table table-bordered'> "+ 
		"<thead>" +
			"<tr>"+
				"<th>#</th><th>Nombre Equipo</th>"+
				"<th>Tipo</th><th>Marca</th>"+
				"<th>Serial</th>"+
				"<th>Direccion Mac</th>"+
				"<th>Actualizar</th>"+
				"<th>Eliminar</th>"+
			"</tr>"+
		"</thead>"+
		"<tbody>";
		for(i=0;i<valores.length;i++){
			datos = valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3]+"*"+valores[i][4]+"*"+valores[i][5];
			html+= "<tr>"+
				   "<td>"+valores[i][0]+"</td>"+
				   "<td>"+valores[i][1]+"</td>"+
				   "<td>"+valores[i][2]+"</td>"+
				   "<td>"+valores[i][3]+"</td>"+
				   "<td>"+valores[i][4]+"</td>"+
				   "<td>"+valores[i][5]+"</td>"+
				   "<td><button class='btn btn-warning' data-toggle='modal' data-target='#actualizar_Antena_act' onclick='mostrar("+'"'+datos+'"'+");'><span class='glyphicon glyphicon-pencil'></span></button></td>"+
				   "<td><button class='btn btn-danger' onclick=''><span class='glyphicon glyphicon-remove'></span></button></td></tr>";
		}
		html += "</tbody></table>";
		$("#lista").html(html);
		totalregistros = arreglodatos[1];
		nrolink = Math.ceil(totalregistros/5);
		paginador = "<ul class='pagination'>";
		campobuscar = $('#buscar').val();
		for(i=1;i<=nrolink;i++){
			if(i===inicio){
				paginador += "<li class='active'><a href='javascript:void(0)'>"+i+"</li>";
			}else{
				paginador+="<li><a href='javascript:void(0)' onclick='listar_equipos("+'"'+campobuscar+'","'+i+'"'+");'>"+i+"</a></li>";
			}
		}
		paginador += "</ul>"
		$('#paginacion').html(paginador);
	});
}
function registrar(){
		var datosform = $('#formAntena').serialize();
		//console.log(datosform);
		$.ajax({
			url:'../controllers/equiposControllers.php',
			type:'POST',
			data: datosform+'&boton=registrar'
		}).done(function(resp){
			if(resp=='4'){
				$('#campos_vacios').show();
			}else{
				if(resp=='1'){
					$('#exito').show();
					$('#formAntena')[0].reset();
					listar_equipos('','1');
				}else{
					if(resp=='2'){
						$('#campos_error').show();
					}else{
						if(resp=='3'){
							$('#campos_repetidos').show();
						}
					}
				}
			}
		}).always(function(){
			setTimeout(function(){
                $('#campos_vacios').hide();
                $('#exito').hide();
                $('#campos_repetidos').hide();
                $('#campos_error').hide();
            }, 2000);
		});
	}

function actualizar(){
	//alert("ok");
	var formDatos = $('#formAntena_act').serialize();
	$.ajax({
		url:'../controllers/equiposControllers.php',
		type:'POST',
		data:formDatos+'&boton=actualizar'
	}).done(function(resp){
		//console.log(resp);
		listar_equipos('','1');
		if(resp=='1'){
			$('#exito_act').show();
		}
	}).always(function(){
		setTimeout(function(){
            $('#exito_act').hide();
            $('#exito').hide();
            $('#campos_repetidos').hide();
            $('#campos_error').hide();
        }, 2000);
	});
}
function mostrar(datos){
	//alert(datos);
	var d = datos.split("*");
	//console.log(d[0]+d[1]+d[2]+d[3]+d[4]+d[5]);
	$("#idAntena_act").val(d[0]);
	$("#nombre_antena_act").val(d[1]);
	$("#tipo_antena_act").val(d[2]);
	$("#marca_antena_act").val(d[3]);
	$("#serial_antena_act").val(d[4]);
	$("#mac_antena_act").val(d[5]);
}