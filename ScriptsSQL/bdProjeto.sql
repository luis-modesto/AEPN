CREATE DATABASE aepn_db DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE aepn_db;

CREATE TABLE Nutricionista (
    CPF CHAR(14) PRIMARY KEY,
    nome VARCHAR(100),
    CRN VARCHAR(10)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE Paciente (
    CPF CHAR(14) PRIMARY KEY,
    cpf_nutri_responsavel CHAR(14),
    nome VARCHAR(100),
    data_nascimento CHAR(10),
    sexo CHAR,
    profissao VARCHAR(100),
    estado_civil SMALLINT,
    nacionalidade VARCHAR(30),
    naturalidade VARCHAR(30),
    bairro VARCHAR(50),
    tipo_domicilio VARCHAR(50),
    qtd_pessoas_reside INTEGER,
    renda_familiar DOUBLE,
    horas_sono DOUBLE,
    caracteristicas_sono VARCHAR(100),
    lugar_refeicoes VARCHAR(100),
    freq_bebidas_alcoolicas VARCHAR(100),
    num_cigarros_dia DOUBLE,
    uso_droga_ilicita VARCHAR(100),
    nivel_instrucao SMALLINT,
    restricoes_religiao VARCHAR(100),
    olhos VARCHAR(100),
    cabelo VARCHAR(100),
    labios VARCHAR(100),
    lingua VARCHAR(100),
    gengiva VARCHAR(100),
    unhas VARCHAR(100),
    articulacoes VARCHAR(100),
    MMSS_MMII VARCHAR(100),
    abdome VARCHAR(100),
    acne VARCHAR(100),
    insonia VARCHAR(100),
    estresse VARCHAR(100),
    cansaco VARCHAR(100),
    ansiedade VARCHAR(100),
    habito_intestinal VARCHAR(100),
    consistencia_fezes SMALLINT,
    dor_evacuar BOOLEAN,
    fezes_ressecadas BOOLEAN,
    uso_forca BOOLEAN,
    fezes_amolecidas BOOLEAN,
    fezes_liquidas VARCHAR(100),
    urgencia_fecal BOOLEAN,
    flatulencia BOOLEAN,
    presenca_sangue_fezes BOOLEAN,
    fezes_fetidas BOOLEAN,
    fezes_espumosas BOOLEAN,
    diurese VARCHAR(100),
    dor_urinar BOOLEAN,
    incontinencia BOOLEAN,
    presenca_sangue_urina BOOLEAN,
    doencas_associadas VARCHAR(100),
    familiar_DM VARCHAR(100),
    familiar_HA VARCHAR(100),
    familiar_CA VARCHAR(100),
    familiar_dislipidemia VARCHAR(100),
    familiar_obesidade VARCHAR(100),
    familiar_magreza VARCHAR(100),
    familiar_outros VARCHAR(255),
    denticao INTEGER,
    protese INTEGER,
    degluticao INTEGER,
    motivo_deglut_ruim VARCHAR(100),
    mobilidade_fisica INTEGER,
    dependencia_mobilidade INTEGER,
    peso_habitual DOUBLE,
    mudanca_peso_recente DOUBLE,
    tempo_mudanca_peso VARCHAR(100),
    alteracao_apetite VARCHAR(100),
    segue_dieta VARCHAR(255),
    refeicoes_dia INTEGER,
    duracao_refeicao VARCHAR(100),
    consumo_agua INTEGER,
    ajuda_se_alimentar VARCHAR(100),
    regul_menstruacao SMALLINT,
    sinais_tpm VARCHAR(100),
    amenorreia VARCHAR(100),
    sinais_menopausa VARCHAR(100),
    gestacoes_anteriores INTEGER,
    menarca INTEGER,
    abortos INTEGER,
    sinais_andropausa VARCHAR(100),
    desenv_genitalia CHAR(2),
    desenv_mama CHAR(2),
    pelos_pubianos CHAR(2),
    digestao_eructacao BOOLEAN,
    digestao_dispepsia BOOLEAN,
    digestao_pirose BOOLEAN,
    digestao_refluxo BOOLEAN,
    digestao_nauseas BOOLEAN,
    digestao_vomito BOOLEAN,
    digestao_distensao BOOLEAN,
    FOREIGN KEY (cpf_nutri_responsavel)
    REFERENCES Nutricionista (CPF)
    ON DELETE SET NULL
    ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE Registro_Diagnostico (
    data_consulta CHAR(10),
    cpf_paciente CHAR(14),
    exames_bioquimicos VARCHAR(255),
    orientacao_plano_alimentar VARCHAR(255),
    meta_carboidrato DOUBLE,
    meta_proteina DOUBLE,
    meta_lipideo DOUBLE,
    peso_atual DOUBLE,
    peso_ideal DOUBLE,
    PCT DOUBLE,
    PCB DOUBLE,
    PCSE DOUBLE,
    PCSI DOUBLE,
    altura DOUBLE,
    CC DOUBLE,
    CQ DOUBLE,
    CB DOUBLE,
    comp_joelho DOUBLE,
    circ_panturrilha DOUBLE,
    PRIMARY KEY (data_consulta, cpf_paciente),
    FOREIGN KEY (cpf_paciente)
    REFERENCES Paciente (CPF)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE Medidas (
    id INTEGER PRIMARY KEY,
    nome VARCHAR(80)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE Refeicao (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    data_consulta CHAR(10),
    cpf_paciente CHAR(14),
    nome VARCHAR(100),
    horario CHAR(5),
    FOREIGN KEY (data_consulta, cpf_paciente)
    REFERENCES Registro_Diagnostico (data_consulta, cpf_paciente)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE Prato (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    rendimento DOUBLE,
    medida INTEGER,
    modo_preparo VARCHAR(255),
    FOREIGN KEY (medida)
    REFERENCES Medidas (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE Recordatorio (
    data_consulta CHAR(10),
    cpf_paciente CHAR(14),
    id_prato INTEGER,
    horario CHAR(5),
    lugar VARCHAR(100),
    quantidade DOUBLE,
    frequencia VARCHAR(100),
    medida INTEGER,
    PRIMARY KEY (data_consulta, cpf_paciente, horario, id_prato),
    FOREIGN KEY (data_consulta, cpf_paciente)
    REFERENCES Registro_Diagnostico (data_consulta, cpf_paciente)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    FOREIGN KEY (id_prato)
    REFERENCES Prato (id)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
    FOREIGN KEY (medida)
    REFERENCES Medidas (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE Alimentos (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    energia DOUBLE,
    proteina DOUBLE,
    lipideos DOUBLE,
    carboidrato DOUBLE,
    fibras DOUBLE,
    calcio DOUBLE,
    magnesio DOUBLE,
    manganes DOUBLE,
    fosforo DOUBLE,
    ferro DOUBLE,
    sodio DOUBLE,
    sodio_adicao DOUBLE,
    potassio DOUBLE,
    cobre DOUBLE,
    zinco DOUBLE,
    selenio DOUBLE,
    vitamina_a DOUBLE,
    vitamina_b1 DOUBLE,
    vitamina_b2 DOUBLE,
    vitamina_b3 DOUBLE,
    vitamina_b6 DOUBLE,
    vitamina_b12 DOUBLE,
    folato DOUBLE,
    vitamina_d DOUBLE,
    vitamina_e DOUBLE,
    vitamina_c DOUBLE,
    colesterol DOUBLE,
    ag_saturados DOUBLE,
    ag_monoinsaturados DOUBLE,
    ag_linoleico DOUBLE,
    ag_linolenico DOUBLE,
    ag_trans DOUBLE,
    acucar_total DOUBLE,
    acucar_adicao DOUBLE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE Equivalencia_gramas (
    id_alimento BIGINT,
    id_medida INTEGER,
    quantidade DOUBLE,
    PRIMARY KEY (quantidade, id_alimento, id_medida),
    FOREIGN KEY (id_alimento)
    REFERENCES Alimentos (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    FOREIGN KEY (id_medida)
    REFERENCES Medidas (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE Pratos_Refeicao (
    id_prato INTEGER,
    id_refeicao INTEGER,
    quantidade DOUBLE,
    PRIMARY KEY (id_refeicao, id_prato, quantidade),
    FOREIGN KEY (id_prato)
    REFERENCES Prato (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    FOREIGN KEY (id_refeicao)
    REFERENCES Refeicao (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE Alimentos_Prato (
    id_prato INTEGER,
    id_alimento BIGINT,
    medida INTEGER,
    quantidade DOUBLE,
    PRIMARY KEY (id_prato, id_alimento, medida, quantidade),
    FOREIGN KEY (id_prato)
    REFERENCES Prato (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    FOREIGN KEY (id_alimento)
    REFERENCES Alimentos (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE Substituicao_Alimentos (
    id_prato_original INTEGER,
    id_alimento_original BIGINT,
    med_alim_original INTEGER,
    qtd_alim_original DOUBLE,
    id_alimento_sub BIGINT,
    med_alim_sub INTEGER,
    qtd_alim_sub DOUBLE,
    PRIMARY KEY (id_prato_original, id_alimento_original, id_alimento_sub, med_alim_original, qtd_alim_original, med_alim_sub, qtd_alim_sub),
    FOREIGN KEY (id_prato_original, id_alimento_original, med_alim_original, qtd_alim_original)
    REFERENCES Alimentos_Prato (id_prato, id_alimento, medida, quantidade)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    FOREIGN KEY (id_alimento_sub)
    REFERENCES Alimentos (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    FOREIGN KEY (med_alim_sub)
    REFERENCES Medidas (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE Substituicao_Pratos (
    id_refeicao_original INTEGER,
    id_prato_original INTEGER,
    qtd_prato_original DOUBLE,
    id_prato_sub INTEGER,
    qtd_prato_sub DOUBLE,
    PRIMARY KEY (id_prato_sub, id_prato_original, id_refeicao_original, qtd_prato_original, qtd_prato_sub),
    FOREIGN KEY (id_refeicao_original, id_prato_original, qtd_prato_original)
    REFERENCES Pratos_Refeicao (id_refeicao, id_prato, quantidade)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    FOREIGN KEY (id_prato_sub)
    REFERENCES Prato (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE Medicamentos (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    energia CHAR,
    proteina CHAR,
    lipideo CHAR,
    colesterol CHAR,
    carboidrato CHAR,
    fibra CHAR,
    cinzas CHAR,
    calcio CHAR,
    magnesio CHAR,
    manganes CHAR,
    fosforo CHAR,
    ferro CHAR,
    sodio CHAR,
    potasio CHAR,
    cobre CHAR,
    zinco CHAR,
    retinol CHAR,
    RE CHAR,
    RAE CHAR,
    tiamina CHAR,
    riboflavina CHAR,
    piridoxina CHAR,
    niacina CHAR,
    vitamina_c CHAR
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE Medicamentos_Em_Uso (
    id_medicamento INTEGER,
    data_consulta CHAR(10),
    cpf_paciente CHAR(14),
    PRIMARY KEY (cpf_paciente, id_medicamento, data_consulta),
    FOREIGN KEY (id_medicamento)
    REFERENCES Medicamentos (id)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
    FOREIGN KEY (data_consulta, cpf_paciente)
    REFERENCES Registro_Diagnostico (data_consulta, cpf_paciente)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE Aversao (
    id_alimento BIGINT,
    cpf_paciente CHAR(14),
    PRIMARY KEY (cpf_paciente, id_alimento),
    FOREIGN KEY (id_alimento)
    REFERENCES Alimentos (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    FOREIGN KEY (cpf_paciente)
    REFERENCES Paciente (CPF)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE Preferencia (
    id_alimento BIGINT,
    cpf_paciente CHAR(14),
    PRIMARY KEY (cpf_paciente, id_alimento),
    FOREIGN KEY (id_alimento)
    REFERENCES Alimentos (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    FOREIGN KEY (cpf_paciente)
    REFERENCES Paciente (CPF)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE Intolerancia (
    id_alimento BIGINT,
    cpf_paciente CHAR(14),
    PRIMARY KEY (cpf_paciente, id_alimento),
    FOREIGN KEY (id_alimento)
    REFERENCES Alimentos (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    FOREIGN KEY (cpf_paciente)
    REFERENCES Paciente (CPF)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE Suplementos (
    id BIGINT,
    cpf_paciente CHAR(14),
    indicacao VARCHAR(100),
    PRIMARY KEY (id, cpf_paciente),
    FOREIGN KEY (id)
    REFERENCES Alimentos (id)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
    FOREIGN KEY (cpf_paciente)
    REFERENCES Paciente (CPF)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
