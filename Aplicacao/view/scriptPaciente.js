function selecionaConsulta(id){
	document.getElementById("consulta").value = id;
	document.getElementById("consultaEscolhida").submit();
}

function removerPaciente(cpf){
	document.getElementById("remover").value = cpf;
	document.getElementById("removerPaciente").submit();
}

function novoDiagnostico(){
	location.href = "telaNewDiagnostico.php";
}

function verPreferencias(){
	location.href = './telaVerPreferencias.php';
}

function verIntolerancias(){
	location.href = './telaVerIntolerancias.php';
}

function verSuplementos(){
	location.href = './telaVerSuplementos.php';
}

function verAversoes(){
	location.href = './telaVerAversoes.php';
}