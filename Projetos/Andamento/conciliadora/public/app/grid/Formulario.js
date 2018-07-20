/* @flow */

import formSerialize from 'form-serialize';
import xhr from '../utils/xhr';
import applyLoading from '../utils/apply-loading';
import notificarErro from '../utils/notificar-erro';

const post = applyLoading(xhr.post);
const put = applyLoading(xhr.put);

export default class Formulario {
    form: HTMLFormElement;

    portletGrid: HTMLElement;

    portletForm: HTMLElement;

    grid: Object;

    constructor(grid: Object) {
        const portletForm = grid.container.querySelector('.grid__formulario');
        const portletGrid = grid.container.querySelector('.grid__tabela');
        if (!portletForm || !portletGrid) {
            return;
        }
        const form = portletForm.querySelector('form:not(.grid__filtro)');
        if (!(form instanceof HTMLFormElement)) {
            return;
        }

        this.portletGrid = portletGrid;
        this.form = form;
        this.portletForm = portletForm;
        this.grid = grid;
    }

    /**
     * Seta os valores do objeto no formulario de acordo com as chaves
     * @param  {Object} obj
     */
    preencher(dados: Object) {
        Object.keys(dados).forEach((name) => {
            if (!this.form[name] || typeof dados[name] === 'undefined') {
                return;
            }

            const input: any = this.form[name];
            const valor = dados[name];

            if (input.type === 'checkbox') {
                input.checked = valor;
                return;
            }

            if (input instanceof NodeList) {
                input.value = +valor;
                return;
            }

            if (input.type !== 'file') {
                input.value = valor;
            }
        });
    }

    /**
     * Insere de acordo com os dados do formulario
     * @return {Promise}
     */
    inserir() {
        const dadosForm = this.getDadosForm();
        return post(this.grid.url, dadosForm).then((r) => {
            this.esconder();
            return r.data;
        }).catch((err) => {
            notificarErro(err);
            return Promise.reject(err);
        });
    }

    /**
     * Edita um usuario de acordo com o id e os dados do formulario
     * @return {Promise}
     */
    editar() {
        const dados = this.getDadosForm();
        const codigo = dados.id || dados.codigo;
        return put(`${this.grid.url}/${codigo}`, dados).then((obj) => {
            this.esconder();
            return obj;
        }).catch((err) => {
            notificarErro(err);
            return Promise.reject(err);
        });
    }

    reset() {
        const inputId = this.form.elements.namedItem('id');
        if (inputId instanceof HTMLInputElement) {
            inputId.value = '';
        }
        this.form.reset();
    }

    /**
     * Monta um objeto de acoro com os dados do formulario
     * @return {Object}
     */
    getDadosForm(): Object {
        return formSerialize(this.form, { hash: true, empty: true });
    }

    /**
     * Mostra o portlet de formulario e esconde o da grid
     */
    mostrar() {
        this.portletGrid.style.display = 'none';
        this.portletForm.style.display = 'block';
        const input = this.form.querySelector('[tabindex="0"]');
        if (input) {
            input.focus();
        }
    }

    /**
     * Esconde o portlet de formulario e mostra o da gri
     */
    esconder() {
        this.portletGrid.style.display = 'block';
        this.portletForm.style.display = 'none';
    }
}
