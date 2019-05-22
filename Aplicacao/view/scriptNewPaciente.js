$("#nascimento").mask("00/00/0000");

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