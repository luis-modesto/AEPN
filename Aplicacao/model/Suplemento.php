<?php
	require_once ("Alimento.php");
	class Suplemento extends Alimento {
		public $indicacao;

		public function Suplemento($id, $nome, $energia, $proteina, $lipideos, $carboidrato, $fibras, $calcio, $magnesio, $manganes, $fosforo, $ferro, $sodio, $sodio_adicao, $potassio, $cobre, $zinco, $selenio, $vitamina_a, $vitamina_b1, $vitamina_b2, $vitamina_b3, $vitamina_b6, $vitamina_b12, $folato, $vitamina_d, $vitamina_e, $vitamina_c, $colesterol, $ag_saturados, $ag_monoinsaturados, $ag_linoleico, $ag_linolenico, $ag_trans, $acucar_total, $acucar_adicao, $indicacao){
			parent::__construct($id, $nome, $energia, $proteina, $lipideos, $carboidrato, $fibras, $calcio, $magnesio, $manganes, $fosforo, $ferro, $sodio, $sodio_adicao, $potassio, $cobre, $zinco, $selenio, $vitamina_a, $vitamina_b1, $vitamina_b2, $vitamina_b3, $vitamina_b6, $vitamina_b12, $folato, $vitamina_d, $vitamina_e, $vitamina_c, $colesterol, $ag_saturados, $ag_monoinsaturados, $ag_linoleico, $ag_linolenico, $ag_trans, $acucar_total, $acucar_adicao);
    		$this->indicacao = $indicacao;
		}


	}
?>
