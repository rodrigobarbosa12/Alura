/* @flow */

import Mustache from 'mustache';
import xhr from '../utils/xhr';
import Ordenacao from './Ordenacao';
import Paginacao from './Paginacao';
import Filtro from './Filtro';
import Formulario from './Formulario';
import applyLoading from '../utils/apply-loading';

import type { ValoresFormulario, Retorno } from './types';

const get = applyLoading(xhr.get);

const templateQuantidadeItensSelecionados = (qtd: number) => {
    if (qtd === 0) {
        return '';
    }

    if (qtd === 1) {
        return '1 selecionado.';
    }

    return `${qtd} selecionados.`;
};

export default class Grid {
    /**
     * Onde a grid será construida
     *
     * Requisitos:
     *  - .grid__formulario
     *  - .grid__tabela
     *  - Template (Mustache)
     *  - Footer com paginação
     *
     * @type {HTMLElement}
     */
    container: HTMLElement;

    /**
     * Url de pesquisa
     * @interface
     * @type {String}
     */
    url: string;

    /**
     * Reposta de ultima pesquisa realizada
     * @type {Object}
     */
    resposta: Array<Object> = [];

    /**
     * Formlulario de onde vem o objeto para pesquisa na grid
     * @type {Filtro}
     */
    filtro: Filtro;

    /**
     * @type {Ordenacao}
     */
    ordenacao: Ordenacao;

    /**
     * Controla a páginacao das grids
     * @type {Paginacao}
     */
    paginacao: Paginacao;

    /**
     * Formulario que edita e insere registros
     * @type {Formulario}
     */
    formulario: Formulario;

    /**
     * @type {Number}
     */
    linhaSelecionada: number = 0;

    /**
     * @type {Number}
     */
    // quantidade: number = 10;

    /**
     * @type {String} html para uso do Mustache
     */
    template: string;

    /**
     * Elemento onde a grid é escrita
     * @type {HTMLTableElement}
     */
    table: HTMLTableElement;

    colunas: Array<string>;

    templateNaoEncontrado: string = 'Procuramos por <b>{{pesquisa}}</b> e não encontramos nenhum resultado.';

    /**
     * @type {Array<Object>}
     */
    itensSelecionados: Array<Object> = [];

    /**
     * Chave utilizada para identificar o registro
     *
     * @type string
     */
    identifierName: string = 'id';

    /**
     * Checkbox que marca todas colunas
     */
    thCheckbox: HTMLInputElement;

    /**
     * Seta os eventos na tabela por linha
     * @return  {HTMLTableRowElement}
     */
    _executarPorLinha: (row: HTMLTableRowElement, obj: Object) => void;

    constructor(url: string, container: HTMLElement) {
        const filtro = container.querySelector('.grid__tabela form');
        const [table] = container.getElementsByTagName('table');
        this.table = table;
        const template = this.table.querySelector('script[type="text/template"]');

        this.url = url;
        this.container = container;
        this.formulario = new Formulario(this);
        this.paginacao = new Paginacao(this);
        this.ordenacao = new Ordenacao(container);

        if (filtro instanceof HTMLFormElement) {
            this.filtro = new Filtro(filtro);
        }

        if (template) {
            this.template = template.innerHTML;
        }


        const thCheckbox = this.table.tHead.querySelector('input[type="checkbox"]');
        if (thCheckbox instanceof HTMLInputElement) {
            this.thCheckbox = thCheckbox;
        }

        this.setEventosGrid();
    }

    setEventosGrid() {
        this.setEventoCheckboxTableHead();
        this.setEventoPesquisa();
        this.setEventosOrdenacao();
        this.setEventoResetForm();
        this.setEventosFormulario();
        this.filtro.setValoresQuery();
    }

