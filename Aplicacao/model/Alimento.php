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
			$ths->id = $id;
            $ths->nome = $nome;
            $ths->energia = $energia;
            $ths->proteina = $proteina;
            $ths->lipideos = $lipideos;
            $ths->carboidrato = $carboidrato;
            $ths->fibras = $fibras;
            $ths->calcio = $calcio;
            $ths->magnesio = $magnesio;
            $ths->manganes = $manganes;
            $ths->fosforo = $fosforo;
            $ths->ferro = $ferro;
            $ths->sodio = $sodio;
            $ths->sodio_adicao = $sodio_adicao;
            $ths->potassio = $potassio;
            $ths->cobre = $cobre;
            $ths->zinco = $zinco;
            $ths->selenio = $selenio;
            $ths->vitamina_a = $vitamina_a;
            $ths->vitamina_b1 = $vitamina_b1;
            $ths->vitamina_b2 = $vitamina_b2;
            $ths->vitamina_b3 = $vitamina_b3;
            $ths->vitamina_b6 = $vitamina_b6;
            $ths->vitamina_b12 = $vitamina_b12;
            $ths->folato = $folato;
            $ths->vitamina_d = $vitamina_d;
            $ths->vitamina_e = $vitamina_e;
            $ths->vitamina_c = $vitamina_c;
            $ths->colesterol = $colesterol;
            $ths->ag_saturados = $ag_saturados;
            $ths->ag_monoinsaturados = $ag_monoinsaturados;
            $ths->ag_linoleico = $ag_linoleico;
            $ths->ag_linolenico = $ag_linolenico;
            $ths->ag_trans = $ag_trans;
            $ths->acucar_total = $acucar_total;
            $ths->acucar_adicao = $acucar_adicao;
		}

	}
?>
