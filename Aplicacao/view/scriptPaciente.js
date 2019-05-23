function selecionaConsulta(id){
	document.getElementById("consulta").value = id;
	document.getElementById("consultaEscolhida").submit();
}

function removerPaciente(cpf){
	document.getElementById("remover").value = cpf;
	document.getElementById("removerPaciente").submit();
}