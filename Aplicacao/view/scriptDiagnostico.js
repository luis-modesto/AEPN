function editavel(){
	var forms = document.getElementsByClassName("form-diagnostico");
	var i;
	for(i=0; i<forms.length; i++){
		forms[i].disabled = false;
		forms[i].classList.remove("form-control-plaintext");
		if(forms[i].id != "dataConsulta" && forms[i].id != "examesBioquimicos"){		
			forms[i].type = "number";
			forms[i].min = "0";
			forms[i].step = "0.01";
		}
		$("#dataConsulta").mask("00/00/0000");			
	}
	document.getElementById("botaoAlterar").style.display = "none";
	document.getElementById("botaoSalvar").style.display = "inline";
}

function verPlano(){
	location.href = "telaPlano.php";
}

function verRecordatorio(){
	location.href = "telaRecordatorio.php";
}

function voltar(){
	location.href = "telaPaciente.php"
}