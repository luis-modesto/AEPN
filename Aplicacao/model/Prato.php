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
        public $rendimentoG;
        private $qtdG;

		function __construct($id, $nome, $rendimento, $medida, $modoPreparo, $alimentos, $quantidades, $medidas, $substituicoes, $qtdSubs, $medidasSubs, $qtdG){
			$this->id = $id;
			$this->nome = $nome;
			$this->rendimento = $rendimento;
			$this->medida = $medida;
			$this->modoPreparo = $modoPreparo;
			$this->alimentos = $alimentos;
			$this->quantidades = $quantidades;
            $this->medidas = $medidas;
            $this->qtdG = $qtdG;
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
			for ($i = 0; $i<count($this->alimentos); $i++){
                $valores["energia"] += ($this->qtdG[$i]/100)*$this->alimentos[$i]->energia;
                $valores["proteina"] += ($this->qtdG[$i]/100)*$this->alimentos[$i]->proteina;
                $valores["lipideos"] += ($this->qtdG[$i]/100)*$this->alimentos[$i]->lipideos;
                $valores["carboidrato"] += ($this->qtdG[$i]/100)*$this->alimentos[$i]->carboidrato;
                $valores["fibras"] += ($this->qtdG[$i]/100)*$this->alimentos[$i]->fibras;
                $valores["calcio"] += ($this->qtdG[$i]/100)*$this->alimentos[$i]->calcio;
                $valores["magnesio"] += ($this->qtdG[$i]/100)*$this->alimentos[$i]->magnesio;
                $valores["manganes"] += ($this->qtdG[$i]/100)*$this->alimentos[$i]->manganes;
                $valores["fosforo"] += ($this->qtdG[$i]/100)*$this->alimentos[$i]->fosforo;
                $valores["ferro"] += ($this->qtdG[$i]/100)*$this->alimentos[$i]->ferro;
                $valores["sodio"] += ($this->qtdG[$i]/100)*$this->alimentos[$i]->sodio;
                $valores["sodio_adicao"] += ($this->qtdG[$i]/100)*$this->alimentos[$i]->sodio_adicao;
                $valores["potassio"] += ($this->qtdG[$i]/100)*$this->alimentos[$i]->potassio;
                $valores["cobre"] += ($this->qtdG[$i]/100)*$this->alimentos[$i]->cobre;
                $valores["zinco"] += ($this->qtdG[$i]/100)*$this->alimentos[$i]->zinco;
                $valores["selenio"] += ($this->qtdG[$i]/100)*$this->alimentos[$i]->selenio;
                $valores["vitamina_a"] += ($this->qtdG[$i]/100)*$this->alimentos[$i]->vitamina_a;
                $valores["vitamina_b1"] += ($this->qtdG[$i]/100)*$this->alimentos[$i]->vitamina_b1;
                $valores["vitamina_b2"] += ($this->qtdG[$i]/100)*$this->alimentos[$i]->vitamina_b2;
                $valores["vitamina_b3"] += ($this->qtdG[$i]/100)*$this->alimentos[$i]->vitamina_b3;
                $valores["vitamina_b6"] += ($this->qtdG[$i]/100)*$this->alimentos[$i]->vitamina_b6;
                $valores["vitamina_b12"] += ($this->qtdG[$i]/100)*$this->alimentos[$i]->vitamina_b12;
                $valores["folato"] += ($this->qtdG[$i]/100)*$this->alimentos[$i]->folato;
                $valores["vitamina_d"] += ($this->qtdG[$i]/100)*$this->alimentos[$i]->vitamina_d;
                $valores["vitamina_e"] += ($this->qtdG[$i]/100)*$this->alimentos[$i]->vitamina_e;
                $valores["vitamina_c"] += ($this->qtdG[$i]/100)*$this->alimentos[$i]->vitamina_c;
                $valores["colesterol"] += ($this->qtdG[$i]/100)*$this->alimentos[$i]->colesterol;
                $valores["ag_saturados"] += ($this->qtdG[$i]/100)*$this->alimentos[$i]->ag_saturados;
                $valores["ag_monoinsaturados"] += ($this->qtdG[$i]/100)*$this->alimentos[$i]->ag_monoinsaturados;
                $valores["ag_linoleico"] += ($this->qtdG[$i]/100)*$this->alimentos[$i]->ag_linoleico;
                $valores["ag_linolenico"] += ($this->qtdG[$i]/100)*$this->alimentos[$i]->ag_linolenico;
                $valores["ag_trans"] += ($this->qtdG[$i]/100)*$this->alimentos[$i]->ag_trans;
                $valores["acucar_total"] += ($this->qtdG[$i]/100)*$this->alimentos[$i]->acucar_total;
                $valores["acucar_adicao"] += ($this->qtdG[$i]/100)*$this->alimentos[$i]->acucar_adicao;
			}
			return $valores;
		}
	}
?>