    /**
     * Seta o evento de pesquisar nas grids
     * Não recarrega a página
     * Reseta a paginacao
     * Reseta o indice da tr dos atalhos
     * @return  {undefined}
     */
    setEventoPesquisa() {
        this.filtro.form.onsubmit = (e) => {
            e.preventDefault();
            this.paginacao.reset();
            this.linhaSelecionada = 0;
            this.pesquisar();
            return false;
        };
        const selectQuantidade = this.filtro.form.elements.namedItem('quantidade');

        if (selectQuantidade) {
            selectQuantidade.onchange = () => this.filtro.form.dispatchEvent(new Event('submit'));
        }
    }

    /**
     * Checka todas as checkbox da tabela de acordo com o checkbox da Head
     */
    setEventoCheckboxTableHead() {
        if (!this.thCheckbox) {
            return;
        }

        this.thCheckbox.onchange = (e) => {
            Array.from(this.table.tBodies[0].rows).forEach((row, indiceLinha) => {
                const inputs = row.getElementsByTagName('input');
                const checkbox = Array.from(inputs).find(input => input.type === 'checkbox');
                if (checkbox && checkbox.checked !== e.target.checked) {
                    const objeto = this.resposta[indiceLinha];
                    checkbox.checked = e.target.checked;
                    this.marcarCheckbox(checkbox, objeto);
                }
            });
        };
    }

    /**
     * Seta os eventos da ordenação do grid
     */
    setEventosOrdenacao() {
        this.table.querySelectorAll('[data-coluna]').forEach((coluna) => {
            coluna.onclick = () => {
                this.ordenacao.ordenar(coluna);
                this.paginacao.reset();
                this.pesquisar();
            };
        });
    }

    setEventoResetForm() {
        this.filtro.form.onreset = () => {
            setTimeout(() => {
                this.filtro.selecionarPrimeiroOptionValorVisivel();
                this.paginacao.reset();
                this.resetCheckboxes();
                this.pesquisar();
            });
        };
    }

    setEventosFormulario() {
        Array.from(this.container.querySelectorAll('.voltar')).forEach((btnVoltar) => {
            btnVoltar.onclick = () => this.cliqueEsconder();
        });

        const btnAdicionar = this.container.querySelector('.adicionar');
        if (btnAdicionar) {
            btnAdicionar.onclick = () => this.cliqueAdicionar();
        }
    }

    cliqueEsconder() {
        this.formulario.esconder();
        this.resetCheckboxes();
    }

    cliqueAdicionar() {
        this.formulario.mostrar();
        this.formulario.reset();
        this.formulario.form.onsubmit = (e: Event) => {
            e.preventDefault();
            this.formulario.inserir()
                .then(() => {
                    this.pesquisar();
                });
            return false;
        };
    }

    /**
     * Faz a pesquisa da tabela utilizando, busca a pagina e a ordenação
     * @param   {Object}    post
     * @return  {Promise}
     */
    pesquisarCom(params: ValoresFormulario) {
        if (document.activeElement) document.activeElement.blur();
        if (!params.filtro) delete params.filtro;
        const termo = params.filtro ? params.filtro.valor : null;
        return get(this.url, { params })
            .then(resp => this.montarTabelaCompleta(resp.data, termo));
    }

    /**
     * this.montarTabela(data.data, termoPesquisa);
     * Busca os dados do formulario e faz a pesquisa
     */
    pesquisar() {
        return this.pesquisarCom(this.getValoresFormulario());
    }

    /**
     * Avança o usuário para uma página específica
     */
    irParaPagina(pagina: number): Promise<any> {
        if (this.paginacao.pagina === pagina - 1) return Promise.resolve();
        return this.pesquisarCom({ ...this.getValoresFormulario(), pagina: pagina - 1 });
    }

