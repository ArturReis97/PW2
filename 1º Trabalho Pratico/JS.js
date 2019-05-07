$(document).ready(function(){

//PREENCHE OS CAMPOS, NAO DEIXA RESPONDER INFORMAÇÃO ENQUANTO NAO TIVER CARREGADO O HTML TOTALMENTE

    $("#calcularBtn" ).click(function(element) {
		element.preventDefault();
		var valor1 = $("#valor1").val();
		var valor2 = $("#valor2").val();
		
	// CRIA OBJETO

		var Valores = {
			"v1" : "valor1",
			"v2" : "valor2",
		}

	// CONVERTER JAVA PARA JSON
	 
		var ValoresJson = JSON.stringify(Valores);

	//PEDE AJAX
		$.ajax({
			type: 'POST',
        url: "PHP.php",
        data: ValoresJson,
        success: function(data){ 
					// ENCALHEI AQUI
            if(data == 0){
                alert('Infelizmente não temos estabelicimento para atendelo(a) no momento.');
            }else{
                lojas = JSON.parse(data);
                $.ajax({
                    // ENCALHEI AQUI
                    url: 'lojas.html',
                    success: function( data ){
                }
                });

		}


    });

}); 			