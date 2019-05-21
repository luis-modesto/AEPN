/*Consulta para retornar as refeições da dieta de um paciente passada numa data*/
SELECT Paciente.nome, Registro_Diagnostico.data_consulta, Refeicao.hora, Refeicao.nome, Original.nome, Pratos_Refeicao_Original.medida, Pratos_Refeicao_Original.quantidade, Substituicao.nome AS substituicao, Pratos_Refeicao_Subs.medida, Pratos_Refeicao_Subs.quantidade 
FROM Paciente, Refeicao, Pratos_Refeicao AS Pratos_Refeicao_Original, Pratos_Refeicao AS Pratos_Refeicao_Subs, Substituicao_Pratos_Refeicao, Registro_Diagnostico, Prato AS Original, Prato AS Substituicao
WHERE Paciente.CPF = "000.000.000-00" AND 
	  Registro_Diagnostico.cpf_paciente = Paciente.CPF AND
	  Registro_Diagnostico.data_consulta = "02/05/2019" AND
	  Refeicao.cpf_paciente = Paciente.CPF AND
	  Refeicao.data_consulta = Registro_Diagnostico.data_consulta AND
	  Pratos_Refeicao_Original.id_refeicao = Refeicao.id AND
	  Pratos_Refeicao_Original.id_prato = Original.id AND
	  Substituicao_Pratos_Refeicao.id_prato_original = Pratos_Refeicao.id_prato AND
	  Substituicao_Pratos_Refeicao.id_refeicao_original = Pratos_Refeicao.id_refeicao AND
	  Substituicao.id = Substituicao_Pratos_Refeicao.id_prato_sub AND
	  Pratos_Refeicao_Subs.id_prato = Substituicao.id; 

/*Consulta para retornar os alimentos da dieta de um paciente passada numa data, sem substituição*/
SELECT Paciente.nome, Registro_Diagnostico.data_consulta, Alimentos.nome, Alimentos_Prato.medida, Alimentos_Prato.quantidade FROM Paciente, Pratos_Refeicao, Refeicao, Prato, Alimentos_Prato, Registro_Diagnostico, Alimentos
WHERE Paciente.CPF = "000.000.000-00" AND 
	  Registro_Diagnostico.cpf_paciente = Paciente.CPF AND
	  Registro_Diagnostico.data_consulta = "02/05/2019" AND
	  Refeicao.cpf_paciente = Paciente.CPF AND
	  Refeicao.data_consulta = Registro_Diagnostico.data_consulta AND
	  Pratos_Refeicao.id_refeicao = Refeicao.id AND
	  Alimentos_Prato.id_prato = Pratos_Refeicao.id_prato AND
	  Alimentos_Prato.id_alimento = Alimentos.id;


/***********************************************************************************/
/*Consulta para retornar as aversões de cada paciente*/
SELECT Paciente.nome, Av.nome FROM Paciente
RIGHT JOIN (SELECT Paciente.cpf, Alimentos.nome FROM Paciente, Alimentos, Aversao WHERE Paciente.cpf = Aversao.cpf_paciente AND Alimentos.id = Aversao.id_alimento) AS Av ON Paciente.cpf = Av.cpf;

/*Consulta para retornar todos os pratos que são substituição no plano alimentar de uma data para um paciente*/
SELECT Prato.nome  FROM Prato,
(SELECT Refeicao.data_consulta, Substituicao_Pratos.id_prato_sub FROM Refeicao, Paciente, Substituicao_Pratos
WHERE Paciente.cpf = "000.000.000-00" AND Refeicao.cpf_paciente = Paciente.cpf AND Refeicao.id = Substituicao_Pratos.id_refeicao_original) subs
WHERE Subs.data_consulta = "02/05/2019" AND Prato.id = Subs.id_prato_sub;

/*Consulta para retornar infromações sobre as preparações de arroz presentes no banco*/
SELECT * FROM Prato
WHERE nome LIKE "%Arroz%"

/*Consulta para retornar nome e CPF de todos os pacientes de um nutricionista, em ordem alfabetica pelo nome do paciente*/
SELECT Paciente.nome, Paciente.CPF FROM Paciente, Nutricionista
WHERE Nutricionista.CPF = "123.456.789-00" AND
	  Paciente.cpf_nutri_responsavel = Nutricionista.CPF
ORDER BY Paciente.nome;

/*Consulta para retornar id e nome dos alimentos que possuem mais de 510Kcal de energia, ordenado de forma decrescente pela quantidade de proteína*/
SELECT id, nome, energia, proteina FROM Alimentos
WHERE energia>510
ORDER BY proteina DESC

/*Consulta para retornar nome dos Pacientes que optaram por não informar a renda familiar*/
SELECT nome FROM Paciente
WHERE renda_familiar IS NULL;

/*Consulta para retornar o cpf, nome, data de nascimento e profissao, renda e cpf do nutricionista responsavel dos pacientes agrupados por nutricionista, mas só aqueles em que todos tenham renda familiar menor que 1000*/
SELECT cpf, nome, data_nascimento, profissao, renda_familiar, cpf_nutri_responsavel FROM Paciente
GROUP BY cpf_nutri_responsavel HAVING renda_familiar < 1500

/*pratos que tem mais de 700 de proteina*/
SELECT Prato.nome FROM Prato, Alimentos, Alimentos_Prato
WHERE Prato.id = Alimentos_Prato.id_prato AND Alimentos_Prato.id_alimento = Alimentos.id
GROUP BY Alimentos_Prato.id_prato HAVING SUM(Alimentos.proteina)>700;

