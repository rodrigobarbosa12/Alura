/* @flow */

export type Loading = {
    show: Function,
    hide: Function,
};

export type RespostaUpload = {
    link: string,
};

export type PhpException = {
    code: number,
    message: string,
};

export type VoucherTipo = 'R$' | '%';

export type StateColors = 'success'
    | 'warning'
    | 'danger'
    | 'info'
    | 'primary'
    | 'secondary'
    | 'warning'
    | 'brand'
    | 'accent'
    | 'focus'
    | 'metal'
    | 'light';
