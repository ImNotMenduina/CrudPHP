<?php
    include('conexao.php') ; 
    $id = intval($_GET['id']) ;  
    $sql_code = "SELECT * FROM clientes WHERE id='$id' " ; 
    $query_cliente = $mysqli->query($sql_code) or die($mysqli->error) ; 
    $cliente = $query_cliente->fetch_assoc() ; 
    var_dump($cliente) ; 


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
        $sql_code = "UPDATE clientes
        SET nome = '$nome',  email = '$email',  telefone = '$telefone', nascimento = '$nascimento' WHERE id='$id' ; " ;
        $sucess = $mysqli->query($sql_code) or die($mysqli->error) ;
        
        if($sucess)
        {
            echo "Atualização feita com sucesso ! " ; 
            
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
               echo $cliente['nome'] ; 
            ?>>
        </div>
        <div>
            <label>E-mal :</label>
            <input type="email" name="email" placeholder="E-mail" value=<?php 
                echo $cliente['email'] ; 
            ?>>
        </div>
        <div>
            <label>Telefone :</label>
            <input type="text" name="telefone" placeholder="Telefone" value=<?php 
                echo $cliente['telefone'] ; 
            ?>>
        </div>
        <div>
            <label>Data de Nascimento : </label>
            <input type="text" name="nascimento" placeholder="DIA/MES/ANO">
        </div>
        <button type="submit">Salvar Alterações</button>
    </form>
</body>
</html>