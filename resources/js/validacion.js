$(document).on("ready",inicio);


function inicio(){
	$("span.help-block").hide();
	$("#btnvalidar").click(function(){
		if(validar()==false){
			alert("error en los campos");
		}else{
			alert("los campos estan correctos");
		}
	});
	$("#texto").keyup(validar);
}

function validar(){
	var valor = document.getElementById("texto").value;
	//alert(valor);
	if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
		$("#iconotexto").remove();
		$("#texto").parent().parent().attr("class","form-group has-error has-feedback");
		$("#texto").parent().children("span").text("Debe ingresar algun caracter.").show();
		$("#texto").parent().append("<span id='iconotexto' class='glyphicon glyphicon-star form-control-feedback'></span>");
  	return false;
	}
	else if( isNaN(valor) ) {
		$("#iconotexto").remove();
		$("#texto").parent().parent().attr("class","form-group has-error has-feedback");
		$("#texto").parent().children("span").text("solo acepto numeros.").show();
		$("#texto").parent().append("<span id='iconotexto' class='glyphicon glyphicon-star form-control-feedback'></span>");
 	 return false;
	}else{
		$("#texto").parent().parent().attr("class","form-group has-success has-feedback");
		$("#texto").parent().children("span").text("").hide();
		$("#texto").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback'></span>");
		return true;
	}
}