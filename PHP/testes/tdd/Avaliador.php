<?php  

    class Avaliador{
        private $maiorDeTodos = -INF;   
        private $menorDeTodos = INF;
        private $media = 0;
        private $maiores;
       

        public function avalia(Leilao $leilao)
        {
            $total = 0;

            if(count($leilao->getLances()) <= 0 ){
                throw new Exception("Precisa ter palo menos um lance!");
            }
            foreach ($leilao->getLances() as $lance) {
                if($lance->getValor() > $this->maiorDeTodos) $this->maiorDeTodos = $lance->getValor();
                if($lance->getValor() < $this->menorDeTodos) $this->menorDeTodos = $lance->getValor();
                $total += $lance->getValor();
            }
            $this->media = $total / count($leilao->getLances());
            $this->pegaOsMaioresNo($leilao);
        }
       
        public function pegaOsMaioresNo(Leilao $leilao)
        {
            //Ordena um array pelos valores
            $lances = $leilao->getLances();
            usort($lances,function ($a,$b) {
                if($a->getValor() == $b->getValor()) return 0;
                return ($a->getValor() < $b->getValor()) ? 1 : -1;
            });

            $this->maiores = array_slice($lances, 0,3);
        }  

        public function getTresMaiores()
        {
            return $this->maiores;
        }

        public function getMaiorLance()
        {
            return $this->maiorDeTodos;
        }

        public function getMenorLance()
        {
            return $this->menorDeTodos;
        }

        public function getMedia()
        {
            return $this->media;
        }
    }
