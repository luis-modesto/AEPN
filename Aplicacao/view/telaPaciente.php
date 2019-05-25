<?php
	require_once ('../model/Nutricionista.php');
	require_once ('../model/Paciente.php');

	session_start();

	$user = $_SESSION['nutricionista'];
	if(isset($_POST['remover'])){
		$user->removerPaciente($_POST['remover']);
		header('Location: telaNutri.php' );
	}
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
		<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">		
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
		<link rel="stylesheet" type="text/css" href="estiloSidebar.css">		
	</head>

	<body>

   <nav id="sidebar">
        <div id = "tituloSide">
            <h4>Informações do Paciente</h5>
        </div>

        <ul class = "navbar-nav">
            <li class = "nav-item" style = "padding-top: 35px;"> <b> Nome: </b> ' . $paciente->nome . '
            </li>
            <li class = "mt-3 nav-item"> <b> CPF: </b>' . $paciente->cpf . '
            </li>
            <li>
        </ul>
        <ul class = "pb-5 navbar-nav">
        </ul>
        <ul class = "pt-5 navbar-nav"> 
            <li> <button onclick = "verAnamnese();" class = "mb-3 btn btn-primary" style = "margin-left: 44px;"> Anamnese </button>
            </li>
            <li> <button onclick = "verAversoes();" class = "mb-3 btn btn-primary" style = "margin-left: 49px;"> Aversões </button>
            </li>
            <li> <button onclick = "verPreferencias();" class = "mb-3 btn btn-primary" style = "margin-left: 38px;"> Preferências </button>
            </li>
            <li> <button onclick = "verIntolerancias();" class = "mb-3 btn btn-primary" style = "margin-left: 37px;"> Intolerâncias </button>
            </li>
            <li> <button onclick = "verSuplementos();" class = "mb-2 btn btn-primary" style = "margin-left: 37px;"> Suplementos </button>
            </li>                                                
            <li> <button class = "ml-2 btn btn-danger mt-1" onclick = "removerPaciente(\'' . $paciente->cpf. '\');"> <i class="fas fa-user-times"></i>  Remover Paciente </button>				
            </li>
        </ul>

    </nav>	

		<div class = "pl-5 mt-3 row">
			<button class = "offset-2 btn btn-info" onclick = "voltar();"> Voltar </button>
		</div>

    	<div class = "mr-4 mt-5 pt-5 container text-center">
			<h3 class = "mb-3 text-center" id = "titulo"> Visualizar Diagnóstico </h3>
			<div class="list-group container" id = "listaConsultas">';
	for ($i = 0; $i<count($diagnosticos); $i++){
		echo '		  <button class="col-5 list-group-item list-group-item-action" id = "consulta' . $i . '" onclick = "selecionaConsulta(\'' . $i . '\');"> Consulta do dia ' . $diagnosticos[$i]->dataConsulta . ' </button>';
	}
	echo '		</div>
				<button onclick="novoDiagnostico()" class = "btn btn-info mt-3" id = "addConsulta"> <i class="fas fa-plus"></i> Adicionar Registro Diagnóstico </button>
		</div>

		<form action = "telaPaciente.php" id = "consultaEscolhida" method = "post">
			<input type = "text" name = "consulta" id = "consulta"> 
		</form>
		<form style = "display: none;" action = "telaPaciente.php" id = "removerPaciente" method = "post">
			<input type = "text" name = "remover" id = "remover">
		</form> 

	</body>
	<script type = "text/javascript" src = "scriptPaciente.js"> </script>
	</html>'
?>