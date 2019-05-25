$("#nascimento").mask("00/00/0000");
$("#cpf").mask("000.000.000-00");

function digBoa(){
	var queixasDig = document.getElementsByName('digestao[]');
	var i;
	if(document.getElementById('digSemQueixa').checked == true){
		for(i = 1; i<queixasDig.length; i++){
			queixasDig[i].disabled = true;
			queixasDig[i].checked = false;			
		}
	}
	else{
		for(i = 1; i<queixasDig.length; i++){
			queixasDig[i].disabled = false;
		}		
	}
}

function degQualidade(check){
	if(check.value == "2"){
		document.getElementById('motivoLabel').style.display = 'inline';
		document.getElementById('motivoRuim').style.display = 'inline';
	}
	else{
		document.getElementById('motivoLabel').style.display = 'none';
		document.getElementById('motivoRuim').style.display = 'none';		
	}
}

function usaProtese(check){
	if(check.value == "1" || check.value == "2"){
		document.getElementById('fixa').disabled = false;
		document.getElementById('movel').disabled = false;		
	}
	else{
		document.getElementById('fixa').disabled = true;
		document.getElementById('movel').disabled = true;		
		document.getElementById('fixa').checked = false;
		document.getElementById('movel').checked = false;
	}
}

function voltar(){
	location.href = 'telaNutri.php';
}