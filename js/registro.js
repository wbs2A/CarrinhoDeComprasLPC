function onBlurCep(){
	console.log("chamou");
	if(document.getElementById("cep").value){
		console.log(document.getElementById("cep").value);
	    $.get('https://api.postmon.com.br/v1/cep/'+document.getElementById("cep").value, function(data){
	    	console.log(data);
	    	if (data) {
	    		$("#bairro").val(data.bairro);
		    	$("#cidade").val(data.cidade);
		    	$("#estado").val(data.estado_info.nome);
				$("#rua").val(data.logradouro);
	    
	    	}
		});
	}
};
$(document).ready(function(){
	document.getElementById("cep").addEventListener("blur", onBlurCep);
	$.get('controller.php?paises',function(data){
		console.log(data);
		document.getElementById("pais").innerHTML=data;
	})
});