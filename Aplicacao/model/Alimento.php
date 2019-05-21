<?php
	class Alimento {
		public $id;
		public $nome;
		public $umidade;
    	public $energia;
    	public $proteina;
    	public $lipideos;
    	public $colesterol;
    	public $carboidrato;
    	public $fibras;
    	public $cinzas;
    	public $calcio;
    	public $magnesio;
    	public $manganes;
    	public $fosforo;
    	public $ferro;
    	public $sodio;
    	public $potassio;
    	public $cobre;
    	public $zinco;
    	public $retinol;
    	public $RE;
    	public $RAE;
    	public $tiamina;
    	public $riboflavina;
    	public $piridoxina;
    	public $niacina;
    	public $vitaminaC;

		public function Alimento($id, $nome, $umidade, $energia, $proteina, $lipideos, $colesterol, $carboidrato, $fibras, $cinzas, $calcio, $magnesio, $manganes, $fosforo, $ferro, $sodio, $potassio, $cobre, $zinco, $retinol, $RE, $RAE, $tiamina, $riboflavina, $piridoxina, $niacina, $vitaminaC){
			$this->id = $id;
			$this->nome = $nome;
			$this->umidade = $umidade;
    		$this->energia = $energia;
    		$this->proteina = $proteina;
    		$this->lipideos = $lipideos;
    		$this->colesterol = $colesterol;
    		$this->carboidrato = $carboidrato;
    		$this->fibras = $fibras;
    		$this->cinzas = $cinzas;
    		$this->calcio = $calcio;
    		$this->magnesio = $magnesio;
    		$this->manganes = $manganes;
    		$this->fosforo = $fosforo;
    		$this->ferro = $ferro;
    		$this->sodio = $sodio;
    		$this->potassio = $potassio;
    		$this->cobre = $cobre;
    		$this->zinco = $zinco;
    		$this->retinol = $retinol;
    		$this->RE = $RE;
    		$this->RAE = $RAE;
    		$this->tiamina = $tiamina;
    		$this->riboflavina = $riboflavina;
    		$this->piridoxina = $piridoxina;
    		$this->niacina = $niacina;
    		$this->vitaminaC = $vitaminaC;
		}

	}
?>
