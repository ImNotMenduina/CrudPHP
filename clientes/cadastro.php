<?php

if(count($_POST) > 0 ){
    include('conexao.php') ; 
    $nome = $_POST['nome'] ; 
    $email = $_POST['email'] ;
    $telefone = $_POST['telefone'] ;
    $nascimento = $_POST['nascimento'] ;
    $err = false ; 

    if(empty($nome) || strlen($nome) < 3){
        $err .= "<p>- Insira um nome válido.</p>" ; 
    }
    if(empty($email) || !filter_var($email , FILTER_VALIDATE_EMAIL)){
        $err .= "<p>- Insira um email válido.</p>";
    }

    if(!empty($nascimento)){
        $temp = explode('/',$nascimento) ; 
        if(count($temp) == 3)
        {
            $nascimento = implode('-',array_reverse($temp)) ; 
        }
        else{
            $err .= "<p>Insira a data no formato DIA/MES/ANO.</p>" ; 
        }
    }

    if($err){
        echo "<b>ERROR : </b> <br> $err" ; 
    }
    else{
        $sql_code = "INSERT INTO clientes (nome,email,telefone,nascimento,data_cadastro)VALUES ('$nome','$email','$telefone','$nascimento',NOW())" ;
        $sucess = $mysqli->query($sql_code) or die($mysqli->error) ;
        if($sucess)
        {
            echo "cliente cadastrado com sucesso ! " ; 
            unset($_POST) ; 
        } 
    }


}

?>
<!-- ------------------------------------------------------------------------------------------------------------------------------FIMPHPCODE------------------------------------------------------------------------------------------------------------------------------------- -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="lista_clientes.php">BACK TO LIST</a>
    <form action="" method="POST">
        <div>
            <label>Nome : </label>
            <input type="text" name="nome" placeholder="Nome" value=<?php 
                if(isset($_POST['nome']))
                echo $_POST['nome'] ; 
            ?>>
        </div>
        <div>
            <label>E-mal :</label>
            <input type="email" name="email" placeholder="E-mail" value=<?php 
                if(isset($_POST['email']))
                echo $_POST['email'] ; 
            ?>>
        </div>
        <div>
            <label>Telefone :</label>
            <input type="text" name="telefone" placeholder="Telefone">
        </div>
        <div>
            <label>Data de Nascimento : </label>
            <input type="text" name="nascimento" placeholder="DIA/MES/ANO">
        </div>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>