<?php
	require_once ('../model/Nutricionista.php');
	require_once ('../model/Paciente.php');

	session_start();
	$user = $_SESSION['nutricionista'];
	$paciente = $_SESSION['paciente'];
	$diagnostico = $_SESSION['consulta'];
	if (isset($_POST["refExcluir"])){
		$diagnostico = $user->removerRefeicao($diagnostico, $_POST["refExcluir"]);
		$_SESSION['consulta'] = $diagnostico;
		unset($_POST["refExcluir"]);
		header('Location: telaPlano.php');
	}
	if (isset($_POST["orientacao"])){
		$diagnostico->orientacaoPlanoAlimentar = $_POST["orientacao"];
		$user->atualizarDiagnostico($diagnostico, $diagnostico->paciente, $diagnostico->dataConsulta);
		$_SESSION['consulta'] = $diagnostico;
	}
	if(isset($_POST['metaCarboidrato'])){
		$diagnostico->metaCarboidrato = $_POST['metaCarboidrato'];
		$diagnostico->metaProteina = $_POST['metaProteina'];
		$diagnostico->metaLipideo = $_POST['metaLipideo'];
		$user->atualizarDiagnostico($diagnostico, $diagnostico->paciente, $diagnostico->dataConsulta);
		$_SESSION['consulta'] = $diagnostico;		
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
		<link rel="stylesheet" type="text/css" href="estiloPlano.css">
	</head>

	<body>
		<div class = "mt-4 mb-3 row">
			<button class = "offset-1 btn btn-info" onclick = "voltar();"> Voltar </button>
		</div>
		<div class = "mt-5 row" id = "infoPaciente">
			<div class = "offset-2 col-6">
				<p> <b> Nome: </b> ' . $paciente->nome . ' </p>
			</div>
			<div class = "col-2">
				<p> <b> CPF: </b> ' . $paciente->cpf . ' </p>
			</div>
		</div>
		<div id="metas" class=" mt-3 container">
			<div class="row">
				<div class="text-center mt-2 col-12">
					<b> METAS </b>
				</div>
			</div>
			<form action = "telaPlano.php" method = "post">
			<div class="mt-3 row">
				<div class="offset-1 col-3">
					<label for = "metaCarboidrato"> <p><b> Carboidratos: </b> </p> </label> 
					<input id = "metaCarboidrato" name = "metaCarboidrato" disabled type = "text" class = "form-control form-control-plaintext" value = "' . $diagnostico->metaCarboidrato . '">
				</div>
				<div class="ml-5 col-3">
					<label for = "metaProteina"> <p><b> Proteínas: </b> </p> </label> 
					<input id = "metaProteina" name = "metaProteina" disabled type = "text" class = "form-control form-control-plaintext" value = "' . $diagnostico->metaProteina . '">				
				</div>
				<div class="ml-5 col-3">
					<label for = "metaLipideo"> <p><b> Lipídeos: </b> </p> </label> 
					<input id = "metaLipideo" name = "metaLipideo" disabled type = "text" class = "form-control form-control-plaintext" value = "' . $diagnostico->metaLipideo . '">				
				</div>
			</div>
    			<div class = "mt-3 row">
					<div class = "text-center col-12">
						<button type = "button" class = "mb-3 btn btn-alterar-ori" id = "botaoAlterar" onclick = "metaEditavel();"> Alterar </button>
						<button type = "submit" class = "mb-3 btn btn-alterar-ori" id = "botaoSalvar"> Confirmar </button>
					</div>
				</div>	 
			</form>
		</div>
		<div class = "mt-3 container">
			<table class="table">
			  <thead class="thead-light">
			    <tr>
			      <th>Horário</th>
			      <th>Refeição</th>
			      <th>Carboidratos</th>
			      <th>Proteínas</th>
			      <th>Lipídeos</th>
			      <th>Preparação</th>
			      <th>Substituições</th>
			      <th></th>
			    </tr>
			  </thead>
			  <tbody>';
  	$totalCarbo = 0;
  	$totalProt = 0;
  	$totalLip = 0;
  	$i = 0;
	foreach ($diagnostico->planoAlimentar as $refeicao){
		$span = count($refeicao->pratos);
		$carboRefeicao = 0;
		$protRefeicao = 0;
		$lipidRefeicao = 0;
		for ($j = 0; $j<count($refeicao->pratos); $j++){
			$valores = $refeicao->pratos[$j]->calcularValorNutricional();
			$carboRefeicao += $valores['carboidrato'];
			$protRefeicao += $valores['proteina'];
			$lipidRefeicao += $valores['lipideos'];
			$totalCarbo += $valores['carboidrato'];
			$totalProt += $valores['proteina'];
			$totalLip += $valores['lipideos'];			
			if (count($refeicao->substituicoes[$j])>1){
				$span++;
			}
		}
		echo '
				    <tr>
			      <td class = "border-table" style = "vertical-align: middle;" ';
		if ($span>1){
			echo ' rowspan="' . $span . '"';
		}
		echo '>' . $refeicao->horario . '</td>
			      <td class = "border-table" style = "vertical-align: middle;" ';
		if ($span>1){
			echo ' rowspan="' . $span . '"';
		}
		echo '>' . $refeicao->nome . '</td></td>
			      <td class = "border-table" style = "vertical-align: middle;" ';
		if ($span>1){
			echo ' rowspan="' . $span . '"';
		}
		echo '>' . $carboRefeicao . '</td>
			      <td class = "border-table" style = "vertical-align: middle;" ';
		if ($span>1){
			echo ' rowspan="' . $span . '"';
		}
		echo '>' . $protRefeicao . '</td>
			      <td class = "border-table" style = "vertical-align: middle;" ';
		if ($span>1){
			echo ' rowspan="' . $span . '"';
		}
		echo '>' . $lipidRefeicao . '</td>';		
		if (count($refeicao->pratos)>0){
			echo '	      <td style = "vertical-align: middle;" ';
			if (count($refeicao->substituicoes[0])>1){
				echo ' rowspan = "' . count($refeicao->substituicoes[0]) . '"';
			}
			else if(count($refeicao->pratos) == 1){
				echo ' class = "border-table" ';
			}
			echo '> <u> <a onclick = "escolhePrato(' . $i . ', 0, -1);">' . $refeicao->pratos[0]->nome . '</a> </u> <br> (' . $refeicao->quantidades[0] . ' ' . $refeicao->pratos[0]->medida . ')</td>';
		} else {
			echo '		<td style = "vertical-align: middle;" ></td>';
		}
		$s = count($refeicao->substituicoes[0]);
		if ($s==0){
			echo '		<td ';
			if (count($refeicao->pratos) == 1){
				echo 'class = "border-table"';
			}
			echo ' style = "vertical-align: middle;" ></td>';
		} else {
			echo'  <td';
			if($s==1 && count($refeicao->pratos) == 1){
				echo ' class = "border-table" ';
			}
			echo ' style = "vertical-align: middle;" > <u> <a onclick = "escolhePrato(' . $i . ', 0, 0);"> ' . $refeicao->substituicoes[0][0]->nome . ' </a> </u> <br>(' . $refeicao->qtdSubs[0][0] . ' ' . $refeicao->substituicoes[0][0]->medida . ')</td>';
		}
		echo '		      <td style = "vertical-align: middle;" ';
		if ($span>1){
			echo ' rowspan="' . $span . '"';
		}
		echo ' style = "vertical-align: middle;" class = "border-table pt-2 btn-alterar"><button type = "button" class = "py-0 px-1 btn btn-danger" onclick = "identificaRef(' . $refeicao->id . ');">Excluir</button>
			    </tr>';
		for ($j = 1; $j<$s; $j++){
			echo'  <tr><td style = "vertical-align: middle;" > <u> <a onclick = "escolhePrato(' . $i . ', 0, ' . $j . ');"> ' . $refeicao->substituicoes[0][$j]->nome . ' </a> </u> <br>(' . $refeicao->qtdSubs[0][$j] . ' ' . $refeicao->substituicoes[0][$j]->medida . ')</td></tr>';
		}
		for ($k = 1; $k<count($refeicao->pratos); $k++){
			$s = count($refeicao->substituicoes[$k]);
			echo '	      <tr><td style = "vertical-align: middle;" ';
			if ($s>1){
				echo ' rowspan = "' . $s . '"';
			}
			if($k == count($refeicao->pratos)-1){
				echo ' class = "border-table" ';
			}
			echo '> <u> <a onclick = "escolhePrato(' . $i . ', '. $k .', -1);">' . $refeicao->pratos[$k]->nome . '</a> </u> <br> (' . $refeicao->quantidades[$k] . ' ' . $refeicao->pratos[$k]->medida . ')</td>';
			if ($s==0){
				echo '		<td style = "vertical-align: middle;"';
				if($k == count($refeicao->pratos)-1){
					echo ' class = "border-table" ';
				}
				echo '></td></tr>';
			} else {
				echo'  <td';
				if ($s==1 && $k == count($refeicao->pratos)-1){
					echo ' class = "border-table" ';
				}
				echo ' style = "vertical-align: middle;" > <u> <a onclick = "escolhePrato(' . $i . ', 0, 0);"> ' . $refeicao->substituicoes[$k][0]->nome . ' </a> </u> <br>(' . $refeicao->qtdSubs[$k][0] . ' ' . $refeicao->substituicoes[$k][0]->medida . ')</td>';
			}
			for ($j = 1; $j<$s; $j++){
				echo'  <tr><td '; 
				if($j == $s-1){
					echo ' class = "border-table" ';
				}
				echo ' style = "vertical-align: middle;" > <u> <a onclick = "escolhePrato(' . $i . ', ' . $k . ', ' . $j . ');"> ' . $refeicao->substituicoes[$k][$j]->nome . ' </a> </u> <br>(' . $refeicao->qtdSubs[$k][$j] . ' ' . $refeicao->substituicoes[$k][$j]->medida . ')</td></tr>';
			}
		}
		$i++;
	}
	echo '		    
			  </tbody>
			</table>
			<div class = "row">
				<button onclick = "novaRefeicao();" class = "offset-5 col-2 btn btn-primary"> Adicionar refeição </button>
			</div>			
			<br>
		<div id="valores" class=" mt-4 container">
			<div class="row">
				<div class="text-center mt-2 col-12">
					<b> Valores Nutricionais do Plano </b>
				</div>
			</div>
			<div class="mt-3 row">
				<div class="offset-1 col-3">
					<p><b> Carboidratos: </b> <br>' . $totalCarbo . '</p>
				</div>
				<div class="offset-1 col-3">
					<p><b> Proteínas: </b> <br> ' . $totalProt . '</p>
				</div>				
				<div class="offset-1 col-3">
					<p><b> Lipídeos: </b> <br>' . $totalLip . '</p>
				</div>
			</div>
		</div>				
			<form action="telaPlano.php" method="post">
				<div class="row">
					<div class="col-2"></div>
					<div class="col-8">
						<label for = "orientacao" style="text-align: center;" class = "col-12"> <b> Orientações </b> </label>
	    				<textarea disabled id = "orientacao" name = "orientacao" value="' . $diagnostico->orientacaoPlanoAlimentar . '" rows = "3" class = "form-control form-control-plaintext col-12">' . $diagnostico->orientacaoPlanoAlimentar . '</textarea>
	    			</div>
	    			<div class="col-2"></div>
    			</div>
    			<br>
    			<div class = "row">
					<div class = "text-center col-12">
						<button type = "button" class = "mb-3 btn btn-alterar-ori" id = "botaoAlterar" onclick = "editavel();"> Alterar </button>
						<button type = "submit" class = "mb-3 btn btn-alterar-ori" id = "botaoSalvar"> Confirmar </button>
					</div>
				</div>	
	        </form>
			<form action = "telaPlano.php" id = "refeicaoExcluida" style = "display: none;" method = "post">
				<input type = "text" id = "refExcluir" name = "refExcluir"> 
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