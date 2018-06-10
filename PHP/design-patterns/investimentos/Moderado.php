<?php   

    //CAPSULA

    class Moderado implements Investimento {
        private $aleatorio;

        public function calcula(Conta $conta) {
          $this->aleatorio = mt_rand(1,100);
          if($this->aleatorio >= 50) return $conta->getSaldo() * 0.025;
          else return $conta->getSaldo() * 0.007;
        }
      }