<?php
	require_once ("Alimento.php");
	class Suplemento extends Alimento {
		public $indicacao;

		public function Suplemento($id, $nome, $umidade, $energia, $proteina, $lipideos, $colesterol, $carboidrato, $fibras, $cinzas, $calcio, $magnesio, $manganes, $fosforo, $ferro, $sodio, $potassio, $cobre, $zinco, $retinol, $RE, $RAE, $tiamina, $riboflavina, $piridoxina, $niacina, $vitaminaC, $indicacao){
			parent::__construct($id, $nome, $umidade, $energia, $proteina, $lipideos, $colesterol, $carboidrato, $fibras, $cinzas, $calcio, $magnesio, $manganes, $fosforo, $ferro, $sodio, $potassio, $cobre, $zinco, $retinol, $RE, $RAE, $tiamina, $riboflavina, $piridoxina, $niacina, $vitaminaC);
    		$this->indicacao = $indicacao;
		}


	}
?>