    /**
     * @param  {Retorno} data          [description]
     * @param  {?String} termoPesquisa [description]
     * @return {Retorno}               [description]
     */
    montarTabelaCompleta(data: Retorno, termoPesquisa: ?string): Retorno {
        if (data.data instanceof Array) {
            this.montarTabela(data.data, termoPesquisa);
        } else if (data instanceof Array) {
            this.montarTabela(data, termoPesquisa);
        }
        const qtd = this.itensSelecionados.length;
        if (data.count) {
            // $FlowFixMe
            this.paginacao.render(data.count, templateQuantidadeItensSelecionados(qtd));
        }
        return data;
    }

    /**
     * Monta a grid com array de objetos
     * @param {Array<Object>}   resposta        Array de objetos, geralmente resposta do banco
     * @param {String}          valorPesquisa   Usado para caso não consiga montar a tabela
     *                                exibir uma mensagem de erro, geralmente o
     *                                valor que pesquisou no banco
     */
    montarTabela(resposta: Array<Object>, termoPesquisa: ?string): Array<Object> {
        this.resposta = resposta;

        this.prepararTabela();

        if (resposta.length < 1) {
            this.mensagemNenhumResultadoEncontrado(termoPesquisa);
        }

        const tbody = this.table.tBodies[0];

        // $FlowFixMe
        const data = typeof this.processar === 'function' ? this.processar(resposta) : resposta;

        tbody.innerHTML = Mustache.render(this.template, { data });

        Array.from(tbody.rows).forEach((row, index) => {
            // $FlowFixMe
            if (typeof this.executarPorLinha === 'function') {
                this.executarPorLinha(row, resposta[index]);
            }
        });

        this.selecionarIndiceTabela();
        this.setEventoCheckboxes();
        this.carregarValoresCheckbox();

        return resposta;
    }

    /**
     * Usar este método para re escrever todo o html da tabela após modificar o objeto
     */
    remontarTabela() {
        this.montarTabela(this.resposta);
    }

    /**
     * Prepara a tabela para receber o array e montar
     */
    prepararTabela() {
        this.reset();
        this.table.style.display = '';
        this.paginacao.mostrarPaginacao();
        if (this.thCheckbox) {
            this.thCheckbox.checked = false;
        }
    }

    /**
     * Reseta os estilos da tabela
     */
    reset() {
        this.table.style.display = 'none';
        this.table.tBodies[0].innerHTML = '';
        this.paginacao.esconderPaginacao();

        const erroVazio = this.container.querySelectorAll('.alert');
        erroVazio.forEach(err => err.remove());

        const efetuePesquisa = this.container.querySelector('.efetue-pesquisa');
        if (efetuePesquisa) efetuePesquisa.style.display = 'none';
    }

    /**
     * Anteriormente esse metodo mostrava uma mensagem para o usuário efetuar uma
     * pesquisa, hoje ele efetua a pesquisa novamente sozinho fazendo um submit
     * no formulario
     */
    estadoInicial() {
        if (this.temResposta()) return;
        this.filtro.form.dispatchEvent(new Event('submit'));
    }

    /**
     * Busca os dados do formulario e faz a pesquisa
     */
    zerarResposta() {
        this.resposta = [];
        return this;
    }

    /**
     * Mostra uma mensagem na tela para saber que não foi retornado nada
     * @param {String}
     */
    mensagemNenhumResultadoEncontrado(pesquisa: ?string) {
        this.reset();
        let html = 'Nenhum resultado encontrado';
        if (pesquisa) {
            html = Mustache.render(this.templateNaoEncontrado, { pesquisa });
        }
        this.table.insertAdjacentHTML('afterend', `<div class="custom-alerts alert alert-warning">${html}</div>`);
    }

    /**
     * Mostra uma mensagem de erro na tela
     *
     * @param {string} mensagem
     */
    mostrarAlerta(mensagem: string) {
        this.reset();
        this.table.insertAdjacentHTML('afterend', `<div class="custom-alerts alert alert-warning">${mensagem}</div>`);
    }

