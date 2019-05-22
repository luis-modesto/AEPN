<?php
	require_once ('../model/Nutricionista.php');

	session_start();
	$user = $_SESSION['nutricionista'];
	$pacientes = $user->recuperarPacientes();
	if(isset($_POST['paciente']) && !isset($_POST['remover'])){
		$_SESSION['paciente'] = $pacientes[$_POST['paciente']];
		header('Location: telaPaciente.php' );
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
	    <link rel="stylesheet" type="text/css" href="estiloNutri.css">
	</head>

	<body>
		<div class = "container mt-5" id = "containerGeral">
			<h3 class = "pt-2 mb-3 text-center" id = "titulo"> Escolha um paciente </h3>
			<div class="list-group container" id = "listaPacientes">';
	for ($i=0; $i<count($pacientes); $i++){
		echo '		  <span class="col-5 list-group-item list-group-item-action"> <button onclick = "selecionaPaciente(\'' . $i . '\');" class = "btn" id = "paciente' . $i . '">' . $pacientes[$i]->nome . ' - ' . $pacientes[$i]->cpf . '</button> 			<button class = "btn btn-danger px-2 py-1" onclick = "removePaciente(\''. $i. '\');"> <i class="fas fa-user-times"></i> </button> </span>' ;
	}
	echo '		</div>
			<button class = "btn btn-info mt-3" id = "addPaciente"> <i class="fas fa-plus"></i> Adicionar paciente </button>
		</div>
		<form action = "telaNutri.php" id = "pacienteEscolhido" method = "post">
			<input type = "text" name = "paciente" id = "paciente"> 
		</form>
		<form style = "display: none;" action = "telaNutri.php" id = "removerPaciente" method = "post">
			<input type = "text" name = "remover" id = "remover">
		</form>		
	</body>

	<script type = "text/javascript" src = "scriptNutri.js"> </script>

	</html>';
?>