<?php

class EnviadorSms implements AcoesAoGerarNota{
    public function executa(NotaFiscal $nf){
        echo "<br/>Enviei SMS!<br/>";
    }
}