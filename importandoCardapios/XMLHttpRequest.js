
botao = document.querySelector("#bota1");
	console.log(botao);
	botao.addEventListener("click", event => {
	event.preventDefault();

		var xhr = new XMLHttpRequest();
		xhr.open("GET", "https://www.youtube.com/?gl=BR&hl=pt");
		xhr.addEventListener("load", function(){
			console.log(xhr.responseText);
		})
		xhr.send();

	});