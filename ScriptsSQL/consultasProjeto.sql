/*Consulta para retornar nome e CPF de todos os pacientes de um nutricionista, em ordem alfabetica pelo nome do nutricionista*/
SELECT Nutricionista.nome AS "Nome do Nutricionista", Paciente.nome AS "Nome do Paciente", Paciente.CPF AS "CPF do Paciente" FROM Paciente
LEFT JOIN Nutricionista ON Paciente.cpf_nutri_responsavel = Nutricionista.CPF
ORDER BY Nutricionista.nome;

/*Consulta para retornar as aversões de cada paciente*/
SELECT Paciente.nome AS nome_paciente, Av.nome AS nome_alimento FROM Paciente
RIGHT JOIN (SELECT Paciente.cpf, Alimentos.nome FROM Paciente, Alimentos, Aversao WHERE Paciente.cpf = Aversao.cpf_paciente AND Alimentos.id = Aversao.id_alimento) AS Av ON Paciente.cpf = Av.cpf
ORDER BY Paciente.nome;

/*Consulta para retornar as preferências de cada paciente*/
SELECT Paciente.nome AS nome_paciente, Pf.nome AS nome_alimento FROM Paciente
RIGHT JOIN (SELECT Paciente.cpf, Alimentos.nome FROM Paciente, Alimentos, Preferencia WHERE Paciente.cpf = Preferencia.cpf_paciente AND Alimentos.id = Preferencia.id_alimento) AS Pf ON Paciente.cpf = Pf.cpf
ORDER BY Paciente.nome;

/*Consulta para retornar as intolerâncias de cada paciente*/
SELECT Paciente.nome AS nome_paciente, It.nome AS nome_alimento FROM Paciente
RIGHT JOIN (SELECT Paciente.cpf, Alimentos.nome FROM Paciente, Alimentos, Intolerancia WHERE Paciente.cpf = Intolerancia.cpf_paciente AND Alimentos.id = Intolerancia.id_alimento) AS It ON Paciente.cpf = It.cpf
ORDER BY Paciente.nome;

/*Consulta para retornar os suplementos tomados por cada paciente*/
SELECT Paciente.nome AS nome_paciente, Sup.nome AS nome_alimento Sup.indicacao FROM Paciente
RIGHT JOIN (SELECT Paciente.cpf, Alimentos.nome, Suplementos.indicacao FROM Paciente, Alimentos, Suplementos WHERE Paciente.cpf = Suplementos.cpf_paciente AND Alimentos.id = Suplementos.id) AS Sup ON Paciente.cpf = Sup.cpf
ORDER BY Paciente.nome;

/*Consulta para retornar o histórico de dados antropométricos de um paciente*/
SELECT Paciente.nome, Registro_Diagnostico.data_consulta, Registro_Diagnostico.peso_atual, Registro_Diagnostico.PCT, Registro_Diagnostico.PCB, Registro_Diagnostico.PCSE, Registro_Diagnostico.PCSI, Registro_Diagnostico.altura, Registro_Diagnostico.CC, Registro_Diagnostico.CQ, Registro_Diagnostico.CB, Registro_Diagnostico.comp_joelho, Registro_Diagnostico.circ_panturrilha 
FROM Registro_Diagnostico
JOIN Paciente ON Registro_Diagnostico.cpf_paciente = "000.000.000-00" AND Paciente.CPF = Registro_Diagnostico.cpf_paciente
ORDER BY Registro_Diagnostico.data_consulta; 

/*Consulta para retornar as refeições e pratos da dieta de um paciente passada numa data*/
SELECT Ref_Bruno_Subs_Id.nome_paciente, Ref_Bruno_Subs_Id.data_consulta, Ref_Bruno_Subs_Id.nome_refeicao, Ref_Bruno_Subs_Id.horario, Ref_Bruno_Subs_Id.nome_prato, Prato.nome AS nome_substituicao FROM
(SELECT Ref_Bruno_Nome_Prato.nome_paciente, Ref_Bruno_Nome_Prato.data_consulta, Ref_Bruno_Nome_Prato.nome_refeicao, Ref_Bruno_Nome_Prato.horario, Ref_Bruno_Nome_Prato.nome_prato, Substituicao_Pratos.id_prato_sub FROM 
(SELECT Prato.nome AS nome_prato, Ref_Bruno_Nome_IdP.* FROM 
(SELECT Ref_Bruno_Nome.*, Pratos_Refeicao.id_prato FROM 
(SELECT Paciente.nome AS "nome_paciente", Ref_Bruno.data_consulta, Ref_Bruno.nome AS "nome_refeicao", Ref_Bruno.id, Ref_Bruno.horario FROM Paciente 
RIGHT JOIN (SELECT cpf_paciente, data_consulta, nome, id, horario FROM Refeicao 
WHERE cpf_paciente = "000.000.000-00" AND data_consulta = "02/05/2019") AS Ref_Bruno ON Paciente.CPF = Ref_Bruno.cpf_paciente) Ref_Bruno_Nome
LEFT JOIN Pratos_Refeicao ON Pratos_Refeicao.id_refeicao = Ref_Bruno_Nome.id) AS Ref_Bruno_Nome_IdP
LEFT JOIN Prato ON Prato.id = Ref_Bruno_Nome_IdP.id_prato) AS Ref_Bruno_Nome_Prato
LEFT JOIN Substituicao_Pratos ON Substituicao_Pratos.id_prato_original = Ref_Bruno_Nome_Prato.id_prato AND Substituicao_Pratos.id_refeicao_original = Ref_Bruno_Nome_Prato.id) Ref_Bruno_Subs_Id
LEFT JOIN Prato ON Prato.id = Ref_Bruno_Subs_Id.id_prato_sub
ORDER BY Ref_Bruno_Subs_Id.horario;

/*Consulta para retornar todos os pratos que são substituição no plano alimentar de uma data para um paciente*/
SELECT Prato.nome  FROM Prato,
(SELECT Refeicao.data_consulta, Substituicao_Pratos.id_prato_sub FROM Refeicao, Paciente, Substituicao_Pratos
WHERE Paciente.cpf = "000.000.000-00" AND Refeicao.cpf_paciente = Paciente.cpf AND Refeicao.id = Substituicao_Pratos.id_refeicao_original) subs
WHERE Subs.data_consulta = "02/05/2019" AND Prato.id = Subs.id_prato_sub;

/*Consulta para retornar infromações sobre as preparações de arroz presentes no banco*/
SELECT * FROM Prato
WHERE nome LIKE "%Arroz%";

/*Consulta para retornar id e nome dos alimentos que possuem mais de 510Kcal de energia, ordenado de forma decrescente pela quantidade de proteína*/
SELECT id, nome, energia, proteina FROM Alimentos
WHERE energia>510
ORDER BY proteina DESC;

/*Consulta para retornar nome dos Pacientes que optaram por não informar a renda familiar*/
SELECT nome, CPF FROM Paciente
WHERE renda_familiar IS NULL;

/*Consulta para retornar pratos que tem teor de proteina maior que 25g */
SELECT Prato.nome FROM Prato, Alimentos, Alimentos_Prato
WHERE Prato.id = Alimentos_Prato.id_prato AND Alimentos_Prato.id_alimento = Alimentos.id
GROUP BY Alimentos_Prato.id_prato HAVING SUM(Alimentos.proteina*Alimentos_Prato.quantidade/100)>25;
