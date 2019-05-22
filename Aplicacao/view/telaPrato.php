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
		<div class = "mt-5 container">
			<h3> Cuscuz com Ovo </h3>
		 	Rendimento: 300g
			<table class="mt-2 table">
			  <thead class="thead-light">
			    <tr>
			      <th>Alimentos</th>
			      <th>Quantidade</th>
			      <th>Substituições</th>
			      <th>Quantidade</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<tr class = "border-table">
				    <td>Milho, fubá, cru</td>
				    <td>1 xícara</td>
				    <td></td>
				    <td></td>
				</tr>
				<tr>
			    	<td class = "border-table" rowspan = "2" style = "vertical-align: middle;"> Ovo, de galinha, inteiro, frito </td>
			    	<td class = "border-table" rowspan = "2" style = "vertical-align: middle;"> 1 unidade </td>
			    	<td> Queijo, ricota</td>
			    	<td> 100 gramas</td>				
			    </tr>
			    <tr class = "border-table">
			    	<td> Queijo, ricota</td>
			    	<td> 100 gramas</td>
				</tr>
			  </tbody>
			</table>
		</div>
		<div class = "container mt-5">
			<h4> Modo de Preparo </h4>
			<p> cuscuz no vapor e ovo frito na manteiga </p>
		</div>
	</body>

	</html>';
?>