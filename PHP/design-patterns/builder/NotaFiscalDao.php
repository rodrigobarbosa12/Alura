<?php

class NotaFiscalDao implements AcoesAoGerarNota {
    public function executa(NotaFiscal $nf){
        echo"<br/>Eu salvei no banco de dados!<br/>";
    }
}