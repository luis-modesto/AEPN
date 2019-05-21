<?php
	require_once ("Aluno.php");
	require_once ("Email.php");
	require_once ("Professor.php");
	require_once ("Usuario.php");
	require_once ("Curso.php");
	require_once ("Departamento.php");
	require_once ("Nutricionista.php");


	$n = new Nutricionista("123.456.789-12", "Marisa", "222222");
	//$n->atualizarNutricionista($n, "123.456.789-11");
	$nutris = $n->recuperarNutricionistas();
	for ($i = 0; $i<count($nutris); $i++){
		echo $nutris[$i]->nome . "<br>";
	}

	
	"SELECT Ref_Alim_Sub.*, Alimentos.nome AS nome_alim_sub, Alimentos.umidade AS umidade_alim_sub, Alimentos.energia AS energia_alim_sub, Alimentos.proteina AS proteina_alim_sub, Alimentos.lipideos AS lipideos_alim_sub, Alimentos.colesterol AS colesterol_alim_sub, Alimentos.carboidrato AS carboidrato_alim_sub, Alimentos.fibras AS fibras_alim_sub, Alimentos.cinzas AS cinzas_alim_sub, Alimentos.calcio AS calcio_alim_sub, Alimentos.magnesio AS magnesio_alim_sub, Alimentos.manganes AS manganes_alim_sub, Alimentos.fosforo AS fosforo_alim_sub, Alimentos.ferro AS ferro_alim_sub, Alimentos.sodio AS sodio_alim_sub, Alimentos.potassio AS potassio_alim_sub, Alimentos.cobre AS cobre_alim_sub, Alimentos.zinco AS zinco_alim_sub, Alimentos.retinol AS retinol_alim_sub, Alimentos.RE AS RE_alim_sub, Alimentos.RAE AS RAE_alim_sub, Alimentos.tiamina AS tiamina_alim_sub, Alimentos.riboflavina AS riboflavina_alim_sub, Alimentos.piridoxina AS piridoxina_alim_sub, Alimentos.niacina AS niacina_alim_sub, Alimentos.vitamina_c AS vitaminaC_alim_sub FROM
		(SELECT Ref_Alim_ori.*, Substituicao_Alimentos.id_alimento_sub AS id_alim_sub, Substituicao_Alimentos.med_alim_sub, Substituicao_Alimentos.qtd_alim_sub FROM
			(SELECT Ref_Alimentos.*, Alimentos.nome AS nome_alim_ori, Alimentos.umidade AS umidade_alim_ori, Alimentos.energia AS energia_alim_ori, Alimentos.proteina AS proteina_alim_ori, Alimentos.lipideos AS lipideos_alim_ori, Alimentos.colesterol AS colesterol_alim_ori, Alimentos.carboidrato AS carboidrato_alim_ori, Alimentos.fibras AS fibras_alim_ori, Alimentos.cinzas AS cinzas_alim_ori, Alimentos.calcio AS calcio_alim_ori, Alimentos.magnesio AS magnesio_alim_ori, Alimentos.manganes AS manganes_alim_ori, Alimentos.fosforo AS fosforo_alim_ori, Alimentos.ferro AS ferro_alim_ori, Alimentos.sodio AS sodio_alim_ori, Alimentos.potassio AS potassio_alim_ori, Alimentos.cobre AS cobre_alim_ori, Alimentos.zinco AS zinco_alim_ori, Alimentos.retinol AS retinol_alim_ori, Alimentos.RE AS RE_alim_ori, Alimentos.RAE AS RAE_alim_ori, Alimentos.tiamina AS tiamina_alim_ori, Alimentos.riboflavina AS riboflavina_alim_ori, Alimentos.piridoxina AS piridoxina_alim_ori, Alimentos.niacina AS niacina_alim_ori, Alimentos.vitamina_c AS vitaminaC_alim_ori FROM
				(SELECT Ref_Paci_Subs_Id.*, Alimentos_Prato.id_alimento AS id_alim_ori, Alimentos_Prato.medida AS med_alim_ori, Alimentos_Prato.quantidade AS qtd_alim_ori FROM
					(SELECT Ref_Paci_Nome_Prato.*, Substituicao_Pratos.id_prato_sub, Substituicao_Pratos.qtd_prato_sub FROM 
						(SELECT Ref_Paci_Nome_IdP.*, Prato.nome AS nome_prato_ori, Prato.medida AS medida_prato_ori, Prato.rendimento AS rendimento_ori, Prato.modo_preparo AS modo_preparo_ori FROM 
							(SELECT Ref.*, Pratos_Refeicao.id_prato AS id_prato_ori, Pratos_Refeicao.quantidade AS qtd_prato_ori FROM 
								(SELECT id, horario, nome AS nome_refeicao FROM Refeicao WHERE cpf_paciente = '000.000.000-00' AND data_consulta = '02/05/2019') Ref
							LEFT JOIN Pratos_Refeicao ON Pratos_Refeicao.id_refeicao = Ref.id) AS Ref_Paci_Nome_IdP
						LEFT JOIN Prato ON Prato.id = Ref_Paci_Nome_IdP.id_prato_ori) AS Ref_Paci_Nome_Prato
					LEFT JOIN Substituicao_Pratos ON Substituicao_Pratos.id_prato_original = Ref_Paci_Nome_Prato.id_prato_ori AND Substituicao_Pratos.id_refeicao_original = Ref_Paci_Nome_Prato.id) Ref_Paci_Subs_Id
				LEFT JOIN Alimentos_Prato ON Ref_Paci_Subs_Id.id_prato_ori = Alimentos_Prato.id_prato) AS Ref_Alimentos
			LEFT JOIN Alimentos ON Ref_Alimentos.id_alim_ori = Alimentos.id) AS Ref_Alim_ori
		LEFT JOIN Substituicao_Alimentos ON Substituicao_Alimentos.id_prato_original = Ref_Alim_ori.id_prato_ori AND Substituicao_Alimentos.id_alimento_original = Ref_Alim_ori.id_alim_ori) AS Ref_Alim_Sub
	LEFT JOIN Alimentos ON Ref_Alim_Sub.id_alim_sub = Alimentos.id
	ORDER BY Ref_Alim_Sub.horario";

	"SELECT Pratos_sub.*, Alimentos_Prato.id_alimento AS id_alim_ori, Alimentos_Prato.quantidade AS qtd_alim_ori, Alimentos_Prato.medida AS med_alim_ori FROM
		(SELECT Prato.nome AS nome_prato_sub, Prato.medida AS med_prato_sub, Prato.rendimento AS rendimento_prato_sub  FROM Prato WHERE Prato.id = 1) AS Pratos_sub
	LEFT JOIN Alimentos_Prato ON Alimentos_Prato.id_prato = 1"

	"SELECT nome FROM Prato WHERE id = 1"

	
?>