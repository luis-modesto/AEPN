<?php
	require_once ('DataGetter.php');
	require_once ('Prato.php');
	require_once ('Refeicao.php');
	require_once ('Paciente.php');
	require_once ('RegDiagnostico.php');
	require_once ('Alimento.php');
	require_once ('RefeicaoRecordatoria.php');
	require_once ('Suplemento.php');
	
	class Nutricionista {
		public $cpf;
		public $nome;
		public $crn;
		private $cpfNum;

		public function Nutricionista($cpf, $nome, $crn){
			$this->cpf = $cpf;
			$this->nome = $nome;
			$this->crn = $crn;
			$this->cpfNum = preg_replace("/[^0-9]/", "", $cpf);
		}

		/********************************** Nutricionista **********************************/
		public function registrarNutricionista($nutri){
			$sql = "INSERT INTO Nutricionista VALUES ('" . $nutri->cpf . "', '" . $nutri->nome . "', '" . $nutri->crn . "');
			CREATE VIEW Pacientes" . $nutri->cpfNum . " AS SELECT * FROM Paciente WHERE cpf_nutri_responsavel = '" . $nutri->cpf . "';";
			$stmt = DataGetter::getConn()->prepare($sql);
			try{
				return $stmt->execute();
			}catch(PDOException $e){
			    return $e->getMessage();
			}
		}
		public function recuperarNutricionistas(){
			$sql = "SELECT cpf, nome, crn FROM Nutricionista";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
			$nutris = array();
			while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
				array_push($nutris, new Nutricionista($result["cpf"], $result["nome"], $result["crn"]));
			}
			
			return $nutris;
		}
		public function atualizarNutricionista($nutri, $cpf){
			$sql = "UPDATE Nutricionista SET nome = '" . $nutri->nome . "', crn = '" . $nutri->crn . "', cpf = '" . $nutri->cpf . "' WHERE cpf = '" . $cpf . "'";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
			if ($stmt->rowCount()>0){
				return true;
			}
			return false;
		} 
		public function removerNutricionista($cpf){
			$sql = "DELETE FROM Nutricionista WHERE cpf = '" . $cpf . "'";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
		}
		/*************************************** Paciente ****************************************/
		public function registrarPaciente($paciente){
			$sql = "INSERT INTO Pacientes" . $this->cpfNum . "(cpf, nome, cpf_nutri_responsavel) VALUES ('" . $paciente->cpf . "', '" . $paciente->nome . "', '" . $this->cpf . "')";
			$stmt = DataGetter::getConn()->prepare($sql);
			try{
				return $stmt->execute();
			}catch(PDOException $e){
			    return $e->getMessage();
			}
		}
		public function atualizarAnamnesePaciente($paciente, $cpfPaciente, $data_nascimento, $sexo, $profissao, $estado_civil, $nacionalidade, $naturalidade, $bairro, $tipo_domicilio, $qtd_pessoas_reside, $renda_familiar, $horas_sono, $caracteristicas_sono, $lugar_refeicoes, $freq_bebidas_alcoolicas, $num_cigarros_dia, $uso_droga_ilicita, $nivel_instrucao, $restricoes_religiao, $olhos, $cabelo, $labios, $lingua, $gengiva, $unhas, $articulacoes, $MMSS_MMII, $abdome, $acne, $insonia, $estresse, $cansaco, $ansiedade, $habito_intestinal, $consistencia_fezes, $dor_evacuar, $fezes_ressecadas, $uso_forca, $fezes_amolecidas, $fezes_liquidas, $urgencia_fecal, $flatulencia, $presenca_sangue_fezes, $fezes_fetidas, $fezes_espumosas, $diurese, $dor_urinar, $incontinencia, $presenca_sangue_urina, $doencas_associadas, $familiar_DM, $familiar_HA, $familiar_CA, $familiar_dislipidemia, $familiar_obesidade, $familiar_magreza, $familiar_outros, $denticao, $protese, $degluticao, $motivo_deglut_ruim, $mobilidade_fisica, $dependencia_mobilidade, $peso_habitual, $mudanca_peso_recente, $tempo_mudanca_peso, $alteracao_apetite, $segue_dieta, $refeicoes_dia, $duracao_refeicao, $consumo_agua, $ajuda_se_alimentar, $regul_menstruacao, $sinais_tpm, $amenorreia, $sinais_menopausa, $gestacoes_anteriores, $menarca, $abortos, $sinais_andropausa, $desenv_genitalia, $desenv_mama, $pelos_pubianos, $digestao_eructacao, $digestao_dispepsia, $digestao_pirose, $digestao_refluxo, $digestao_nauseas, $digestao_vomito, $digestao_distensao){
			$sql = "UPDATE Pacientes" . $this->cpfNum . " SET cpf = '" . $paciente->cpf . "', nome = '" . $paciente->nome . "', cpf_nutri_responsavel = '" . $paciente->nutriResponsavel . "', data_nascimento = '" . $data_nascimento . "', sexo = '" . $sexo . "', profissao = '" . $profissao . "', estado_civil = " . $estado_civil . ", nacionalidade = '" . $nacionalidade . "', naturalidade = '" . $naturalidade . "', bairro = '" . $bairro . "', tipo_domicilio = '" . $tipo_domicilio . "', qtd_pessoas_reside = " . $qtd_pessoas_reside . ", renda_familiar = " . $renda_familiar . ", horas_sono = " . $horas_sono . ", caracteristicas_sono = '" . $caracteristicas_sono . "', lugar_refeicoes = '" . $lugar_refeicoes . "', freq_bebidas_alcoolicas = '" . $freq_bebidas_alcoolicas . "', num_cigarros_dia = " . $num_cigarros_dia . ", uso_droga_ilicita = '" . $uso_droga_ilicita . "', nivel_instrucao = " . $nivel_instrucao . ", restricoes_religiao = '" . $restricoes_religiao . "', olhos = '" . $olhos . "', cabelo = '" . $cabelo . "', labios = '" . $labios . "', lingua = '" . $lingua . "', gengiva = '" . $gengiva . "', unhas = '" . $unhas . "', articulacoes = '" . $articulacoes . "', MMSS_MMII = '" . $MMSS_MMII . "', abdome = '" . $abdome . "', acne = '" . $acne . "', insonia = '" . $insonia . "', estresse = '" . $estresse . "', cansaco = '" . $cansaco . "', ansiedade = '" . $ansiedade . "', habito_intestinal = '" . $habito_intestinal . "', consistencia_fezes = " . $consistencia_fezes . ", dor_evacuar = " . ((int) $dor_evacuar) . ", fezes_ressecadas = " . ((int) $fezes_ressecadas) . ", uso_forca = " . ((int) $uso_forca) . ", fezes_amolecidas = " . ((int) $fezes_amolecidas) . ", fezes_liquidas = '" . $fezes_liquidas . "', urgencia_fecal = " . ((int) $urgencia_fecal) . ", flatulencia = " . ((int) $flatulencia) . ", presenca_sangue_fezes = " . ((int) $presenca_sangue_fezes) . ", fezes_fetidas = " . ((int) $fezes_fetidas) . ", fezes_espumosas = " . ((int) $fezes_espumosas) . ", diurese = '" . $diurese . "', dor_urinar = " . ((int) $dor_urinar) . ", incontinencia = " . ((int) $incontinencia) . ", presenca_sangue_urina = " . ((int) $presenca_sangue_urina) . ", doencas_associadas = '" .  $doencas_associadas . "', familiar_DM = '" . $familiar_DM . "', familiar_HA = '" . $familiar_HA . "', familiar_CA = '" . $familiar_CA . "', familiar_dislipidemia = '" . $familiar_dislipidemia . "', familiar_obesidade = '" . $familiar_obesidade . "', familiar_magreza = '" . $familiar_magreza . "', familiar_outros = '" . $familiar_outros . "', denticao = " . $denticao . ", protese = " . $protese . ", degluticao = " . $degluticao . ", motivo_deglut_ruim = '" . $motivo_deglut_ruim . "', mobilidade_fisica = " . $mobilidade_fisica . ", dependencia_mobilidade = " . $dependencia_mobilidade . ", peso_habitual = " . $peso_habitual . ", mudanca_peso_recente = " . $mudanca_peso_recente . ", tempo_mudanca_peso = '" . $tempo_mudanca_peso . "', alteracao_apetite = '" . $alteracao_apetite . "', segue_dieta = '" . $segue_dieta . "', refeicoes_dia = " . $refeicoes_dia . ", duracao_refeicao = '" . $duracao_refeicao . "', consumo_agua = " . $consumo_agua . ", ajuda_se_alimentar = '" . $ajuda_se_alimentar . "', regul_menstruacao = " . $regul_menstruacao . ", sinais_tpm = '" . $sinais_tpm . "', amenorreia = '" . $amenorreia . "', sinais_menopausa = '" . $sinais_menopausa . "', gestacoes_anteriores = " . $gestacoes_anteriores . ", menarca = " . $menarca . ", abortos = " . $abortos . ", sinais_andropausa = '" . $sinais_andropausa . "', desenv_genitalia = '" . $desenv_genitalia . "', desenv_mama = '" . $desenv_mama . "', pelos_pubianos = '" . $pelos_pubianos . "', digestao_eructacao = " . ((int) $digestao_eructacao) . ", digestao_dispepsia = " . ((int) $digestao_dispepsia) . ", digestao_pirose = " . ((int) $digestao_pirose) . ", digestao_refluxo = " . ((int) $digestao_refluxo) . ", digestao_nauseas = " . ((int) $digestao_nauseas) . ", digestao_vomito = " . ((int) $digestao_vomito) . ", digestao_distensao = " . ((int) $digestao_distensao) . " WHERE cpf = '" . $cpfPaciente . "'";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
			if ($stmt->rowCount()>0){
				return true;
			}
			return false;
		}
		public function recuperarPacientes(){
			$sql = "SELECT CPF, nome FROM Pacientes" . $this->cpfNum . " WHERE cpf_nutri_responsavel = '" . $this->cpf . "'";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
			$pacientes = array();
			while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
				array_push($pacientes, new Paciente($result["CPF"], $result["nome"], $this->cpf));
			}
			
			return $pacientes;
		}
		public function recuperarAnamnesePacientes($cpf){
			$sql = "SELECT * FROM Pacientes" . $this->cpfNum . " WHERE CPF = '" . $cpf . "'";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
			$pacientes = array();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			return $result;
		}
		public function removerPaciente($cpf){
			$sql = "DELETE FROM Pacientes" . $this->cpfNum . " WHERE CPF = '" . $cpf . "'";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
		}
		/*********************************** RegDiagnostico ************************************/
		public function registrarDiagnostico($diagnostico){
			$sql = "INSERT INTO Registro_Diagnostico VALUES ('" . $diagnostico->dataConsulta . "', '" . $diagnostico->paciente . "', '" . $diagnostico->examesBioquimicos . "', '" . $diagnostico->orientacaoPlanoAlimentar . "', " . $diagnostico->metaCarboidrato . ", " . $diagnostico->metaProteina . ", " . $diagnostico->metaLipideo . ", " . $diagnostico->pesoAtual . ", " . $diagnostico->pesoIdeal . ", " . $diagnostico->PCT . ", " . $diagnostico->PCB . ", " . $diagnostico->PCSE . ", " . $diagnostico->PCSI . ", " . $diagnostico->altura . ", " . $diagnostico->CC . ", " . $diagnostico->CQ . ", " . $diagnostico->CB . ", " . $diagnostico->compJoelho . ", " . $diagnostico->circPanturrilha . ")";
			$stmt = DataGetter::getConn()->prepare($sql);
			try{
				return $stmt->execute();
			}catch(PDOException $e){
			    return $e->getMessage();
			}
		}
		public function recuperarDiagnosticos($cpfPaciente){
			$sql = "SELECT data_consulta, orientacao_plano_alimentar, meta_carboidrato, meta_proteina, meta_lipideo, exames_bioquimicos, peso_atual, peso_ideal, PCT, PCB, PCSE, PCSI, altura, CC, CQ, CB, comp_joelho, circ_panturrilha FROM Registro_Diagnostico WHERE cpf_paciente = '" . $cpfPaciente . "'";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
			$diagnosticos = array();
			while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
				array_push($diagnosticos, new RegDiagnostico($cpfPaciente, $result["data_consulta"], array(), $result["meta_carboidrato"], $result["meta_proteina"], $result["meta_lipideo"], array(), $result["exames_bioquimicos"], $result["orientacao_plano_alimentar"], $result["peso_atual"], $result["peso_ideal"], $result["PCT"], $result["PCB"], $result["PCSE"], $result["PCSI"], $result["altura"], $result["CC"], $result["CQ"], $result["CB"], $result["comp_joelho"], $result["circ_panturrilha"]));
			}
			
			return $diagnosticos;
		}
		public function recuperarDadosDiagnostico($diagnostico){ //fazer recuperação do plano alimentar
			$sql = "SELECT Recordatorio.id_prato AS id_prato, Recordatorio.horario AS horario, Recordatorio.lugar AS lugar, Recordatorio.quantidade AS quantidade, Recordatorio.frequencia AS frequencia, Prato.nome AS nome, Prato.rendimento AS rendimento, Prato.medida AS medida FROM Recordatorio, Prato WHERE Recordatorio.cpf_paciente = '" . $diagnostico->paciente . "' AND Recordatorio.data_consulta = '" . $diagnostico->dataConsulta . "' AND Prato.id = Recordatorio.id_prato";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
			$recordatorio = array();
			$pratos = array();
			$quantidades = array();
			$frequencias = array();
			$ref_ant = NULL;
			$primeiro = true;
			while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
				if ($primeiro){
					$ref_ant = new RefeicaoRecordatoria($result["horario"], array(), array(), $result["lugar"], array());
					$primeiro = false;
				}
				if ($ref_ant->horario!=$result["horario"]){
					array_push($recordatorio, new RefeicaoRecordatoria($ref_ant->horario, $pratos, $quantidades, $ref_ant->lugar, $frequencias));
					$ref_ant = new RefeicaoRecordatoria($result["horario"], array(), array(), $result["lugar"], array());
					$pratos = array();
					$quantidades = array();
					$frequencias = array();
				}
				array_push($pratos, new Prato($result["id_prato"], $result["nome"], $result["rendimento"], $result["medida"], "-", array(), array(), array(),  "-",  "-", "-"));
				array_push($quantidades, $result["quantidade"]);
				array_push($frequencias, $result["frequencia"]);				
			}
			if (!$primeiro){
				array_push($recordatorio, new RefeicaoRecordatoria($ref_ant->horario, $pratos, $quantidades, $ref_ant->lugar, $frequencias));
			}
			$sql = "SELECT Ref_Prato_Sub.*, Prato.nome AS nome_prato_sub, Prato.medida AS medida_prato_sub, Prato.rendimento AS rendimento_sub, Prato.modo_preparo AS modo_preparo_sub FROM
				(SELECT Ref_Paci_Nome_Prato.*, Substituicao_Pratos.id_prato_sub, Substituicao_Pratos.qtd_prato_sub FROM 
					(SELECT Ref_Paci_Nome_IdP.*, Prato.nome AS nome_prato_ori, Prato.medida AS medida_prato_ori, Prato.rendimento AS rendimento_ori, Prato.modo_preparo AS modo_preparo_ori FROM 
						(SELECT Ref.*, Pratos_Refeicao.id_prato AS id_prato_ori, Pratos_Refeicao.quantidade AS qtd_prato_ori FROM 
							(SELECT id, horario, nome AS nome_refeicao FROM Refeicao WHERE cpf_paciente = '" . $diagnostico->paciente . "' AND data_consulta = '" . $diagnostico->dataConsulta . "') AS Ref
						LEFT JOIN Pratos_Refeicao ON Pratos_Refeicao.id_refeicao = Ref.id) AS Ref_Paci_Nome_IdP
					LEFT JOIN Prato ON Prato.id = Ref_Paci_Nome_IdP.id_prato_ori) AS Ref_Paci_Nome_Prato
				LEFT JOIN Substituicao_Pratos ON Substituicao_Pratos.id_refeicao_original = Ref_Paci_Nome_Prato.id AND Substituicao_Pratos.id_prato_original = Ref_Paci_Nome_Prato.id_prato_ori) AS Ref_Prato_Sub
			LEFT JOIN Prato ON Prato.id = Ref_Prato_Sub.id_prato_sub
			ORDER BY Ref_Prato_Sub.horario";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
			$planoAlimentar = array();
			$pratos = array();
			$quantidades = array();
			$substituicoesTotal = array();
			$qtdSubsTotal = array();
			$substituicoes = array();
			$qtdSubs = array();
			$ref_ant = NULL;
			$prato_ant = NULL;
			$qtd_ant = NULL;
			$primeiro = true;
			while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
				if ($primeiro){
					$ref_ant = new Refeicao($result["id"], $result["nome_refeicao"], $result["horario"], array(), array(),array(),array());
					$prato_ant = new Prato($result["id_prato_ori"], $result["nome_prato_ori"], $result["rendimento_ori"], $result["medida_prato_ori"], $result["modo_preparo_ori"], array(), array(), array(), "-", "-", "-");
					$qtd_ant = $result["qtd_prato_ori"];
					$primeiro = false;
				}
				if ($ref_ant->id!=$result["id"]){
					array_push($pratos, $prato_ant);
					array_push($quantidades, $qtd_ant);
					array_push($substituicoesTotal, $substituicoes);
					array_push($qtdSubsTotal, $qtdSubs);
					array_push($planoAlimentar, new Refeicao($ref_ant->id, $ref_ant->nome, $ref_ant->horario, $pratos, $quantidades, $substituicoesTotal, $qtdSubsTotal));
					$ref_ant = new Refeicao($result["id"], $result["nome_refeicao"], $result["horario"], array(), array(),array(),array());
					$prato_ant = new Prato($result["id_prato_ori"], $result["nome_prato_ori"], $result["rendimento_ori"], $result["medida_prato_ori"], $result["modo_preparo_ori"], array(), array(), array(), "-", "-", "-");
					$qtd_ant = $result["qtd_prato_ori"];
					$pratos = array();
					$quantidades = array();
					$substituicoesTotal = array();
					$qtdSubsTotal = array();
					$substituicoes = array();
					$qtdSubs = array();
				}
				if ($prato_ant->id!=$result["id_prato_ori"]){
					array_push($pratos, $prato_ant);
					array_push($quantidades, $qtd_ant);
					array_push($substituicoesTotal, $substituicoes);
					array_push($qtdSubsTotal, $qtdSubs);
					$prato_ant = new Prato($result["id_prato_ori"], $result["nome_prato_ori"], $result["rendimento_ori"], $result["medida_prato_ori"], $result["modo_preparo_ori"], array(), array(), array(), "-", "-", "-");
					$qtd_ant = $result["qtd_prato_ori"];
					$substituicoes = array();
					$qtdSubs = array();
				}
				if ($result["id_prato_sub"]!=NULL){
					array_push($substituicoes, new Prato($result["id_prato_sub"], $result["nome_prato_sub"], $result["rendimento_sub"], $result["medida_prato_sub"], $result["modo_preparo_sub"], array(), array(), array(), "-", "-", "-"));
					array_push($qtdSubs, $result["qtd_prato_sub"]);
				}
			}
			if(!$primeiro){
				array_push($pratos, $prato_ant);
				array_push($quantidades, $qtd_ant);
				array_push($substituicoesTotal, $substituicoes);
				array_push($qtdSubsTotal, $qtdSubs);
				array_push($planoAlimentar, new Refeicao($ref_ant->id, $ref_ant->nome, $ref_ant->horario, $pratos, $quantidades, $substituicoesTotal, $qtdSubsTotal));
			}
			$diagnostico->recordatorio = $recordatorio;
			$diagnostico->planoAlimentar = $planoAlimentar;
			return $diagnostico;
		}
		public function atualizarDiagnostico($diagnostico, $cpfPaciente, $dataConsulta){
			$sql = "UPDATE Registro_Diagnostico SET data_consulta = '" . $diagnostico->dataConsulta . "', cpf_paciente = '" . $diagnostico->paciente . "', exames_bioquimicos = '" . $diagnostico->examesBioquimicos . "', orientacao_plano_alimentar = '" . $diagnostico->orientacaoPlanoAlimentar . "', meta_carboidrato = " . $diagnostico->metaCarboidrato . ", meta_proteina = " . $diagnostico->metaProteina . ", meta_lipideo = " . $diagnostico->metaLipideo . ", peso_atual = " . $diagnostico->pesoAtual . ", peso_ideal = " . $diagnostico->pesoIdeal . ", PCT = " . $diagnostico->PCT . ", PCB = " . $diagnostico->PCB . ", PCSE = " . $diagnostico->PCSE . ", PCSI = " . $diagnostico->PCSI . ", altura = " . $diagnostico->altura . ", CC = " . $diagnostico->CC . ", CQ = " . $diagnostico->CQ . ", CB = " . $diagnostico->CB . ", comp_joelho = " . $diagnostico->compJoelho . ", circ_panturrilha = " . $diagnostico->circPanturrilha . " WHERE cpf_paciente = '" . $cpfPaciente . "' AND data_consulta = '" . $dataConsulta . "'";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
			if ($stmt->rowCount()>0){
				return true;
			}
			return false;
		} 
		public function removerDiagnostico($paciente, $dataConsulta){
			$sql = "DELETE FROM Registro_Diagnostico WHERE cpf_paciente = '" . $paciente . "' AND data_consulta = '" . $dataConsulta . "'";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
		}
		/*********************************** Recordatorio ***********************************/
		public function registrarRecordatorio($recordatorio, $cpfPaciente, $dataConsulta){
			for ($i = 0; $i<count($recordatorio); $i++){
				for ($j = 0; $j<count($recordatorio[$i]->pratos); $j++){
					$sql = "INSERT INTO Recordatorio VALUES ('" . $dataConsulta . "', '" . $cpfPaciente . "', " . $recordatorio[$i]->pratos[$j]->id . ", '" . $recordatorio[$i]->horario . "', '" . $recordatorio[$i]->lugar . "', " . $recordatorio[$i]->quantidade[$j] . ", '" . $recordatorio[$i]->frequencia . "')";
					$stmt = DataGetter::getConn()->prepare($sql);
					try{
						$stmt->execute();
					}catch(PDOException $e){
					    return $e->getMessage();
					}
				}
			}
			return true;
		}
		public function atualizarRecordatorio($recordatorio, $cpfPaciente, $dataConsulta, $horario, $idPrato){
			$cont = 0;
			for ($i = 0; $i<count($recordatorio); $i++){
				for ($j = 0; $j<count($recordatorio[$i]->pratos); $j++){
					$sql = "UPDATE Recordatorio SET data_consulta = '" . $dataConsulta . "', cpf_paciente = '" . $cpfPaciente . "', id_prato = " . $recordatorio[$i]->pratos[$j]->id . ", horario = '" . $recordatorio[$i]->horario . "', lugar = '" . $recordatorio[$i]->lugar . "', quantidade = " . $recordatorio[$i]->quantidade[$j] . ", frequencia = '" . $recordatorio[$i]->frequencia . "' WHERE cpf_paciente = '" . $cpfPaciente . "' AND data_consulta = '" . $dataConsulta . "' AND horario = '" . $horario . "' AND id_prato = " . $idPrato;
					$stmt = DataGetter::getConn()->prepare($sql);
					$stmt->execute();
					$cont+=$stmt->rowCount();
				}
			}
			if ($cont>0){
				return true;
			}
			return false;
		}
		/************************************** Prato *************************************/
		public function registrarPrato($prato){
			$sql = "INSERT INTO Prato(nome, rendimento, medida, modo_preparo) VALUES ('" . $prato->nome . "', " . $prato->rendimento . ", '" . $prato->medida . "', '" . $prato->modoPreparo . "')";
			DataGetter::getConn()->exec($sql);
			$sql = "SELECT LAST_INSERT_ID() INTO Prato";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			$prato->id = $result["id"];
			for ($i = 0; $i<count($prato->alimentos); $i++){
				$sql = "INSERT INTO Alimentos_Prato VALUES (" . $prato->id . ", " . $prato->alimentos[$i]->id . ", '" . $prato->medidas[$i] . "', " . $prato->quantidades[$i] . ")";
				$stmt = DataGetter::getConn()->prepare($sql);
				try{
					$stmt->execute();
				}catch(PDOException $e){
				    return $e->getMessage();
				}
				$sql = "INSERT INTO Substituicao_Alimentos VALUES (" . $prato->id . ", " . $prato->alimentos[$i]->id . ", '" . $prato->medidas[$i] . "', " . $prato->quantidades[$i] . ", " . $prato->substituicoes[$i]->id . ", '" . $prato->medidasSubs[$i] . "', " . $prato->qtdSubs[$i] . ")";
				$stmt = DataGetter::getConn()->prepare($sql);
				try{
					$stmt->execute();
				}catch(PDOException $e){
				    return $e->getMessage();
				}
			}
		}
		public function atualizarPrato($prato){
			$sql = "UPDATE Prato SET nome = '" . $prato->nome . "', rendimento = " . $prato->rendimento . ", medida = '" . $prato->medida . "', modo_preparo = '" . $prato->modoPreparo . "' WHERE id = " . $prato->id . ")";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
			if ($stmt->rowCount()>0){
				return true;
			}
			return false;
		}
		public function removerPrato($id){
			$sql = "DELETE FROM Prato WHERE id = " . $id;
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
		}
		public function recuperarPratosId($id){
			$sql = "SELECT PratoAliSub.*, Alimentos.nome AS nomeSub, Alimentos.umidade AS umidadeSub, Alimentos.energia AS energiaSub, Alimentos.proteina AS proteinaSub, Alimentos.lipideos AS lipideosSub, Alimentos.colesterol AS colesterolSub, Alimentos.carboidrato AS carboidratoSub, Alimentos.fibras AS fibrasSub, Alimentos.cinzas AS cinzasSub, Alimentos.calcio AS calcioSub, Alimentos.magnesio AS magnesioSub, Alimentos.manganes AS manganesSub, Alimentos.fosforo AS fosforoSub, Alimentos.ferro AS ferroSub, Alimentos.sodio AS sodioSub, Alimentos.potassio AS potassioSub, Alimentos.cobre AS cobreSub, Alimentos.zinco AS zincoSub, Alimentos.retinol AS retinolSub, Alimentos.RE AS RESub, Alimentos.RAE AS RAESub, Alimentos.tiamina AS tiaminaSub, Alimentos.riboflavina AS riboflavinaSub, Alimentos.piridoxina AS piridoxinaSub, Alimentos.niacina AS niacinaSub, Alimentos.vitamina_c AS vitaminaCSub FROM
				(SELECT PratoOri.*, Substituicao_Alimentos.id_alimento_sub, Substituicao_Alimentos.med_alim_sub, Substituicao_Alimentos.qtd_alim_sub FROM  
			        (SELECT PratoAli.id AS idPrato, PratoAli.nome AS nomePrato, PratoAli.rendimento, PratoAli.medida, PratoAli.modo_preparo, PratoAli.medidaAli, PratoAli.quantidade, Alimentos.* FROM
			            (SELECT Pr_id.*, Alimentos_Prato.id_alimento, Alimentos_Prato.medida AS medidaAli, Alimentos_Prato.quantidade FROM Alimentos_Prato 
			             RIGHT JOIN (SELECT * FROM Prato WHERE id = " . $id . ") AS Pr_id ON Pr_id.id = Alimentos_Prato.id_prato) AS PratoAli
			        LEFT JOIN Alimentos ON PratoAli.id_alimento = Alimentos.id) AS PratoOri
			    LEFT JOIN Substituicao_Alimentos ON Substituicao_Alimentos.id_prato_original = PratoOri.idPrato AND Substituicao_Alimentos.id_alimento_original = PratoOri.id) AS PratoAliSub
			LEFT JOIN Alimentos ON PratoAliSub.id_alimento_sub = Alimentos.id";
			$primeiro = true;
			$alimentos = array();
			$medidas = array();
			$quantidades = array();
			$substituicoesTotal = array();
			$medidasTotal = array();
			$qtdTotal = array();
			$substituicoes = array();
			$medidasSubs = array();
			$qtdSubs = array();
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
			$pratos = array();
			$prato_ant;
			$alimento_ant;
			$medida_ant;
			$qtd_ant;
			while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
				if ($primeiro){
					$primeiro = false;
					$prato_ant = new Prato($result["idPrato"], $result["nomePrato"], $result["rendimento"], $result["medida"], $result["modo_preparo"], array(), array(), array(), array(), array(), array());
					$alimento_ant = new Alimento($result["id"], $result["nome"], $result["umidade"], $result["energia"], $result["proteina"], $result["lipideos"], $result["colesterol"], $result["carboidrato"], $result["fibras"], $result["cinzas"], $result["calcio"], $result["magnesio"], $result["manganes"], $result["fosforo"], $result["ferro"], $result["sodio"], $result["potassio"], $result["cobre"], $result["zinco"], $result["retinol"], $result["RE"], $result["RAE"], $result["tiamina"], $result["riboflavina"], $result["piridoxina"], $result["niacina"], $result["vitamina_c"]);
					$medida_ant = $result["medida"];
					$qtd_ant = $result["quantidade"];
				}
				if ($alimento_ant->id!=$result["id"]){
					array_push($alimentos, $alimento_ant);
					array_push($medidas, $medida_ant);
					array_push($quantidades, $qtd_ant);
					array_push($substituicoesTotal, $substituicoes);
					array_push($medidasTotal, $medidasSubs);
					array_push($qtdTotal, $qtdSubs);
					$alimento_ant = new Alimento($result["id"], $result["nome"], $result["umidade"], $result["energia"], $result["proteina"], $result["lipideos"], $result["colesterol"], $result["carboidrato"], $result["fibras"], $result["cinzas"], $result["calcio"], $result["magnesio"], $result["manganes"], $result["fosforo"], $result["ferro"], $result["sodio"], $result["potassio"], $result["cobre"], $result["zinco"], $result["retinol"], $result["RE"], $result["RAE"], $result["tiamina"], $result["riboflavina"], $result["piridoxina"], $result["niacina"], $result["vitamina_c"]);
					$medida_ant = $result["medidaAli"];
					$qtd_ant = $result["quantidade"];
					$substituicoes = array();
					$medidasSubs = array();
					$qtdSubs = array();
				}
				if ($result["id_alimento_sub"]!=NULL){
					array_push($substituicoes, new Alimento($result["id_alimento_sub"], $result["nomeSub"], $result["umidadeSub"], $result["energiaSub"], $result["proteinaSub"], $result["lipideosSub"], $result["colesterolSub"], $result["carboidratoSub"], $result["fibrasSub"], $result["cinzasSub"], $result["calcioSub"], $result["magnesioSub"], $result["manganesSub"], $result["fosforoSub"], $result["ferroSub"], $result["sodioSub"], $result["potassioSub"], $result["cobreSub"], $result["zincoSub"], $result["retinolSub"], $result["RESub"], $result["RAESub"], $result["tiaminaSub"], $result["riboflavinaSub"], $result["piridoxinaSub"], $result["niacinaSub"], $result["vitaminaCSub"]));
					array_push($medidasSubs, $result["med_alim_sub"]);
					array_push($qtdSubs, $result["qtd_alim_sub"]);
				}
				
			}
			if(!$primeiro){
				array_push($alimentos, $alimento_ant);
				array_push($medidas, $medida_ant);
				array_push($quantidades, $qtd_ant);
				array_push($substituicoesTotal, $substituicoes);
				array_push($medidasTotal, $medidasSubs);
				array_push($qtdTotal, $qtdSubs);
				$pratos = new Prato($prato_ant->id, $prato_ant->nome, $prato_ant->rendimento, $prato_ant->medida, $prato_ant->modoPreparo, $alimentos, $quantidades, $medidas, $substituicoesTotal, $qtdTotal, $medidasTotal);
				$pratos->substituicoes = $substituicoesTotal;
				$pratos->qtdSubs = $qtdTotal;
				$pratos->medidasSubs = $medidasTotal;
			}
			
			return $pratos;
		}
		public function recuperarPratos($padrao){
			$sql = "SELECT PratoAliSub.*, Alimentos.nome AS nomeSub, Alimentos.umidade AS umidadeSub, Alimentos.energia AS energiaSub, Alimentos.proteina AS proteinaSub, Alimentos.lipideos AS lipideosSub, Alimentos.colesterol AS colesterolSub, Alimentos.carboidrato AS carboidratoSub, Alimentos.fibras AS fibrasSub, Alimentos.cinzas AS cinzasSub, Alimentos.calcio AS calcioSub, Alimentos.magnesio AS magnesioSub, Alimentos.manganes AS manganesSub, Alimentos.fosforo AS fosforoSub, Alimentos.ferro AS ferroSub, Alimentos.sodio AS sodioSub, Alimentos.potassio AS potassioSub, Alimentos.cobre AS cobreSub, Alimentos.zinco AS zincoSub, Alimentos.retinol AS retinolSub, Alimentos.RE AS RESub, Alimentos.RAE AS RAESub, Alimentos.tiamina AS tiaminaSub, Alimentos.riboflavina AS riboflavinaSub, Alimentos.piridoxina AS piridoxinaSub, Alimentos.niacina AS niacinaSub, Alimentos.vitamina_c AS vitaminaCSub FROM
				(SELECT PratoOri.*, Substituicao_Alimentos.id_alimento_sub, Substituicao_Alimentos.med_alim_sub, Substituicao_Alimentos.qtd_alim_sub FROM  
			        (SELECT PratoAli.id AS idPrato, PratoAli.nome AS nomePrato, PratoAli.rendimento, PratoAli.medida, PratoAli.modo_preparo, PratoAli.medidaAli, PratoAli.quantidade, Alimentos.* FROM
			            (SELECT Pr_id.*, Alimentos_Prato.id_alimento, Alimentos_Prato.medida AS medidaAli, Alimentos_Prato.quantidade FROM Alimentos_Prato 
			             RIGHT JOIN (SELECT * FROM Prato WHERE nome LIKE '%" . $padrao . "%') AS Pr_id ON Pr_id.id = Alimentos_Prato.id_prato) AS PratoAli
			        LEFT JOIN Alimentos ON PratoAli.id_alimento = Alimentos.id) AS PratoOri
			    LEFT JOIN Substituicao_Alimentos ON Substituicao_Alimentos.id_prato_original = PratoOri.idPrato AND Substituicao_Alimentos.id_alimento_original = PratoOri.id) AS PratoAliSub
			LEFT JOIN Alimentos ON PratoAliSub.id_alimento_sub = Alimentos.id";
			$primeiro = true;
			$alimentos = array();
			$medidas = array();
			$quantidades = array();
			$substituicoesTotal = array();
			$medidasTotal = array();
			$qtdTotal = array();
			$substituicoes = array();
			$medidasSubs = array();
			$qtdSubs = array();
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
			$pratos = array();
			$prato_ant;
			$alimento_ant;
			$medida_ant;
			$qtd_ant;
			while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
				if ($primeiro){
					$primeiro = false;
					$prato_ant = new Prato($result["idPrato"], $result["nomePrato"], $result["rendimento"], $result["medida"], $result["modo_preparo"], array(), array(), array(), array(), array(), array());
					$alimento_ant = new Alimento($result["id"], $result["nome"], $result["umidade"], $result["energia"], $result["proteina"], $result["lipideos"], $result["colesterol"], $result["carboidrato"], $result["fibras"], $result["cinzas"], $result["calcio"], $result["magnesio"], $result["manganes"], $result["fosforo"], $result["ferro"], $result["sodio"], $result["potassio"], $result["cobre"], $result["zinco"], $result["retinol"], $result["RE"], $result["RAE"], $result["tiamina"], $result["riboflavina"], $result["piridoxina"], $result["niacina"], $result["vitamina_c"]);
					$medida_ant = $result["medida"];
					$qtd_ant = $result["quantidade"];
				}
				if ($prato_ant->id!=$result["idPrato"]){
					array_push($alimentos, $alimento_ant);
					array_push($medidas, $medida_ant);
					array_push($quantidades, $qtd_ant);
					array_push($substituicoesTotal, $substituicoes);
					array_push($medidasTotal, $medidasSubs);
					array_push($qtdTotal, $qtdSubs);
					array_push($pratos, new Prato($prato_ant->id, $prato_ant->nome, $prato_ant->rendimento, $prato_ant->medida, $prato_ant->modo_preparo, $alimentos, $quantidades, $medidas, $substituicoesTotal, $qtdTotal, $medidasTotal));
					$pratos[count($pratos)-1]->substituicoes = $substituicoesTotal;
					$pratos[count($pratos)-1]->qtdSubs = $qtdTotal;
					$pratos[count($pratos)-1]->medidasSubs = $medidasTotal;
					$prato_ant = new Prato($result["idPrato"], $result["nomePrato"], $result["rendimento"], $result["medida"], $result["modo_preparo"], array(), array(), array(), array(), array(), array());
					$alimento_ant = new Alimento($result["id"], $result["nome"], $result["umidade"], $result["energia"], $result["proteina"], $result["lipideos"], $result["colesterol"], $result["carboidrato"], $result["fibras"], $result["cinzas"], $result["calcio"], $result["magnesio"], $result["manganes"], $result["fosforo"], $result["ferro"], $result["sodio"], $result["potassio"], $result["cobre"], $result["zinco"], $result["retinol"], $result["RE"], $result["RAE"], $result["tiamina"], $result["riboflavina"], $result["piridoxina"], $result["niacina"], $result["vitamina_c"]);
					$medida_ant = $result["medidaAli"];
					$qtd_ant = $result["quantidade"];
					$alimentos = array();
					$medidas = array();
					$quantidades = array();
					$substituicoesTotal = array();
					$medidasTotal = array();
					$qtdTotal = array();
					$substituicoes = array();
					$medidasSubs = array();
					$qtdSubs = array();
				}
				if ($alimento_ant->id!=$result["id"]){
					array_push($alimentos, $alimento_ant);
					array_push($medidas, $medida_ant);
					array_push($quantidades, $qtd_ant);
					array_push($substituicoesTotal, $substituicoes);
					array_push($medidasTotal, $medidasSubs);
					array_push($qtdTotal, $qtdSubs);
					$alimento_ant = new Alimento($result["id"], $result["nome"], $result["umidade"], $result["energia"], $result["proteina"], $result["lipideos"], $result["colesterol"], $result["carboidrato"], $result["fibras"], $result["cinzas"], $result["calcio"], $result["magnesio"], $result["manganes"], $result["fosforo"], $result["ferro"], $result["sodio"], $result["potassio"], $result["cobre"], $result["zinco"], $result["retinol"], $result["RE"], $result["RAE"], $result["tiamina"], $result["riboflavina"], $result["piridoxina"], $result["niacina"], $result["vitamina_c"]);
					$medida_ant = $result["medidaAli"];
					$qtd_ant = $result["quantidade"];
					$substituicoes = array();
					$medidasSubs = array();
					$qtdSubs = array();
				}
				if ($result["id_alimento_sub"]!=NULL){
					array_push($substituicoes, new Alimento($result["id_alimento_sub"], $result["nomeSub"], $result["umidadeSub"], $result["energiaSub"], $result["proteinaSub"], $result["lipideosSub"], $result["colesterolSub"], $result["carboidratoSub"], $result["fibrasSub"], $result["cinzasSub"], $result["calcioSub"], $result["magnesioSub"], $result["manganesSub"], $result["fosforoSub"], $result["ferroSub"], $result["sodioSub"], $result["potassioSub"], $result["cobreSub"], $result["zincoSub"], $result["retinolSub"], $result["RESub"], $result["RAESub"], $result["tiaminaSub"], $result["riboflavinaSub"], $result["piridoxinaSub"], $result["niacinaSub"], $result["vitaminaCSub"]));
					array_push($medidasSubs, $result["med_alim_sub"]);
					array_push($qtdSubs, $result["qtd_alim_sub"]);
				}
				
			}
			if(!$primeiro){
				array_push($alimentos, $alimento_ant);
				array_push($medidas, $medida_ant);
				array_push($quantidades, $qtd_ant);
				array_push($substituicoesTotal, $substituicoes);
				array_push($medidasTotal, $medidasSubs);
				array_push($qtdTotal, $qtdSubs);
				array_push($pratos, new Prato($prato_ant->id, $prato_ant->nome, $prato_ant->rendimento, $prato_ant->medida, $prato_ant->modo_preparo, $alimentos, $quantidades, $medidas, $substituicoesTotal, $qtdTotal, $medidasTotal));
				$pratos[count($pratos)-1]->substituicoes = $substituicoesTotal;
				$pratos[count($pratos)-1]->qtdSubs = $qtdTotal;
				$pratos[count($pratos)-1]->medidasSubs = $medidasTotal;
			}
			
			return $pratos;
		}
		public function adicionarAlimentoAoPrato($prato, $alimento, $quantidade, $medida, $substituicao, $qtdSub, $medidaSub){
			array_push($prato->alimento, $alimento);
			array_push($prato->quantidades, $quantidade);
			array_push($prato->medidas, $medida);
			array_push($prato->substituicoes, $substituicao);
			array_push($prato->qtdSubs, $qtdSub);
			array_push($prato->medidasSubs, $medidaSub);
			return $prato;
		}
		/************************************** Refeicao *************************************/
		public function registrarRefeicao($refeicao){
			$sql = "INSERT INTO Refeicao(data_consulta, cpf_paciente, nome, horario) VALUES ('" . $refeicao->dataConsulta . "', '" . $refeicao->cpfPaciente . "', '" . $refeicao->nome . "', '" . $refeicao->horario . "')";
			DataGetter::getConn()->exec($sql);
			$sql = "SELECT LAST_INSERT_ID() INTO Refeicao";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			$refeicao->id = $result["id"];
			for ($i = 0; $i<count($refeicao->pratos); $i++){
				$sql = "INSERT INTO Pratos_Refeicao VALUES (" . $refeicao->pratos[$i]->id . ", " . $refeicao->id . ", " . $refeicao->quantidades[$i] . ")";
				DataGetter::getConn()->exec($sql);
				$sql = "INSERT INTO Substituicao_Pratos VALUES (" . $refeicao->id . ", " . $refeicao->pratos[$i]->id . ", " . $refeicao->quantidades[$i] . ", " . $refeicao->substituicoes[$i]->id . ", " . $refeicao->qtdSubs[$i] . ")";
				DataGetter::getConn()->exec($sql);
			}
		}
		public function atualizarRefeicao($refeicao){
			$sql = "UPDATE Refeicao SET data_consulta = '" . $refeicao->dataConsulta . "', cpf_paciente = '" . $refeicao->cpfPaciente . "', nome = '" . $refeicao->nome . "', horario = '" . $refeicao->horario . "' WHERE id = " . $refeicao->id . ")";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
			if ($stmt->rowCount()>0){
				return true;
			}
			return false;
		}
		public function removerRefeicao($id){
			$sql = "DELETE FROM Refeicao WHERE id = " . $id;
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
		}
		public function adicionarPratoARefeicao($refeicao, $prato, $quantidade, $substituicao, $qtdSub){
			array_push($refeicao->pratos, $prato);
			array_push($refeicao->quantidades, $quantidade);
			array_push($refeicao->substituicoes, $substituicao);
			array_push($refeicao->qtdSubs, $qtdSub);
			return $refeicao;
		}
		/********************************************* Aversao **********************************************/
		public function registrarAversao($idAlimento, $cpfPaciente){
			$sql = "INSERT INTO Aversao VALUES (" . $idAlimento . ", '" . $cpfPaciente . "')";
			$stmt = DataGetter::getConn()->prepare($sql);
			try{
				return $stmt->execute();
			}catch(PDOException $e){
			    return $e->getMessage();
			}
		}
		public function recuperarAversoes($cpfPaciente){
			$sql = "SELECT Alimentos.id, Alimentos.nome, Alimentos.umidade, Alimentos.energia, Alimentos.proteina, Alimentos.lipideos, Alimentos.colesterol, Alimentos.carboidrato, Alimentos.fibras, Alimentos.cinzas, Alimentos.calcio, Alimentos.magnesio, Alimentos.manganes, Alimentos.fosforo, Alimentos.ferro, Alimentos.sodio, Alimentos.potassio, Alimentos.cobre, Alimentos.zinco, Alimentos.retinol, Alimentos.RE, Alimentos.RAE, Alimentos.tiamina, Alimentos.riboflavina, Alimentos.piridoxina, Alimentos.niacina, Alimentos.vitamina_c FROM Alimentos, Aversao WHERE Aversao.cpf_paciente = '" . $cpfPaciente . "' AND Aversao.id_alimento = Alimentos.id ORDER BY Alimentos.nome";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
			$aversoes = array();
			while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
				array_push($aversoes, new Alimento($result["id"], $result["nome"], $result["umidade"], $result["energia"], $result["proteina"], $result["lipideos"], $result["colesterol"], $result["carboidrato"], $result["fibras"], $result["cinzas"], $result["calcio"], $result["magnesio"], $result["manganes"], $result["fosforo"], $result["ferro"], $result["sodio"], $result["potassio"], $result["cobre"], $result["zinco"], $result["retinol"], $result["RE"], $result["RAE"], $result["tiamina"], $result["riboflavina"], $result["piridoxina"], $result["niacina"], $result["vitamina_c"]));
			}
			
			return $aversoes;
		}
		public function removerAversao($idAlimento, $cpfPaciente){
			$sql = "DELETE FROM Aversao WHERE id_alimento = " . $idAlimento . " AND cpf_paciente = '" . $cpfPaciente . "'";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
		}
		/********************************************* Preferencia **********************************************/
		public function registrarPreferencia($idAlimento, $cpfPaciente){
			$sql = "INSERT INTO Preferencia VALUES (" . $idAlimento . ", '" . $cpfPaciente . "')";
			DataGetter::getConn()->exec($sql);
		}
		public function recuperarPreferencias($cpfPaciente){
			$sql = "SELECT Alimentos.id, Alimentos.nome, Alimentos.umidade, Alimentos.energia, Alimentos.proteina, Alimentos.lipideos, Alimentos.colesterol, Alimentos.carboidrato, Alimentos.fibras, Alimentos.cinzas, Alimentos.calcio, Alimentos.magnesio, Alimentos.manganes, Alimentos.fosforo, Alimentos.ferro, Alimentos.sodio, Alimentos.potassio, Alimentos.cobre, Alimentos.zinco, Alimentos.retinol, Alimentos.RE, Alimentos.RAE, Alimentos.tiamina, Alimentos.riboflavina, Alimentos.piridoxina, Alimentos.niacina, Alimentos.vitamina_c FROM Alimentos, Preferencia WHERE Preferencia.cpf_paciente = '" . $cpfPaciente . "' AND Preferencia.id_alimento = Alimentos.id ORDER BY Alimentos.nome";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
			$preferencias = array();
			while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
				array_push($preferencias, new Alimento($result["id"], $result["nome"], $result["umidade"], $result["energia"], $result["proteina"], $result["lipideos"], $result["colesterol"], $result["carboidrato"], $result["fibras"], $result["cinzas"], $result["calcio"], $result["magnesio"], $result["manganes"], $result["fosforo"], $result["ferro"], $result["sodio"], $result["potassio"], $result["cobre"], $result["zinco"], $result["retinol"], $result["RE"], $result["RAE"], $result["tiamina"], $result["riboflavina"], $result["piridoxina"], $result["niacina"], $result["vitamina_c"]));
			}
			
			return $preferencias;
		}
		public function removerPreferencia($idAlimento, $cpfPaciente){
			$sql = "DELETE FROM Preferencia WHERE id_alimento = " . $idAlimento . " AND cpf_paciente = '" . $cpfPaciente . "'";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
		}
		/********************************************* Intolerancia **********************************************/
		public function registrarIntolerancia($idAlimento, $cpfPaciente){
			$sql = "INSERT INTO Intolerancia VALUES (" . $idAlimento . ", '" . $cpfPaciente . "')";
			$stmt = DataGetter::getConn()->prepare($sql);
			try{
				return $stmt->execute();
			}catch(PDOException $e){
			    return $e->getMessage();
			}
		}
		public function recuperarIntolerancias($cpfPaciente){
			$sql = "SELECT Alimentos.id, Alimentos.nome, Alimentos.umidade, Alimentos.energia, Alimentos.proteina, Alimentos.lipideos, Alimentos.colesterol, Alimentos.carboidrato, Alimentos.fibras, Alimentos.cinzas, Alimentos.calcio, Alimentos.magnesio, Alimentos.manganes, Alimentos.fosforo, Alimentos.ferro, Alimentos.sodio, Alimentos.potassio, Alimentos.cobre, Alimentos.zinco, Alimentos.retinol, Alimentos.RE, Alimentos.RAE, Alimentos.tiamina, Alimentos.riboflavina, Alimentos.piridoxina, Alimentos.niacina, Alimentos.vitamina_c FROM Alimentos, Intolerancia WHERE Intolerancia.cpf_paciente = '" . $cpfPaciente . "' AND Intolerancia.id_alimento = Alimentos.id ORDER BY Alimentos.nome";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
			$intolerancias = array();
			while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
				array_push($intolerancias, new Alimento($result["id"], $result["nome"], $result["umidade"], $result["energia"], $result["proteina"], $result["lipideos"], $result["colesterol"], $result["carboidrato"], $result["fibras"], $result["cinzas"], $result["calcio"], $result["magnesio"], $result["manganes"], $result["fosforo"], $result["ferro"], $result["sodio"], $result["potassio"], $result["cobre"], $result["zinco"], $result["retinol"], $result["RE"], $result["RAE"], $result["tiamina"], $result["riboflavina"], $result["piridoxina"], $result["niacina"], $result["vitamina_c"]));
			}
			
			return $intolerancias;
		}
		public function removerIntolerancia($idAlimento, $cpfPaciente){
			$sql = "DELETE FROM Intolerancia WHERE id_alimento = " . $idAlimento . " AND cpf_paciente = '" . $cpfPaciente . "'";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
		}
		/********************************************* Suplemento **********************************************/
		public function registrarSuplemento($Suplemento){
			$sql = "INSERT INTO Alimentos(nome, umidade, energia, proteina, lipideos, colesterol, carboidrato, fibras, cinzas, calcio, magnesio, manganes, fosforo, ferro, sodio, potassio, cobre, zinco, retinol, RE, RAE, tiamina, riboflavina, piridoxina, niacina, vitamina_c) VALUES ('" . $suplemento->nome . "', " . $suplemento->umidade . ", " . $suplemento->energia . ", " . $suplemento->proteina . ", " . $suplemento->lipideos . ", " . $suplemento->colesterol . ", " . $suplemento->carboidrato . ", " . $suplemento->fibras . ", " . $suplemento->cinzas . ", " . $suplemento->calcio . ", " . $suplemento->magnesio . ", " . $suplemento->manganes . ", " . $suplemento->fosforo . ", " . $suplemento->ferro . ", " . $suplemento->sodio . ", " . $suplemento->potassio . ", " . $suplemento->cobre . ", " . $suplemento->zinco . ", " . $suplemento->retinol . ", " . $suplemento->RE . ", " . $suplemento->RAE . ", " . $suplemento->tiamina . ", " . $suplemento->riboflavina . ", " . $suplemento->piridoxina . ", " . $suplemento->niacina . ", " . $suplemento->vitaminaC . ")";
				$stmt = DataGetter::getConn()->prepare($sql);
				try{
					return $stmt->execute();
				}catch(PDOException $e){
				    return $e->getMessage();
				}
		}
		public function atualizarSuplemento($suplemento){
			if ($suplemento->id!=0 && $suplemento->id<=596){
				return false;
			}
			$sql = "UPDATE Alimentos SET nome = '" . $suplemento->nome . "', umidade = " . $suplemento->umidade . ", energia = " . $suplemento->energia . ", proteina = " . $suplemento->proteina . ", lipideos = " . $suplemento->lipideos . ", colesterol = " . $suplemento->colesterol . ", carboidrato = " . $suplemento->carboidrato . ", fibras = " . $suplemento->fibras . ", cinzas = " . $suplemento->cinzas . ", calcio = " . $suplemento->calcio . ", magnesio = " . $suplemento->magnesio . ", manganes = " . $suplemento->manganes . ", fosforo = " . $suplemento->fosforo . ", ferro = " . $suplemento->ferro . ", sodio = " . $suplemento->sodio . ", potassio = " . $suplemento->potassio . ", cobre = " . $suplemento->cobre . ", zinco = " . $suplemento->zinco . ", retinol = " . $suplemento->retinol . ", RE = " . $suplemento->RE . ", RAE = " . $suplemento->RAE . ", tiamina = " . $suplemento->tiamina . ", riboflavina = " . $suplemento->riboflavina . ", piridoxina = " . $suplemento->piridoxina . ", niacina = " . $suplemento->niacina . ", vitamina_c = " . $suplemento->vitaminaC;
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
			if ($stmt->rowCount()>0){
				return true;
			}
			return false;
		}
		public function recuperarSuplementos($cpfPaciente){
			$sql = "SELECT Alimentos.id, Alimentos.nome, Alimentos.umidade, Alimentos.energia, Alimentos.proteina, Alimentos.lipideos, Alimentos.colesterol, Alimentos.carboidrato, Alimentos.fibras, Alimentos.cinzas, Alimentos.calcio, Alimentos.magnesio, Alimentos.manganes, Alimentos.fosforo, Alimentos.ferro, Alimentos.sodio, Alimentos.potassio, Alimentos.cobre, Alimentos.zinco, Alimentos.retinol, Alimentos.RE, Alimentos.RAE, Alimentos.tiamina, Alimentos.riboflavina, Alimentos.piridoxina, Alimentos.niacina, Alimentos.vitamina_c, Suplementos.indicacao FROM Alimentos, Suplementos WHERE Suplementos.cpf_paciente = '" . $cpfPaciente . "' AND Suplementos.id = Alimentos.id ORDER BY Alimentos.nome";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
			$suplementos = array();
			while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
				array_push($suplementos, new Suplemento($result["id"], $result["nome"], $result["umidade"], $result["energia"], $result["proteina"], $result["lipideos"], $result["colesterol"], $result["carboidrato"], $result["fibras"], $result["cinzas"], $result["calcio"], $result["magnesio"], $result["manganes"], $result["fosforo"], $result["ferro"], $result["sodio"], $result["potassio"], $result["cobre"], $result["zinco"], $result["retinol"], $result["RE"], $result["RAE"], $result["tiamina"], $result["riboflavina"], $result["piridoxina"], $result["niacina"], $result["vitamina_c"], $result["indicacao"]));
			}
			
			return $suplementos;
		}
		
		public function removerSuplemento($id){
			if ($id!=0 && $id<=596){
				return false;
			}
			$sql = "DELETE FROM Alimentos WHERE id = " . $id;
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
			return true;
		}
		public function registrarSuplementoPaciente($idSup, $cpfPaciente, $indicacao){
			$sql = "INSERT INTO Suplementos VALUES (" . $idSup . ", '" . $cpfPaciente . "', '" . $indicacao . "')";
			$stmt = DataGetter::getConn()->prepare($sql);
			try{
				return $stmt->execute();
			}catch(PDOException $e){
			    return $e->getMessage();
			}
		}
		public function removerSuplementoPaciente($idSup, $cpfPaciente){
			$sql = "DELETE FROM Suplementos WHERE id = " . $idSup . " AND cpf_paciente = '" . $cpfPaciente . "'";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
		}
		public function atualizarSuplementoPaciente($idSup, $cpfPaciente, $indicacao){
			$sql = "UPDATE Suplementos SET id = " . $idSup . ", cpf_paciente = '" . $cpfPaciente . "', indicacao = '" . $indicacao . "' WHERE id = " . $idSup . " AND cpf_paciente = '" . $cpfPaciente . "'";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
			if ($stmt->rowCount()>0){
				return true;
			}
			return false;
		}
		/********************************************* Alimentos *************************************************/		
		public function recuperarAlimentos($padrao){
			$sql = "SELECT id, nome, umidade, energia, proteina, lipideos, colesterol, carboidrato, fibras, cinzas, calcio, magnesio, manganes, fosforo, ferro, sodio, potassio, cobre, zinco, retinol, RE, RAE, tiamina, riboflavina, piridoxina, niacina, vitamina_c FROM Alimentos WHERE nome LIKE '%" . $padrao . "%'";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
			$alimentos = array();
			while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
				array_push($alimentos, new Alimento($result["id"], $result["nome"], $result["umidade"], $result["energia"], $result["proteina"], $result["lipideos"], $result["colesterol"], $result["carboidrato"], $result["fibras"], $result["cinzas"], $result["calcio"], $result["magnesio"], $result["manganes"], $result["fosforo"], $result["ferro"], $result["sodio"], $result["potassio"], $result["cobre"], $result["zinco"], $result["retinol"], $result["RE"], $result["RAE"], $result["tiamina"], $result["riboflavina"], $result["piridoxina"], $result["niacina"], $result["vitamina_c"]));
			}
			
			return $alimentos;
		}
		public function recuperarSuplementosTotal($padrao){
			$sql = "SELECT id, nome, umidade, energia, proteina, lipideos, colesterol, carboidrato, fibras, cinzas, calcio, magnesio, manganes, fosforo, ferro, sodio, potassio, cobre, zinco, retinol, RE, RAE, tiamina, riboflavina, piridoxina, niacina, vitamina_c FROM Alimentos WHERE id > 596 AND nome LIKE '%" . $padrao . "%'";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
			$alimentos = array();
			while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
				array_push($alimentos, new Alimento($result["id"], $result["nome"], $result["umidade"], $result["energia"], $result["proteina"], $result["lipideos"], $result["colesterol"], $result["carboidrato"], $result["fibras"], $result["cinzas"], $result["calcio"], $result["magnesio"], $result["manganes"], $result["fosforo"], $result["ferro"], $result["sodio"], $result["potassio"], $result["cobre"], $result["zinco"], $result["retinol"], $result["RE"], $result["RAE"], $result["tiamina"], $result["riboflavina"], $result["piridoxina"], $result["niacina"], $result["vitamina_c"]));
			}
			
			return $alimentos;
		}		
	}
?>