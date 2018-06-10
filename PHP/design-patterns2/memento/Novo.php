
<?php 

class Novo implements estados {

    public function avanca($contrato){
        $contrato->setTipo(new EmAndamento());
    }
}