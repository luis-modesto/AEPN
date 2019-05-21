function identificaRef(id){
	document.getElementById('indexRef').value = id;
	document.getElementById('refeicaoEscolhida').submit();	
}
function escolhePrato(idRef, idPrato, idSub){
	document.getElementById('indexRef').value = idRef;
	document.getElementById('indexPrep').value = idPrato;
	document.getElementById('indexSub').value = idSub;
	document.getElementById('pratoEscolhido').submit();
}