

$(function(){
	contaPalavras();
	atualizaContadores();
	inicializaContagemR();
	botaoReiniciar();
});

var campo = $(".area");
var tempoInicial = $("#contador-tempo").text();
var botao = $("#botao-reiniciar");

function contaPalavras(){
	var frase = $(".frase").text();
	var numeroDePalavras = frase.split(/\s+/).length;
	var tamanhoDaFrase = $(".conta-palavras");
	tamanhoDaFrase.text(numeroDePalavras);
}

function atualizaContadores(){
	campo.on("input", function(){
		var conteudo = campo.val();
		var contaPalavras = conteudo.split(/\s+/).length -1;
		$("#contador-palavras").text(contaPalavras);
		var contaCaracteres = conteudo.length;
		$("#contador-caracteres").text(contaCaracteres);
	});
}

function inicializaContagemR(){	
	var tempoRestante = tempoInicial;
	campo.one("focus", function(){
		var contagemR = setInterval(function(){	
		tempoRestante--;
		$("#contador-tempo").text(tempoRestante);
			if(tempoRestante < 1 ){
				campo.attr("disabled", true);
				clearInterval(contagemR);
				campo.toggleClass("campo-desativado");
			}
		}, 1000)
	});
}

function botaoReiniciar(){
	botao.click(function(){
	campo.attr("disabled", false);
	campo.val("");
	$("#contador-tempo").text(tempoInicial);
	$("#contador-palavras").text("0");
	$("#contador-caracteres").text("0");
	inicializaContagemR();
	campo.toggleClass("campo-desativado");
	});
}
