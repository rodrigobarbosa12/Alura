/* @flow */

import VanillaToasts from 'vanillatoasts';


const notificarErro = (err: Object) => {
    const { status, data } = err.response;
    VanillaToasts.create({
        title: 'Desculpe!',
        text: status < 500 ? data.mensagem || data.message : '',
        type: 'danger',
        timeout: 5000,
    });
};

export default notificarErro;
