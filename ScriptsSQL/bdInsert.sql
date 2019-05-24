LOAD DATA INFILE 'TACO.csv' 
INTO TABLE aepn_db.Alimentos
FIELDS TERMINATED BY ';';

INSERT INTO Nutricionista
    VALUES ("123.456.789-00", "Rafael", "0/999"),
    ("123.456.789-11", "Marisa", "22157"),
    ("123.456.789-22", "João", "12341");
    
INSERT INTO Paciente(CPF, cpf_nutri_responsavel, nome, data_nascimento, sexo , profissao, estado_civil, nacionalidade, naturalidade, bairro, tipo_domicilio, qtd_pessoas_reside, renda_familiar, horas_sono, caracteristicas_sono, lugar_refeicoes, freq_bebidas_alcoolicas, num_cigarros_dia, uso_droga_ilicita, nivel_instrucao, restricoes_religiao, olhos, cabelo, labios, lingua, gengiva, unhas, articulacoes, MMSS_MMII, abdome, acne, insonia, estresse, cansaco, ansiedade, habito_intestinal, consistencia_fezes, dor_evacuar, fezes_ressecadas, uso_forca, fezes_amolecidas, fezes_liquidas, urgencia_fecal, flatulencia, presenca_sangue_fezes, fezes_fetidas, fezes_espumosas, diurese, dor_urinar, incontinencia, presenca_sangue_urina, doencas_associadas, familiar_DM, familiar_HA, familiar_CA, familiar_dislipidemia, familiar_obesidade, familiar_magreza, familiar_outros, denticao, protese, degluticao, motivo_deglut_ruim, mobilidade_fisica, dependencia_mobilidade, peso_habitual, mudanca_peso_recente, tempo_mudanca_peso, alteracao_apetite, segue_dieta, refeicoes_dia, duracao_refeicao, consumo_agua, ajuda_se_alimentar, regul_menstruacao, sinais_tpm, amenorreia, sinais_menopausa, gestacoes_anteriores, menarca, abortos, sinais_andropausa, desenv_genitalia, desenv_mama, pelos_pubianos, digestao_eructacao, digestao_dispepsia, digestao_pirose, digestao_refluxo, digestao_nauseas, digestao_vomito, digestao_distensao)
    VALUES ("000.000.000-00", "123.456.789-00", "Bruno Dias", "29/11/1998", 'M' , "Estudante", "Solteiro", "Brasileiro", "Baiano", "Feira IV", "Casa", 4, 7000.00, 7, "nem sei", "quarto", "nunca", 0, "nenhuma", 3, "nenhuma", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", 2, 0, 0, 0, 0, "bom", 0, 0, 0, 0, 0, "bom", 0, 0, 0, "nenhuma", "ninguem", "ninguem", "ninguem", "ninguem", "ninguem", "ninguem", "ninguem", 1, 1, 1, " ", 1, 1, 55.00, -2.5, "2 ANOS", "nada", "nenhuma", 4, "30 minutos", 2, "Nunehuma", NULL, NULL, NULL, NULL, NULL, NULL, NULL, "nenhum", NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
    ("111.111.111-11", "123.456.789-00", "Luis Modesto", "25/11/1997", 'M' , "Estudante", "Solteiro", "Brasileiro", "Baiano", "Salvador", "Apartamento", 4, 700.00, 7, "nem sei", "quarto", "nunca", 0, "nenhuma", 3, "nenhuma", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", 2, 0, 0, 0, 0, "bom", 0, 0, 0, 0, 0, "bom", 0, 0, 0, "nenhuma", "ninguem", "ninguem", "ninguem", "ninguem", "ninguem", "ninguem", "ninguem", 1, 1, 1, " ", 1, 1, 55.00, -2.5, "2 ANOS", "nada", "nenhuma", 4, "30 minutos", 2, "Nunehuma", NULL, NULL, NULL, NULL, NULL, NULL, NULL, "nenhum", NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
    ("222.222.222-22", "123.456.789-00", "João Antônio", "01/02/1996", 'M' , "Pedreiro", "Solteiro", "Brasileiro", "Baiano", "Salvador", "Apartamento", 4, 890.00, 7, "nem sei", "quarto", "nunca", 0, "nenhuma", 3, "nenhuma", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", 2, 0, 0, 0, 0, "bom", 0, 0, 0, 0, 0, "bom", 0, 0, 0, "nenhuma", "ninguem", "ninguem", "ninguem", "ninguem", "ninguem", "ninguem", "ninguem", 1, 1, 1, " ", 1, 1, 55.00, -2.5, "2 ANOS", "nada", "nenhuma", 4, "30 minutos", 2, "Nunehuma", NULL, NULL, NULL, NULL, NULL, NULL, NULL, "nenhum", NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
    ("333.333.333-33", "123.456.789-11", "Maria Eduarda", "03/05/1990", 'F' , "Cozinheira", "Solteiro", "Brasileiro", "Baiano", "Salvador", "Apartamento", 4, 900.00, 7, "nem sei", "quarto", "nunca", 0, "nenhuma", 3, "nenhuma", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", 2, 0, 0, 0, 0, "bom", 0, 0, 0, 0, 0, "bom", 0, 0, 0, "nenhuma", "ninguem", "ninguem", "ninguem", "ninguem", "ninguem", "ninguem", "ninguem", 1, 1, 1, " ", 1, 1, 55.00, -2.5, "2 ANOS", "nada", "nenhuma", 4, "30 minutos", 2, "Nunehuma", NULL, NULL, NULL, NULL, NULL, NULL, NULL, "nenhum", NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
    ("444.444.444-44", "123.456.789-11", "Alice", "17/03/1999", 'F' , "Estudante", "Solteiro", "Brasileiro", "Baiano", "Salvador", "Apartamento", 4, 1334.00, 7, "nem sei", "quarto", "nunca", 0, "nenhuma", 3, "nenhuma", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", 2, 0, 0, 0, 0, "bom", 0, 0, 0, 0, 0, "bom", 0, 0, 0, "nenhuma", "ninguem", "ninguem", "ninguem", "ninguem", "ninguem", "ninguem", "ninguem", 1, 1, 1, " ", 1, 1, 55.00, -2.5, "2 ANOS", "nada", "nenhuma", 4, "30 minutos", 2, "Nunehuma", NULL, NULL, NULL, NULL, NULL, NULL, NULL, "nenhum", NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
    ("555.555.555-55", "123.456.789-22", "Victória", "29/12/1992", 'F' , "Estudante", "Solteiro", "Brasileiro", "Baiano", "Salvador", "Apartamento", 4, 1200.00, 7, "nem sei", "quarto", "nunca", 0, "nenhuma", 3, "nenhuma", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", 2, 0, 0, 0, 0, "bom", 0, 0, 0, 0, 0, "bom", 0, 0, 0, "nenhuma", "ninguem", "ninguem", "ninguem", "ninguem", "ninguem", "ninguem", "ninguem", 1, 1, 1, " ", 1, 1, 55.00, -2.5, "2 ANOS", "nada", "nenhuma", 4, "30 minutos", 2, "Nunehuma", NULL, NULL, NULL, NULL, NULL, NULL, NULL, "nenhum", NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
    ("666.666.666-66", "123.456.789-22", "Maria", "01/11/1997", 'F' , "Estudante", "Solteiro", "Brasileiro", "Baiano", "Salvador", "Apartamento", 4, 1400.00, 7, "nem sei", "quarto", "nunca", 0, "nenhuma", 3, "nenhuma", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", "bom", 2, 0, 0, 0, 0, "bom", 0, 0, 0, 0, 0, "bom", 0, 0, 0, "nenhuma", "ninguem", "ninguem", "ninguem", "ninguem", "ninguem", "ninguem", "ninguem", 1, 1, 1, " ", 1, 1, 55.00, -2.5, "2 ANOS", "nada", "nenhuma", 4, "30 minutos", 2, "Nunehuma", NULL, NULL, NULL, NULL, NULL, NULL, NULL, "nenhum", NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0);

INSERT INTO Registro_Diagnostico
    VALUES ("02/05/2019", "000.000.000-00", "colesterol alto e glicose alta", "siga a dieta e beba agua", 290, 143.5, 29.5, 55.0, 60.0, 1.0, 1.0, 1.0, 1.0, 1.65, 1.0, 1.0, 1.0, 1.0, 1.0),
    ("09/05/2019", "000.000.000-00", "colesterol ok e glicose alta", "siga a dieta e beba agua", 260, 140, 32, 58.0, 60.0, 1.0, 1.0, 1.0, 1.0, 1.65, 1.0, 1.0, 1.0, 1.0, 1.0),
    ("01/04/2019", "111.111.111-11", "colesterol um pouco alto", "siga a dieta e beba agua", 249, 150, 28, 78.3, 81.0, 1.0, 1.0, 1.0, 1.0, 1.85, 1.0, 1.0, 1.0, 1.0, 1.0),
    ("08/04/2019", "111.111.111-11", "colesterol alto", "siga a dieta e beba agua", 275, 143.1, 29.9, 77.0, 81.0, 1.0, 1.0, 1.0, 1.0, 1.85, 1.0, 1.0, 1.0, 1.0, 1.0);

INSERT INTO Refeicao(data_consulta, cpf_paciente, nome, horario)
    VALUES ("02/05/2019", "000.000.000-00", "Cafe da manha", "08:00"),
    ("02/05/2019", "000.000.000-00", "Almoco", "12:00"),
    ("02/05/2019", "000.000.000-00", "Lanche", "15:00"),
    ("02/05/2019", "000.000.000-00", "Janta", "20:00"),
    ("09/05/2019", "000.000.000-00", "Cafe da manha", "08:30"),
    ("09/05/2019", "000.000.000-00", "Almoco", "12:30"),
    ("09/05/2019", "000.000.000-00", "Lanche", "15:30"),
    ("09/05/2019", "000.000.000-00", "Lanche", "18:30"),
    ("09/05/2019", "000.000.000-00", "Janta", "21:30"),
    ("01/04/2019", "111.111.111-11", "Cafe da manha", "09:00"),
    ("01/04/2019", "111.111.111-11", "Almoco", "12:30"),
    ("01/04/2019", "111.111.111-11", "Lanche", "16:00"),
    ("01/04/2019", "111.111.111-11", "Janta", "19:00"),
    ("01/04/2019", "111.111.111-11", "Ceia", "21:30"),
    ("08/04/2019", "111.111.111-11", "Cafe da manha", "07:30"),
    ("08/04/2019", "111.111.111-11", "Almoco", "11:30"),
    ("08/04/2019", "111.111.111-11", "Lanche", "14:30"),
    ("08/04/2019", "111.111.111-11", "Lanche", "17:30"),
    ("08/04/2019", "111.111.111-11", "Janta", "20:30");

INSERT INTO Prato(nome, rendimento, medida, modo_preparo)
    VALUES ("Cuscuz com ovo", 300, "g", "cuscuz no vapor e ovo frito na manteiga"),
    ("Misto quente", 1, "u", "colocar na sanduicheira"),
    ("Arroz integral com brocolis", 500, "g", "ferver tudo"),
    ("Beiju com frango", 1, "u", "torrar a tapioca e rechear com frango"),
    ("Salada de frutas", 250, "g", "cortar tudo do jeito que quiser"),
    ("Frango à parmegiana", 5, "porç", "assaar no forno"),
    ("Salada Crua", 100, "g", "cortar tudo do jeito que quiser e tempere"),
    ("Feijoada", 10, "conc", "cozinhar tudo junto na pressão"),
    ("Arroz branco com cenoura", 500, "g", "ferver tudo"),
    ("Feijão de caldo", 10, "conc", "cozinhar na panela de pressão"),
    ("Bife", 6, "porc", "fritar"),
    ("Banana", 1, "u", "comer sem casca"),
    ("Maçã", 1, "u", "comer com casca");

INSERT INTO Pratos_Refeicao
    VALUES (1, 1, 100),
    (3, 2, 80),
    (7, 2, 50),
    (10, 2, 60),
    (11, 2, 60),
    (5, 3, 350),
    (4, 4, 1.5),
    (1, 5, 100),
    (3, 6, 80),
    (7, 6, 50),
    (6, 6, 60),
    (5, 7, 250),
    (13, 8, 1),
    (3, 9, 100),
    (7, 9, 100),
    (1, 10, 70),
    (9, 11, 80),
    (6, 11, 80),
    (7, 11, 80),
    (2, 12, 1),
    (4, 13, 1),
    (13, 14, 1),
    (12, 15, 2),
    (3, 16, 100),
    (6, 16, 50),
    (7, 16, 75),
    (5, 17, 250),
    (4, 18, 1),
    (1, 19, 130);

INSERT INTO Substituicao_Pratos
    VALUES (1, 1, 100, 12, 2),
    (2, 3, 80, 9, 70),
    (2, 10, 60, 8, 40),
    (2, 11, 60, 6, 60),
    (3, 5, 350, 2, 0.5),
    (4, 4, 1.5, 1, 100),
    (5, 1, 100, 4, 1),
    (6, 3, 80, 9, 75),
    (7, 5, 250, 12, 2),
    (8, 13, 1, 5, 250),
    (9, 3, 100, 9, 80),
    (10, 1, 70, 4, 0.5),
    (11, 9, 80, 3, 70),
    (11, 6, 80, 11, 60),
    (12, 2, 1, 2, 1.5),
    (13, 4, 1, 1, 80),
    (14, 13, 1, 12, 1),
    (15, 12, 2, 13, 1.5),
    (16, 3, 100, 9, 80),
    (17, 5, 250, 2, 1),
    (18, 4, 1, 2, 1),
    (19, 1, 130, 4, 2);

INSERT INTO Recordatorio
    VALUES("02/05/2019", "000.000.000-00", 1, "09:00", "cozinha", 150, "quase todos os dias"),
    ("02/05/2019", "000.000.000-00", 3, "12:00", "cozinha", 100, "às vezes"),
    ("02/05/2019", "000.000.000-00", 6, "12:00", "cozinha", 80, "às vezes"),
    ("02/05/2019", "000.000.000-00", 2, "15:00", "cozinha", 1, "sempre"),
    ("02/05/2019", "000.000.000-00", 4, "20:00", "cozinha", 2, "pouco"),
    ("09/05/2019", "000.000.000-00", 1, "09:00", "cozinha", 150, "quase todos os dias"),
    ("09/05/2019", "000.000.000-00", 3, "12:30", "cozinha", 100, "às vezes"),
    ("09/05/2019", "000.000.000-00", 6, "12:30", "cozinha", 80, "às vezes"),    
    ("09/05/2019", "000.000.000-00", 7, "12:30", "cozinha", 100, "pouco"),
    ("09/05/2019", "000.000.000-00", 5, "15:30", "cozinha", 300, "quase nunca"),
    ("09/05/2019", "000.000.000-00", 3, "20:30", "cozinha", 100, "pouco"),
    ("01/04/2019", "111.111.111-11", 2, "09:10", "cozinha", 1.5, "quase todos os dias"),
    ("01/04/2019", "111.111.111-11", 8, "12:20", "cozinha", 150, "pouco"),
    ("01/04/2019", "111.111.111-11", 7, "12:20", "cozinha", 100, "sempre"),
    ("01/04/2019", "111.111.111-11", 4, "16:00", "cozinha", 1, "às vezes"),
    ("01/04/2019", "111.111.111-11", 1, "21:00", "cozinha", 150, "frequentemente"),
    ("08/04/2019", "111.111.111-11", 5, "07:30", "cozinha", 150, "de vez em quando"),
    ("08/04/2019", "111.111.111-11", 9, "12:30", "cozinha", 100, "pouco"),
    ("08/04/2019", "111.111.111-11", 11, "12:30", "cozinha", 60, "pouco"),
    ("08/04/2019", "111.111.111-11", 7, "12:30", "cozinha", 100, "pouco"),
    ("08/04/2019", "111.111.111-11", 2, "15:30", "cozinha", 2, "quase nunca"),
    ("08/04/2019", "111.111.111-11", 4, "19:30", "cozinha", 2, "às vezes");

INSERT INTO Aversao
    VALUES (520, "000.000.000-00"),
    (521, "000.000.000-00"),
    (557, "000.000.000-00"),
    (558, "000.000.000-00"),
    (147, "111.111.111-11");

INSERT INTO Preferencia
    VALUES (100, "111.111.111-11"),
    (1, "111.111.111-11"),
    (53, "111.111.111-11"),
    (438, "000.000.000-00"),
    (53, "000.000.000-00");

INSERT INTO Intolerancia
    VALUES (453, "000.000.000-00"),
    (454, "000.000.000-00"),
    (455, "000.000.000-00"),
    (456, "000.000.000-00"),
    (457, "000.000.000-00"),
    (458, "000.000.000-00"),
    (459, "000.000.000-00"),
    (460, "000.000.000-00");

INSERT INTO Alimentos (nome, umidade, energia, proteina, lipideos, colesterol, carboidrato, fibras, cinzas, calcio, magnesio, manganes, fosforo, ferro, sodio, potassio, cobre, zinco, retinol, RE, RAE, tiamina, riboflavina, piridoxina, niacina, vitamina_c)
    VALUES ("Whey Protein probiótica", 2.5, 128, 24, 1.9, 0, 3.3, 0, 0, 0, 0, 0, 0, 0, 57, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

INSERT INTO Suplementos
    VALUES (597, "000.000.000-00", "educador físico");

INSERT INTO Alimentos_Prato
    VALUES (1, 43, "xic", 1),
    (1, 490, "u", 1),
    (2, 52, "u", 2),
    (2, 461, "g", 20),
    (2, 439, "g", 20),
    (3, 1, "cs", 3),
    (3, 100, "g", 100),
    (4, 551, "g", 20),
    (4, 408, "g", 100),
    (5, 221, "g", 50),
    (5, 182, "g", 50),
    (5, 164, "g", 50),
    (5, 213, "ml", 50),
    (6, 410, "g", 200),
    (6, 467, "g", 25),
    (6, 439, "g", 25),
    (6, 159, "ml", 50),
    (7, 161, "u", 0.5),
    (7, 77, "g", 10),
    (8, 567, "xic", 1),
    (8, 107, "g", 10),
    (8, 421, "g", 25),
    (9, 3, "xic", 1),
    (9, 109, "g", 10),
    (10, 561, "xic", 1),
    (10, 107, "g", 5),
    (11, 529, "g", 200),
    (12, 182, "u", 1),
    (13, 221, "u", 1);

INSERT INTO Substituicao_Alimentos
    VALUES (1, 490, "u", 1, 469, "g", 100),
    (3, 100, "g", 100, 118, "g", 110),
    (5, 221, "g", 50, 236, "g", 50),
    (5, 213, "ml", 50, 219, "ml", 50);