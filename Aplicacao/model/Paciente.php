<?php
	class Paciente {
		public $cpf;
		public $nome;
		public $nutriResponsavel;

		public function Paciente($cpf, $nome, $nutriResponsavel){
			$this->cpf = $cpf;
			$this->nome = $nome;
			$this->nutriResponsavel = $nutriResponsavel;
		}
	}
?>
