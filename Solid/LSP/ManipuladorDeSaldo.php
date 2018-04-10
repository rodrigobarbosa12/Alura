<?php 

    class ManipuladorDeSaldo{

        public function __construct(){
            $this->saldo = 0;
        }
    
        public function saca($valor){
    
            if($valor > 0 && $valor <= $this->saldo){
                $this->saldo -= $valor;
            }else {
                throw new Exception("Valor inválido para o saque");
            }
        }
    
        public function deposita($valor){
            $this->saldo += $valor;
        }
    
        public function getSaldo(){
            return $this->saldo;
        }
    
        public function rende($taxa){
            $this->saldo *= $taxa;
        }
    }