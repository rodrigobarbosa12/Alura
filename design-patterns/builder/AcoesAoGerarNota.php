<?Php

interface AcoesAoGerarNota{
    public function executa(NotaFiscal $nf);
    //Recebe a NOTA FISCAL e faz alguma coisa com ela (Não importa o que)
}