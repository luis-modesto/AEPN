<?php

    require_once ('../model/Nutricionista.php');
    require_once ('../model/Paciente.php');

    session_start();
    $user = $_SESSION['nutricionista'];
    $paciente = $_SESSION['paciente'];
    $diagnostico = $_SESSION['consulta'];
    $refeicao = $_SESSION['refeicao'];
    $pratos = array();
    $cont = 0;
    if(isset($_POST['prato'])){
        $pratos = $user->recuperarPratos($_POST['prato']);
        $_SESSION['pratos'] = $pratos;
    }
    if(isset($_POST['idPrato'])){
        $_SESSION['prato'] = $_SESSION['pratos'][$_POST['idPrato']];
        unset($_SESSION['pratos']);
        unset($_POST['indexRef']);
        unset($_POST['indexSub']);
        unset($_POST['indexPrep']);
        header('Location: telaPrato.php');
    }
    if(isset($_POST['registrarRefeicao'])){
        $user->registrarRefeicao($_SESSION['refeicao'], $diagnostico->dataConsulta, $paciente->cpf);
        unset($_SESSION['refeicao']);
        header('Location: telaDiagnostico.php');
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
            <link rel="stylesheet" type="text/css" href="estiloNewRefeicao.css">
        </head>

        <body>';
        if(!isset($_SESSION['original'])){
            echo '<div class = "mt-3 row">
                <button class = "offset-1 btn btn-info" onclick = "voltar2();"> Voltar </button>
            </div>';              
        }
        else{
            echo '<div class = "mt-3 row">
                <button class = "offset-1 btn btn-danger" onclick = "cancelar();"> Cancelar </button>
            </div>';              
        }        
        echo'   <div class = "container mt-4">
                <h3 style = "text-align: center"> Adicionar Pratos a '. $refeicao->nome . '</h3>
                <div class = "row">
                    <form action = "./telaNewRefeicao2.php" class= "col-12 mt-5 form-inline" method = "post">
                      <i class="fas fa-search" aria-hidden="true"></i>
                      <input name = "prato" class="col-11 form-control form-control-sm ml-3 w-75" type="text" placeholder="Pesquisar prato (exemplo: Cuscuz com ovo)">
                    </form>
                </div>
            </div>
                <div class="mt-3 list-group container" style = "align-items: center; max-height: 350px; max-width: 500px; overflow-y: scroll;">';
                for($i=0; $i<count($pratos); $i++){
                    if(!in_array($pratos[$i], $refeicao->pratos)){
                        $cont++;
                        echo '<a id = "' . $i . '" class="list-group-item list-group-item-action" onclick = "selecionaPrato(' . $i . ')" >' . $pratos[$i]->nome . '</a>';
                    }
                }
echo'       
            </div>
            <form method = "post" action = "telaNewRefeicao2.php" id = "verPrato" style = "display:none;">
                <input type = "text" id = "idPrato" name = "idPrato">
            </form>
            <form method = "post" action = "telaNewRefeicao2.php" id = "finalizar" style = "display:none;">
                <input type = "text" id = "finalizou" name = "registrarRefeicao">
            </form>
            <div class = "row">
                <button type = "button" data-toggle = "modal" data-target = "#pratosAtuais" class = "offset-1 mt-3 mb-3 btn btn-primary"> Ver Pratos </button>             
                <button type = "button" onclick = "finalizar();" class = "offset-8 mt-3 mb-3 btn btn-success"> Finalizar </button>
            </div>            
        </body>

        <script type = "text/javascript" src = "scriptNewRefeicao.js"> </script>
    </html>';