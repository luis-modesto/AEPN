function selecionaPaciente(id){
	document.getElementById("paciente").value = id;
	document.getElementById("pacienteEscolhido").submit();
}

function removePaciente(id){
	document.getElementById("remover").value = id;
	document.getElementById("removerPaciente").submit();
}