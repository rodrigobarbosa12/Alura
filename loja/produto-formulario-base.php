

			<tr>
				<td>Nome</td>
				<td> <input class="form-control" type="text" name="nome" value="<?=$produto->getNome()?>"></td>
			</tr>
			<tr>
				<td>Preço</td>
				<td><input  class="form-control" type="number" name="preco" value="<?=$produto->getPreco()?>"></td>
			</tr>
			<tr>
				<td>Descrição</td>
				<td><textarea class="form-control" name="descricao"><?=$produto->getDescricao()?></textarea></td>
			</tr>
			<tr>
				<td><input type="checkbox" name="usado" <?=$produto->getUsado()?> value="true"> Usado</td>
			</tr>
			<?php
				$usado = $produto->getUsado() ? "checked='checked'" : "";
			?>
			
				<tr>
				<td>Categoria</td>
				<td>
					<select name="categoria_id" class="form-control">
					<?php foreach($categorias as $categoria) : 
						$essaEhACategoria = $produto->getCategoria()->getId() == $categoria->getId();
						$selecao = $essaEhACategoria ? "selected='selected'" : "";
						?>
						<option value="<?=$categoria->getId()?>" <?=$selecao?>>
								<?=$categoria->getNome()?>
						</option>
					<?php endforeach ?>
					</select>
				</td>
			</tr>