function listar_nodos(valor,inicio){
	var inicio = Number(inicio);
	$.ajax({
		url:'../controllers/nodosControllers.php',
		type:'POST',
		data:'valor='+valor+'&inicio='+inicio+'&boton=buscar'
	}).done(function(resp){
		//console.log(resp)
		var arraydatos = resp.split("*");
		var valores = eval(arraydatos[0]);
		html = "<table class='table table-bordered'>"+
			   	"<thead>"+
			   		"<tr>"+
			   			"<th>#</th>"+
			   			"<th>Nombre nodo</th>"+
			   			"<th>Detalles nodo</th>"+
			   			"<th>Direccion nodo</th>"+
			   			"<th>Actualizar</th>"+
			   			"<th>Eliminar</th>"+
			   		"</tr>"+
			   	"</thead>"+
			   	"<tbody>";
		for(i=0;i<valores.length;i++){
			var datos = valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3];
			html+= "<tr><td>"+valores[i][0]+"</td>"+
				   "<td>"+valores[i][1]+"</td>"+
				   "<td>"+valores[i][2]+"</td>"+
				   "<td>"+valores[i][3]+"</td>"+
				   "<td><button class='btn btn-warning' data-toggle='modal' data-target='#actualizarnodos' onclick='mostrar("+'"'+datos+'"'+");'><span class='glyphicon glyphicon-pencil'></span></button></td></td>"+
				   "<td></td>";
		}
		html+= "</tbody></table>";
		$('#lista').html(html);
		totalregistro = arraydatos[1];
		nrolink = Math.ceil(totalregistro/5);
		paginador = "<ul class='pagination'>";
		for(i=1;i<=nrolink;i++){
			paginador+= "<li><a href='#'>"+i+"</a></li>";
		}
		paginador+="</ul>";
		$('#paginacion').html(paginador);
	});
}
function registrar(){
	var formDatos = $('#formNodo').serialize();
	$.ajax({
		url:'../controllers/nodosControllers.php',
		type:'POST',
		data:formDatos+'&boton=ingresar'
	}).done(function(resp){
		//console.log(resp);
		if(resp==1){
			$('#exito').show();
			$('#formNodo')[0].reset();
			listar_nodos('');
		}else{
			if(resp==2){
				$('#campos_error').show();
			}else{
				if(resp==3){
					$('#campos_repetidos').show();
				}else{
					if(resp==4){
						$('#campos_vacios').show();
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
function mostrar(datos){
	var d = datos.split("*");
	//alert(d.[0]+d.[1]+d[2]+d[3]);
	//console.log(d[0]+d[1]+d[2]+d[3]);
	$("#idNodo").val(d[0]);
	$("#nombre_nodo_act").val(d[1]);
	$("#descripcion_nodo_act").val(d[2]);
	$("#direccion_nodo_act").val(d[3]);
}
function actualizar(){
	//alert("ok");
	var formDatos = $('#formNodoAct').serialize();
	$.ajax({
		url:'../controllers/nodosControllers.php',
		type:'POST',
		data:formDatos+'&boton=actualizar'
	}).done(function(resp){
		console.log(resp);
		if(resp==1){
			$('#exito_act').show();
			listar_nodos('');
		}else{
			if(resp==2){
				$('#campos_error_act').show();
			}else{
				if(resp==3){
					$('#campos_vacios_act').show();
				}
			}
		}
	}).always(function(){
		setTimeout(function(){
			$('#exito_act').hide();
			$('#campos_error_act').hide();
			$('#campos_vacios_act').hide();
		},2000)
	});
}