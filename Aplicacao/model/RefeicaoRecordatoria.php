<?php
	require_once ("RefeicaoGeral.php");
	class RefeicaoRecordatoria extends RefeicaoGeral {
		public $lugar;
		public $frequencia;

		public function RefeicaoRecordatoria($horario, $pratos, $quantidades, $lugar, $frequencia){
			parent::$horario = $horario;
			parent::$pratos = $pratos;
			parent::$quantidades = $quantidades;
			$this->lugar = $lugar;
			$this->frequencia = $frequencia;
		}
	}
?>
