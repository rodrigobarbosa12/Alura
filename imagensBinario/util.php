<?php
function retorno($mensagem, $sucesso = false)
{
    $retorno = array();
    $retorno['sucesso'] = $sucesso;
    $retorno['mensagem'] = $mensagem;
    return json_encode($retorno);
}