<?php
	require_once ("RefeicaoGeral.php");
	class RefeicaoRecordatoria extends RefeicaoGeral {
		public $lugar;
		public $frequencia;

		public function RefeicaoRecordatoria($horario, $pratos, $quantidades, $lugar, $frequencia){
			parent:: __construct($quantidades, $horario, $pratos);
			$this->lugar = $lugar;
			$this->frequencia = $frequencia;
		}
	}
?>
