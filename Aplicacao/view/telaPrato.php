<?php
	require_once ('../model/Nutricionista.php');
	require_once ('../model/Paciente.php');

	session_start();
	$user = $_SESSION['nutricionista'];
	$paciente = $_SESSION['paciente'];
	$diagnostico = $_SESSION['consulta'];
	if(isset($_POST['indexRef'])){
		$prato = $user->recuperarPratosId($diagnostico->planoAlimentar[$_POST['indexRef']]->pratos[$_POST['indexPrep']]->id);
		if ($_POST['indexSub']!=-1){
			$prato = $user->recuperarPratosId($diagnostico->planoAlimentar[$_POST['indexRef']]->substituicoes[$_POST['indexPrep']][$_POST['indexSub']]->id);
		}
	}
	else if(isset($_SESSION['prato'])){
		$prato = $_SESSION['prato'];
	}
	if(isset($_POST['quantidade'])){
		if(!isset($_SESSION['ehSub'])){
			$_SESSION['quantidade'] = $_POST['quantidade'];
			$_SESSION['pratoPrincipal'] = $_SESSION['prato'];
			unset($_SESSION['prato']);
			header('Location: telaSubs.php');
		}
		else{
			if(!isset($_SESSION['substituicoes'])){
				$_SESSION['substituicoes'] = array();
				$_SESSION['qtdsSub'] = array();
			}
			array_push($_SESSION['substituicoes'], $_SESSION['prato']);
			array_push($_SESSION['qtdsSub'], $_POST['quantidade']);
			unset($_SESSION['prato']);
			unset($_SESSION['ehSub']);
			header('Location: telaSubs.php');
		}
	}
	$proteinaTotal = 0;
	$lipideoTotal = 0;
	$carboTotal = 0;
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

	<body>';

	if(isset($_POST['indexRef'])){
		echo '<div class = "mt-4 mb-3 row">
			<button class = "offset-1 btn btn-info" onclick = "voltar();"> Voltar </button>
		</div>';
	}
	else{
		echo '<div class = "mt-4 mb-3 row">
			<button class = "offset-1 btn btn-info" onclick = "voltarNewRef();"> Voltar </button>
		</div>';
	}
		
echo'	

