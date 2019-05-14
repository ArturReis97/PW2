$(document).ready(function() {

	//PREENCHE OS CAMPOS, NAO DEIXA RESPONDER INFORMAÇÃO ENQUANTO NAO TIVER CARREGADO O HTML TOTALMENTE

	$("#calcularBtn").click(function(element) {
			element.preventDefault();
			var valor1 = $("#valor1").val();
			var valor2 = $("#valor2").val();

			// CRIA OBJETO

			var Valores = {
					"v1": valor1,
					"v2": valor2
			};

			// CONVERTER JAVA PARA JSON

			var ValoresJSON = JSON.stringify(Valores);

			//PEDE AJAX
			$.ajax({
					type: "POST",
					url: "PHP.php",
					data: ValoresJSON,
					success: function(data) {
							$("#resultado").text(dados);
					},
					error: function(data) {
							alert("ocorreu um erro!");
					}
			});
	});
});