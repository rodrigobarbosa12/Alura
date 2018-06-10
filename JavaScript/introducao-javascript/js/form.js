

botaoAdicionar.addEventListener("click", function(event){
event.preventDefault(); 	
	
	var form = document.querySelector("#form-adiciona");
	var paciente = obtemFormulario(form);

	var erros = validaPaciente(paciente);
	if(erros.length > 0){
		exibeMensagens(erros);
		return;
	}
	
	adicionaPacienteNaTabela(paciente);

	form.reset();
	var mensagemErro = document.querySelector("#erros");
	mensagemErro.innerHTML ="";
});

function adicionaPacienteNaTabela(paciente){
	//adiciona na tabela
	var pacienteTr = montaTr(paciente);
	var tabela = document.querySelector("#tabela-pacientes");
	tabela.appendChild(pacienteTr);
}

function  obtemFormulario(form){

	var paciente = {
		nome: form.nome.value,
		peso:form.peso.value,
		altura: form.altura.value,
		gordura: form.gordura.value,
		imc: calculaImc(form.peso.value, form.altura.value)
	}
	return paciente;
}

function montaTr(paciente){
	var pacienteTr = document.createElement("tr");
	pacienteTr.classList.add("paciente");

	pacienteTr.appendChild(montaTd(paciente.nome, "info-nome"));
	pacienteTr.appendChild(montaTd(paciente.peso, "info-peso"));
	pacienteTr.appendChild(montaTd(paciente.altura, "info-altura"));
	pacienteTr.appendChild(montaTd(paciente.gordura, "info-gordura"));
	pacienteTr.appendChild(montaTd(paciente.imc, "info-imc"));

	return pacienteTr;
}

function montaTd(dado, classe){
	var td = document.createElement("td");
	td.textContent = dado;
	td.classList.add(classe);
	return td;
}

function exibeMensagens(erros){
	var ul = document.querySelector("#erros");
	ul.innerHTML="";
	erros.forEach(function(erro){
		var li = document.createElement("li");
		
		li.textContent = erro;
		ul.appendChild(li);
	})
}

function validaPaciente(paciente){
	var erros = [];
		if(paciente.nome.length == 0) erros.push("Nome nao pode estar em branco");
		if(!validaPeso(paciente.peso)) erros.push("Peso Invalido");	
		if(!validaAltura(paciente.altura)) erros.push("Altura Invalida");
		if(paciente.gordura.length == 0) erros.push("Gordura nao pode estar em branco");
	return erros;
}