<div class = "mt-5 container">
			<h3>' . $prato->nome . '</h3>
		 	Rendimento: ' . $prato->rendimento .'' . $prato->medida . '
			<table class="mt-2 table">
			  <thead class="thead-light">
			    <tr>
			      <th>Alimentos</th>
			      <th>Carboidratos</th>
			      <th>Proteína</th>
			      <th>Lipídeos</th>
			      <th>Quantidade</th>
			      <th>Substituições</th>
			      <th>Quantidade</th>
			    </tr>
			  </thead>
			  <tbody>';
	for ($i=0; $i<count($prato->alimentos); $i++){
		$proteinaTotal += $prato->alimentos[$i]->proteina;
		$lipideoTotal += $prato->alimentos[$i]->lipideos;
		$carboTotal += $prato->alimentos[$i]->carboidrato;		
		echo '		  	<tr>
				    <td class = "border-table" ';
		if (count($prato->substituicoes[$i])>1){
			echo ' rowspan = "' . count($prato->substituicoes[$i]) . '"';
		}
		echo ' style = "vertical-align: middle;" >' . $prato->alimentos[$i]->nome . '</td>
				    <td class = "border-table" ';
		if (count($prato->substituicoes[$i])>1){
			echo ' rowspan = "' . count($prato->substituicoes[$i]) . '"';
		}
		echo ' style = "vertical-align: middle;" >' . $prato->alimentos[$i]->carboidrato . '</td>
				    <td class = "border-table" ';
		if (count($prato->substituicoes[$i])>1){
			echo ' rowspan = "' . count($prato->substituicoes[$i]) . '"';
		}
		echo ' style = "vertical-align: middle;" >' . $prato->alimentos[$i]->proteina . '</td>
				    <td class = "border-table" ';
		if (count($prato->substituicoes[$i])>1){
			echo ' rowspan = "' . count($prato->substituicoes[$i]) . '"';
		}	
		echo ' style = "vertical-align: middle;" >' . $prato->alimentos[$i]->lipideos . '</td>
				    <td class = "border-table" ';
		if (count($prato->substituicoes[$i])>1){
			echo ' rowspan = "' . count($prato->substituicoes[$i]) . '"';
		}						
		echo ' style = "vertical-align: middle;" >' . $prato->quantidades[$i] . '' . $prato->medidas[$i] . '</td>';
		if (count($prato->substituicoes[$i])==0){
			echo'		    <td class = "border-table"></td>
				    <td class = "border-table"></td>
				 		</tr>';
		} else {
			echo '<td ';
			    if (count($prato->substituicoes[$i])==1){
			    	echo 'class = "border-table"';
			    }
			    	echo ' >' . $prato->substituicoes[$i][0]->nome . '</td>
			    	<td ';
			    if (count($prato->substituicoes[$i])==1){
			    	echo 'class = "border-table"';
			    }
			    	echo ' >' . $prato->qtdSubs[$i][0] . '' . $prato->medidasSubs[$i][0] . '</td>
					</tr>';
			for ($j = 1; $j<count($prato->substituicoes[$i]); $j++){
				echo '<tr>
			    	<td ';
			    if ($j==count($prato->substituicoes[$i])-1){
			    	echo 'class = "border-table"';
			    }
			    	echo ' >' . $prato->substituicoes[$i][$j]->nome . '</td>
			    	<td ';
			    if ($j==count($prato->substituicoes[$i])-1){
			    	echo 'class = "border-table"';
			    }
			    	echo ' >' . $prato->qtdSubs[$i][$j] . '' . $prato->medidas[$i][$j] . '</td>
				</tr>';
			}
		}
	}
	echo '		    
			  </tbody>
			</table>
		</div>
		<div id="valores" class=" mt-4 container">
			<div class="row">
				<div class="text-center mt-2 col-12">
					<b> Valores Nutricionais do Prato </b>
				</div>
			</div>
			<div class="mt-3 row">
				<div class="offset-1 col-3">
					<p><b> Carboidratos: </b> <br>' . $carboTotal . '</p>
				</div>
				<div class="offset-1 col-3">
					<p><b> Proteínas: </b> <br> ' . $proteinaTotal . '</p>
				</div>				
				<div class="offset-1 col-3">
					<p><b> Lipídeos: </b> <br>' . $lipideoTotal . '</p>
				</div>
			</div>
		</div>		
		<div class = "container mt-5">
			<h4> Modo de Preparo </h4>
			<p>' . $prato->modoPreparo . '</p>
		</div>';
		if(!isset($_POST['indexRef']) && !isset($_SESSION['ehSub'])){
			echo '<div class = "mt-4 mb-3 row">
			<button id = "addPrato" class = "offset-5 col-2 btn btn-success" onclick = "addPrato();"> Adicionar este prato </button>
		</div>';			
		}
		else if(!isset($_POST['indexRef']) && isset($_SESSION['ehSub'])){
			echo '<div class = "mt-4 mb-3 row">
			<button id = "addPrato" class = "offset-5 col-2 btn btn-success" onclick = "addPrato();"> Adicionar esta substituição </button>
		</div>';			
		}						
	echo '

		<div class = "container" style = "align-items: center"> 
			<form id = "qtdPrato" method = "post" action = "telaPrato.php" style = "display:none;">
				<div class = "offset-5 col-2">
					<label for = "quantidade"> Quantidade (em ' . $prato->medida . '): </label>
					<input class = "form-control" type = "number" id = "quantidade" name = "quantidade">
				</div>
				<div class = "mt-4 mb-3 row">
					<button class = "offset-5 col-2 btn btn-success" type = "submit"> Confirmar </button>
				</div>			
			</form>

	</body>

	<script type = "text/javascript" src = "scriptPrato.js"> </script> 

	</html>';
?>