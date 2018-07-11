

	function pegar(){

		var map={"â":"a","Â":"A","à":"a","À":"A","á":"a","Á":"A","ã":"a","Ã":"A","ê":"e","Ê":"E","è":"e","È":"E","é":"e","É":"E","î":"i","Î":"I","ì":"i","Ì":"I","í":"i","Í":"I","õ":"o","Õ":"O","ô":"o","Ô":"O","ò":"o","Ò":"O","ó":"o","Ó":"O","ü":"u","Ü":"U","û":"u","Û":"U","ú":"u","Ú":"U","ù":"u","Ù":"U","ç":"c","Ç":"C"};
		function removerAcento(s){ return s.replace(/[\W\[\] ]/g,function(a){return map[a]||a}) };

		var a = document.createElement('a');
		var data_type = 'data:application/vnd.ms-excel';

		var table_html = `
		    <table charset="utf-8">
		        <tr>
			        <th>categoria</th>
			        <th>nome</th>
			        <th>descricao</th>
			        <th>preco</th>
		        <th>imagem</th>
		    </tr>`;

		var categorias = document.querySelectorAll("#categoryFilter option");
		categorias.forEach( (elemento, i) => {
			var elementoId = document.getElementById(elemento.value);

			if (elementoId) {
				var categoria = removerAcento(elementoId.querySelector(".headline > h3").textContent);
				var nomes = elementoId.querySelectorAll(".text-wrap > h4");
				var precos = elementoId.querySelectorAll(".result-actions > span");
				var descricao = elementoId.getElementsByTagName("p");
				var imagens = elementoId.querySelectorAll(".photo-item > img");

				nomes.forEach((item,i) => {
					nome = removerAcento(item.innerText);
					preco = precos[i].innerText.replace( /^\D+/g,'');
					descri = removerAcento(descricao[i].innerText);
					url_imagem = '';
					if(imagens[i]){
						url_imagem = imagens[i].src;
					}
				    table_html += `<tr>
				    	<td>${categoria}</td>
				        <td>${nome}</td>
				        <td>${descri}</td>
				        <td>${preco.replace(',','.')}</td>
				        <td>${url_imagem}</td>
				    </tr>`;
				});
			}
		});

		table_html += '</table>';
		console.log(table_html);
		var table_html_export = table_html.replace(/ /g, '%20');
		a.href = data_type + ', ' + table_html_export;
		a.download = 'novo_teste.xls';
		a.click();

	}
