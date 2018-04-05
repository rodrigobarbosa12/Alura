<?php 

class NotaFiscalBuilder{
    private $empresa;
    private $cnpj;
    private $itens;
    private $valorBruto;
    private $valorImpostos;
    private $observacoes;
    private $dataEmissao;

    private $acoesAoGerar;


// Inicia vazio
function __construtc(){
    $this->valorBruto = 0;
    $this->valorImpostos = 0;
    $this->itens = array();
    $this->acoesAoGerar = array();
}

public function addAcao(acoesAoGerarNota $acao){
    $this->acoesAoGerar[] = $acao;
}

public function comEmpresa($nomeEmpresa) {
    $this->empresa = $nomeEmpresa;
    }   

public function comCnpj($nCnpj){
    $this->cnpj = $nCnpj;
}    

public function addItem(Item $novoItem){
    $this->itens[] = $novoItem;
    $this->valorBruto += $novoItem->getValor(); 
    $this->valorImpostos += $novoItem->getValor() * 0.2;
}

public function comObservacoes($obs){
    $this->observacoes = $obs;
}

public function naData($data = null){
    if(is_null($data)){
        $this->dataEmissao = data("y-m-d h:i:s");
    }else{
        $this->dataEmissao = $data;
    }
}

public function build(){
    $nf = new NotaFiscal($this->empresa, $this->cnpj, $this->itens, $this->valorBruto, $this->valorImpostos, $this->observacoes, $this->dataEmissao);

        //Percorre todas as ações existentes 
       foreach($this->acoesAoGerar as $acao){
            $acao->executa($nf);
       }
    return $nf;
}

}