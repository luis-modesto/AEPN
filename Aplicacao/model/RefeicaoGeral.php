<?php
    require_once ('Prato.php');
    require_once ('Alimento.php');
	class RefeicaoGeral {
		public $quantidades;
		public $horario;
		public $pratos;

		public function RefeicaoGeral($quantidades, $horario, $pratos){
			$this->quantidades = $quantidades;
			$this->horario = $horario;
			$this->pratos = $pratos;
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
			for ($i = 0; $i<count($pratos); $i++){
				$valPrato = $pratos[$i]->calcularValorNutricional();
				$valores["energia"] += ($quantidades[$i]/$pratos[$i]->rendimento)*$valPrato["energia"];
    			$valores["proteina"] += ($quantidades[$i]/$pratos[$i]->rendimento)*$valPrato["proteina"];
    			$valores["lipideos"] += ($quantidades[$i]/$pratos[$i]->rendimento)*$valPrato["lipideos"];
    			$valores["colesterol"] += ($quantidades[$i]/$pratos[$i]->rendimento)*$valPrato["colesterol"];
    			$valores["carboidrato"] += ($quantidades[$i]/$pratos[$i]->rendimento)*$valPrato["carboidrato"];
    			$valores["fibras"] += ($quantidades[$i]/$pratos[$i]->rendimento)*$valPrato["fibras"];
    			$valores["cinzas"] += ($quantidades[$i]/$pratos[$i]->rendimento)*$valPrato["cinzas"];
    			$valores["calcio"] += ($quantidades[$i]/$pratos[$i]->rendimento)*$valPrato["calcio"];
    			$valores["magnesio"] += ($quantidades[$i]/$pratos[$i]->rendimento)*$valPrato["magnesio"];
    			$valores["manganes"] += ($quantidades[$i]/$pratos[$i]->rendimento)*$valPrato["manganes"];
    			$valores["fosforo"] += ($quantidades[$i]/$pratos[$i]->rendimento)*$valPrato["fosforo"];
    			$valores["ferro"] += ($quantidades[$i]/$pratos[$i]->rendimento)*$valPrato["ferro"];
    			$valores["sodio"] += ($quantidades[$i]/$pratos[$i]->rendimento)*$valPrato["sodio"];
    			$valores["potassio"] += ($quantidades[$i]/$pratos[$i]->rendimento)*$valPrato["potassio"];
    			$valores["cobre"] += ($quantidades[$i]/$pratos[$i]->rendimento)*$valPrato["cobre"];
    			$valores["zinco"] += ($quantidades[$i]/$pratos[$i]->rendimento)*$valPrato["zinco"];
    			$valores["retinol"] += ($quantidades[$i]/$pratos[$i]->rendimento)*$valPrato["retinol"];
    			$valores["RE"] += ($quantidades[$i]/$pratos[$i]->rendimento)*$valPrato["RE"];
    			$valores["RAE"] += ($quantidades[$i]/$pratos[$i]->rendimento)*$valPrato["RAE"];
    			$valores["tiamina"] += ($quantidades[$i]/$pratos[$i]->rendimento)*$valPrato["tiamina"];
    			$valores["riboflavina"] += ($quantidades[$i]/$pratos[$i]->rendimento)*$valPrato["riboflavina"];
    			$valores["piridoxina"] += ($quantidades[$i]/$pratos[$i]->rendimento)*$valPrato["piridoxina"];
    			$valores["niacina"] += ($quantidades[$i]/$pratos[$i]->rendimento)*$valPrato["niacina"];
    			$valores["vitaminaC"] += ($quantidades[$i]/$pratos[$i]->rendimento)*$valPrato["vitaminaC"];
			}
			return $valores;
		}
	}
?>
