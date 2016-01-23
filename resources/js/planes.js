function lista_planes(valor){
	$.ajax({
		url:'../controllers/planesControllers.php',
		type:'POST',
		data:'valor='+valor+'&boton=buscar'
	}).done(function(resp){
		//alert(resp);
		var valores = eval(resp);
		html="<table class='table table-bordered'>"+
		     " <thead> "+
		     " <tr> "+
		     " <th>#</th> "+
		     " <th>Nombre Plan</th> "+
		     " <th>Vel. descarga</th> "+
		     " <th>Vel. Subidad</th> "+
		     " <th>Precio</th> "+
		     " <th>Actualizar</th> "+
		     " <th>Eliminar</th> "+
		     " </tr> "+
		     " </thead> "+
		     " <tbody>";
		for(i=0;i<valores.length;i++){
			html+="<tr> "+
				  " <td>"+(i+1)+"</td> "+
				  " <td>"+valores[i][1]+"</td> "+
				  " <td>"+valores[i][2]+" - "+valores[i][3]+"</td> "+
				  " <td>"+valores[i][4]+" - "+valores[i][5]+"</td> "+
				  " <td>$COP "+dar_formato(valores[i][6])+"</td> "+
				  " <td><button class='btn btn-warning' data-toggle='modal' data-target='#actualizar_Antena_act' onclick='mostrar();'><span class='glyphicon glyphicon-pencil'></span></button></td> "+
				  "<td><button class='btn btn-danger' onclick=''><span class='glyphicon glyphicon-remove'></span></button></td></tr>"+
				  " </tr>";
		}
		html+="</tbody></table>"
		$("#lista").html(html);
	});
}
function registrar(){
	//alert("listo desde ingresar");
	var datosForm = $("#formPlanes").serialize();

	$.ajax({
		url: '../controllers/planesControllers.php',
		type:'POST',
		data:datosForm+'&boton=ingresar'
	}).done(function(resp){
		var respuesta = eval(resp);
		console.log(respuesta);
		switch(respuesta){
			case 1:
				$('#campos_vacios').show();
			break;
			case 2:
				$('#exito').show();
				$("#formPlanes")[0].reset();
			break;
			case 3:
				$('#campos_error').show();
			break;
			case 4:
				$('#campos_repetidos').show();
			break;
		}
		lista_planes('');

	}).always(function(){
			setTimeout(function(){
                $('#campos_vacios').hide();
                $('#exito').hide();
                $('#campos_repetidos').hide();
                $('#campos_error').hide();
            }, 2000);
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