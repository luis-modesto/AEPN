<?php
	require_once ("RefeicaoGeral.php");
	class Refeicao extends RefeicaoGeral {
		public $id;
		public $nome;
		public $horario;
		public $pratos;
		public $quantidades;
		public $substituicoes;
		public $qtdSubs;

		public function Refeicao($id, $nome, $horario, $pratos, $quantidades, $substituicoes, $qtdSubs){
			parent::__construct($quantidades, $horario, $pratos);
			$this->id = $id;
			$this->nome = $nome;
			$this->substituicoes = $substituicoes;
			$this->qtdSubs = $qtdSubs;
		}
	}
?>
