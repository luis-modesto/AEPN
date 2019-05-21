function editavel(){
	var forms = document.getElementsByClassName("form-diagnostico");
	var i;
	for(i=0; i<forms.length; i++){
		forms[i].disabled = false;
		forms[i].classList.remove("form-control-plaintext");
	}
	document.getElementById("botaoAlterar").style.display = "none";
	document.getElementById("botaoSalvar").style.display = "inline";
}

function verPlano(){
	location.href = "telaPlano.html";
}