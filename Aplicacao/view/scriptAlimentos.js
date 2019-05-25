function selecionaAlimento(id){
	if(!document.getElementById(id).classList.contains('active')){
		document.getElementById('alimentosEscolhidos').innerHTML += '<input type = "text" id = "alimento' + id + '" value = "' + id + '" name = "alimento' + id + '" >';
		document.getElementById(id).classList.add('active');
		document.getElementById(id).classList.remove('list-group-item-action');
		document.getElementById(id).classList.add('text-left');		
	}
	else{
		document.getElementById('alimento' + id).remove();
		document.getElementById(id).classList.remove('active');
		document.getElementById(id).classList.add('list-group-item-action');		
	}
}

function submeteAlimentos(){
	document.getElementById('alimentosEscolhidos').innerHTML += '<input type = "text" name = "selecionei" id = "selecionei">';
	if(document.getElementById('alimentosEscolhidos').elements.length > 1){
		document.getElementById('selecionei').value = 'tem';
	}
	else{
		document.getElementById('selecionei').value = 'naotem';		
	}
	document.getElementById('alimentosEscolhidos').submit();
}

function irPreferencias(){
	location.href = './telaPreferencias.php';
}

function irIntolerancias(){
	location.href = './telaIntolerancias.php';
}

function irSuplementos(){
	location.href = './telaSuplementos.php';
}

function irPaciente(){
	location.href = './telaPaciente.php';
}

function remover(id){
	document.getElementById('indiceRemover').value = id;
	document.getElementById('remover').submit();
}

function trocar(){
	if(document.getElementById('atuais').style.display != 'none'){
		document.getElementById('atuais').style.display = 'none';
		document.getElementById('tituloAtuais').style.display = 'none';
		document.getElementById('tituloNovas').style.display = 'block';				
		document.getElementById('cadastrarNovas').style.display = 'block';
		document.getElementById('pesquisarAlimento').style.display = 'block';
		document.getElementById('cadastrar').style.display = 'none';
		document.getElementById('ver').style.display = 'inline';
	}
	else{
		document.getElementById('atuais').style.display = 'block';	
		document.getElementById('tituloAtuais').style.display = 'block';
		document.getElementById('tituloNovas').style.display = 'none';				
		document.getElementById('cadastrarNovas').style.display = 'none';
		document.getElementById('pesquisarAlimento').style.display = 'none';
		document.getElementById('cadastrar').style.display = 'inline';
		document.getElementById('ver').style.display = 'none';
		document.getElementById('confirmar').style.display = 'none';		
	}	
}

function indicacao(){
		var id = document.getElementById('idSup').innerHTML;
		document.getElementById('alimentosEscolhidos').innerHTML += '<input type = "text" id = "alimento' + id + '" value = "' + id + '" name = "alimento' + id + '" >';
		document.getElementById('alimentosEscolhidos').innerHTML += '<input type = "text" id = "indicacao' + id + '" value = "' + document.getElementById('indicacao').value + '" name = "indicacao' + id + '" >';		
		document.getElementById(id).classList.add('active');
		document.getElementById(id).classList.remove('list-group-item-action');
		document.getElementById(id).classList.add('text-left');
	}

function abreModal(id){
	if(!document.getElementById(id).classList.contains('active')){
		document.getElementById('idSup').innerHTML = id;
		$("#suplementoIndica").modal()
	}
	else{
		document.getElementById('alimento' + id).remove();
		document.getElementById('indicacao' + id).remove();		
		document.getElementById(id).classList.remove('active');
		document.getElementById(id).classList.add('list-group-item-action');		
	}
}