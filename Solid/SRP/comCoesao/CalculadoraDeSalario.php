<?php
	class CalculadoraDeSalario {

        public function calcula(Funcionario $funcionario) {
        	return $funcionario->calculaSalario();
        }
    }