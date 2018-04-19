

var pacientes = document.querySelectorAll(".paciente");
var botao = document.querySelector("#adicionar-paciente");

for(var i = 0; i < pacientes.length; i++){

 trPaciente = pacientes[i];

var tdPeso = trPaciente.querySelector(".info-peso").textContent;
var tdAltura = trPaciente.querySelector(".info-altura").textContent;
var tdImc = trPaciente.querySelector(".info-imc");

var pesoEhValido = true;
var alturaEhValida = true;

if(tdPeso <= 1 || tdPeso >= 250 ){
	tdImc.textContent = "Peso Inválido!";
	pesoEhValido = false;
	trPaciente.classList.add("paciente-invalido");
}

if(tdAltura <= 0 || tdAltura >= 2.50){
	tdImc.textContent = "Altura Invalida!";
	alturaEhValida = false;
	trPaciente.classList.add("paciente-invalido");
}

if(pesoEhValido && alturaEhValida){
var imc = calculaImc(tdPeso, tdAltura);
tdImc.textContent = imc;
}
}


function calculaImc(tdPeso, tdAltura){
	var imc = 0;
	imc = tdPeso / (tdAltura * tdAltura);

	return imc.toFixed(2);
}
