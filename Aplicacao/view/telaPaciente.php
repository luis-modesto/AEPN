<?php
	require_once ('../model/Nutricionista.php');
	require_once ('../model/Paciente.php');

	session_start();
	$user = $_SESSION['nutricionista'];
	$paciente = $_SESSION['paciente'];
	$diagnosticos = $user->recuperarDiagnosticos($paciente->cpf);
	if(isset($_POST['consulta'])){
		$_SESSION['consulta'] = $diagnosticos[$_POST['consulta']];
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
		<link rel="stylesheet" type="text/css" href="estiloPaciente.css">
	</head>

	<body>
		<div class = "mt-5 container text-center">
			<div class = "row" id = "infoPaciente">
				<div class = "col-10">
					<p> <b> Nome: </b> ' . $paciente->nome . ' </p>
				</div>
				<div class = "col-2">
					<p> <b> CPF: </b> ' . $paciente->cpf . ' </p>
				</div>
			</div>
			<button class = "mt-1 mb-4 btn btn-primary"> Anamnese </button>
			<h3 class = "mb-3 mt-2 text-center" id = "titulo"> Visualizar Diagnóstico </h3>
			<div class="list-group container" id = "listaConsultas">';
	for ($i = 0; $i<count($diagnosticos); $i++){
		echo '		  <button class="col-5 list-group-item list-group-item-action" id = "consulta' . $i . '" onclick = "selecionaConsulta(\'' . $i . '\');"> Consulta do dia ' . $diagnosticos[$i]->dataConsulta . ' </button>';
	}
	echo '		</div>
			<button class = "btn btn-info mt-3" id = "addConsulta"> <i class="fas fa-plus"></i> Adicionar Registro Diagnóstico </button>
		</div>

		<form action = "telaPaciente.php" id = "consultaEscolhida" method = "post">
			<input type = "text" name = "consulta" id = "consulta"> 
		</form>
	</body>
	<script type = "text/javascript" src = "scriptPaciente.js"> </script>
	</html>'
?>