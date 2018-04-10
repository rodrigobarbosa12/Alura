<?php 
function carregaClasse($classe){
    require $classe.".php";
}spl_autoload_register("carregaClasse");


    $fatura = new Fatura();
    $fatura->setValorMensal(1000);

    $gerador = new GeradorNotaFiscal();
    $gerador->addAcao(new EnviadorDeEmail());//Manda para o array 'acoesAposGerarNota'
    $gerador->addAcao(new NotaFiscalDao());

    $gerador->gera($fatura);