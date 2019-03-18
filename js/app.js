(function renderOnScreen() {
    if ((window.location.href).indexOf("index") != -1) {
	    $.get('controller.php?produto',function (data) {
	    	document.getElementById("produto").innerHTML=data;
	    });
    }
    if ((window.location.href).indexOf("registrar") != -1) {
    	$("#cep").blur(function(){
    		if($(this).val()){
    			$.get('https://api.postmon.com.br/v1/cep/'+$(this).val(), function(data){
    				console.log(data);
    			});
    		}
    	});
    }
       

})();
