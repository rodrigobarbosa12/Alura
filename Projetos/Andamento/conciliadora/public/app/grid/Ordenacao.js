/* @flow */

import type { Ordenacao as OrdenacaoType } from './types';

const CLASS_SORTING = 'sorting';
const CLASS_SORTING_ASC = 'sorting_asc';
const CLASS_SORTING_DESC = 'sorting_desc';

const ORDER_ASC = 'asc';
const ORDER_DESC = 'desc';

/**
 * Controla a ordenação da grid
 * Os elementos de ordenação:
 * - São as tags TH
 * - Devem conter a classe [.sorting]
 * - Devem conter a propriedade [data-coluna=XXX] com a coluna que irá buscar
 *
 * Para definir a ordenação padrão, uma das TH devem:
 * - Substituir a classe [.sorting] por [.sorting_'XXX'] com o sentido "asc|desc"
 * - Conter a propriedade [data-ordem=XXX] com o sentido "asc|desc"
 */
export default class Ordenacao {
    tableHead: Array<HTMLElement>;

    container: HTMLElement;

    colunas: Array<string> = [];

    constructor(container: HTMLElement) {
        this.container = container;
        this.tableHead = Array.from(container.querySelectorAll('th[data-coluna]'));
        this.colunas = this.tableHead.map(elemento => elemento.dataset.coluna);
    }

    /**
     * Altera o valor da ordenação anterior para o novo e remonta a tabela
     * @param {HTMLElement}
     */
    ordenar(elemento: HTMLElement) {
        if (!elemento.dataset.coluna) return;

        this.tableHead.forEach((coluna) => {
            if (!coluna.isSameNode(elemento)) {
                coluna.classList.add(CLASS_SORTING);
                delete coluna.dataset.ordem;
            }
            coluna.classList.remove(CLASS_SORTING_ASC);
            coluna.classList.remove(CLASS_SORTING_DESC);
        });

        const { classList, dataset } = elemento;

        let ordem = ORDER_ASC;
        let classe = CLASS_SORTING_ASC;

        if (dataset.ordem === ORDER_ASC) {
            ordem = ORDER_DESC;
            classe = CLASS_SORTING_DESC;
        }

        dataset.ordem = ordem;
        classList.add(classe);
        classList.remove(CLASS_SORTING);
    }

    /**
     * Retorna a string para incluir na query da grid
     * @return {String}
     */
    getOrder(): string {
        const order = this.getObjeto();
        if (!order || !order.coluna || !order.ordem) return '';
        return `${order.coluna} ${order.ordem}`;
    }

    /**
     * Retorna a string para incluir na query da grid
     * @return {OrdenacaoType}
     */
    getObjeto(): OrdenacaoType {
        const elemento = this.container.querySelector('[data-coluna][data-ordem]');
        if (!elemento) return { coluna: '', ordem: '' };
        const { coluna, ordem } = elemento.dataset;
        return { coluna, ordem };
    }

    /**
     * A ordenação é removida
     */
    esconder() {
        this.tableHead.forEach((coluna) => {
            coluna.classList.remove(CLASS_SORTING);
            coluna.classList.remove(CLASS_SORTING_ASC);
            coluna.classList.remove(CLASS_SORTING_DESC);
            delete coluna.dataset.coluna;
            delete coluna.dataset.ordem;
        });
    }

    /**
     * Inclui a ordenação sem valor padrão
     * @todo manter o padrão das ordenações
     */
    mostrar() {
        this.tableHead.forEach((coluna, indice) => {
            coluna.classList.add(CLASS_SORTING);
            coluna.dataset.coluna = this.colunas[indice];
        });
    }
}
