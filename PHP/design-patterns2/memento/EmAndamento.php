<?php 

class EmAndamento implements estados {
    public function avanca($contrato){
        $contrato->setTipo(new Acertado);
    }
}