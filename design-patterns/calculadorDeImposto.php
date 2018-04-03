<?php 

class calculadorDeImposto{
    public function calcula(Orcamento $orcamento, Imposto $estrategiaDeImposto){
        $resultado = $estrategiaDeImposto->calcula($orcamento);
    return $resultado;
    }
}
