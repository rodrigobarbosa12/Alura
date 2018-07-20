/* @flow */

import $ from 'jquery';
import GridComprovante from './GridComprovante';
import getElementoPorId from '../utils/get-elemento-por-id';

$(() => {
    const gridComprovante = getElementoPorId('grid-comprovante');
    const grid = new GridComprovante('http://apiconciliadora.maxscalla.com.br/comprovante', gridComprovante);
    grid.montarTabelaCompleta(global.Vars.comprovante);
});
