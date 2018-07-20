/* @flow */

import type { Loading } from './types';

const hide = (elemento: ?string = 'body') => {
    global.mApp.unblock(elemento);
};

const show = (elemento: ?string = 'body', message: ?string = 'Aguarde') => {
    global.mApp.block(elemento, {
        overlayColor: '#000000',
        type: 'loader',
        state: 'success',
        message,
    });
};

const loading: Loading = {
    hide,
    show,
};

export default loading;
