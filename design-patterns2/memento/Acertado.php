<?php 

class Acertado implements estados {
    public function avanca($contrato){
        $contrato->setTipo(new Concluido);
    }
}