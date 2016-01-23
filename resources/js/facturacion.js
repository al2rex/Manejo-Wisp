function generar_facturas (){
	//alert("ok");
	var fecha_inicial = $("#fecha_ini").val();
	var fecha_fin = $("#fecha_fin").val();

	var primera = Date.parse(fecha_inicial);
	var segunda = Date.parse(fecha_fin);

	if(fecha_inicial=="" || fecha_fin==""){
		alert("Rellenar fecha inicial y fecha final");
	}else{
		if(primera > segunda){
			alert("La fecha inicial no puede ser mayor a la fecha final");
		}else{
			if(primera == segunda){
				alert("la fecha inicial no puede ser igual a la fecha final");
			}else{
				$.ajax({
					url:'../controllers/facturacionControllers.php',
					type:'POST',
					data:'fecha_ini='+fecha_inicial+"&fecha_fin="+fecha_fin+"&boton=ingresar-fac",
				}).done(function(resp){
					console.log(resp);
				});
			}
		}
	}
}

function listar_facturas(valor){
	//alert("na");
	$.ajax({
		url:'../controllers/facturacionControllers.php',
		type:'POST',
		data:'valor='+valor+'&boton=buscarfacturas',
	}).done(function(resp){
		//console.log(resp);
		var arraydatos = resp.split("*");
		var valores = eval(arraydatos[0]);
		html = "<table class='table table-bordered'>"+
			   	"<thead>"+
			   		"<tr>"+
			   			"<th>#</th>"+
			   			"<th>Cod</th>"+
			   			"<th>Periodo </th>"+
			   			"<th>Identificacion</th>"+
			   			"<th>Nombre</th>"+
			   			"<th>V. Plan</th>"+
			   			"<th>Estado</th>"+
			   			"<th>F. Factura</th>"+
			   			"<th>Exp Factura</th>"+
			   		"</tr>"+
			   	"</thead>"+
			   	"<tbody>";
		for(i=0;i<valores.length;i++){
			var datos = valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3];
			html+= "<tr><td>"+valores[i][0]+"</td>"+
				   "<td>"+valores[i][1]+"</td>"+
				   "<td>"+valores[i][2]+" AL "+valores[i][3]+"</td>"+
				   "<td>"+valores[i][10]+"</td>"+
				   "<td>"+valores[i][11]+"</td>"+
				   "<td>"+valores[i][31]+"</td>"+
				   "<td>"+valores[i][6]+"</td>"+
				   "<td>"+valores[i][7]+"</td>"+
				   "<td><button class='btn btn-default'>Factura</button></td>";
				   
		}
		html+= "</tbody></table>";
		$('#lista').html(html);
		
	});
	
}