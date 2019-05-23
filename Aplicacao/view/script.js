function selecionaNutri(id){
	document.getElementById("nutricionista").value = id;
	document.getElementById("nutriEscolhido").submit();
}

function novoNutri(){
	location.href = "telaNewNutri.php";
}