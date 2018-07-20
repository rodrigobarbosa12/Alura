# Grid

Submodulo de javascript para criação de grid

#### Adicionando submódulo a um projeto
git submodule add -f -b master --name grid git@gitlab.com:maxscalla/grid.git public/app/grid
git commit -m 'Adicionando submodulo'
git push
```


## Exemplo de implementação

#### GridCores.js
```js
import Grid from './../grid';
import type { Cor } from './types';

export default class GridCores extends Grid {
    colunas = ['id', 'nome', 'codigo_cor'];

    executarPorLinha(
        tr: HTMLTableSectionElement,
        cor: Cor
    ) {
        const btnEditar = tr.getElementsByTagName('button')[0];
        btnEditar.addEventListener('click', () => this.editarCor(cor));
    }
}
```

#### index.js
```js
/* @flow */

import GridCores from './GridCores';

const tabelas = document.getElementsByClassName('grid');
const grid = new GridCores('/cores', tabelas[0]);

grid.montarTabelaCompleta(window.ValoresDaGrid);

```

#### HTML

```html
<body>
    <div class="grid">
        <div class="grid__tabela">
            <!-- FORMULARIO DE PESQUISA -->
            <form>
                <select name="quantidade">
                    <option value="10">10</option>
                    <option value="15">15</option>
                </select>
                <select name="coluna">
                    <option value="" data-tipo="string">Todas</option>
                    <option value="nome" data-tipo="string">Nome</option>
                </select>
                <select name="opcao">
                    <option value="contendo" data-tipo="string" selected="seleted">
                        Contendo
                    </option>
                    <option value="iniciando" data-tipo="string">
                        Iniciando
                    </option>
                    <option value="=" data-tipo="number" style="display: none">
                        = Igual
                    </option>
                    <option value="<" data-tipo="number" style="display: none">
                        < Menor
                    </option>
                    <option value="<=" data-tipo="number" style="display: none">
                        ≦ Menor ou igual
                    </option>
                    <option value=">" data-tipo="number" style="display: none">
                        >Maior
                    </option>
                    <option value=">=" data-tipo="number" style="display: none">
                        ≧ Maior ou igual
                    </option>
                </select>
                <input type="search"name="valor"required="required" />
                <button type="submit">Pesquisar</button>
                <button type="reset">Limpar</button>
            </form>
            <!-- TABELA -->
            <table>
                <thead>
                    <tr>
                        <!-- ORDENAÇÃO -->
                        <th class="sorting" data-coluna="nome">
                            Nome
                        </th>
                        <th>
                            Editar
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <script type="text/template">
                        {{#data}}
                            <tr>
                                <td>{{nome}}</td>
                                <td><button></button></td>
                            </tr>
                        {{/data}}
                    </script>
                </tbody>
            </table>
            <!-- PAGINACAO -->
            <div class="paginacao row">
                <script type="text/template">
                    {{#totais}}
                        <div>
                            Página {{pagina}} de {{quantidadePaginas}}
                            Total {{totalRegistros}}
                        </div>
                    {{/totais}}
                    <ul>
                        <li class="paginacao--anterior {{#disableAnterior}}disabled{{/disableAnterior}}">
                            <a href="javascript:;">Anterior</a>
                        </li>
                        {{#paginas}}
                            <li class="{{#active}}active{{/active}} {{#disabled}}disabled{{/disabled}}">
                                <a href="javascript:;" class="paginacao--pagina">{{pagina}}</a>
                            </li>
                        {{/paginas}}
                        <li class="paginacao--proximo {{#disableProximo}}disabled{{/disableProximo}}">
                            <a href="javascript:;">Próximo</a>
                        </li>
                    </ul>
                </script>
            </div>
        </div>
        <div class="grid__formulario">
            <form>
                <input type="text" name="nome">
            </form>
        </div>
    </div>
</body>
```
