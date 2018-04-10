<?php 

class ProcessadorDeBoletos {

        public function processa($boletos,Fatura $fatura) {
            foreach($boletos as $boleto){
                $pagamento = new Pagamento($boleto->getValor(), MeioPagamento::Boleto);
                $fatura->addPagamento($pagamento);
            }

            return $fatura->isPago();

        }

    }

    



