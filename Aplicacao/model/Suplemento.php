<?php
	require_once ("Alimento.php");
	class Suplemento extends Alimento {
		public $indicacao;

		public function Suplemento($id, $nome, $umidade, $energia, $proteina, $lipideos, $colesterol, $carboidrato, $fibras, $cinzas, $calcio, $magnesio, $manganes, $fosforo, $ferro, $sodio, $potassio, $cobre, $zinco, $retinol, $RE, $RAE, $tiamina, $riboflavina, $piridoxina, $niacina, $vitaminaC, $indicacao){
			parent::$id = $id;
			parent::$nome = $nome;
			parent::$umidade = $umidade;
    		parent::$energia = $energia;
    		parent::$proteina = $proteina;
    		parent::$lipideos = $lipideos;
    		parent::$colesterol = $colesterol;
    		parent::$carboidrato = $carboidrato;
    		parent::$fibras = $fibras;
    		parent::$cinzas = $cinzas;
    		parent::$calcio = $calcio;
    		parent::$magnesio = $magnesio;
    		parent::$manganes = $manganes;
    		parent::$fosforo = $fosforo;
    		parent::$ferro = $ferro;
    		parent::$sodio = $sodio;
    		parent::$potassio = $potassio;
    		parent::$cobre = $cobre;
    		parent::$zinco = $zinco;
    		parent::$retinol = $retinol;
    		parent::$RE = $RE;
    		parent::$RAE = $RAE;
    		parent::$tiamina = $tiamina;
    		parent::$riboflavina = $riboflavina;
    		parent::$piridoxina = $piridoxina;
    		parent::$niacina = $niacina;
    		parent::$vitaminaC = $vitaminaC;
    		$this->indicacao = $indicacao;
		}


	}
?>
