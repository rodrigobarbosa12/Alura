
var botaoBuscaPaciente = document.querySelector("#buscar-pacientes");


botaoBuscaPaciente.addEventListener("click", function(){
	console.log("Buscando pacientes...");

	var xhr = new XMLHttpRequest();
	xhr.open("GET","https://api-pacientes.herokuapp.com/pacient");

	xhr.addEventListener("load", function(){
		var resposta = xhr.responseText;
		var erroAjax = document.querySelector("#erro-ajax");
		
		if(xhr.status == 200){
			var pacientes = JSON.parse(resposta);//Transforma String em Objeto
			pacientes.forEach( function(paciente){
			adicionaPacienteNaTabela(paciente);
			});
		}else{
			erroAjax.classList.remove("invisivel");
		}
		
		
	});

	xhr.send();

});