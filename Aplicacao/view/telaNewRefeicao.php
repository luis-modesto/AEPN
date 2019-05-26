<?php
	require_once ('../model/Nutricionista.php');
	require_once ('../model/Paciente.php');

	session_start();
	$user = $_SESSION['nutricionista'];
	$paciente = $_SESSION['paciente'];
	$diagnostico = $_SESSION['consulta'];
	if(isset($_POST['horaRefeicao']) && isset($_POST['nomeRefeicao']) && $_POST['horaRefeicao'] != '' && $_POST['nomeRefeicao'] != ''){
		$refeicao = new Refeicao(-1, $_POST['nomeRefeicao'], $_POST['horaRefeicao'], array(), array(), array(), array());
		$_SESSION['refeicao'] = $refeicao;
		header('Location: telaNewRefeicao2.php');
	}

    echo '<html>

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
            <link rel="stylesheet" type="text/css" href="estiloNewRefeicao.css">
        </head>

        <body>

            <div class = "mt-3 row">
                <button class = "offset-1 btn btn-info" onclick = "voltar1();"> Voltar </button>
            </div>  
        	<h3 style ="text-align: center; margin-top: 50px;"> Informações da Refeição </h3>
	        <div class = "mt-4 container shadow nova-refeicao">
	            <form method = "post" action = "telaNewRefeicao.php">
	            	<div class = "mt-3 row">
            			<div class = "col-6">
            				<label for = "nomeRefeicao"> Nome da refeição: </label>
            				<input class = "form-control" required type = "text" id = "nomeRefeicao" name = "nomeRefeicao">
        				</div>
	            		<div class = "col-6">
	            			<label for = "horaRefeicao"> Hora da refeição: </label>
	            			<input class = "form-control" required type = "text" id = "horaRefeicao" name = "horaRefeicao"> 
            			</div>
        			</div>
        			<div class = "row">
        				<button type = "submit" class = "mt-3 offset-4 col-3 btn btn-info"> Continuar </button> 
    				</div>
	            </form>
            </div>
        </body>

        <script type = "text/javascript" src = "scriptNewRefeicao.js"> </script>

    </html>';