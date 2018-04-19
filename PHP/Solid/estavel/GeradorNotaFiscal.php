<?php 

    class GeradorNotaFiscal {

        // private $enviadorEmail;
        // private $notaFiscalDao;
        // public function __construct(EnviadorDeEmail $enviador,NotaFiscalDao $nfDao) {
        //     $this->enviadorEmail = $enviador;
        //     $this->notaFiscalDao = $nfDao;
        // }

        private $acoesAposGerarNota;
        
        public function __construct(){
            $this->acoesAposGerarNota = [];
        }

        public function addAcao(AcaoAposGerarNota $acao){//REcebe tudo que implementa 'AcaoAposGerarNota'
            $this->acoesAposGerarNota[] = $acao;//Recebe no array o que esta em $acao
        }

        public function gera(Fatura $fatura) { //Recebe o que ta no array 'acoesAposGerarNota'

            $valor = $fatura->getValorMensal();
            $nf = new NotaFiscal($valor,$this->impostoSobreValor($valor));

            foreach($this->acoesAposGerarNota as $acao){// Percorre o array 'acoesAposGerarNota'
                $acao->executa($nf);
            }
        }

        private function impostoSobreValor($valor) {
            return $valor * 0.06;
        }
    }