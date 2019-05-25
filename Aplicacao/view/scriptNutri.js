function selecionaPaciente(id){
	document.getElementById("paciente").value = id;
	document.getElementById("pacienteEscolhido").submit();
}

function novoPaciente(){
	location.href = "telaNewPaciente.php";
}

function voltar(){
	location.href = "index.php";
}