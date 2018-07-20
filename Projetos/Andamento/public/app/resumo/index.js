/* @flow */

import $ from 'jquery';
import GridResumo from './GridResumo';
import getElementoPorId from '../utils/get-elemento-por-id';

$(() => {
    const gridResumo = getElementoPorId('grid-resumo');
    const grid = new GridResumo('http://apiconciliadora.maxscalla.com.br/resumo', gridResumo);
    grid.montarTabelaCompleta(global.Vars.resumo);
});
