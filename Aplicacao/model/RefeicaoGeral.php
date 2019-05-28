<?php
    require_once ('Prato.php');
    require_once ('Alimento.php');
	class RefeicaoGeral {
		public $quantidades;
		public $horario;
		public $pratos;

		function __construct($quantidades, $horario, $pratos){
			$this->quantidades = $quantidades;
			$this->horario = $horario;
			$this->pratos = $pratos;
		}

		public function calcularValorNutricional(){
			$valores = [
                "energia" => 0,
                "proteina" => 0,
                "lipideos" => 0,
                "carboidrato" => 0,
                "fibras" => 0,
                "calcio" => 0,
                "magnesio" => 0,
                "manganes" => 0,
                "fosforo" => 0,
                "ferro" => 0,
                "sodio" => 0,
                "sodio_adicao" => 0,
                "potassio" => 0,
                "cobre" => 0,
                "zinco" => 0,
                "selenio" => 0,
                "vitamina_a" => 0,
                "vitamina_b1" => 0,
                "vitamina_b2" => 0,
                "vitamina_b3" => 0,
                "vitamina_b6" => 0,
                "vitamina_b12" => 0,
                "folato" => 0,
                "vitamina_d" => 0,
                "vitamina_e" => 0,
                "vitamina_c" => 0,
                "colesterol" => 0,
                "ag_saturados" => 0,
                "ag_monoinsaturados" => 0,
                "ag_linoleico" => 0,
                "ag_linolenico" => 0,
                "ag_trans" => 0,
                "acucar_total" => 0,
                "acucar_adicao" => 0
            ];
			for ($i = 0; $i<count($this->pratos); $i++){
				$valPrato = $this->pratos[$i]->calcularValorNutricional();
                $valores["energia"] += ($quantidades[$i]/$this->pratos[$i]->rendimento)*$valPrato["energia"];
                $valores["proteina"] += ($quantidades[$i]/$this->pratos[$i]->rendimento)*$valPrato["proteina"];
                $valores["lipideos"] += ($quantidades[$i]/$this->pratos[$i]->rendimento)*$valPrato["lipideos"];
                $valores["carboidrato"] += ($quantidades[$i]/$this->pratos[$i]->rendimento)*$valPrato["carboidrato"];
                $valores["fibras"] += ($quantidades[$i]/$this->pratos[$i]->rendimento)*$valPrato["fibras"];
                $valores["calcio"] += ($quantidades[$i]/$this->pratos[$i]->rendimento)*$valPrato["calcio"];
                $valores["magnesio"] += ($quantidades[$i]/$this->pratos[$i]->rendimento)*$valPrato["magnesio"];
                $valores["manganes"] += ($quantidades[$i]/$this->pratos[$i]->rendimento)*$valPrato["manganes"];
                $valores["fosforo"] += ($quantidades[$i]/$this->pratos[$i]->rendimento)*$valPrato["fosforo"];
                $valores["ferro"] += ($quantidades[$i]/$this->pratos[$i]->rendimento)*$valPrato["ferro"];
                $valores["sodio"] += ($quantidades[$i]/$this->pratos[$i]->rendimento)*$valPrato["sodio"];
                $valores["sodio_adicao"] += ($quantidades[$i]/$this->pratos[$i]->rendimento)*$valPrato["sodio_adicao"];
                $valores["potassio"] += ($quantidades[$i]/$this->pratos[$i]->rendimento)*$valPrato["potassio"];
                $valores["cobre"] += ($quantidades[$i]/$this->pratos[$i]->rendimento)*$valPrato["cobre"];
                $valores["zinco"] += ($quantidades[$i]/$this->pratos[$i]->rendimento)*$valPrato["zinco"];
                $valores["selenio"] += ($quantidades[$i]/$this->pratos[$i]->rendimento)*$valPrato["selenio"];
                $valores["vitamina_a"] += ($quantidades[$i]/$this->pratos[$i]->rendimento)*$valPrato["vitamina_a"];
                $valores["vitamina_b1"] += ($quantidades[$i]/$this->pratos[$i]->rendimento)*$valPrato["vitamina_b1"];
                $valores["vitamina_b2"] += ($quantidades[$i]/$this->pratos[$i]->rendimento)*$valPrato["vitamina_b2"];
                $valores["vitamina_b3"] += ($quantidades[$i]/$this->pratos[$i]->rendimento)*$valPrato["vitamina_b3"];
                $valores["vitamina_b6"] += ($quantidades[$i]/$this->pratos[$i]->rendimento)*$valPrato["vitamina_b6"];
                $valores["vitamina_b12"] += ($quantidades[$i]/$this->pratos[$i]->rendimento)*$valPrato["vitamina_b12"];
                $valores["folato"] += ($quantidades[$i]/$this->pratos[$i]->rendimento)*$valPrato["folato"];
                $valores["vitamina_d"] += ($quantidades[$i]/$this->pratos[$i]->rendimento)*$valPrato["vitamina_d"];
                $valores["vitamina_e"] += ($quantidades[$i]/$this->pratos[$i]->rendimento)*$valPrato["vitamina_e"];
                $valores["vitamina_c"] += ($quantidades[$i]/$this->pratos[$i]->rendimento)*$valPrato["vitamina_c"];
                $valores["colesterol"] += ($quantidades[$i]/$this->pratos[$i]->rendimento)*$valPrato["colesterol"];
                $valores["ag_saturados"] += ($quantidades[$i]/$this->pratos[$i]->rendimento)*$valPrato["ag_saturados"];
                $valores["ag_monoinsaturados"] += ($quantidades[$i]/$this->pratos[$i]->rendimento)*$valPrato["ag_monoinsaturados"];
                $valores["ag_linoleico"] += ($quantidades[$i]/$this->pratos[$i]->rendimento)*$valPrato["ag_linoleico"];
                $valores["ag_linolenico"] += ($quantidades[$i]/$this->pratos[$i]->rendimento)*$valPrato["ag_linolenico"];
                $valores["ag_trans"] += ($quantidades[$i]/$this->pratos[$i]->rendimento)*$valPrato["ag_trans"];
                $valores["acucar_total"] += ($quantidades[$i]/$this->pratos[$i]->rendimento)*$valPrato["acucar_total"];
                $valores["acucar_adicao"] += ($quantidades[$i]/$this->pratos[$i]->rendimento)*$valPrato["acucar_adicao"];
			}
			return $valores;
		}
	}
?>