    /**
     * Pega os dados do formulário para fazer a pesquisa
     * @return  {Object}
     */
    getValoresFormulario(): ValoresFormulario {
        return {
            filtro: this.filtro.getFiltro(),
            ordenacao: this.ordenacao.getOrder(),
            pagina: this.paginacao.pagina,
            quantidade: this.filtro.getQuantidade(),
            colunas: this.colunas,
        };
    }

    /**
     * Verifica se não existe resposta na grid
     * @return  {Boolean}
     */
    temResposta() {
        return this.resposta.length > 0;
    }

    /**
     * Seleciona proxima linha do contador do atalho
     */
    selecionarProxima() {
        if (this.linhaSelecionada < this.resposta.length - 1) {
            this.linhaSelecionada += 1;
            this.selecionarIndiceTabela();
        } else if (this.resposta.length - 1 === this.linhaSelecionada) {
            this.paginacao.proximo().then(() => {
                this.linhaSelecionada = 0;
                this.selecionarIndiceTabela();
            });
        }
    }

    /**
     * Seleciona linha anterior do contador do atalho
     */
    selecionarAnterior() {
        if (this.linhaSelecionada > 0) {
            this.linhaSelecionada -= 1;
        } else if (this.linhaSelecionada === 0) {
            this.paginacao.anterior().then((data) => {
                if (!data) return;
                this.linhaSelecionada = data.data.length - 1;
                this.selecionarIndiceTabela();
            });
        }

        this.selecionarIndiceTabela();
    }

    /**
     * Seleciona indice da tabela
     */
    selecionarIndiceTabela() {
        Array.from(this.table.tBodies[0].rows).forEach((tr, i) => {
            const isSelecionado = this.linhaSelecionada === i;

            tr.classList.toggle('selecionado', isSelecionado);

            if (isSelecionado) {
                tr.tabIndex = -1;
                tr.focus();
            }
        });
    }

    /**
     * Checka todas as checkbox da tabela de acordo com o checkbox da Head
     */
    setEventoCheckboxes() {
        this.resposta.forEach((objeto, i) => {
            const checkbox = this.getCheckboxPorIndiceLinha(i);
            if (checkbox) {
                checkbox.onchange = () => {
                    this.marcarCheckbox(checkbox, objeto);
                };
            }
        });
    }

    carregarValoresCheckbox() {
        this.resposta.forEach((objeto, i) => {
            const checked = !!this.itensSelecionados
                .find(item => item[this.identifierName] === objeto[this.identifierName]);
            const checkbox = this.getCheckboxPorIndiceLinha(i);
            if (checkbox) {
                checkbox.checked = checked;
            }
        });
    }

    atualizarTextoQuantidadeItensSelecionados() {
        const texto = templateQuantidadeItensSelecionados(this.itensSelecionados.length);
        const container = this.container.querySelector('.grid__itens-selecionados');
        if (container) {
            container.innerHTML = texto;
        }
    }

    /**
     * Retorna o checkbox da linha
     *
     * @param {number} indiceLinha
     *
     * @return {HTMLInputElement | null}
     */
    getCheckboxPorIndiceLinha(indiceLinha: number): ?HTMLInputElement {
        return Array.from(this.table.tBodies[0].rows[indiceLinha]
            .getElementsByTagName('input'))
            .find(input => input.type === 'checkbox');
    }

    marcarCheckbox(checkbox: HTMLInputElement, objeto: Object) {
        if (checkbox.type !== 'checkbox') {
            return;
        }

        if (checkbox.checked) {
            this.itensSelecionados.push(objeto);
        } else {
            const index = this.itensSelecionados
                .findIndex(item => item[this.identifierName] === objeto[this.identifierName]);
            this.itensSelecionados.splice(index, 1);
        }

        this.atualizarTextoQuantidadeItensSelecionados();
    }

    resetCheckboxes() {
        this.itensSelecionados = [];
        this.carregarValoresCheckbox();
        this.atualizarTextoQuantidadeItensSelecionados();
    }
}
