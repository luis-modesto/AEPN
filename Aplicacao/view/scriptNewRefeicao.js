$("#horaRefeicao").mask("00:00");

function selecionaPrato(id){
	document.getElementById('idPrato').value = id;
	document.getElementById('verPrato').submit();
}

function selecionaSub(id){
	document.getElementById('idSub').value = id;
	document.getElementById('verPrato').submit();
}

function naoSub(){
	document.getElementById('inputAcabou').value = 'sim';
	document.getElementById('acabouSubs').submit();
}

function finalizar(){
	document.getElementById('finalizou').value = 'sim';
	document.getElementById('finalizar').submit();
}

function voltar1(){
	location.href = 'telaPlano.php';
}

function voltar2(){
	location.href = 'telaNewRefeicao.php';
}

function cancelar(){
	location.href = 'telaDiagnostico.php'
}