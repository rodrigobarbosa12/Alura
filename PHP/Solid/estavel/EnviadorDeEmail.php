
<?php 
    class EnviadorDeEmail implements AcaoAposGerarNota{
    public function executa(NotaFiscal $nf) {
         echo "email enviado <br/>";
    }
}