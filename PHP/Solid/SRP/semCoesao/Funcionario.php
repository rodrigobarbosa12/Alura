<?php 

class Funcionario {

    private $id;
    private $nome;
    private $cargo;
    private $dataEmissao;
    private $salario;


        public function getId(){
            return $this->id;
        }
        public function getNome(){
            return $this->nome;
        }
        public function getCargo(){
            return $this->cargo;
        }
        public function getDataEmissao(){
            return $this->dataEmissao;
        }
        public function getSalario(){
            return $this->salario;
        }

        
        public function setId($id){
            $this->id = $id;
        }
        public function setNome($novoNome){
            $this->nome = $novoNome;
        }
        public function setCargo(Cargo $Cargo){
            $this->cargo = $Cargo;
        }
        public function setDataEmissao(dateTime $data){
            $this->dataEmissao = $data;
        }
        public function setSalario($salario){
            $this->salario = $salario;
        }

}