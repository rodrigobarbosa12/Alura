<!-- 	// $dom = new DOMDocument();
	// $dom->loadHTML($pagina);


// echo'<pre>';
// var_dump(get_class_methods(DOMDocument));
// die();

// 	$tabela = $dom->getElementsByTagName('a');
// 	foreach ($tabela as $item) {
// 	    echo $item->getAttribute('href');
// 	    echo'</br>';
	// } -->

<?php
	// $url = $_POST['bk.php'];
	$pagina = file_get_contents('bk.php');
?>


<!DOCTYPE html>
<html>
<head>
	<title>Importando</title>
</head>
<body>



   <form>
   			</br>
            	<button id="bota1">Pegar</button> </br>
            </br>
            <table border="1" id="tabela-cardapio">
						<thead>
					      <th>nome</th>
					      <th>preco</th>
					      <th>descrição</th>
					      <th>imagem</th>
					    </thead>
					    <tr>
					      
			</table>
			</br>
         <!--         <script src="capturar.js"></script> -->
                 <!-- <script src="XMLHttpRequest.js"></script> -->
        </form>



<script>
var botao = document.querySelector("#bota1");

			botao.addEventListener("click", event => {
				event.preventDefault();
			 	pegar();
			});

		var arrayJs = [];

			function pegar(){

				var nomes = document.querySelectorAll(".result-text .text-wrap > h4");
				var precos = document.querySelectorAll(".result-text .result-actions > span");
				var descricao = document.querySelectorAll(".result-text .text-wrap > p");
				var imagens = document.querySelectorAll(".result-text .photo-item > img");
				nomes.forEach((item, i) => {
						arrayJs[i] = item.textContent;
						preco = precos[i].innerText;
						descri = descricao[i].textContent;
						imagem = imagens[i].src.toString();

						
				adicionaNaTabela(item.textContent, preco, descri, imagem);

						$.ajax({
							url: 'inserir.php',
							method: 'POST',
							data: {nome: item.textContent, precos: preco, descricao: descri, imagen: imagem},
							success: function(res){
								console.log(res);
							}
						});
					});
					
				// var nomes = "rodrigo";
				// var precos = "123";
				// var descri = "asd";
				// var imagem = "www.com.br";

		
					
							
				function adicionaNaTabela(item, preco, descri, imagem){

					var tr = montarTr(item, preco, descri, imagem);
					var tabela = document.querySelector("#tabela-cardapio");
					tabela.appendChild(tr);
				}

				function montarTr(item, preco, descri, imagem){
					var tr = document.createElement("tr");
					tr.appendChild(montarTd(item,"info-nome"));
					tr.appendChild(montarTd(preco, "info-preco"));
					tr.appendChild(montarTd(descri, "info-descri"));
					tr.appendChild(montarTd(imagem, "info-imagem"));
					return tr;
				}

				function montarTd(dado, classe){
					var td = document.createElement("td"),
					name = document.createAttribute("name");

					name.nodeValue = "nome";
					td.setAttributeNode(name);

					td.textContent = dado;
					td.classList.add(classe);

					return td;
				}
	}


</script>

<script type="text/javascript">
	var msg = "<?php echo $pagina;?>";
</script>

</body>
</html>



