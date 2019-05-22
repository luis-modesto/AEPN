<?php
	require_once ('../model/Nutricionista.php');
	require_once ('../model/Paciente.php');

	session_start();
	$user = $_SESSION['nutricionista'];
	$paciente = $_SESSION['paciente'];
	$diagnostico = $_SESSION['consulta'];
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
				<p> <b> CPF: </b> ' . $paciente->cpf . ' </p>
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
			  <tbody>';
	for ($i = 0; $i<count($diagnostico->planoAlimentar); $i++){
		$span = count($diagnostico->planoAlimentar[$i]->pratos);
		for ($j = 0; $j<count($diagnostico->planoAlimentar[$i]->pratos); $j++){
			if (count($diagnostico->planoAlimentar[$i]->substituicoes[$j])>1){
				$span++;
			}
		}
		echo '
				    <tr>
			      <td class = "border-table" style = "vertical-align: middle;" ';
		if ($span>1){
			echo ' rowspan="' . $span . '"';
		}
		echo '>' . $diagnostico->planoAlimentar[$i]->horario . '</td>
			      <td class = "border-table" style = "vertical-align: middle;" ';
		if ($span>1){
			echo ' rowspan="' . $span . '"';
		}
		echo '>' . $diagnostico->planoAlimentar[$i]->nome . '</td>';
		if (count($diagnostico->planoAlimentar[$i]->pratos)>0){
			echo '	      <td style = "vertical-align: middle;" ';
			if (count($diagnostico->planoAlimentar[$i]->substituicoes[0])>1){
				echo ' rowspan = "' . count($diagnostico->planoAlimentar[$i]->substituicoes[0]) . '"';
			}
			else if(count($diagnostico->planoAlimentar[$i]->pratos) == 1){
				echo ' class = "border-table" ';
			}
			echo '> <u> <a onclick = "escolhePrato(' . $i . ', '. $j .', -1);">' . $diagnostico->planoAlimentar[$i]->pratos[0]->nome . '</a> </u> <br> (' . $diagnostico->planoAlimentar[$i]->quantidades[0] . ' ' . $diagnostico->planoAlimentar[$i]->pratos[0]->medida . ')</td>';
		} else {
			echo '		<td style = "vertical-align: middle;" ></td>';
		}
		$s = count($diagnostico->planoAlimentar[$i]->substituicoes[0]);
		if ($s==0){
			echo '		<td class = "border-table" style = "vertical-align: middle;" ></td>';
		} else {
			echo'  <td';
			if($s==1 && count($diagnostico->planoAlimentar[$i]->pratos) == 1){
				echo ' class = "border-table" ';
			}
			echo ' style = "vertical-align: middle;" > <u> <a onclick = "escolhePrato(' . $i . ', 0, 0);"> ' . $diagnostico->planoAlimentar[$i]->substituicoes[0][0]->nome . ' </a> </u> <br>(' . $diagnostico->planoAlimentar[$i]->qtdSubs[0][0] . ' ' . $diagnostico->planoAlimentar[$i]->substituicoes[0][0]->medida . ')</td>';
		}
		echo '		      <td style = "vertical-align: middle;" ';
		if ($span>1){
			echo ' rowspan="' . $span . '"';
		}
		echo ' style = "vertical-align: middle;" class = "border-table pt-2 btn-alterar"><button type = "button" class = "py-0 px-1 btn btn-info" onclick = "identificaRef(' . $i . ');">Alterar</button>
			    </tr>';
		for ($j = 1; $j<$s; $j++){
			echo'  <tr><td style = "vertical-align: middle;" > <u> <a onclick = "escolhePrato(' . $i . ', 0, ' . $j . ');"> ' . $diagnostico->planoAlimentar[$i]->substituicoes[0][$j]->nome . ' </a> </u> <br>(' . $diagnostico->planoAlimentar[$i]->qtdSubs[0][$j] . ' ' . $diagnostico->planoAlimentar[$i]->substituicoes[0][$j]->medida . ')</td></tr>';
		}
		for ($k = 1; $k<count($diagnostico->planoAlimentar[$i]->pratos); $k++){
			$s = count($diagnostico->planoAlimentar[$i]->substituicoes[$k]);
			echo '	      <tr><td style = "vertical-align: middle;" ';
			if ($s>1){
				echo ' rowspan = "' . $s . '"';
			}
			if($k == count($diagnostico->planoAlimentar[$i]->pratos)-1){
				echo ' class = "border-table" ';
			}
			echo '> <u> <a onclick = "escolhePrato(' . $i . ', '. $k .', -1);">' . $diagnostico->planoAlimentar[$i]->pratos[$k]->nome . '</a> </u> <br> (' . $diagnostico->planoAlimentar[$i]->quantidades[$k] . ' ' . $diagnostico->planoAlimentar[$i]->pratos[$k]->medida . ')</td>';
			if ($s==0){
				echo '		<td style = "vertical-align: middle;"';
				if($k == count($diagnostico->planoAlimentar[$i]->pratos)-1){
					echo ' class = "border-table" ';
				}
				echo '></td></tr>';
			} else {
				echo'  <td style = "vertical-align: middle;" > <u> <a onclick = "escolhePrato(' . $i . ', 0, 0);"> ' . $diagnostico->planoAlimentar[$i]->substituicoes[$k][0]->nome . ' </a> </u> <br>(' . $diagnostico->planoAlimentar[$i]->qtdSubs[$k][0] . ' ' . $diagnostico->planoAlimentar[$i]->substituicoes[$k][0]->medida . ')</td>';
			}
			for ($j = 1; $j<$s; $j++){
				echo'  <tr><td '; 
				if($j == $s-1){
					echo ' class = "border-table" ';
				}
				echo ' style = "vertical-align: middle;" > <u> <a onclick = "escolhePrato(' . $i . ', ' . $k . ', ' . $j . ');"> ' . $diagnostico->planoAlimentar[$i]->substituicoes[$k][$j]->nome . ' </a> </u> <br>(' . $diagnostico->planoAlimentar[$i]->qtdSubs[$k][$j] . ' ' . $diagnostico->planoAlimentar[$i]->substituicoes[$k][$j]->medida . ')</td></tr>';
			}
		}
	}
	echo '		    
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