<?php 

    require_once('../model/Nutricionista.php');
    require_once('../model/Paciente.php');

    session_start();
    $nutri = $_SESSION['nutricionista'];
    if(isset($_POST['nome'])){
        $paciente = new Paciente($_POST['cpf'], $_POST['nome'], $nutri->cpf);
        if(isset($_POST['nivelInst1']) && isset($_POST['nivelInst2'])){
            if($_POST['nivelInst1'] == 'Fundamental'){
                $nivelInstrucao = 0;
            }
            else if($_POST['nivelInst1'] == 'Médio'){
                $nivelInstrucao = 2;
            }
            else if($_POST['nivelInst1'] == 'Superior'){
                $nivelInstrucao = 4;
            }
            else if($_POST['nivelInst1'] == 'Pós-Graduação'){
                $nivelInstrucao = 6;
            }
            if($_POST['nivelInst2'] == 'Sim'){
                $nivelInstrucao++;
            }
        }
        if(isset($_POST['estadoCivil'])){
            if($_POST['estadoCivil'] == 'Solteiro'){
                $estadoCivil = 0;
            }
            else if($_POST['estadoCivil'] == 'Casado'){
                $estadoCivil = 1;
            }
            else if($_POST['estadoCivil'] == 'Amasiado'){
                $estadoCivil = 2;
            }
            else if($_POST['estadoCivil'] == 'Viúvo'){
                $estadoCivil = 3;
            }
            else{
                $estadoCivil = 4;
            }
        }
        $protese = 0;
        if(isset($_POST['usoProtese']) && isset($_POST['fixaOuMovel'])){
            $protese = $_POST['fixaOuMovel'];
            if($_POST['usoProtese'] == '2'){
                $protese++;
            }
        }
        else if(isset($_POST['usoProtese']) && !isset($_POST['fixaOuMovel']) && $_POST['usoProtese'] == '0'){
            $protese = 0;
        }
        $dor_evacuar = FALSE; 
        $fezes_ressecadas = FALSE;
        $uso_forca = FALSE;
        $fezes_amolecidas = FALSE;
        $urgencia_fecal = FALSE;
        $flatulencia = FALSE;
        $presenca_sangue_fezes = FALSE;
        $fezes_fetidas = FALSE;
        $fezes_espumosas = FALSE;
        if(isset($_POST['queixaFezes'])){
            for($i=0; $i<count($_POST['queixaFezes']); $i++){
                if($_POST['queixaFezes'][$i] == '0'){
                    $dor_evacuar = TRUE;
                }
                else if($_POST['queixaFezes'][$i] == '1'){
                    $fezes_ressecadas = TRUE;
                }
                else if($_POST['queixaFezes'][$i] == '2'){
                    $uso_forca = TRUE;
                }
                else if($_POST['queixaFezes'][$i] == '3'){
                    $fezes_amolecidas = TRUE;
                }
                else if($_POST['queixaFezes'][$i] == '4'){
                    $urgencia_fecal = TRUE;
                }
                else if($_POST['queixaFezes'][$i] == '5'){
                    $flatulencia = TRUE;
                }
                else if($_POST['queixaFezes'][$i] == '6'){
                    $presenca_sangue_fezes = TRUE;
                }
                else if($_POST['queixaFezes'][$i] == '7'){
                    $fezes_fetidas = TRUE;
                }
                else if($_POST['queixaFezes'][$i] == '8'){
                    $fezes_espumosas = TRUE;
                }                                  
            }
        }
        $dor_urinar = FALSE;
        $incontinencia = FALSE;
        $presenca_sangue_urina = FALSE;
        if(isset($_POST['queixaUrina'])){
            for($i=0; $i<count($_POST['queixaUrina']); $i++){
                if($_POST['queixaUrina'][$i] == '0'){
                    $dor_urinar = TRUE;
                }
                else if($_POST['queixaUrina'][$i] == '1'){
                    $incontinencia = TRUE;
                }
                else if($_POST['queixaUrina'][$i] == '2'){
                    $presenca_sangue_urina = TRUE;
                }
            }
        }
        if(!isset($_POST['motivoRuim'])){
            $motivo_deglut_ruim = NULL;
        }
        else{
            $motivo_deglut_ruim = $_POST['motivoRuim'];
        }
        $digestao_eructacao = FALSE;
        $digestao_dispepsia = FALSE;
        $digestao_pirose = FALSE;
        $digestao_refluxo = FALSE;
        $digestao_nauseas = FALSE;
        $digestao_vomito = FALSE;
        $digestao_distensao = FALSE;
        if(isset($_POST['digestao'])){
            for($i=0; $i<count($_POST['digestao']); $i++){
                if($_POST['digestao'][$i] == '0'){
                    break;
                }
                else if($_POST['digestao'][$i] == '1'){
                    $digestao_distensao = TRUE;
                }
                else if($_POST['digestao'][$i] == '2'){
                    $digestao_eructacao = TRUE;
                }
                else if($_POST['digestao'][$i] == '3'){
                    $digestao_dispepsia = TRUE;
                }
                else if($_POST['digestao'][$i] == '4'){
                    $digestao_pirose = TRUE;
                }
                else if($_POST['digestao'][$i] == '5'){
                    $digestao_refluxo = TRUE;
                }
                else if($_POST['digestao'][$i] == '6'){
                    $digestao_nauseas = TRUE;
                }
                else if($_POST['digestao'][$i] == '7'){
                    $digestao_vomito = TRUE;
                }                
            }            
        }
        if(isset($_POST['depGrau'])){
            if($_POST['depGrau'] == 'Nenhum'){
                $dependencia_mobilidade = 0;
            }
            else if($_POST['depGrau'] == 'Parcial'){
                $dependencia_mobilidade = 1;
            }
            else if($_POST['depGrau'] == 'Total'){
                $dependencia_mobilidade = 2;
            }
        }
        $regul_menstruacao = NULL;
        $sinais_tpm = NULL;
        $amenorreia = NULL;
        $sinais_menopausa = NULL;
        $gestacoes_anteriores = NULL;
        $menarca = NULL;
        $abortos = NULL;
        $sinais_menopausa = NULL;
        $sinais_andropausa = NULL;
        $desenv_genitalia = NULL;
        $desenv_mama = NULL;
        $pelos_pubianos = NULL;
        if(isset($_POST['regulMenst'])){
            if($_POST['regulMenst'] == 'Regular'){
                $regul_menstruacao = 0;
            }
            else if($_POST['regulMenst'] == 'Irregular'){
                $regul_menstruacao = 1;
            }
        }
        if(isset($_POST['sinaisTPM']) && $_POST['sinaisTPM'] != ''){
            $sinais_tpm = $_POST['sinaisTPM'];
        }
        if(isset($_POST['tempoAmenorreia']) && $_POST['tempoAmenorreia'] != ''){
            $amenorreia = $_POST['tempoAmenorreia'];
        }
        if(isset($_POST['tempoMenopausa']) && $_POST['tempoMenopausa'] != ''){
            $sinais_menopausa = $_POST['tempoMenopausa'];
        }
        if(isset($_POST['gestacoes']) && $_POST['gestacoes'] != ''){
            $gestacoes_anteriores = $_POST['gestacoes'];
        }
        if(isset($_POST['menarca']) && $_POST['menarca'] != ''){
            $menarca = $_POST['menarca'];
        }
        if(isset($_POST['abortos']) && $_POST['abortos'] != ''){
            $abortos = $_POST['abortos'];
        }
        if(isset($_POST['tempoAndropausa']) && $_POST['tempoAndropausa'] != ''){
            $sinais_andropausa = $_POST['tempoAndropausa'];
        }
        if(isset($_POST['desenvGenit']) && $_POST['desenvGenit'] != ''){
            $desenv_genitalia = $_POST['desenvGenit'];
        }
        if(isset($_POST['desenvMama']) && $_POST['desenvMama'] != ''){
            $desenv_mama = $_POST['desenvMama'];
        }
        if(isset($_POST['pelosPub']) && $_POST['pelosPub'] != ''){
            $pelos_pubianos = $_POST['pelosPub'];
        }     
        $tempoPesoRecente = NULL;        
        $pesoRecente = NULL;        
        if(isset($_POST['tempoPesoRecente']) && $_POST['tempoPesoRecente'] != ''){
            $tempoPesoRecente = $_POST['tempoPesoRecente'];
        }
        if(isset($_POST['pesoRecente']) && $_POST['pesoRecente'] != ''){
            $pesoRecente = $_POST['pesoRecente'];
        }
        $nutri->registrarPaciente($paciente);
        $_SESSION['paciente'] = $paciente;        
        $nutri->atualizarAnamnesePaciente($paciente, $paciente->cpf, $_POST['nascimento'], $_POST['sexo'], $_POST['profissao'], $estadoCivil, $_POST['nacionalidade'], $_POST['naturalidade'], $_POST['bairro'], $_POST['tipoDomicilio'], $_POST['qtdPessoas'], $_POST['rendaFamiliar'], $_POST['horaSono'], $_POST['caracSono'], $_POST['lugarRef'], $_POST['freqBebidas'], $_POST['numCig'], $_POST['drogaIlicita'], $nivelInstrucao, $_POST['restRel'], $_POST['olhos'], $_POST['cabelo'], $_POST['labios'], $_POST['lingua'], $_POST['gengiva'], $_POST['unhas'], $_POST['artic'], $_POST['mmssmmii'], $_POST['abdome'], $_POST['acne'], $_POST['insonia'], $_POST['estresse'], $_POST['cansaco'], $_POST['ansiedade'], $_POST['habitoIntestinal'], $_POST['consFezes'], $dor_evacuar, $fezes_ressecadas, $uso_forca, $fezes_amolecidas, $_POST['fezesLiquidas'], $urgencia_fecal, $flatulencia, $presenca_sangue_fezes, $fezes_fetidas, $fezes_espumosas, $_POST['diurese'], $dor_urinar, $incontinencia, $presenca_sangue_urina, $_POST['doencasAssociadas'], $_POST['dm'], $_POST['ha'], $_POST['ca'], $_POST['dislipidemia'], $_POST['obesidade'], $_POST['magreza'], $_POST['antecOutros'], $_POST['denticao'], $protese, $_POST['degluticao'], $motivo_deglut_ruim, $_POST['mobilidade'], $dependencia_mobilidade, $_POST['pesoHabitual'], $pesoRecente, $tempoPesoRecente, $_POST['alteracoesApetite'], $_POST['dietaEspecial'], $_POST['refDia'], $_POST['duracaoRef'], $_POST['aguaDia'], $_POST['ajudaAlimentar'], $regul_menstruacao, $sinais_tpm, $amenorreia, $sinais_menopausa, $gestacoes_anteriores, $menarca, $abortos, $sinais_andropausa, $desenv_genitalia, $desenv_mama, $pelos_pubianos, $digestao_eructacao, $digestao_dispepsia, $digestao_pirose, $digestao_refluxo, $digestao_nauseas, $digestao_vomito, $digestao_distensao);
        header('Location: telaAversoes.php');
    }

    echo '<!doctype html>

    <html>

    <head>
    	<meta charset="utf-8">
    	<meta name="view-port" content="width=width-device, initial-scale=1.0, shrink-to-fit=no">
    	<title>RM Saude</title>
    	<link href=\'https://fonts.googleapis.com/css?family=Roboto\' rel=\'stylesheet\'>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>      
    	<link rel="stylesheet" type="text/css" href="estiloNewPaciente.css">
    </head>

    <body>
        <div class = "mt-4 mb-3 row">
            <button class = "offset-1 btn btn-info" onclick = "voltar();"> Voltar </button>
        </div>      
        <div class = "mt-3 py-3 container shadow" id = "containerAnamnese">
            <form action = "telaNewPaciente.php" method = "post">
                <h6 class = "mb-3 subtitulos"> Informações Gerais </h6>
                <div class = "mt-1 row">
                    <div class = "col-4">
                        <label for = "nome"> Nome </label>
                        <input required type = "text" class = "form-control" id = "nome" name = "nome"> 
                    </div>
                    <div class = "col-3">
                        <label for = "cpf"> CPF </label>
                        <input required type = "text" class = "form-control" id = "cpf" name = "cpf">
                    </div>
                    <div class = "col-3">
                        <label for = "nascimento"> Data de Nascimento </label>
                        <input required type = "text" class = "form-control" id = "nascimento" name = "nascimento">
                    </div>                
                    <div class = "col-2">
                        <label for = "sexo"> Sexo </label>
                        <select id = "sexo" name = "sexo" required class = "px-0 form-control">
                            <option>Masculino</option>
                            <option>Feminino</option>
                            <option>Outro</option>
                        </select> 
                    </div>
                </div>
                <div class = "mt-1 row">
                    <div class = "col-5">
                        <label for = "profissao"> Profissão </label>
                        <input required type = "text" class = "form-control" id = "profissao" name = "profissao"> 
                    </div>              
                    <div class = "col-3">
                        <label for = "estadoCivil"> Estado Civil </label>
                        <select required id = "estadoCivil" name = "estadoCivil" class = "form-control">
                            <option>Solteiro</option>
                            <option>Casado</option>
                            <option>Amasiado</option>
                            <option>Viúvo</option>
                            <option>Separado</option>
                        </select>
                    </div>
                    <div class = "col-4">
                        <label for = "nacionalidade"> Nacionalidade </label>
                        <input required type = "text" id = "nacionalidade" name = "nacionalidade" class = "form-control">
                    </div>
                </div>
                <div class = "mt-1 row">
                    <div class = "col-3">
                        <label for = "naturalidade"> Naturalidade </label>
                        <input required type = "text" id = "naturalidade" name = "naturalidade" class = "form-control"> 
                    </div>
                    <div class = "col-3">
                        <label for = "bairro"> Bairro </label>
                        <input required type = "text" id = "bairro" name = "bairro" class = "form-control">
                    </div>
                    <div class = "col-3">
                        <label for = "tipoDomicilio"> Tipo de Domicílio </label>
                        <input required type = "text" id = "tipoDomicilio" name = "tipoDomicilio" class = "form-control">
                    </div>
                    <div class = "col-3">
                        <label for = "rendaFamiliar"> Renda Familiar </label>
                        <input required type = "number" id = "rendaFamiliar" min = 1 name = "rendaFamiliar" class = "form-control" step = "0.01">                    
                    </div>
                </div>
                <div class = "mt-1 row">
                    <div class = "col-4">
                        <label for = "qtdPessoas"> Com quantas pessoas reside? </label>
                        <input required type = "number" id = "qtdPessoas" min = 0 name = "qtdPessoas" class = "form-control">
                    </div>
                    <div class = "col-2">
                        <label for = "horaSono"> Horas de sono
                        </label>
                        <input required type = "number" id = "horaSono" min = 1 name = "horaSono" class = "form-control">
                    </div>
                    <div class = "col-6">
                        <label for = "caracSono"> Características do sono </label>
                        <textarea required id = "caracSono" name = "caracSono" class = "form-control" rows = "2"> </textarea>
                    </div>
                </div>
                <div class = "mt-1 row">
                    <div class = "col-3">
                        <label for = "lugarRef"> Onde realiza refeições </label>
                        <input required id = "lugarRef" name = "lugarRef" class = "form-control" type = "text">
                    </div>
                    <div class = "col-3">
                        <label for = "numCig"> Cigarros por dia </label>
                        <input required type = "number" name = "numCig" id = "numCig" class = "form-control" min = 0 step = 0.1 value = 0> 
                    </div>
                    <div class = "col-6">
                        <label for = "freqBebidas"> Frequência de consumo de bebidas alcoólicas </label>
                        <input required type = "text" name = "freqBebidas" id = "freqBebidas" class = "form-control"> 
                    </div>
                </div>
                <div class = "mt-1 row">
                    <div class = "col-4">
                        <label for = "drogaIlicita"> Uso de droga ilícita </label>
                        <input required type = "text" name = "drogaIlicita" id = "drogaIlicita" class = "form-control">
                    </div>
                    <div class = "col-4">
                        <label for = "nivelInst1"> Nível de instrução </label>
                        <select required id = "nivelInst1" name = "nivelInst1" class = "form-control">
                            <option>Fundamental</option>
                            <option>Médio</option>
                            <option>Superior</option>
                            <option>Pós-Graduação</option>
                        </select>
                    </div>
                    <div class = "col-4">
                        <label> Completo? </label> <br>
                        <div class="form-check form-check-inline">
                            <input class = "form-check-input" type = "radio" name = "nivelInst2" id = "nivelCompleto" value = "Sim">
                            <label class="form-check-label" for="nivelCompleto">Sim</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class = "form-check-input" type = "radio" id = "nivelIncompleto" name = "nivelInst2" value = "Não">
                            <label class="form-check-label" for="nivelIncompleto">Não</label>
                        </div>
                    </div>
                </div>      
                <div class = "mt-1 row">
                    <div class = "col-5">
                        <label for = "restRel"> Restrições alimentares da religião </label>
                        <textarea required rows = 2 class = "form-control" id = "restRel" name = "restRel"> </textarea>
                    </div>
                </div>
                <hr class = "divisores">
                <h6 class = "subtitulos subtitulos"> Interpretações do Exame Físico </h6>
                <div class = "mt-1 row">
                    <div class = "col-4">
                        <label for = "olhos"> Olhos </label>
                        <textarea required class = "form-control" id = "olhos" name = "olhos" rows = 2></textarea>
                    </div>
                    <div class = "col-4">
                        <label for = "cabelo"> Cabelo </label>
                        <textarea required class = "form-control" id = "cabelo" name = "cabelo" rows = 2></textarea>
                    </div>
                    <div class = "col-4">
                        <label for = "labios"> Lábios </label>
                        <textarea required class = "form-control" id = "labios" name = "labios" rows = 2></textarea>
                    </div>
                </div>
                <div class = "mt-1 row">
                    <div class = "col-4">
                        <label for = "lingua"> Língua </label>
                        <textarea required class = "form-control" id = "lingua" name = "lingua" rows = 2></textarea>
                    </div>
                    <div class = "col-4">
                        <label for = "gengiva"> Gengiva </label>
                        <textarea required class = "form-control" id = "gengiva" name = "gengiva" rows = 2></textarea>
                    </div>
                    <div class = "col-4">
                        <label for = "unhas"> Unhas </label>
                        <textarea required class = "form-control" id = "unhas" name = "unhas" rows = 2></textarea>
                    </div>
                </div>  
                <div class = "mt-1 row">
                    <div class = "col-4">
                        <label for = "artic"> Articulações </label>
                        <textarea required class = "form-control" id = "artic" name = "artic" rows = 2></textarea>
                    </div>
                    <div class = "col-4">
                        <label for = "mmssmmii"> MMSS/MMII </label>
                        <textarea required class = "form-control" id = "mmssmmii" name = "mmssmmii" rows = 2></textarea>
                    </div>
                    <div class = "col-4">
                        <label for = "abdome"> Abdome </label>
                        <textarea required class = "form-control" id = "abdome" name = "abdome" rows = 2></textarea>
                    </div>
                </div>
                <hr class = "divisores">
                <h6 class = "subtitulos subtitulos"> Dados Clínicos </h6>
                <div class = "mt-1 row">
                    <div class = "col-4">
                        <label for = "acne"> Acne </label>
                        <textarea required class = "form-control" id = "acne" name = "acne" rows = 2></textarea>
                    </div>
                    <div class = "col-4">
                        <label for = "insonia"> Insônia </label>
                        <textarea required class = "form-control" id = "insonia" name = "insonia" rows = 2></textarea>
                    </div>
                    <div class = "col-4">
                        <label for = "estresse"> Estresse </label>
                        <textarea required class = "form-control" id = "estresse" name = "estresse" rows = 2></textarea>
                    </div>                         
                </div>
                <div class = "mt-1 row">
                    <div class = "col-4">
                        <label for = "cansaco"> Cansaço </label>
                        <textarea required class = "form-control" id = "cansaco" name = "cansaco" rows = 2></textarea>
                    </div>
                    <div class = "col-4">
                        <label for = "ansiedade"> Ansiedade </label>
                        <textarea required class = "form-control" id = "ansiedade" name = "ansiedade" rows = 2></textarea>
                    </div>
                </div>
                <div class = "mt-1 row">
                    <div class = "col-3">
                        <label for = "habitoIntestinal"> Hábito intestinal </label>
                        <input type = "text" required class = "form-control" id = "habitoIntestinal" name = "habitoIntestinal">
                    </div>
                    <div class = "col-5"> 
                        <label> Consistência das Fezes </label> <br>
                        <div class="form-check form-check-inline">
                            <input class = "form-check-input" type = "radio" name = "consFezes" id = "normal" value = "0">
                            <label class="form-check-label" for="normal">Normais</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class = "form-check-input" type = "radio" id = "amolecidas" name = "consFezes" value = "1">
                            <label class="form-check-label" for="amolecidas">Amolecidas</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class = "form-check-input" type = "radio" id = "duras" name = "consFezes" value = "2">
                            <label class="form-check-label" for="duras">Duras</label>
                        </div>
                    </div>
                </div>
                <label class = "mt-1"> Queixas ao defecar </label>
                <div class = "row">
                    <div class = "col-12">
                        <div class="form-check form-check-inline">
                            <input class = "form-check-input" type = "checkbox" name = "queixaFezes[]" id = "dor" value = "0">
                            <label class="form-check-label" for="dor">Dor ao Evacuar</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class = "form-check-input" type = "checkbox" id = "ressecadas" name = "queixaFezes[]" value = "1">
                            <label class="form-check-label" for="ressecadas">Fezes ressecadas</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class = "form-check-input" type = "checkbox" id = "forca" name = "queixaFezes[]" value = "2">
                            <label class="form-check-label" for="forca">Uso de força</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class = "form-check-input" type = "checkbox" id = "queixaAmolecidas" name = "queixaFezes[]" value = "3">
                            <label class="form-check-label" for="queixaAmolecidas">Fezes amolecidas</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class = "form-check-input" type = "checkbox" id = "urgencia" name = "queixaFezes[]" value = "4">
                            <label class="form-check-label" for="urgencia">Urgência Fecal</label>
                        </div>                       
                    </div>
                </div>
                <div class = "mt-1 row">
                    <div class = "col-12">
                        <div class="form-check form-check-inline">
                            <input class = "form-check-input" type = "checkbox" id = "flatulencia" name = "queixaFezes[]" value = "5">
                            <label class="form-check-label" for="flatulencia">Flatulência</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class = "form-check-input" type = "checkbox" id = "sangueFezes" name = "queixaFezes[]" value = "6">
                            <label class="form-check-label" for="sangueFezes">Presença de Sangue</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class = "form-check-input" type = "checkbox" id = "fetidas" name = "queixaFezes[]" value = "7">
                            <label class="form-check-label" for="fetidas">Fezes fétidas</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class = "form-check-input" type = "checkbox" id = "espumosas" name = "queixaFezes[]" value = "8">
                            <label class="form-check-label" for="espumosas">Fezes espumosas</label>
                        </div>                     
                    </div>
                </div>
                <div class = "mt-1 row">
                    <div class = "col-4">
                        <label for = "fezesLiquidas"> Frequência de fezes líquidas </label>
                        <input required type = "text" class = "form-control" id = "fezesLiquidas" name = "fezesLiquidas">
                    </div>
                </div>
                <div class = "mt-1 row">
                    <div class = "col-4"> 
                        <label for = "diurese"> Frequência/Coloração da Diurese </label>
                        <input required type = "text" id = "diurese" name = "diurese" class = "form-control">
                    </div>
                    <div class = "col-6">
                        <label> Queixas na Diurese </label> <br>
                       <div class="form-check form-check-inline">
                            <input class = "form-check-input" type = "checkbox" name = "queixaUrina[]" id = "dorUrina" value = "0">
                            <label class="form-check-label" for="dorUrina">Dor ao Urinar</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class = "form-check-input" type = "checkbox" id = "incotinencia" name = "queixaUrina[]" value = "1">
                            <label class="form-check-label" for="incotinencia">Incontinência</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class = "form-check-input" type = "checkbox" id = "sangueUrina" name = "queixaUrina[]" value = "2">
                            <label class="form-check-label" for="sangueUrina">Sangue</label>
                        </div>
                    </div>
                </div>
                <div class = "mt-1 row"> 
                    <div class = "col-12">
                        <label for = "doencasAssociadas"> Doenças atualmente associadas </label>
                        <textarea required name = "doencasAssociadas" id = "doencasAssociadas" rows = 3 class = "form-control"></textarea>
                    </div>
                </div>
                <div class = "mt-1 row">
                    <span class = "col-5"> Antecedentes Familiares/Quem </span>
                </div>
                <div class = "mt-1 row">
                    <div class = "col-4">
                        <label for = "dm"> DM </label>
                        <input type = "text" required class = "form-control" id = "dm" name = "dm">
                    </div>
                    <div class = "col-4">
                        <label for = "ha"> HA </label>
                        <input type = "text" required class = "form-control" id = "ha" name = "ha">
                    </div>
                    <div class = "col-4">
                        <label for = "ca"> CA </label>
                        <input type = "text" required class = "form-control" id = "ca" name = "ca">
                    </div>
                </div>
                <div class = "mt-1 row">
                    <div class = "col-4">
                        <label for = "dislipidemia"> Dislipidemia </label>
                        <input type = "text" required class = "form-control" id = "dislipidemia" name = "dislipidemia">
                    </div>
                    <div class = "col-4">
                        <label for = "obesidade"> Obesidade </label>
                        <input type = "text" required class = "form-control" id = "obesidade" name = "obesidade">
                    </div>
                    <div class = "col-4">
                        <label for = "magreza"> Magreza </label>
                        <input type = "text" required class = "form-control" id = "magreza" name = "magreza">
                    </div>
                </div>
                <div class = "mt-1 row">
                    <div class = "col-12">
                        <label for = "antecOutros"> Outros (Doença - Quem) </label>
                        <textarea required id = "antecOutros" name = "antecOutros" rows = 3 class = "form-control"></textarea>
                    </div>
                </div>
                <div class = "mt-1 row">
                    <div class = "col-4">
                        <label> Dentição </label> <br>
                        <div class="form-check form-check-inline">
                            <input class = "form-check-input" type = "radio" name = "denticao" id = "boa" value = "0">
                            <label class="form-check-label" for="boa">Boa</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class = "form-check-input" type = "radio" id = "regular" name = "denticao" value = "1">
                            <label class="form-check-label" for="regular">Regular</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class = "form-check-input" type = "radio" id = "ruim" name = "denticao" value = "2">
                            <label class="form-check-label" for="ruim">Ruim</label>
                        </div>                    
                    </div>
                </div>
               <label class = "mt-1"> Usa prótese? </label> 
               <label class = "pl-5 offset-3"> Fixa ou Móvel? </label>  
                <div class = "row">
                    <div class = "col-12">
                        <div class="form-check form-check-inline">
                            <input onclick = "usaProtese(this);" class = "form-check-input" type = "radio" name = "usoProtese" id = "naoProt" value = "0">
                            <label class="form-check-label" for="naoProt">Não usa</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input onclick = "usaProtese(this);" class = "form-check-input" type = "radio" id = "total" name = "usoProtese" value = "1">
                            <label class="form-check-label" for="total">Usa total</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input onclick = "usaProtese(this);" class = "form-check-input" type = "radio" id = "parcial" name = "usoProtese" value = "2">
                            <label class="form-check-label" for="parcial">Usa parcial</label>
                        </div>
                        <div class="ml-5 form-check form-check-inline">
                            <input disabled class = "form-check-input" type = "radio" id = "fixa" name = "fixaOuMovel" value = "1">
                            <label class="form-check-label" for="fixa">Fixa</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input disabled class = "form-check-input" type = "radio" id = "movel" name = "fixaOuMovel" value = "3">
                            <label class="form-check-label" for="movel">Móvel</label>
                        </div>                        
                    </div>
                </div>
                <div class = "mt-1 row">
                    <div class = "col-4">
                        <label> Deglutição </label> <br>
                        <div class="form-check form-check-inline">
                            <input class = "form-check-input" type = "radio" name = "degluticao" id = "boaDeg" value = "0" onclick = "degQualidade(this);">
                            <label class="form-check-label" for="boaDeg"> Boa </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class = "form-check-input" type = "radio" id = "regularDeg" name = "degluticao" value = "1" onclick = "degQualidade(this);">
                            <label class="form-check-label" for="regularDeg">Regular</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class = "form-check-input" type = "radio" id = "ruimDeg" name = "degluticao" value = "2" onclick = "degQualidade(this);">
                            <label class="form-check-label" for="ruimDeg">Ruim</label>
                        </div>
                    </div>
                    <div class = "col-8">
                        <label for = "motivoRuim" id = "motivoLabel"> Qual o motivo? </label>
                        <textarea class = "form-control" id = "motivoRuim" name = "motivoRuim" rows= 2></textarea>
                    </div>
                </div>
                <div class = "mt-1 row">
                    <div class = "col-12">
                        <label> Digestão </label> <br>
                        <div class="form-check form-check-inline">
                            <input onclick = "digBoa();" class = "form-check-input" type = "checkbox" name = "digestao[]" id = "digSemQueixa" value = "0">
                            <label class="form-check-label" for="digSemQueixa">Boa</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class = "form-check-input" type = "checkbox" id = "distensao" name = "digestao[]" value = "1">
                            <label class="form-check-label" for="distensao">Distensão</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class = "form-check-input" type = "checkbox" id = "eructacao" name = "digestao[]" value = "2">
                            <label class="form-check-label" for="eructacao">Eructação</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class = "form-check-input" type = "checkbox" name = "digestao[]" id = "dispepsia" value = "3">
                            <label class="form-check-label" for="dispepsia">Dispepsia</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class = "form-check-input" type = "checkbox" id = "pirose" name = "digestao[]" value = "4">
                            <label class="form-check-label" for="pirose">Pirose</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class = "form-check-input" type = "checkbox" id = "refluxo" name = "digestao[]" value = "5">
                            <label class="form-check-label" for="refluxo">Refluxo</label>
                        </div> 
                        <div class="form-check form-check-inline">
                            <input class = "form-check-input" type = "checkbox" id = "nauseas" name = "digestao[]" value = "6">
                            <label class="form-check-label" for="nauseas">Náuseas</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class = "form-check-input" type = "checkbox" id = "vomito" name = "digestao[]" value = "7">
                            <label class="form-check-label" for="vomito">Vômito</label>
                        </div>
                    </div>
                </div>
                <div class = "mt-1 row">
                    <div class = "col-8">
                        <label> Mobilidade Física </label> <br>
                        <div class="form-check form-check-inline">
                            <input class = "form-check-input" type = "radio" name = "mobilidade" id = "mobNormal" value = "0">
                            <label class="form-check-label" for="mobNormal">Normal</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class = "form-check-input" type = "radio" id = "mobComprometida" name = "mobilidade" value = "1">
                            <label class="form-check-label" for="mobComprometida">Comprometida</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class = "form-check-input" type = "radio" id = "mobRestrito" name = "mobilidade" value = "2">
                            <label class="form-check-label" for="mobRestrito">Restrito ao leito</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class = "form-check-input" type = "radio" name = "mobilidade" id = "cadeirante" value = "3">
                            <label class="form-check-label" for="cadeirante">Cadeirante</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class = "form-check-input" type = "radio" id = "muletas" name = "mobilidade" value = "4">
                            <label class="form-check-label" for="muletas">Muletas/Andadores</label>
                        </div>
                    </div>
                    <div class = "col-3">
                        <label for = "depGrau"> Grau de Dependencia </label>
                        <select id = "depGrau" name = "depGrau" class = "form-control">
                            <option>Nenhum</option>
                            <option>Parcial</option>
                            <option>Total</option>
                        </select>
                    </div>
                </div>
                <hr class = "divisores">
                <h6 class = "subtitulos subtitulos"> Sistema Reprodutor </h6>         
                <div class = "mt-1 row">
                    <div class = "col-3">
                        <label for = "regulMenst"> Menstruação </label>
                        <select id = "regulMenst" name = "regulMenst" class = "form-control"> 
                            <option>Não se aplica</option>
                            <option>Regular</option>
                            <option>Irregular</option>
                        </select>
                    </div>
                    <div class = "col-6">
                        <label for = "sinaisTPM"> Sinais de TPM </label>
                        <textarea id = "sinaisTPM" class = "form-control" name = "sinaisTPM" rows = 2></textarea>
                    </div>
                    <div class = "col-3">
                        <label for = "tempoAmenorreia"> Tempo de Amenorreia </label>
                        <input type = "text" id = "tempoAmenorreia" name = "tempoAmenorreia" class = "form-control">
                    </div>                
                </div>
                <div class = "mt-1 row">
                    <div class = "col-5">
                        <label for = "tempoMenopausa"> Sinais de Menopausa? Há quanto tempo? </label>
                        <textarea id = "tempoMenopausa" class = "form-control" name = "tempoMenopausa" rows = 2></textarea>
                    </div>
                    <div class = "col-3">
                        <label for = "gestacoes"> Gestações Anteriores </label>
                        <input type = "number" id = "gestacoes" min = 0 name = "gestacoes" class = "form-control">
                    </div>
                    <div class = "col-2">
                        <label for = "menarca"> Menarca </label>
                        <input type = "number" id = "menarca" name = "menarca" class = "form-control" min = 0>
                    </div>
                    <div class = "col-2">
                        <label for = "abortos"> Abortos </label>
                        <input type = "number" id = "abortos" name = "abortos" class = "form-control" min = 0>
                    </div>                
                </div>
                <div class = "mt-3 row">
                    <div class = "col-5">
                        <label for = "tempoAndropausa">
                        Sinais de Andropausa? Há quanto tempo? </label>
                        <textarea id = "tempoAndropausa" name = "tempoAndropausa" class = "form-control" rows = 2></textarea>
                    </div>
                </div>
                <div class = "mt-3 row">
                    <div class = "col-4">
                        <label for = "desenvGenit"> Desenvolvimento da Genitalia </label>
                        <input type = "text" id = "desenvGenit" name = "desenvGenit" class = "form-control" maxlength="2">
                    </div>
                    <div class = "col-4">
                        <label for = "desenvMama"> Desenvolvimento da Mama </label>
                        <input type = "text" id = "desenvMama" name = "desenvMama" class = "form-control" maxlength="2">
                    </div> 
                    <div class = "col-4">
                        <label for = "pelosPub"> Pelos Pubianos </label>
                        <input type = "text" id = "pelosPub" name = "pelosPub" class = "form-control" maxlength="2">
                    </div>
                </div>
                <hr class = "divisores">
                <h6 class = "subtitulos subtitulos"> Histórico Alimentar Nutricional </h6>
                <div class = "mt-1 row">
                    <div class = "col-3">
                        <label for = "pesoHabitual"> Peso habitual </label>
                        <input required type = "number" step = "0.01" min = 0 id = "pesoHabitual" name = "pesoHabitual" class = "form-control">
                    </div>
                   <div class = "col-4">
                        <label for = "pesoRecente"> Perda/ganho de peso recente</label>
                        <input required type = "number" step = "0.01" id = "pesoRecente" name = "pesoRecente" class = "form-control">
                    </div>
                   <div class = "col-5">
                        <label for = "tempoPesoRecente"> Em quanto tempo?</label>
                        <input type = "text" id = "tempoPesoRecente" name = "tempoPesoRecente" class = "form-control">
                    </div>                             
                </div>
                <div class = "mt-1 row">
                    <div class = "col-5">
                        <label for = "alteracoesApetite"> Alterações no apetite? Desde quando? </label>
                        <textarea required id = "alteracoesApetite" name = "alteracoesApetite" class = "form-control" rows = 2></textarea>
                    </div>
                    <div class = "col-4">
                        <label for = "dietaEspecial"> Segue alguma dieta especial? </label>
                        <textarea required id = "dietaEspecial" name = "dietaEspecial" class = "form-control" rows = 2> </textarea>
                    </div>
                </div>
                <div class = "mt-1 row">
                    <div class = "col-4">
                        <label for = "refDia"> Quantas refeições por dia? </label>
                        <input required type = "number" min = 0 step = 1 id = "refDia" name = "refDia" class = "form-control">
                    </div>
                    <div class = "col-3">
                        <label for = "duracaoRef"> Duração das refeições </label>
                        <input required type = "text" id = "duracaoRef" name = "duracaoRef" class = "form-control">
                    </div>
                    <div class = "col-5">
                        <label for = "ajudaAlimentar"> Quem o ajuda a se alimentar? </label>
                        <textarea required id = "ajudaAlimentar" name = "ajudaAlimentar" class = "form-control"></textarea>
                    </div>
                </div>
                <div class = "mt-1 row"> 
                    <div class = "col-5">
                        <label for = "aguaDia"> Quantidade de copos de água por dia </label>
                        <input required type = "number" min = 0 id = "aguaDia" name = "aguaDia" class = "form-control">
                    </div>
                </div>
                <div class = "mt-3 text-center col-12">
                    <button type = "submit" class = " btn btn-info"> Continuar </button>
                </div>
            </form>
        </div>
    </body>

    <script type = "text/javascript" src = "scriptNewPaciente.js"> </script>

    </html>';

    ?> 