<?php
	require_once ('../model/Nutricionista.php');
	require_once ('../model/Paciente.php');

	session_start();
	$user = $_SESSION['nutricionista'];
	$paciente = $_SESSION['paciente'];
	$diagnostico = $_SESSION['paciente'];
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
		<link rel="stylesheet" type="text/css" href="estiloPlano.css">
	</head>

	<body>
		<div class = "mt-5 row" id = "infoPaciente">
			<div class = "offset-2 col-6">
				<p> <b> Nome: </b> ' . $paciente->nome . ' </p>
			</div>
			<div class = "col-2">
				<p> <b> CPF: </b> ' . $paciente->nome . ' </p>
			</div>
		</div>
		<div class = "mt-3 container">
			<table class="table">
			  <thead class="thead-light">
			    <tr>
			      <th>Horário</th>
			      <th>Refeição</th>
			      <th>Preparação</th>
			      <th>Substituições</th>
			      <th></th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr class = "border-table">
			      <td >08:00</td>
			      <td>Café da Manhã</td>
			      <td> <u> <a onclick = "escolhePrato(0, 0, -1);">Cuscuz com ovo </a> </u> <br> (1 prato)</td>
			      <td> <u> <a onclick = "escolhePrato(0, 0, 0);"> Banana </a> </u> <br>(1 unidade)</td>
			      <td class = "pt-2 btn-alterar"><button type = "button" class = "py-0 px-1 btn btn-info" onclick = "identificaRef(0);">Alterar</button>
			    </tr>
			    <tr>
			      <td rowspan="5" class = "border-table" style = "vertical-align: middle;" >12:00</td>
			      <td rowspan="5" class = "border-table" style = "vertical-align: middle;" >Almoço</td>
			      <td rowspan="2" style = "vertical-align: middle;" > <u> <a onclick = "escolhePrato(1, 0, -1);"> Arroz integral com brócolis </a> </u> <br>(1 colher)</td>
			      <td ><u><a onclick = "escolhePrato(1, 0, 0);">Arroz branco com cenoura </a> </u><br>(2 colheres) </td>
	   		      <td rowspan = "5" class = "border-table pt-2 btn-alterar" style = "vertical-align: middle;"><button type = "button" class = "py-0 px-1 btn btn-info" onclick = "identificaRef(1);">Alterar</button>
			    </tr>
			    <tr>
			    	<td > <u> <a onclick = "escolhePrato(1, 0, 1);"> Arroz integral com cenoura </a> </u> <br>(3 colheres)</td>
			    </tr>
			    <tr>
			    	<td > <u> <a onclick = "escolhePrato(1, 1, -1);"> Salada crua</a> </u> <br> (1 tico) </td>
			    	<td ></td>
			    </tr>
			    <tr>
			    	<td > <u> <a onclick = "escolhePrato(1, 2, -1);"> Feijão de Caldo </a> </u> <br>(1 concha)</td>
			    	<td > <u> <a onclick = "escolhePrato(1, 2, 0);"> Feijoada </a> </u> <br>(1/2 concha)</td>
			    </tr>
			    <tr class = "border-table">
			    	<td > <u> <a onclick = "escolhePrato(1, 3, -1);"> Bife </a> </u> <br>(1 pedaço)</td>
			    	<td > <u> <a onclick = "escolheprato(1, 3, 0);"> Frango à parmegiana</a> </u> <br>(1/2 pedaço)</td>
			    </tr>		    
			    <tr class = "border-table">
			      <td>15:00</td>
			      <td>Lanche</td>
			      <td></td>
			      <td></td>
			      <td class = "pt-2 btn-alterar"><button type = "button" class = "py-0 px-1 btn btn-info" onclick = "identificaRef(2);">Alterar</button></td>
			    </tr>
			    <tr class = "border-table">
			      <td>20:00</td>
			      <td>Jantar</td>
			      <td></td>
			      <td></td>
	   		      <td class = "pt-2 btn-alterar"><button type = "button" class = "py-0 px-1 btn btn-info" onclick = "identificaRef(3);">Alterar</button></td>
			    </tr>		    
			  </tbody>
			</table>
			<form action = "telaRefeicao.php" id = "refeicaoEscolhida" style = "display: none;" method = "post">
				<input type = "text" id = "refAlterar" name = "refAlterar"> 
			</form>	
			<form action = "telaPrato.php" id = "pratoEscolhido" style = "display: none;" method = "post">
				<input type = "text" id = "indexRef" name = "indexRef">
				<input type = "text" id = "indexPrep" name = "indexPrep">
				<input type = "text" id = "indexSub" name = "indexSub">
			</form>
		</div>
	</body>

	<script type = "text/javascript" src="scriptPlano.js"> </script>

	</html>';
?>