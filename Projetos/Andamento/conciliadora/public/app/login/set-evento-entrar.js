/* @flow */

import formSerialize from 'form-serialize';
import entrar from './entrar';
import appendAlerta from './append-alerta';

import type { Params } from './types';

const getParametros = (form: HTMLFormElement): Params => {
    const dadosFormulario = formSerialize(form, { hash: true });

    return {
        ...dadosFormulario,
    };
};


const setEventoFormLogin = (form: HTMLFormElement) => {
    form.onsubmit = (e) => {
        e.preventDefault();
        entrar(getParametros(form))
            .catch(error => appendAlerta(form, error.response.data.message));
        return false;
    };
};

export default setEventoFormLogin;
