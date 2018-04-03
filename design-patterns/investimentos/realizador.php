<?php

class RealizadorDeInvestimentos {
    public function realiza(Conta $conta, Investimento $investimento) {
      $resultado = $investimento->calcula($conta); //8%

      $conta->deposita($resultado * 0.75 );
      return $conta->getSaldo();
    }
  }