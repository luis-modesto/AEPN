<?php
	require_once ('../model/Nutricionista.php');

	$user = new Nutricionista("","","");
	$nutris = $user->recuperarNutricionistas();
	if(isset($_POST['nutricionista'])){
		session_start();
		$_SESSION['nutricionista'] = $nutris[$_POST['nutricionista']];
		header('Location: telaNutri.php' );
	}
	echo '<!doctype html>

	<html>

	<head>
		<meta charset=\'utf-8\'>
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
	    <link rel="stylesheet" type="text/css" href="estilo.css">
	</head>

	<body>

		<div id = "containerGeral" class = "container mt-5">
			<h3 class = "pt-2 mb-3 text-center" id = "titulo"> Qual nutricionista é você? </h3>
			<div class="list-group container" id = "listaNutri">';
	for ($i = 0; $i<count($nutris); $i++){
		echo '				<button class="col-5 list-group-item list-group-item-action" id = "nutri' . $i . '" onclick = "selecionaNutri(\'' . $i . '\');">' . $nutris[$i]->nome . ' - CRN ' . $nutris[$i]->crn . '</button>';
	}
	echo '		</div>
			<button onclick="novoNutri()" class = "btn btn-info mt-3" id = "addNutri"> <i class="fas fa-plus"></i> Adicionar Nutricionista </button>
		</div>
		<form action = "index.php" id = "nutriEscolhido" method = "post">
			<input type = "text" name = "nutricionista" id = "nutricionista"> 
		</form>
	</body>

	<script type = "text/javascript" src = "script.js"> </script>

	</html>';
?>