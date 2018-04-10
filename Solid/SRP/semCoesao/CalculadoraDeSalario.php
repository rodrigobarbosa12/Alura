<?php 

class CalculadoraDeSalario {

    public function calcula(Funcionario $funcionario) {

        if($funcionario->getCargo() instanceof Desenvolvedor) {
            return $this->dezOuVintePorcento($funcionario);
        }
        else if($funcionario->getCargo() instanceof Tester || $funcionario->getCargo() instanceof Dba) {
            return $this->quinzeOuVinteCincoPorcento($funcionario);
        }

    }

    private function dezOuVintePorcento(Funcionario $funcionario) {

        if($funcionario->getSalario() > 3000) {
            return $funcionario->getSalario() * 0.8;
        }

        return $funcionario->getSalario() * 0.9;
    }

    private function quinzeOuVinteCincoPorcento(Funcionario $funcionario) {

        if($funcionario->getSalario() > 2000) {
            return $funcionario->getSalario() * 0.75;
        }

        return $funcionario->getSalario() * 0.85;

    }

}
