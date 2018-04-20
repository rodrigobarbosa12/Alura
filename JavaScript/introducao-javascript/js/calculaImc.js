

var pacientes = document.querySelectorAll(".paciente");
var botao = document.querySelector("#adicionar-paciente");

for(var i = 0; i < pacientes.length; i++){

 	var trPaciente = pacientes[i];
	var tdPeso = trPaciente.querySelector(".info-peso").textContent;
	var tdAltura = trPaciente.querySelector(".info-altura").textContent;
	var tdImc = trPaciente.querySelector(".info-imc");

	var pesoEhValido = validaPeso(tdPeso);
	var alturaEhValida = validaAltura(tdAltura);

	if(!pesoEhValido){
		tdImc.textContent = "Peso Inválido!!!";
		trPaciente.classList.add("paciente-invalido");
		pesoEhValido = false;
		
	}

	if(!alturaEhValida){
		tdImc.textContent = "Altura Invalida!";
		alturaEhValida = false;
		trPaciente.classList.add("paciente-invalido");
	}

	if(pesoEhValido && alturaEhValida){
	var imc = calculaImc(tdPeso, tdAltura);
	tdImc.textContent = imc;
	}
}

function validaPeso(tdPeso){
	if(tdPeso > 0 && tdPeso <= 250){
		return true;
	}else {
		return false;
	}
}

function validaAltura(tdAltura){
	if(tdAltura > 0 && tdAltura <= 2.50){
		return true;
	}else{
		return false;
	}
}

function calculaImc(tdPeso, tdAltura){
	var imc = 0;
	imc = tdPeso / (tdAltura * tdAltura);

	return imc.toFixed(2);
}
