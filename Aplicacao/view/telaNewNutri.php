<?php    

    require_once("../model/Nutricionista.php");
    $reg = true;
    if (isset($_POST["nomeNutri"]) && isset($_POST["crnNutri"]) && isset($_POST["cpfNutri"])){
        session_start();
        $user = new Nutricionista($_POST["cpfNutri"], $_POST["nomeNutri"], $_POST["crnNutri"]);
        $reg = $user->registrarNutricionista($user);
        if ($reg===true){
            $_SESSION['nutricionista'] = $user;
            header('Location: telaNutri.php' );
        }
    }

    echo '<!doctype html>

    <html>

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
    	<link rel="stylesheet" type="text/css" href="estiloNewNutri.css">
    </head>

    <body>
        <div style = "';
    if ($reg===true){
        echo ' display: none; ';
    }
    echo ' text-align: center;" class="alert alert-danger">
            <strong>Não foi possível cadastrar o nutricionista</strong>
        </div>
        <div class = "mt-4 py-3 container shadow" id = "containerNutri">
            <form method = "post" action = "telaNewNutri.php">
                <div class = "row">
                    <div class = "col-12">
                        <label for = "nomeNutri"> Nome </label>
                        <input required type = "text" id = "nomeNutri" name = "nomeNutri" class = "form-control"> 
                    </div>
                </div>
                <div class = "row">
                    <div class = "col-12">
                        <label for = "cpfNutri"> CPF </label>
                        <input required type = "text" id = "cpfNutri" name = "cpfNutri" class = "form-control">
                    </div>
                </div>
                <div class = "row">
                    <div class = "col-12">
                        <label for = "crnNutri"> CRN </label>
                        <input required type = "text" id = "crnNutri" name = "crnNutri" class = "form-control">
                    </div>
                </div>
                <div class = "mt-3 text-center col-12">
                    <button type = "submit" class = " btn btn-info"> Cadastrar </button>
                </div>            
            </form>
        </div>
    </body>

    <script type = "text/javascript" src = "scriptNewNutri.js"> </script>

    </html>'
?>