<?php
	class QuinzeOuVinteCincoPorcento implements RegraDeCalculo {
		public function calcula(Funcionario $funcionario) {

            if($funcionario->getSalario() > 2000) {
                return $funcionario->getSalario() * 0.75;
            }

            return $funcionario->getSalario() * 0.85;

        }

	}