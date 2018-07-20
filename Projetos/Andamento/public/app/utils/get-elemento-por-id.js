/* @flow */

const getElementoPorId = (id: string): HTMLElement => {
    const elemento = document.getElementById(id);
    if (!elemento) {
        throw new TypeError(`${id} não econtrado no documento`);
    }
    return elemento;
};

export default getElementoPorId;
