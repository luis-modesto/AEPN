<!doctype html>

<?php

    require_once('../model/Nutricionista.php');
    require_once('../model/Paciente.php');
    require_once('../model/Alimento.php');
    session_start();
    $paciente = $_SESSION['paciente'];
    $cont=0;
    $nutri = $_SESSION['nutricionista'];
    $alimentos = array();
    $preferencias = array();
    $preferencias = $nutri->recuperarPreferencias($paciente->cpf);
    if(isset($_POST['indiceRemover'])){
        $nutri->removerPreferencia($preferencias[$_POST['indiceRemover']]->id, $paciente->cpf);   
    }
    $preferencias = $nutri->recuperarPreferencias($paciente->cpf);
    if(isset($_POST['alimento']) && $_POST['alimento'] != ''){
        $alimentos = $nutri->recuperarAlimentos($_POST['alimento']);
        $_SESSION['alimentos'] = $alimentos;
    }


    echo '<html>

        <head>
            <meta charset="utf-8">
            <meta name="view-port" content="width=width-device, initial-scale=1.0, shrink-to-fit=no">
            <title>RM Saude</title>
            <link href=\'https://fonts.googleapis.com/css?family=Roboto\' rel=\'stylesheet\'>
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>      
            <link rel="stylesheet" type="text/css" href="estiloAlimentos.css">
        </head>

        <body>
        <div class = "mt-4 mb-3 row">
            <button class = "offset-1 btn btn-info" onclick = "irPaciente();"> Voltar </button>
        </div>          ';
    if(isset($_POST['selecionei'])){
        if($_POST['selecionei'] == 'tem'){
            for($i=0; $i<count($_SESSION['alimentos']); $i++){
                if(isset($_POST['alimento' . $i]) && $_POST['alimento' . $i] != ''){
                    $nutri->registrarPreferencia($_SESSION['alimentos'][$i]->id, $paciente->cpf);
                    array_push($preferencias, $_SESSION['alimentos'][$i]);                    
                }
            }
            unset($_SESSION['alimentos']);
            echo '<div style = "text-align: center;" class = "text-center alert alert-success alert-dismissible fade show" role = "alert"> <strong> Preferências registradas! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button> </div>';
        }
    }
 echo '           <div class = "container mt-3 container-geral">
                <h3 id = "tituloNovas" ';                
                if(!isset($_POST['alimento'])){
                    echo ' style = "display: none;" ';
                }
                echo '> Cadastrar Novas Preferências </h3>
                <h3 id = "tituloAtuais" ';
                if(isset($_POST['alimento']) && $_POST['alimento'] != ''){
                    echo 'style = "display: none"';
                }
echo                '> Preferências de ' . $paciente->nome . '</h3>
                <div class = "row" id = "pesquisarAlimento"';
                if(isset($_POST['alimento'])){
                    echo ' style = "display: block;"';
                }
                else{
                    echo ' style = "display: none;" ';
                }
echo'                    >
                    <form action = "./telaVerPreferencias.php" class= "col-12 mt-5 form-inline" method = "post">
                      <i class="fas fa-search" aria-hidden="true"></i>
                      <input name = "alimento" class="col-11 form-control form-control-sm ml-3 w-75" type="text" placeholder="Pesquisar alimento (exemplo: Arroz)">
                    </form>
                </div>
            </div>
            <div class = "container mt-3 mb-3" id = "cadastrarNovas"'; 
            if(isset($_POST['alimento'])){
                    echo ' style = "display: block;"';
                }
                else{
                    echo ' style = "display: none;"';
                }
echo'                >
                <div class="list-group" style = "max-height: 350px; overflow-y: scroll;">';
                for($i=0; $i<count($alimentos); $i++){
                    if(!in_array($alimentos[$i], $preferencias)){
                        $cont++;
                        echo '<button id = "' . $i . '" onclick = "selecionaAlimento(' . $i . ');" class="list-group-item list-group-item-action">' . $alimentos[$i]->nome . '</button>';
                    }
                }
echo'            </div> </div>              
        <div class = "container mt-5 mb-3" id = "atuais"';
                if(isset($_POST['alimento'])){
                    echo ' style = "display: none;"';
                }
                else{
                    echo ' style = "display: block;"';
                }
echo'                >
                            <div class="list-group container" style = "align-items: center; max-height: 350px; max-width: 700px; overflow-y: scroll;">';
                            for($i=0; $i<count($preferencias); $i++){
                                echo '<li class = "list-group-item" style = "width: 100%;"> <div class = "row"> <div class = "col-5">' . $preferencias[$i]->nome . '</div> <div class = "offset-5 col-2"> <button onclick = "remover(' . $i . ');" class = "text-right btn btn-danger"> <i class="fas fa-trash-alt"></i> </button> </div> </li>';
                            }

        echo'           </div>';            
  

    echo'        </div>';
        if(count($alimentos)>0 && $cont>0){
            echo     '<div class = "row" id = "confirmar"> <button type = "button" onclick = "submeteAlimentos();" class = "offset-5 col-2 mt-2 btn btn-confirmar"> Confirmar </button> </div>';
        }

echo'            <div class = "row">
            <button type = "button" onclick = "trocar();" id = "cadastrar" class = "offset-5 col-2 mt-3 mb-3 btn btn-primary"';
                if(!isset($_POST['alimento'])){
                    echo ' style = "display: inline;"';
                }
                else{
                    echo ' style = "display: none;"';
                } echo '> Cadastrar Preferências </button>
            <button type = "button" onclick = "trocar();" id = "ver" class = "offset-5 col-2 mt-3 mb-3 btn btn-primary"';
                if(isset($_POST['alimento'])){
                    echo ' style = "display: inline;"';
                }
                else{
                    echo ' style = "display: none;"';
                }
                echo '> Ver Preferências </button> </div>             
            <form action = "telaVerPreferencias.php" style = "display: none" id = "alimentosEscolhidos" method = "post">
            </form> 

            <form action = "telaVerPreferencias.php" style = "display: none" id = "remover" method = "post">
                <input type = "text" id = "indiceRemover" name = "indiceRemover">
            </form>


        </body>

        <script type = "text/javascript" src = "scriptAlimentos.js"> </script>
    </html>';

?>