<?php
	require_once ('../model/Nutricionista.php');
	require_once ('../model/Paciente.php');
	require_once("../model/RegDiagnostico.php");

	$reg = true;
	$pesoIdeal = 0;
	$examesBioquimicos = "-";
	session_start();
	$user = $_SESSION['nutricionista'];
	$paciente = $_SESSION['paciente'];
	if (isset($_POST["dataConsulta2"])){
		if (isset($_POST["pesoIdeal2"]) &&  $_POST["pesoIdeal2"]!=""){
			$pesoIdeal = $_POST["pesoIdeal2"];
		}
		if (isset($_POST["examesBioquimicos2"]) &&  $_POST["examesBioquimicos2"]!=""){
			$examesBioquimicos = $_POST["examesBioquimicos2"];
		}
		$diagnostico = new RegDiagnostico($paciente->cpf, $_POST["dataConsulta2"], array(), 0, 0, 0, array(), $examesBioquimicos, " ", $_POST["pesoAtual2"], $pesoIdeal, $_POST["pct2"], $_POST["pcb2"], $_POST["pcse2"], $_POST["pcsi2"], $_POST["altura2"], $_POST["cc2"], $_POST["cq2"], $_POST["cb2"], $_POST["compJoelho2"], $_POST["circPantu2"]);
		$ret = $user->registrarDiagnostico($diagnostico);
		if ($ret===true){
			$_SESSION['consulta'] = $diagnostico;
			header('Location: telaDiagnostico.php' );
		} else {
			$reg = false;
		}
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
		<link rel="stylesheet" type="text/css" href="estiloNewDiagnostico.css">
	</head>

	<body>
		<div style = "';
    if ($reg===true){
        echo ' display: none; ';
    }
    echo ' text-align: center;" class="alert alert-danger">
            <strong>Não foi possível cadastrar a consulta</strong>
        </div>
		<div class = "mt-5 row" id = "infoPaciente">
			<div class = "offset-2 col-6">
				<p> <b> Nome: </b> ' . $paciente->nome . ' </p>
			</div>
			<div class = "col-2">
				<p> <b> CPF: </b> ' . $paciente->cpf . ' </p>
			</div>
		</div>
		<div class = "mt-3 container shadow" id = "infoDiagnostico">
			<form action = "telaNewDiagnostico.php" id = "novoDiagnostico" method = "post">
				<div class = "mt-2 form-group row">
					<label class = "pl-2 col-form-label" for = "dataConsulta2"> <b> Data da Consulta: </b> </label> 
					<div class = "px-2 col-3">
						<input id = "dataConsulta2" required name = "dataConsulta2" type = "text" class = "form-control form-diagnostico"> 
					</div>
					<button type = "button" class = "mt-2 mr-1 offset-1 btn btn-sm btn-info" id = "botaoPlano" onclick = "verPlano();">Plano Alimentar </button>
					<button type = "button" class = "mt-2 ml-1 btn btn-sm btn-info" id = "botaoPlano" onclick = "verRecordatorio();">Recordatório </button>
				</div>
				<hr>
				<div class = "form-group row inputsDiag">
					<label class = "pl-2 col-form-label" for = "pesoAtual2"> <b> Peso atual: </b> </label> 
					<div class = "px-2 col-1">
						<input id = "pesoAtual2" required name = "pesoAtual2" type = "number" step=0.01 min=0 class = "form-control form-diagnostico"> 
					</div>
					<label class = "ml-3 col-form-label" for = "pesoIdeal2"> <b> Peso ideal: </b> </label> 
					<div class = "px-2 col-1">
						<input id = "pesoIdeal2" name = "pesoIdeal2" type = "number" step=0.01 min=0 class = "form-control form-diagnostico"> 
					</div>
					<label class = "ml-3 col-form-label" for = "altura2"> <b> Altura: </b> </label> 
					<div class = "px-2 col-1">
						<input id = "altura2" required name = "altura2" type = "number" step=0.01 min=0 class = "form-control form-diagnostico"> 
					</div>					
				</div>
				<div class = "form-group row inputsDiag">
					<label class = "pl-2 col-form-label" for = "pct2"> <b> PCT: </b> </label> 
					<div class = "px-2 col-1">
						<input id = "pct2" required name = "pct2" type = "number" step=0.01 min=0 class = "form-control form-diagnostico"> 
					</div>
					<label class = "ml-3 col-form-label" for = "pcb2"> <b> PCB: </b> </label> 
					<div class = "px-2 col-1">
						<input id = "pcb2" required name = "pcb2" type = "number" step=0.01 min=0 class = "form-control form-diagnostico"> 
					</div>
					<label class = "ml-3 col-form-label" for = "pcse2"> <b> PCSE: </b> </label> 
					<div class = "px-2 col-1">
						<input id = "pcse2" required name = "pcse2" type = "number" step=0.01 min=0 class = "form-control form-diagnostico"> 
					</div>
					<label class = "ml-3 col-form-label" for = "pcsi2"> <b> PCSI: </b> </label> 
					<div class = "px-2 col-1">
						<input id = "pcsi2" required name = "pcsi2" type = "number" step=0.01 min=0 class = "form-control form-diagnostico"> 
					</div>
				</div>
				<div class = "form-group row inputsDiag">
					<label class = "pl-2 col-form-label" for = "cc2"> <b> CC: </b> </label> 
					<div class = "px-2 col-1">
						<input id = "cc2" required name = "cc2" type = "number" step=0.01 min=0 class = "form-control form-diagnostico"> 
					</div>
					<label class = "ml-3 col-form-label" for = "cq2"> <b> CQ: </b> </label> 
					<div class = "px-2 col-1">
						<input id = "cq2" required name = "cq2" type = "number" step=0.01 min=0 class = "form-control form-diagnostico"> 
					</div>
					<label class = "ml-3 col-form-label" for = "cb2"> <b> CB: </b> </label> 
					<div class = "px-2 col-1">
						<input id = "cb2" required name = "cb2" type = "number" step=0.01 min=0 class = "form-control form-diagnostico"> 
					</div>
				</div>			
				<div class = "form-group row inputsDiag">
					<label class = "pl-2 col-form-label" for = "compJoelho2"> <b> Comprimento Joelho-Calcanhar: </b> </label> 
					<div class = "px-2 col-1">
						<input id = "compJoelho2" required name = "compJoelho2"  type = "number" step=0.01 min=0 class = "form-control form-diagnostico"> 
					</div>
					<label class = "ml-3 col-form-label" for = "circPantu2"> <b> Circunferência da Panturrilha: </b> </label> 
					<div class = "px-2 col-1">
						<input id = "circPantu2" required name = "circPantu2" type = "number" step=0.01 min=0 class = "form-control form-diagnostico"> 
					</div>									
				</div>
				<label for = "examesBioquimicos2" style="text-align: center;" class = "col-12"> <b> Interpretação dos Exames Bioquímicos </b> </label>
        		<textarea id = "examesBioquimicos2" name = "examesBioquimicos2" rows = "3" class = "form-control form-diagnostico col-12"></textarea>
				<hr>
				<div class = "row">
					<div class = "text-center col-12">
						<button type = "submit" class = "mb-3 btn btn-alterar" id = "botaoSalvar"> Salvar </button>
					</div>
				</div>	
			</form>
		</div>
		<div class = "mt-3 row">
			<button class = "offset-1 btn btn-info" onclick = "voltar();"> Voltar </button>
		</div> 		
	</body>

	<script type = "text/javascript" src = "scriptNewDiagnostico.js"> </script>

	</html>';
?>