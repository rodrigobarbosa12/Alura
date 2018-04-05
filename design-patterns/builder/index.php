<?php 
date_default_timezone_set("Brazil/East");

//AutoLoad 
function carregaClasse($nomeClasse){
    require $nomeClasse.".php";
} spl_autoload_register("carregaClasse");
//O nome dos arquivos tem que ser o mesmo da classe



$geradorDeNotas = new NotaFiscalBuilder();

//Oberver
$geradorDeNotas->addAcao(new Impressora());
$geradorDeNotas->addAcao(new NotaFiscalDao());
$geradorDeNotas->addAcao(new EnviadorSms());

$geradorDeNotas->comEmpresa("Maxscalla");
$geradorDeNotas->comCnpj("123456");
$geradorDeNotas->addItem(new Item("Tijolo",100));
$geradorDeNotas->addItem(new Item("cimento",250));
$geradorDeNotas->comObservacoes("Tijolo amarelo");
$geradorDeNotas->naData(2018-04-05);

$notaFiscal = $geradorDeNotas->build();

echo "<pre>";
 var_dump($notaFiscal);
?>