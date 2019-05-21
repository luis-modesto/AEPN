<?php
	class RegDiagnostico {
		public $paciente;
		public $dataConsulta;
		public $planoAlimentar;
    	public $metaCarboidrato;
    	public $metaProteina;
    	public $metaLipideo;
		public $recordatorio;
		public $examesBioquimicos;
    	public $orientacaoPlanoAlimentar;
    	public $pesoAtual;
    	public $pesoIdeal;
    	public $PCT;
    	public $PCB;
    	public $PCSE;
    	public $PCSI;
    	public $altura;
    	public $CC;
    	public $CQ;
    	public $CB;
    	public $compJoelho;
    	public $circPanturrilha;

		public function RegDiagnostico($paciente, $dataConsulta, $planoAlimentar, $metaCarboidrato, $metaProteina, $metaLipideo, $recordatorio, $examesBioquimicos, $orientacaoPlanoAlimentar, $pesoAtual, $pesoIdeal, $PCT, $PCB, $PCSE, $PCSI, $altura, $CC, $CQ, $CB, $compJoelho, $circPanturrilha){
			$this->paciente = $paciente;
			$this->dataConsulta = $dataConsulta;
			$this->planoAlimentar = $planoAlimentar;
			$this->metaCarboidrato = $metaCarboidrato;
			$this->metaProteina = $metaProteina;
			$this->metaLipideo = $metaLipideo;
			$this->recordatorio = $recordatorio;
			$this->examesBioquimicos = $examesBioquimicos;
			$this->orientacaoPlanoAlimentar = $orientacaoPlanoAlimentar;
			$this->pesoAtual = $pesoAtual;
			$this->pesoIdeal = $pesoIdeal;
			$this->PCT = $PCT;
			$this->PCB = $PCB;
			$this->PCSE = $PCSE;
			$this->PCSI = $PCSI;
			$this->altura = $altura;
			$this->CC = $CC;
			$this->CQ = $CQ;
			$this->CB = $CB;
			$this->compJoelho = $compJoelho;
			$this->circPanturrilha = $circPanturrilha;
		}
	}
?>
