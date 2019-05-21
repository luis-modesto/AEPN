<?php
	require_once ('Alimento.php');
	class Prato {
		public $id;
		public $nome;
		public $rendimento;
		public $medida;
		public $modoPreparo;
		public $alimentos;
		public $quantidades;
		public $medidas;
		public $substituicoes;
		public $qtdSubs;
		public $medidasSubs;

		public function Prato($id, $nome, $rendimento, $medida, $modoPreparo, $alimentos, $quantidades, $medidas, $substituicoes, $qtdSubs, $medidasSubs){
			$this->id = $id;
			$this->nome = $nome;
			$this->rendimento = $rendimento;
			$this->medida = $medida;
			$this->modoPreparo = $modoPreparo;
			$this->alimentos = $alimentos;
			$this->quantidades = $quantidades;
			$this->medidas = $medidas;
			$this->$substituicoes = $substituicoes;
			$this->$qtdSubs = $qtdSubs;
			$this->$medidasSubs = $medidasSubs;
		}

		public function calcularValorNutricional(){
			$valores = [
			    "energia" => 0,
    			"proteina" => 0,
    			"lipideos" => 0,
    			"colesterol" => 0,
    			"carboidrato" => 0,
    			"fibras" => 0,
    			"cinzas" => 0,
    			"calcio" => 0,
    			"magnesio" => 0,
    			"manganes" => 0,
    			"fosforo" => 0,
    			"ferro" => 0,
    			"sodio" => 0,
    			"potassio" => 0,
    			"cobre" => 0,
    			"zinco" => 0,
    			"retinol" => 0,
    			"RE" => 0,
    			"RAE" => 0,
    			"tiamina" => 0,
    			"riboflavina" => 0,
    			"piridoxina" => 0,
    			"niacina" => 0,
    			"vitaminaC" => 0,
			];
			for ($i = 0; $i<count($alimentos); $i++){
				$valores["energia"] += ($quantidades[$i]/100)*$alimentos[$i]->energia;
    			$valores["proteina"] += ($quantidades[$i]/100)*$alimentos[$i]->proteina;
    			$valores["lipideos"] += ($quantidades[$i]/100)*$alimentos[$i]->lipideos;
    			$valores["colesterol"] += ($quantidades[$i]/100)*$alimentos[$i]->colesterol;
    			$valores["carboidrato"] += ($quantidades[$i]/100)*$alimentos[$i]->carboidrato;
    			$valores["fibras"] += ($quantidades[$i]/100)*$alimentos[$i]->fibras;
    			$valores["cinzas"] += ($quantidades[$i]/100)*$alimentos[$i]->cinzas;
    			$valores["calcio"] += ($quantidades[$i]/100)*$alimentos[$i]->calcio;
    			$valores["magnesio"] += ($quantidades[$i]/100)*$alimentos[$i]->magnesio;
    			$valores["manganes"] += ($quantidades[$i]/100)*$alimentos[$i]->manganes;
    			$valores["fosforo"] += ($quantidades[$i]/100)*$alimentos[$i]->fosforo;
    			$valores["ferro"] += ($quantidades[$i]/100)*$alimentos[$i]->ferro;
    			$valores["sodio"] += ($quantidades[$i]/100)*$alimentos[$i]->sodio;
    			$valores["potassio"] += ($quantidades[$i]/100)*$alimentos[$i]->potassio;
    			$valores["cobre"] += ($quantidades[$i]/100)*$alimentos[$i]->cobre;
    			$valores["zinco"] += ($quantidades[$i]/100)*$alimentos[$i]->zinco;
    			$valores["retinol"] += ($quantidades[$i]/100)*$alimentos[$i]->retinol;
    			$valores["RE"] += ($quantidades[$i]/100)*$alimentos[$i]->RE;
    			$valores["RAE"] += ($quantidades[$i]/100)*$alimentos[$i]->RAE;
    			$valores["tiamina"] += ($quantidades[$i]/100)*$alimentos[$i]->tiamina;
    			$valores["riboflavina"] += ($quantidades[$i]/100)*$alimentos[$i]->riboflavina;
    			$valores["piridoxina"] += ($quantidades[$i]/100)*$alimentos[$i]->piridoxina;
    			$valores["niacina"] += ($quantidades[$i]/100)*$alimentos[$i]->niacina;
    			$valores["vitaminaC"] += ($quantidades[$i]/100)*$alimentos[$i]->vitaminaC;
			}
			return $valores;
		}
	}
?>
