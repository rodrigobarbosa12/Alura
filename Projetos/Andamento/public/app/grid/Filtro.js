/* @flow */

import qs from 'qs';

import type { Filtro as FiltroType, TipoOpcao, ValoresFormulario } from './types';

export const TipoOpcaoEnum: {
    [string]: TipoOpcao,
} = {
    string: 'string',
    number: 'number',
};

export default class Filtro {
    form: HTMLFormElement;

    quantidade: HTMLSelectElement;

    coluna: HTMLSelectElement;

    opcao: HTMLSelectElement;

    valor: HTMLInputElement;

    constructor(form: HTMLFormElement) {
        this.form = form;
        // $FlowFixMe
        this.quantidade = form.quantidade;
        // $FlowFixMe
        this.coluna = form.coluna;
        // $FlowFixMe
        this.opcao = form.opcao;
        // $FlowFixMe
        this.valor = form.valor;
        this.setEventoAlteraOpcao(this.coluna);
    }

    getFiltro(): FiltroType | null {
        const valor = this.valor.value;
        if (!valor) return null;
        const opcao = this.opcao.value;
        const coluna = this.coluna.value;
        return { valor, opcao, coluna };
    }

    getQuantidade(): number | null {
        if (!this.quantidade) {
            return null;
        }
        return Number(this.quantidade.value) || 10;
    }

    setEventoAlteraOpcao(select: HTMLSelectElement) {
        select.onchange = () => {
            const { dataset } = select.options[select.selectedIndex];
            const tipo = TipoOpcaoEnum[dataset.tipo];
            this.alterarOpcao(tipo);
            this.alterarTypeInput(tipo);
        };
    }

    /**
     * Altera os <option> do campo opcões de acordo como data-tipo do <select name="coluna">
     * @param  {String} tipo
     */
    alterarOpcao(tipo: TipoOpcao) {
        const options = Array.from(this.opcao.options);
        options.forEach((option) => {
            const display = option.dataset.tipo === tipo
                ? 'block'
                : 'none';

            option.style.display = display;
        });

        this.selecionarPrimeiroOptionValorVisivel();
    }

    /**
     * seleciona o primeiro <option> do <select name="opcao"> com display: block
     */
    selecionarPrimeiroOptionValorVisivel() {
        Array.from(this.opcao.options).every((option) => {
            if (option.style.display === 'block') {
                option.selected = true;
                return false;
            }
            return true;
        });
    }

    /**
     * Altera os <input> do campo valor de acordo como data-tipo do <select name="coluna">
     * @param  {String} tipo
     */
    alterarTypeInput(tipo: TipoOpcao) {
        if (tipo === 'number') {
            this.valor.type = 'number';
        } else if (tipo === 'string') {
            this.valor.type = 'search';
        }
    }

    /**
     * Seta os valores do objeto no formulario de acordo com as chaves
     * @param  {Object} obj
     */
    setValoresQuery() {
        const query: ValoresFormulario = qs.parse(global.location.search.substr(1));
        if (query.quantidade) {
            this.quantidade.value = String(query.quantidade);
        }
        if (query.filtro && query.filtro.valor) {
            this.valor.value = query.filtro.valor;
            this.coluna.value = query.filtro.coluna;
            this.opcao.value = query.filtro.opcao;
        }
    }
}
