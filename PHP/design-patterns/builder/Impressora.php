<?php

class Impressora implements AcoesAoGerarNota {
    public function executa(NotaFiscal $nf){
        echo"<br/>Eu mandei para a impressora!<br/>";
    }
}