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

		public function Nutricionista($cpf, $nome, $crn){
			$this->cpf = $cpf;
			$this->nome = $nome;
			$this->crn = $crn;
		}


		/********************************** Nutricionista **********************************/
		public function registrarNutricionista($nutri){
			$sql = "INSERT INTO Nutricionista VALUES ('" . $nutri->cpf . "', '" . $nutri->nome . "', '" . $nutri->crn . "')";
			DataGetter::getConn()->exec($sql);
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
		} 

		public function removerNutricionista($cpf){
			$sql = "DELETE FROM Nutricionista WHERE cpf = '" . $cpf . "'";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
		}



		/*************************************** Paciente ****************************************/
		public function registrarPaciente($paciente){
			$sql = "INSERT INTO Paciente(cpf, nome, cpf_nutri_responsavel) VALUES ('" . $paciente->cpf . "', '" . $paciente->nome . "', '" . $this->cpf . "')";
			DataGetter::getConn()->exec($sql);
		}

		public function atualizarAnamnesePaciente($cpfPaciente, $data_nascimento, $sexo, $profissao, $estado_civil, $nacionalidade, $naturalidade, $bairro, $tipo_domicilio, $qtd_pessoas_reside, $renda_familiar, $horas_sono, $caracteristicas_sono, $lugar_refeicoes, $freq_bebidas_alcoolicas, $num_cigarros_dia, $uso_droga_ilicita, $nivel_instrucao, $restricoes_religiao, $olhos, $cabelo, $labios, $lingua, $gengiva, $unhas, $articulacoes, $MMSS_MMII, $abdome, $acne, $insonia, $estresse, $cansaco, $ansiedade, $habito_intestinal, $consistencia_fezes, $dor_evacuar, $fezes_ressecadas, $uso_forca, $fezes_amolecidas, $fezes_liquidas, $urgencia_fecal, $flatulencia, $presenca_sangue_fezes, $fezes_fetidas, $fezes_espumosas, $diurese, $dor_urinar, $incontinencia, $presenca_sangue_urina, $familiar_DM, $familiar_HA, $familiar_CA, $familiar_dislipidemia, $familiar_obesidade, $familiar_magreza, $familiar_outros, $denticao, $protese, $degluticao, $motivo_deglut_ruim, $mobilidade_fisica, $dependencia_mobilidade, $peso_habitual, $mudanca_peso_recente, $tempo_mudanca_peso, $alteracao_apetite, $segue_dieta, $refeicoes_dia, $duracao_refeicao, $consumo_agua, $ajuda_se_alimentar, $regul_menstruacao, $sinais_tpm, $amenorreia, $sinais_menopausa, $gestacoes_anteriores, $menarca, $abortos, $sinais_andropausa, $desenv_genitalia, $desenv_mama, $pelos_pubianos, $digestao_eructacao, $digestao_dispepsia, $digestao_pirose, $digestao_refluxo, $digestao_nauseas, $digestao_vomito, $digestao_distensao){
			$sql = "UPDATE Paciente SET data_nascimento = '" . $data_nascimento . "', sexo = '" . $sexo . "', profissao = '" . $profissao . "', estado_civil = " . $estado_civil . ", nacionalidade = '" . $nacionalidade . "', naturalidade = '" . $naturalidade . "', bairro = '" . $bairro . "', tipo_domicilio = '" . $tipo_domicilio . "', qtd_pessoas_reside = " . $qtd_pessoas_reside . ", renda_familiar = " . $renda_familiar . ", horas_sono = " . $horas_sono . ", caracteristicas_sono = '" . $caracteristicas_sono . "', lugar_refeicoes = '" . $lugar_refeicoes . "', freq_bebidas_alcoolicas = '" . $freq_bebidas_alcoolicas . "', num_cigarros_dia = " . $num_cigarros_dia . ", uso_droga_ilicita = '" . $uso_droga_ilicita . "', nivel_instrucao = " . $nivel_instrucao . ", restricoes_religiao = '" . $restricoes_religiao . "', olhos = '" . $olhos . "', cabelo = '" . $cabelo . "', labios = '" . $labios . "', lingua = '" . $lingua . "', gengiva = '" . $gengiva . "', unhas = '" . $unhas . "', articulacoes = '" . $articulacoes . "', MMSS_MMII = '" . $MMSS_MMII . "', abdome = '" . $abdome . "', acne = '" . $acne . "', insonia = '" . $insonia . "', estresse = '" . $estresse . "', cansaco = '" . $cansaco . "', ansiedade = '" . $ansiedade . "', habito_intestinal = '" . $habito_intestinal . "', consistencia_fezes = " . $consistencia_fezes . ", dor_evacuar = " . $dor_evacuar . ", fezes_ressecadas = " . $fezes_ressecadas . ", uso_forca = " . $uso_forca . ", fezes_amolecidas = " . $fezes_amolecidas . ", fezes_liquidas = '" . $fezes_liquidas . "', urgencia_fecal = " . $urgencia_fecal . ", flatulencia = " . $flatulencia . ", presenca_sangue_fezes = " . $presenca_sangue_fezes . ", fezes_fetidas = " . $fezes_fetidas . ", fezes_espumosas = " . $fezes_espumosas . ", diurese = '" . $diurese . "', dor_urinar = " . $dor_urinar . ", incontinencia = " . $incontinencia . ", presenca_sangue_urina = " . $presenca_sangue_urina . ", familiar_DM = '" . $familiar_DM . "', familiar_HA = '" . $familiar_HA . "', familiar_CA = '" . $familiar_CA . "', familiar_dislipidemia = '" . $familiar_dislipidemia . "', familiar_obesidade = '" . $familiar_obesidade . "', familiar_magreza = '" . $familiar_magreza . "', familiar_outros = '" . $familiar_outros . "', denticao = " . $denticao . ", protese = " . $protese . ", degluticao = " . $degluticao . ", motivo_deglut_ruim = '" . $motivo_deglut_ruim . "', mobilidade_fisica = " . $mobilidade_fisica . ", dependencia_mobilidade = " . $dependencia_mobilidade . ", peso_habitual = " . $peso_habitual . ", mudanca_peso_recente = " . $mudanca_peso_recente . ", tempo_mudanca_peso = '" . $tempo_mudanca_peso . "', alteracao_apetite = '" . $alteracao_apetite . "', segue_dieta = '" . $segue_dieta . "', refeicoes_dia = " . $refeicoes_dia . ", duracao_refeicao = '" . $duracao_refeicao . "', consumo_agua = " . $consumo_agua . ", ajuda_se_alimentar = '" . $ajuda_se_alimentar . "', regul_menstruacao = " . $regul_menstruacao . ", sinais_tpm = '" . $sinais_tpm . "', amenorreia = '" . $amenorreia . "', sinais_menopausa = '" . $sinais_menopausa . "', gestacoes_anteriores = " . $gestacoes_anteriores . ", menarca = " . $menarca . ", abortos = " . $abortos . ", sinais_andropausa = '" . $sinais_andropausa . "', desenv_genitalia = '" . $desenv_genitalia . "', desenv_mama = '" . $desenv_mama . "', pelos_pubianos = '" . $pelos_pubianos . "', digestao_eructacao = " . $digestao_eructacao . ", digestao_dispepsia = " . $digestao_dispepsia . ", digestao_pirose = " . $digestao_pirose . ", digestao_refluxo = " . $digestao_refluxo . ", digestao_nauseas = " . $digestao_nauseas . ", digestao_vomito = " . $digestao_vomito . ", digestao_distensao = " . $digestao_distensao . " WHERE cpf = '" . $cpfPaciente . "'";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
		}

		public function recuperarPacientes(){
			$sql = "SELECT cpf, nome FROM Paciente WHERE cpf_nutri_responsavel = '" . $this->cpf . "'";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
			$pacientes = array();
			while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
				array_push($pacientes, new Paciente($result["cpf"], $result["nome"], $this->cpf));
			}
			
			return $pacientes;
		}

		public function recuperarAnamnesePacientes($cpf){
			$sql = "SELECT data_nascimento, sexo, profissao, estado_civil, nacionalidade, naturalidade, bairro, tipo_domicilio, qtd_pessoas_reside, renda_familiar DOUBLE, horas_sono DOUBLE, caracteristicas_sono, lugar_refeicoes, freq_bebidas_alcoolicas, num_cigarros_dia DOUBLE, uso_droga_ilicita, nivel_instrucao, restricoes_religiao, olhos, cabelo, labios, lingua, gengiva, unhas, articulacoes, MMSS_MMII, abdome, acne, insonia, estresse, cansaco, ansiedade, habito_intestinal, consistencia_fezes, dor_evacuar, fezes_ressecadas, uso_forca, fezes_amolecidas, fezes_liquidas, urgencia_fecal, flatulencia, presenca_sangue_fezes, fezes_fetidas, fezes_espumosas, diurese, dor_urinar, incontinencia, presenca_sangue_urina, familiar_DM, familiar_HA, familiar_CA, familiar_dislipidemia, familiar_obesidade, familiar_magreza, familiar_outros, denticao, protese, degluticao, motivo_deglut_ruim, mobilidade_fisica, dependencia_mobilidade, peso_habitual DOUBLE, mudanca_peso_recente DOUBLE, tempo_mudanca_peso, alteracao_apetite, segue_dieta, refeicoes_dia, duracao_refeicao, consumo_agua, ajuda_se_alimentar, regul_menstruacao, sinais_tpm, amenorreia, sinais_menopausa, gestacoes_anteriores, menarca, abortos, sinais_andropausa, desenv_genitalia, desenv_mama, pelos_pubianos, digestao_eructacao, digestao_dispepsia, digestao_pirose, digestao_refluxo, digestao_nauseas, digestao_vomito, digestao_distensao FROM Paciente WHERE cpf = '" . $cpf . "'";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
			$pacientes = array();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			return $result;
		}

		public function atualizarPaciente($paciente, $cpf){
			$sql = "UPDATE Paciente SET nome = '" . $paciente->nome . "', cpf_nutri_responsavel = '" . $paciente->nutriResponsavel . "', cpf = '" . $paciente->cpf . "' WHERE cpf = '" . $cpf . "'";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
		} 

		public function removerPaciente($cpf){
			$sql = "DELETE FROM Paciente WHERE cpf = '" . $cpf . "'";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
		}



		/*********************************** RegDiagnostico ************************************/
		public function registrarDiagnostico($diagnostico){
			$sql = "INSERT INTO Registro_Diagnostico VALUES ('" . $diagnostico->dataConsulta . "', '" . $diagnostico->paciente . "', '" . $diagnostico->examesBioquimicos . "', '" . $diagnostico->orientacaoPlanoAlimentar . "', " . $diagnostico->metaCarboidrato . ", " . $diagnostico->metaProteina . ", " . $diagnostico->metaLipideo . ", " . $diagnostico->pesoAtual . ", " . $diagnostico->pesoIdeal . ", " . $diagnostico->PCT . ", " . $diagnostico->PCB . ", " . $diagnostico->PCSE . ", " . $diagnostico->PCSI . ", " . $diagnostico->altura . ", " . $diagnostico->CC . ", " . $diagnostico->CQ . ", " . $diagnostico->CB . ", " . $diagnostico->compJoelho . ", " . $diagnostico->circPanturrilha . ")";
			DataGetter::getConn()->exec($sql);
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
			$ref_ant;
			$primeiro = true;
			while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
				if ($primeiro){
					$ref_ant = new RefeicaoRecordatoria($result["horario"], array(), array(), $result["lugar"], $result["frequencia"]);
					$primeiro = false;
				}
				if ($ref_ant->horario!=$result["horario"]){
					array_push($recordatorio, new RefeicaoRecordatoria($ref_ant->horario, $pratos, $quantidades, $ref_ant->lugar, $ref_ant->frequencia));
					$ref_ant = new RefeicaoRecordatoria($result["horario"], array(), array(), $result["lugar"], $result["frequencia"]);
					$pratos = array();
					$quantidades = array();
				}

				array_push($pratos, new Prato($result["id_prato"], $result["nome"], $result["rendimento"], $result["medida"], "", array(), array(), array(), array(), array(), array()));
				array_push($quantidades, $result["quantidade"]);
			}

			$sql = "SELECT Ref_Alim_Sub.*, Alimentos.nome AS nome_alim_sub, Alimentos.umidade AS umidade_alim_sub, Alimentos.energia AS energia_alim_sub, Alimentos.proteina AS proteina_alim_sub, Alimentos.lipideos AS lipideos_alim_sub, Alimentos.colesterol AS colesterol_alim_sub, Alimentos.carboidrato AS carboidrato_alim_sub, Alimentos.fibras AS fibras_alim_sub, Alimentos.cinzas AS cinzas_alim_sub, Alimentos.calcio AS calcio_alim_sub, Alimentos.magnesio AS magnesio_alim_sub, Alimentos.manganes AS manganes_alim_sub, Alimentos.fosforo AS fosforo_alim_sub, Alimentos.ferro AS ferro_alim_sub, Alimentos.sodio AS sodio_alim_sub, Alimentos.potassio AS potassio_alim_sub, Alimentos.cobre AS cobre_alim_sub, Alimentos.zinco AS zinco_alim_sub, Alimentos.retinol AS retinol_alim_sub, Alimentos.RE AS RE_alim_sub, Alimentos.RAE AS RAE_alim_sub, Alimentos.tiamina AS tiamina_alim_sub, Alimentos.riboflavina AS riboflavina_alim_sub, Alimentos.piridoxina AS piridoxina_alim_sub, Alimentos.niacina AS niacina_alim_sub, Alimentos.vitamina_c AS vitaminaC_alim_sub FROM
				(SELECT Ref_Alim_ori.*, Substituicao_Alimentos.id_alimento_sub AS id_alim_sub, Substituicao_Alimentos.med_alim_sub, Substituicao_Alimentos.qtd_alim_sub FROM
					(SELECT Ref_Alimentos.*, Alimentos.nome AS nome_alim_ori, Alimentos.umidade AS umidade_alim_ori, Alimentos.energia AS energia_alim_ori, Alimentos.proteina AS proteina_alim_ori, Alimentos.lipideos AS lipideos_alim_ori, Alimentos.colesterol AS colesterol_alim_ori, Alimentos.carboidrato AS carboidrato_alim_ori, Alimentos.fibras AS fibras_alim_ori, Alimentos.cinzas AS cinzas_alim_ori, Alimentos.calcio AS calcio_alim_ori, Alimentos.magnesio AS magnesio_alim_ori, Alimentos.manganes AS manganes_alim_ori, Alimentos.fosforo AS fosforo_alim_ori, Alimentos.ferro AS ferro_alim_ori, Alimentos.sodio AS sodio_alim_ori, Alimentos.potassio AS potassio_alim_ori, Alimentos.cobre AS cobre_alim_ori, Alimentos.zinco AS zinco_alim_ori, Alimentos.retinol AS retinol_alim_ori, Alimentos.RE AS RE_alim_ori, Alimentos.RAE AS RAE_alim_ori, Alimentos.tiamina AS tiamina_alim_ori, Alimentos.riboflavina AS riboflavina_alim_ori, Alimentos.piridoxina AS piridoxina_alim_ori, Alimentos.niacina AS niacina_alim_ori, Alimentos.vitamina_c AS vitaminaC_alim_ori FROM
						(SELECT Ref_Paci_Subs_Id.*, Alimentos_Prato.id_alimento AS id_alim_ori, Alimentos_Prato.medida AS med_alim_ori, Alimentos_Prato.quantidade AS qtd_alim_ori FROM
							(SELECT Ref_Paci_Nome_Prato.*, Substituicao_Pratos.id_prato_sub, Substituicao_Pratos.qtd_prato_sub FROM 
								(SELECT Ref_Paci_Nome_IdP.*, Prato.nome AS nome_prato_ori, Prato.medida AS medida_prato_ori, Prato.rendimento AS rendimento_ori, Prato.modo_preparo AS modo_preparo_ori FROM 
									(SELECT Ref.*, Pratos_Refeicao.id_prato AS id_prato_ori, Pratos_Refeicao.quantidade AS qtd_prato_ori FROM 
										(SELECT id, horario, nome AS nome_refeicao FROM Refeicao WHERE cpf_paciente = '" . $diagnostico->paciente . "' AND data_consulta = '" . $diagnostico->dataConsulta . "') Ref
									LEFT JOIN Pratos_Refeicao ON Pratos_Refeicao.id_refeicao = Ref.id) AS Ref_Paci_Nome_IdP
								LEFT JOIN Prato ON Prato.id = Ref_Paci_Nome_IdP.id_prato_ori) AS Ref_Paci_Nome_Prato
							LEFT JOIN Substituicao_Pratos ON Substituicao_Pratos.id_prato_original = Ref_Paci_Nome_Prato.id_prato_ori AND Substituicao_Pratos.id_refeicao_original = Ref_Paci_Nome_Prato.id) Ref_Paci_Subs_Id
						LEFT JOIN Alimentos_Prato ON Ref_Paci_Subs_Id.id_prato_ori = Alimentos_Prato.id_prato) AS Ref_Alimentos
					LEFT JOIN Alimentos ON Ref_Alimentos.id_alim_ori = Alimentos.id) AS Ref_Alim_ori
				LEFT JOIN Substituicao_Alimentos ON Substituicao_Alimentos.id_prato_original = Ref_Alim_ori.id_prato_ori AND Substituicao_Alimentos.id_alimento_original = Ref_Alim_ori.id_alim_ori) AS Ref_Alim_Sub
			LEFT JOIN Alimentos ON Ref_Alim_Sub.id_alim_sub = Alimentos.id
			ORDER BY Ref_Alim_Sub.horario";

			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
			
			while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
				//pega refeicoes e pra cada prato, pega substituicao
				$pratoSub = $this->recuperarPratosId($result["id_prato_sub"]);
			}

			$diagnostico->recordatorio = $recordatorio;
			$diagnostico->planoAlimentar = $planoAlimentar;
			return $diagnostico;
		}

		public function atualizarDiagnostico($diagnostico, $cpfPaciente, $dataConsulta){
			$sql = "UPDATE Registro_Diagnostico SET data_consulta = '" . $diagnostico->dataConsulta . "', cpf_paciente = '" . $diagnostico->paciente . "', exames_bioquimicos = '" . $diagnostico->examesBioquimicos . "', orientacao_plano_alimentar = '" . $diagnostico->orientacaoPlanoAlimentar . "', meta_carboidrato = " . $diagnostico->metaCarboidrato . ", meta_proteina = " . $diagnostico->metaProteina . ", meta_lipideo = " . $diagnostico->metaLipideo . ", peso_atual = " . $diagnostico->pesoAtual . ", peso_ideal = " . $diagnostico->pesoIdeal . ", PCT = " . $diagnostico->PCT . ", PCB = " . $diagnostico->PCB . ", PCSE = " . $diagnostico->PCSE . ", PCSI = " . $diagnostico->PCSI . ", altura = " . $diagnostico->altura . ", CC = " . $diagnostico->CC . ", CQ = " . $diagnostico->CQ . ", CB = " . $diagnostico->CB . ", comp_joelho = " . $diagnostico->compJoelho . ", circ_panturrilha = " . $diagnostico->circPanturrilha . " WHERE cpf_paciente = '" . $cpfPaciente . "' AND data_consulta = '" . $dataConsulta . "'";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
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
					DataGetter::getConn()->exec($sql);
				}
			}
		}

		public function atualizarRecordatorio($recordatorio, $cpfPaciente, $dataConsulta, $horario, $idPrato){
			for ($i = 0; $i<count($recordatorio); $i++){
				for ($j = 0; $j<count($recordatorio[$i]->pratos); $j++){
					$sql = "UPDATE Recordatorio SET data_consulta = '" . $dataConsulta . "', cpf_paciente = '" . $cpfPaciente . "', id_prato = " . $recordatorio[$i]->pratos[$j]->id . ", horario = '" . $recordatorio[$i]->horario . "', lugar = '" . $recordatorio[$i]->lugar . "', quantidade = " . $recordatorio[$i]->quantidade[$j] . ", frequencia = '" . $recordatorio[$i]->frequencia . "' WHERE cpf_paciente = '" . $cpfPaciente . "' AND data_consulta = '" . $dataConsulta . "' AND horario = '" . $horario . "' AND id_prato = " . $idPrato;
					$stmt = DataGetter::getConn()->prepare($sql);
					$stmt->execute();
				}
			}
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
				DataGetter::getConn()->exec($sql);

				$sql = "INSERT INTO Substituicao_Alimentos VALUES (" . $prato->id . ", " . $prato->alimentos[$i]->id . ", '" . $prato->medidas[$i] . "', " . $prato->quantidades[$i] . ", " . $prato->substituicoes[$i]->id . ", '" . $prato->medidasSubs[$i] . "', " . $prato->qtdSubs[$i] . ")";
				DataGetter::getConn()->exec($sql);
			}
		}

		public function atualizarPrato($prato){
			$sql = "UPDATE Prato SET nome = '" . $prato->nome . "', rendimento = " . $prato->rendimento . ", medida = '" . $prato->medida . "', modo_preparo = '" . $prato->modoPreparo . "' WHERE id = " . $prato->id . ")";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
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

				if ($prato_ant->id!=$result["idPrato"]){
					array_push($pratos, new Prato($prato_ant->id, $prato_ant->nome, $prato_ant->rendimento, $prato_ant->medida, $prato_ant->modo_preparo, $alimentos, $quantidades, $medidas, $substituicoesTotal, $qtdTotal, $medidasTotal));

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
					array_push($pratos, new Prato($prato_ant->id, $prato_ant->nome, $prato_ant->rendimento, $prato_ant->medida, $prato_ant->modo_preparo, $alimentos, $quantidades, $medidas, $substituicoesTotal, $qtdTotal, $medidasTotal));

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
		public function registrarAversao($idPrato, $cpfPaciente){
			$sql = "INSERT INTO Aversao VALUES (" . $idPrato . ", '" . $cpfPaciente . "')";
			DataGetter::getConn()->exec($sql);
		}

		public function removerAversao($idPrato, $cpfPaciente){
			$sql = "DELETE FROM Aversao WHERE id_prato = " . $idPrato . " AND cpf_paciente = '" . $cpfPaciente . "'";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
		}



		/********************************************* Preferencia **********************************************/
		public function registrarPreferencia($idPrato, $cpfPaciente){
			$sql = "INSERT INTO Preferencia VALUES (" . $idPrato . ", '" . $cpfPaciente . "')";
			DataGetter::getConn()->exec($sql);
		}

		public function removerPreferencia($idPrato, $cpfPaciente){
			$sql = "DELETE FROM Preferencia WHERE id_prato = " . $idPrato . " AND cpf_paciente = '" . $cpfPaciente . "'";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
		}



		/********************************************* Intolerancia **********************************************/
		public function registrarIntolerancia($idPrato, $cpfPaciente){
			$sql = "INSERT INTO Intolerancia VALUES (" . $idPrato . ", '" . $cpfPaciente . "')";
			DataGetter::getConn()->exec($sql);
		}

		public function removerIntolerancia($idPrato, $cpfPaciente){
			$sql = "DELETE FROM Intolerancia WHERE id_prato = " . $idPrato . " AND cpf_paciente = '" . $cpfPaciente . "'";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
		}



		/********************************************* Suplemento **********************************************/
		public function registrarSuplemento($Suplemento){
			$sql = "INSERT INTO Alimentos(nome, umidade, energia, proteina, lipideos, colesterol, carboidrato, fibras, cinzas, calcio, magnesio, manganes, fosforo, ferro, sodio, potassio, cobre, zinco, retinol, RE, RAE, tiamina, riboflavina, piridoxina, niacina, vitamina_c) VALUES ('" . $suplemento->nome . "', " . $suplemento->umidade . ", " . $suplemento->energia . ", " . $suplemento->proteina . ", " . $suplemento->lipideos . ", " . $suplemento->colesterol . ", " . $suplemento->carboidrato . ", " . $suplemento->fibras . ", " . $suplemento->cinzas . ", " . $suplemento->calcio . ", " . $suplemento->magnesio . ", " . $suplemento->manganes . ", " . $suplemento->fosforo . ", " . $suplemento->ferro . ", " . $suplemento->sodio . ", " . $suplemento->potassio . ", " . $suplemento->cobre . ", " . $suplemento->zinco . ", " . $suplemento->retinol . ", " . $suplemento->RE . ", " . $suplemento->RAE . ", " . $suplemento->tiamina . ", " . $suplemento->riboflavina . ", " . $suplemento->piridoxina . ", " . $suplemento->niacina . ", " . $suplemento->vitaminaC . ")";
			DataGetter::getConn()->exec($sql);
		}

		public function atualizarSuplemento($suplemento){
			if ($suplemento->id!=0 && $suplemento->id<=596){
				return false;
			}
			$sql = "UPDATE Alimentos SET nome = '" . $suplemento->nome . "', umidade = " . $suplemento->umidade . ", energia = " . $suplemento->energia . ", proteina = " . $suplemento->proteina . ", lipideos = " . $suplemento->lipideos . ", colesterol = " . $suplemento->colesterol . ", carboidrato = " . $suplemento->carboidrato . ", fibras = " . $suplemento->fibras . ", cinzas = " . $suplemento->cinzas . ", calcio = " . $suplemento->calcio . ", magnesio = " . $suplemento->magnesio . ", manganes = " . $suplemento->manganes . ", fosforo = " . $suplemento->fosforo . ", ferro = " . $suplemento->ferro . ", sodio = " . $suplemento->sodio . ", potassio = " . $suplemento->potassio . ", cobre = " . $suplemento->cobre . ", zinco = " . $suplemento->zinco . ", retinol = " . $suplemento->retinol . ", RE = " . $suplemento->RE . ", RAE = " . $suplemento->RAE . ", tiamina = " . $suplemento->tiamina . ", riboflavina = " . $suplemento->riboflavina . ", piridoxina = " . $suplemento->piridoxina . ", niacina = " . $suplemento->niacina . ", vitamina_c = " . $suplemento->vitaminaC;
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
			return true;
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
			DataGetter::getConn()->exec($sql);
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
	}
?>
