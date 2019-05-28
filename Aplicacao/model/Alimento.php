<?php
	class Alimento {
		public $id;
        public $nome;
        public $energia;
        public $proteina;
        public $lipideos;
        public $carboidrato;
        public $fibras;
        public $calcio;
        public $magnesio;
        public $manganes;
        public $fosforo;
        public $ferro;
        public $sodio;
        public $sodio_adicao;
        public $potassio;
        public $cobre;
        public $zinco;
        public $selenio;
        public $vitamina_a;
        public $vitamina_b1;
        public $vitamina_b2;
        public $vitamina_b3;
        public $vitamina_b6;
        public $vitamina_b12;
        public $folato;
        public $vitamina_d;
        public $vitamina_e;
        public $vitamina_c;
        public $colesterol;
        public $ag_saturados;
        public $ag_monoinsaturados;
        public $ag_linoleico;
        public $ag_linolenico;
        public $ag_trans;
        public $acucar_total;
        public $acucar_adicao;

		function __construct($id, $nome, $energia, $proteina, $lipideos, $carboidrato, $fibras, $calcio, $magnesio, $manganes, $fosforo, $ferro, $sodio, $sodio_adicao, $potassio, $cobre, $zinco, $selenio, $vitamina_a, $vitamina_b1, $vitamina_b2, $vitamina_b3, $vitamina_b6, $vitamina_b12, $folato, $vitamina_d, $vitamina_e, $vitamina_c, $colesterol, $ag_saturados, $ag_monoinsaturados, $ag_linoleico, $ag_linolenico, $ag_trans, $acucar_total, $acucar_adicao){
			$this->id = $id;
            $this->nome = $nome;
            $this->energia = $energia;
            $this->proteina = $proteina;
            $this->lipideos = $lipideos;
            $this->carboidrato = $carboidrato;
            $this->fibras = $fibras;
            $this->calcio = $calcio;
            $this->magnesio = $magnesio;
            $this->manganes = $manganes;
            $this->fosforo = $fosforo;
            $this->ferro = $ferro;
            $this->sodio = $sodio;
            $this->sodio_adicao = $sodio_adicao;
            $this->potassio = $potassio;
            $this->cobre = $cobre;
            $this->zinco = $zinco;
            $this->selenio = $selenio;
            $this->vitamina_a = $vitamina_a;
            $this->vitamina_b1 = $vitamina_b1;
            $this->vitamina_b2 = $vitamina_b2;
            $this->vitamina_b3 = $vitamina_b3;
            $this->vitamina_b6 = $vitamina_b6;
            $this->vitamina_b12 = $vitamina_b12;
            $this->folato = $folato;
            $this->vitamina_d = $vitamina_d;
            $this->vitamina_e = $vitamina_e;
            $this->vitamina_c = $vitamina_c;
            $this->colesterol = $colesterol;
            $this->ag_saturados = $ag_saturados;
            $this->ag_monoinsaturados = $ag_monoinsaturados;
            $this->ag_linoleico = $ag_linoleico;
            $this->ag_linolenico = $ag_linolenico;
            $this->ag_trans = $ag_trans;
            $this->acucar_total = $acucar_total;
            $this->acucar_adicao = $acucar_adicao;
		}

	}
?>
