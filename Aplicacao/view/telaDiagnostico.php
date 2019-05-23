<?php
	require_once ('../model/Nutricionista.php');
	require_once ('../model/Paciente.php');

	session_start();
	$user = $_SESSION['nutricionista'];
	$paciente = $_SESSION['paciente'];
	$diagnostico = $user->recuperarDadosDiagnostico($_SESSION['consulta']);
	if (isset($_POST["dataConsulta"])){
		$data_consulta = $diagnostico->dataConsulta;
		$diagnostico->dataConsulta = $_POST["dataConsulta"];
		$diagnostico->pesoAtual = $_POST["pesoAtual"];
		$diagnostico->pesoIdeal = $_POST["pesoIdeal"];
		$diagnostico->PCT = $_POST["pct"];
		$diagnostico->PCB = $_POST["pcb"];
		$diagnostico->PCSE = $_POST["pcse"];
		$diagnostico->PCSI = $_POST["pcsi"];
		$diagnostico->altura = $_POST["altura"];
		$diagnostico->CC = $_POST["cc"];
		$diagnostico->CQ = $_POST["cq"];
		$diagnostico->CB = $_POST["cb"];
		$diagnostico->compJoelho = $_POST["compJoelho"];
		$diagnostico->circPanturrilha = $_POST["circPantu"]; 
		$user->atualizarDiagnostico($diagnostico, $diagnostico->paciente, $data_consulta);
	}
	$_SESSION['consulta'] = $diagnostico;

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
		<link rel="stylesheet" type="text/css" href="estiloDiagnostico.css">
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
			<form action = "telaDiagnostico.php" id = "diagnosticoAtualizado" method = "post">
				<div class = "mt-2 form-group row">
					<label class = "pl-2 col-form-label" for = "dataConsulta"> <b> Data da Consulta: </b> </label> 
					<div class = "px-2 col-3">
						<input id = "dataConsulta" name = "dataConsulta" type = "text" disabled class = "form-control form-control-plaintext form-diagnostico" value = "' . $diagnostico->dataConsulta . '"> 
					</div>
					<button type = "button" class = "mt-2 mr-1 offset-1 btn btn-sm btn-info" id = "botaoPlano" onclick = "verPlano();">Plano Alimentar </button>
					<button type = "button" class = "mt-2 ml-1 btn btn-sm btn-info" id = "botaoPlano" onclick = "verPlano();">Recordatório </button>
				</div>
				<hr>
				<div class = "form-group row inputsDiag">
					<label class = "pl-2 col-form-label" for = "pesoAtual"> <b> Peso atual: </b> </label> 
					<div class = "px-2 col-1">
						<input id = "pesoAtual" name = "pesoAtual" type = "text" disabled class = "form-control form-control-plaintext form-diagnostico" value = "' . $diagnostico->pesoAtual . '"> 
					</div>
					<label class = "ml-3 col-form-label" for = "pesoIdeal"> <b> Peso ideal: </b> </label> 
					<div class = "px-2 col-1">
						<input id = "pesoIdeal" name = "pesoIdeal" type = "text" disabled class = "form-control form-control-plaintext form-diagnostico" value = "' . $diagnostico->pesoIdeal . '"> 
					</div>
					<label class = "ml-3 col-form-label" for = "altura"> <b> Altura: </b> </label> 
					<div class = "px-2 col-1">
						<input id = "altura" name = "altura" type = "text" disabled class = "form-control form-control-plaintext form-diagnostico" value = "' . $diagnostico->altura . '"> 
					</div>					
				</div>
				<div class = "form-group row inputsDiag">
					<label class = "pl-2 col-form-label" for = "pct"> <b> PCT: </b> </label> 
					<div class = "px-2 col-1">
						<input id = "pct" name = "pct" type = "text" disabled class = "form-control form-control-plaintext form-diagnostico" value = "' . $diagnostico->PCT . '"> 
					</div>
					<label class = "ml-3 col-form-label" for = "pcb"> <b> PCB: </b> </label> 
					<div class = "px-2 col-1">
						<input id = "pcb" name = "pcb" type = "text" disabled class = "form-control form-control-plaintext form-diagnostico" value = "' . $diagnostico->PCB . '"> 
					</div>
					<label class = "ml-3 col-form-label" for = "pcse"> <b> PCSE: </b> </label> 
					<div class = "px-2 col-1">
						<input id = "pcse" name = "pcse" type = "text" disabled class = "form-control form-control-plaintext form-diagnostico" value = "' . $diagnostico->PCSE . '"> 
					</div>
					<label class = "ml-3 col-form-label" for = "pcsi"> <b> PCSI: </b> </label> 
					<div class = "px-2 col-1">
						<input id = "pcsi" name = "pcsi" type = "text" disabled class = "form-control form-control-plaintext form-diagnostico" value = "' . $diagnostico->PCSI . '"> 
					</div>
				</div>
				<div class = "form-group row inputsDiag">
					<label class = "pl-2 col-form-label" for = "cc"> <b> CC: </b> </label> 
					<div class = "px-2 col-1">
						<input id = "cc" name = "cc" type = "text" disabled class = "form-control form-control-plaintext form-diagnostico" value = "' . $diagnostico->CC . '"> 
					</div>
					<label class = "ml-3 col-form-label" for = "cq"> <b> CQ: </b> </label> 
					<div class = "px-2 col-1">
						<input id = "cq" name = "cq" type = "text"  disabled class = "form-control form-control-plaintext form-diagnostico" value = "' . $diagnostico->CQ . '"> 
					</div>
					<label class = "ml-3 col-form-label" for = "cb"> <b> CB: </b> </label> 
					<div class = "px-2 col-1">
						<input id = "cb" name = "cb" type = "text" disabled class = "form-control form-control-plaintext form-diagnostico" value = "' . $diagnostico->CB . '"> 
					</div>
				</div>			
				<div class = "form-group row inputsDiag">
					<label class = "pl-2 col-form-label" for = "compJoelho"> <b> Comprimento Joelho-Calcanhar: </b> </label> 
					<div class = "px-2 col-1">
						<input id = "compJoelho" name = "compJoelho"  type = "text" disabled class = "form-control form-control-plaintext form-diagnostico" value = "' . $diagnostico->compJoelho . '"> 
					</div>
					<label class = "ml-3 col-form-label" for = "circPantu"> <b> Circunferência da Panturrilha: </b> </label> 
					<div class = "px-2 col-1">
						<input id = "circPantu" name = "circPantu" type = "text" disabled class = "form-control form-control-plaintext form-diagnostico" value = "' . $diagnostico->circPanturrilha . '"> 
					</div>									
				</div>
				<hr>
				<div class = "row">
					<div class = "text-center col-12">
						<button type = "button" class = "mb-3 btn btn-alterar" id = "botaoAlterar" onclick = "editavel();"> Alterar </button>
						<button type = "submit" class = "mb-3 btn btn-alterar" id = "botaoSalvar"> Confirmar </button>
					</div>
				</div>	
			</form>
		</div>
	</body>

	<script type = "text/javascript" src = "scriptDiagnostico.js"> </script>

	</html>'
?>