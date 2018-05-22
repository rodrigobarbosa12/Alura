
				var decodeHTML = function (html) {
					var txt = document.createElement('textarea');
					txt.innerHTML = html;
					return txt.value;
				};

				var nomes = document.querySelectorAll(".result-text .text-wrap > h4");
				var precos = document.querySelectorAll(".result-text .result-actions > span");
				var descricao = document.querySelectorAll(".result-text .text-wrap > p");
				var imagens = document.querySelectorAll(".result-text .photo-item > img");

				var a = document.createElement('a');
				var data_type = 'data:application/vnd.ms-excel';
				var table_html = `
					<table>
						<tr>
					      <th>nome</th>
					      <th>descricao</th>
					      <th>preco</th>
					      <th>imagem</th>
					    </tr>`;


			    imagens.forEach((item, i) => {
					nome = decodeHTML(nomes[i].textContent);
					console.log(nome);
					preco = precos[i].innerText.replace( /^\D+/g, '');
					descri = descricao[i].innerText;
					url_imagem = item.src;

					table_html += `<tr>
				        <td>${nome}</td>
				        <td>${descri}</td>
				   		<td>${preco}</td>
				   		<td>${url_imagem}</td>
				    </tr>`;

			    });

				table_html += '</table>';
				var table_html_export = table_html.replace(/ /g, '%20');
				a.href = data_type + ', ' + table_html_export;
				a.download = 'novo_teste.xls';
				a.click();
