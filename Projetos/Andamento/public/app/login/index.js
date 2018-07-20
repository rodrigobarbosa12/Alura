/* @flow */

import setEventoEntrar from './set-evento-entrar';
import setEventoEsqueciMinhaSenha from './set-evento-esqueci-minha-senha';

const login = (form: HTMLFormElement) => {
    setEventoEntrar(form);
    setEventoEsqueciMinhaSenha();
};

export default login;
