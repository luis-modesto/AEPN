<?php
	require_once ('../model/Nutricionista.php');
	require_once ('../model/Paciente.php');
	require_once("../model/RegDiagnostico.php");

	session_start();
	$user = $_SESSION['nutricionista'];
	$paciente = $_SESSION['paciente'];
	if (isset($_POST["dataConsulta"])){ 
		$diagnostico = new RegDiagnostico($paciente->cpf, $_POST["dataConsulta"], array(), NULL, NULL, NULL, array(), NULL, " ", $_POST["pesoAtual"], $_POST["pesoIdeal"], $_POST["pct"], $_POST["pcb"], $_POST["pcse"], $_POST["pcsi"], $_POST["altura"], $_POST["cc"], $_POST["cq"], $_POST["cb"], $_POST["compJoelho"], $_POST["circPantu"]);
		$user->RegistrarDiagnostico($diagnostico);
		$_SESSION['consulta'] = $diagnostico;
		header('Location: telaDiagnostico.php' );
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
					<label class = "pl-2 col-form-label" for = "dataConsulta"> <b> Data da Consulta: </b> </label> 
					<div class = "px-2 col-3">
						<input id = "dataConsulta" required name = "dataConsulta" type = "text" class = "form-control form-diagnostico"> 
					</div>
					<button type = "button" class = "mt-2 mr-1 offset-1 btn btn-sm btn-info" id = "botaoPlano" onclick = "verPlano();">Plano Alimentar </button>
					<button type = "button" class = "mt-2 ml-1 btn btn-sm btn-info" id = "botaoPlano" onclick = "verRecordatorio();">Recordatório </button>
				</div>
				<hr>
				<div class = "form-group row inputsDiag">
					<label class = "pl-2 col-form-label" for = "pesoAtual"> <b> Peso atual: </b> </label> 
					<div class = "px-2 col-1">
						<input id = "pesoAtual" required name = "pesoAtual" type = "number" step=0.01 min=0 class = "form-control form-diagnostico"> 
					</div>
					<label class = "ml-3 col-form-label" for = "pesoIdeal"> <b> Peso ideal: </b> </label> 
					<div class = "px-2 col-1">
						<input id = "pesoIdeal" name = "pesoIdeal" type = "number" step=0.01 min=0 class = "form-control form-diagnostico"> 
					</div>
					<label class = "ml-3 col-form-label" for = "altura"> <b> Altura: </b> </label> 
					<div class = "px-2 col-1">
						<input id = "altura" required name = "altura" type = "number" step=0.01 min=0 class = "form-control form-diagnostico"> 
					</div>					
				</div>
				<div class = "form-group row inputsDiag">
					<label class = "pl-2 col-form-label" for = "pct"> <b> PCT: </b> </label> 
					<div class = "px-2 col-1">
						<input id = "pct" required name = "pct" type = "number" step=0.01 min=0 class = "form-control form-diagnostico"> 
					</div>
					<label class = "ml-3 col-form-label" for = "pcb"> <b> PCB: </b> </label> 
					<div class = "px-2 col-1">
						<input id = "pcb" required name = "pcb" type = "number" step=0.01 min=0 class = "form-control form-diagnostico"> 
					</div>
					<label class = "ml-3 col-form-label" for = "pcse"> <b> PCSE: </b> </label> 
					<div class = "px-2 col-1">
						<input id = "pcse" required name = "pcse" type = "number" step=0.01 min=0 class = "form-control form-diagnostico"> 
					</div>
					<label class = "ml-3 col-form-label" for = "pcsi"> <b> PCSI: </b> </label> 
					<div class = "px-2 col-1">
						<input id = "pcsi" required name = "pcsi" type = "number" step=0.01 min=0 class = "form-control form-diagnostico"> 
					</div>
				</div>
				<div class = "form-group row inputsDiag">
					<label class = "pl-2 col-form-label" for = "cc"> <b> CC: </b> </label> 
					<div class = "px-2 col-1">
						<input id = "cc" required name = "cc" type = "number" step=0.01 min=0 class = "form-control form-diagnostico"> 
					</div>
					<label class = "ml-3 col-form-label" for = "cq"> <b> CQ: </b> </label> 
					<div class = "px-2 col-1">
						<input id = "cq" required name = "cq" type = "tnumber  step=0.01 min=0 class = "form-control form-diagnostico"> 
					</div>
					<label class = "ml-3 col-form-label" for = "cb"> <b> CB: </b> </label> 
					<div class = "px-2 col-1">
						<input id = "cb" required name = "cb" type = "number" step=0.01 min=0 class = "form-control form-diagnostico"> 
					</div>
				</div>			
				<div class = "form-group row inputsDiag">
					<label class = "pl-2 col-form-label" for = "compJoelho"> <b> Comprimento Joelho-Calcanhar: </b> </label> 
					<div class = "px-2 col-1">
						<input id = "compJoelho" required name = "compJoelho"  type = "number" step=0.01 min=0 class = "form-control form-diagnostico"> 
					</div>
					<label class = "ml-3 col-form-label" for = "circPantu"> <b> Circunferência da Panturrilha: </b> </label> 
					<div class = "px-2 col-1">
						<input id = "circPantu" required name = "circPantu" type = "number" step=0.01 min=0 class = "form-control form-diagnostico"> 
					</div>									
				</div>
				<hr>
				<div class = "row">
					<div class = "text-center col-12">
						<button type = "submit" class = "mb-3 btn btn-alterar" id = "botaoSalvar"> Salvar </button>
					</div>
				</div>	
			</form>
		</div>
	</body>

	<script type = "text/javascript" src = "scriptNewDiagnostico.js"> </script>

	</html>';
?>