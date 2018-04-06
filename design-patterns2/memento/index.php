<?php 
    function carregaClasse($nomeClasse){
        require $nomeClasse.".php";
    }spl_autoload_register("carregaClasse");

        $historico = new Historico();
        $contrato = new Contrato(date("d/m/Y"), "Renan", new Novo());
        
        echo"<pre>";
        var_dump($contrato);
        $historico->adiciona($contrato->salvaEstado());
        $contrato->avanca();//Essa variavel recebe o proximo Objeto

        var_dump($contrato);
        $historico->adiciona($contrato->salvaEstado());
        $contrato->avanca();

        var_dump($contrato);
        $historico->adiciona($contrato->salvaEstado());
        $contrato->avanca();

        var_dump($contrato);
        $historico->adiciona($contrato->salvaEstado());
        $contrato->getTipo();
        
        echo"<br/><br/> Exibindo contrato salvo. <br/><br/>";
        $contrato->restaura($historico->pega(0));
        var_dump($contrato);
        
       
        

    