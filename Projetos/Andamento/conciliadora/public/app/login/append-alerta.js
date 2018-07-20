/* @flow */

import sleep from '../utils/sleep';

const html = (texto: string) => `
    <div class="m-alert m-alert--outline alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        <span>${texto}</span>
    </div>
`;

const appendAlerta = async (parent: HTMLElement, texto: string) => {
    const div = document.createElement('div');
    div.innerHTML = html(texto);
    parent.insertBefore(div, parent.firstChild);
    await sleep(2500);
    div.remove();
};

export default appendAlerta;
