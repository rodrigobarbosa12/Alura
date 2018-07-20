/* @flow */

import Mustache from 'mustache';

import type { Count } from './types';

type ArrayPaginas = Array<{
    pagina: string | number,
    disabled?: boolean,
    active?: boolean,
}>;

type View = {
    totais: Count,
    paginas: ArrayPaginas,
    disableProximo: boolean,
    disableAnterior: boolean,
    mensagemItensSelecionados: string,
};

/**
 * Monta array a com números a partir do indice 1
 * @param  {number} qtd
 * @return {Array<number>}
 */
const range = (qtd: number) => {
    const ar = [];
    for (let i = 1; i <= qtd; i += 1) ar.push(i);
    return ar;
};

/**
 * @description
 * Método que retorna a os itens que devem ser mostrados na páginação,
 *  o array deve conter até 7 digitos sempre.
 *
 * 4 é o número do centro inicialmente.
 *
 * (quantidadePaginas - 4) é o primeiro número após as reticências quando a páginação está
 *  acabando.
 *
 * Quando a páginação está no entre o inicio 4 e (quantidadePaginas - 4)
 *  deve exibir a 1, ... , pag - 1, pag, pag + 1.
 *
 * @example
 * Caso quantidadePaginas = 10:
 * O número entre () é a página atual
 * ------------------------------
 * |(1)| 2 | 3 | 4 | 5 |...| 10 | -> 4 no centro
 * | 1 |(2)| 3 | 4 | 5 |...| 10 |
 * | 1 | 2 |(3)| 4 | 5 |...| 10 |
 * | 1 | 2 | 3 |(4)| 5 |...| 10 | -> 4 no centro
 * ------------------------------
 * | 1 |...| 4 |(5)| 6 |...| 10 | -> pagina no centro
 * | 1 |...| 5 |(6)| 7 |...| 10 | -> pagina no centro
 * ------------------------------
 * | 1 |...| 6 |(7)| 8 | 9 | 10 | -> (quantidadePaginas - 4) após as reticências
 * | 1 |...| 6 | 7 |(8)| 9 | 10 |
 * | 1 |...| 6 | 7 | 8 |(9)| 10 |
 * | 1 |...| 6 | 7 | 8 | 9 |(10)| > (quantidadePaginas - 4) após as reticências
 * -----------------------------
 * @param {Count} count
 * @return {Array<string|number}
 */
const montarItensPaginas = (count: Count): Array<string | number> => {
    const { quantidadePaginas: qtd, pagina: pag } = count;
    if (qtd < 7) return range(qtd);
    if (pag <= 4) return [1, 2, 3, 4, 5, '...', qtd];
    if (pag > qtd - 4) return [1, '...', qtd - 4, qtd - 3, qtd - 2, qtd - 1, qtd];
    return [1, '...', pag - 1, pag, pag + 1, '...', qtd];
};

export default class Paginacao {
    grid: Object;

    container: ?HTMLElement;

    pagina: number = 0;

    template: string;

    constructor(grid: Object) {
        this.grid = grid;
        const container = grid.container.getElementsByClassName('paginacao')[0];
        if (container) {
            const template = container.getElementsByTagName('script');
            this.template = template[0].innerHTML;
            this.container = container;
        }
    }

    render(count: Count, mensagemItensSelecionados: string) {
        this.pagina = (count.pagina - 1);

        if (!this.container) {
            return;
        }
        const { container } = this;

        const paginas = montarItensPaginas(count).map(pagina => ({
            pagina,
            active: pagina === count.pagina,
            disabled: pagina === '...',
        }));

        container.innerHTML = this.montarString({
            totais: count,
            paginas,
            disableProximo: count.quantidadePaginas <= (count.pagina),
            disableAnterior: count.pagina <= 1,
            mensagemItensSelecionados,
        });

        this.setEventos();
    }

    montarString(view: View): string {
        return Mustache.render(this.template, view);
    }

    setEventos() {
        if (!this.container) {
            return;
        }
        const { container } = this;
        const btnPaginas = container.getElementsByClassName('paginacao--pagina');
        const btnAnterior = container.getElementsByClassName('paginacao--anterior')[0];
        const btnProximo = container.getElementsByClassName('paginacao--proximo')[0];

        btnAnterior.onclick = () => {
            if (!btnAnterior.classList.contains('disabled')) {
                this.anterior();
            }
        };

        Array.from(btnPaginas).forEach((btn) => {
            const pagina = Number(btn.innerHTML);
            btn.addEventListener('click', () => this.grid.irParaPagina(pagina));
        });

        btnProximo.onclick = () => {
            if (!btnProximo.classList.contains('disabled')) {
                this.proximo();
            }
        };
    }

    esconderPaginacao() {
        if (this.container) {
            this.container.style.visibility = 'hidden';
        }
    }

    mostrarPaginacao() {
        if (this.container) {
            this.container.style.visibility = '';
        }
    }

    /**
     * @return {Promise}
     */
    anterior(): Promise<any> {
        if (
            this.pagina > 0
            && this.grid
            && this.grid.url
        ) {
            this.pagina -= 1;
            this.grid.linhaSelecionada = this.grid.getValoresFormulario().quantidade - 1;
            return this.grid.pesquisar();
        }
        return Promise.resolve();
    }

    /**
     * Faz a pesquisa da próxima página
     * Valida se a página existe
     * @return {Promise}
     */
    proximo(): Promise<any> {
        if (
            this.grid.temResposta()
            && this.grid.url
            && this.grid.resposta.length >= this.grid.getValoresFormulario().quantidade
        ) {
            this.pagina += 1;
            this.grid.linhaSelecionada = 0;
            return this.grid.pesquisar();
        }
        return Promise.resolve();
    }

    reset() {
        this.pagina = 0;
    }
}
