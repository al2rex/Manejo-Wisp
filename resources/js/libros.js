function lista_libros(valor,inicio){
	var inicio = Number(inicio);
	$.ajax({
		url:'../controllers/libros.php',
		type:'POST',
		data:'valor='+valor+'&inicio='+inicio+'&boton=buscar'
	}).done(function(resp){
		//alert(resp);exit;
		var arreglodatos = resp.split("*");
		var valores = eval(arreglodatos[0]);
		html="<table class='table table-bordered'><thead><tr><th>#</th><th>ISBN</th><th>Titulo</th><th>Autor</th><th>Año de Publicacion</th><th>Nro de Paginas</th><th>Ediccion</th><th>Idioma</th></th><th>acciones</th></tr></tr></thead><tbody>";
		/*for(i=0;i<valores.length;i++){
			html+="<tr><td>"+(i+1)+"</td><td>"+valores[i][1]+"</td><td>"+valores[i][2]+"</td><td>"+valores[i][3]+"</td><td>"+valores[i][4]+"</td><td>"+valores[i][5]+"</td><td>"+valores[i][6]+"</td><td>"+valores[i][7]+"</td></tr>";
		}*/
		for(i=0;i<valores.length;i++){
			datos=valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3]+"*"+valores[i][4]+"*"+valores[i][5]+"*"+valores[i][6]+"*"+valores[i][7];//guardar en array para recogerlo en el metodo de abajo!
			html+="<tr><td>"+(i+1)+"</td><td>"+valores[i][1]+"</td><td>"+valores[i][2]+"</td><td>"+valores[i][3]+"</td><td>"+valores[i][4]+"</td><td>"+valores[i][5]+"</td><td>"+valores[i][6]+"</td><td>"+valores[i][7]+"</td><td><button class='btn btn-warning' data-toggle='modal' data-target='#modallibros' onclick='mostrar("+'"'+datos+'"'+");'><span class='glyphicon glyphicon-pencil'></span></button><button class='btn btn-danger' onclick='eliminar("+'"'+valores[i][0]+'"'+")'><span class='glyphicon glyphicon-remove'></span></button></td></tr>";
			console.log(datos);
		}
		html+="</tbody></table>"
		$("#lista").html(html);
		totalregistros = arreglodatos[1];
		nrolink = Math.ceil(totalregistros/5);
		paginador="<ul class='pagination'>";
		//alert(nrolink);
		campobuscar = $('#buscar').val();
		for(i=1;i<=nrolink;i++){
			if(i==inicio){
				paginador += "<li class='active'><a href='javascript:void(0)'>"+i+"</li>";
			}else{
				paginador+="<li><a href='javascript:void(0)' onclick='lista_libros("+'"'+campobuscar+'","'+i+'"'+");'>"+i+"</a></li>";
			}
			
		}
		paginador+="</ul>";
		$('#paginacion').html(paginador);
	});
}
function guardar(){
	var datosform = $("#formLibro").serialize();
	//alert(datosform);
	$.ajax({
		url:'../controllers/libros.php',
		type:'POST',
		data:datosform+'&boton=actualizar'
	}).done(function(resp){
		if(resp=='exito'){
			$('#exito').show();	
		}else{
			alert(resp);
		}
		
	});
	lista_libros('');
}
function mostrar(datos){
	//alert(datos);
	var d=datos.split("*");
	//alert(d);
	$("#idlib").val(d[0]);
	$("#isbn").val(d[1]);
	$("#titulo").val(d[2]);
	$("#autor").val(d[3]);
	$("#añop").val(d[4]);
	$("#nrop").val(d[5]);
	$("#ediccion").val(d[6]);
	$("#idioma").val(d[7]);
}
function eliminar(id){
	//alert(id);exit;
	$.ajax({
		url:'../controllers/libros.php',
		type:'POST',
		data:'idlib='+id+'&boton=eliminar'
	}).done(function(resp){
		alert(resp);
	});
	lista_libros('');
}