<?php 

if(count($_POST) > 0)
{
    @include('conexao.php') ; 
    $nome = $_POST['nome'] ; 
    $email = $_POST['email'] ;
    $telefone = $_POST['telefone'] ; 
    $nascimento = $_POST['nascimento'] ; 
    $error = false ; 

/* USERNAME VALIDADE */
    if(empty($nome) || strlen($nome) < 3)
    {
        $error .= "<p>Nome inválido.</p>" ; 
    }
/* USER EMAIL VALIDADE */
    if(empty($email) || !filter_var($email , FILTER_VALIDATE_EMAIL))
    {
        $error .= "<p>E-mail inválido.</p>" ; 
    }

/* PASSWORD VALIDATE AND CRIPTOGRAFIA */

    if(isset($_POST['senha']))
    {
        if(isset($_POST['senha-confirma']) && $_POST['senha'] === $_POST['senha-confirma'])
        {   
            $senha = $_POST['senha'] ; 
            $hash = password_hash($senha , PASSWORD_DEFAULT) ; 
        }
        else
        {
            $error .= "<p>As senhas não coincidem.</p>" ; 
        }
    }
    else
    {
        $error .= "<p>Insira uma senha para se cadastrar.</p>" ; 
    }



/* VALIDAÇAO DO NASCIMENTO PARA O BANCO DE DADOS */
    if(!empty($nascimento))
    {
        $temp = explode('/' , $nascimento) ; //10/11/1999  10 11 1999
        if(count($temp) == 3)
        {
            $nascimento = implode('-' , array_reverse($temp)) ;  
        }
    }
    else
    {
        $error .= "<p>Insira uma data válida.</p>" ;    
    }   

    if(!$error){
    $data_cadastro = date("Y-m-d H:i:s" , time())  ;

    $sql_code = "INSERT INTO users(nome,email,senha,telefone,nascimento,data_cadastro)
                                VALUES('$nome','$email','$hash','$telefone','$nascimento','$data_cadastro')" ; 
    $sucess = $mysqli->query($sql_code) or die($mysqli->error) ; 
                if($sucess)
                {
                    echo "<h2>Usuário cadastrado com sucesso ! </h2>" ; 
                    echo "<p><a href='listausers.php'>Clique aqui</a> para voltar à lista de clientes.</p>";
                    die() ; 
                }
            }
    else
    {
        echo $error ; 
    }

    
}


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<div style="background-color:#000; box-sizing:border-box;padding:10px;">
                        <a href="log.php" class="btn">Login</a>
                        <a href="listausers.php" class="btn">Lista</a>
    </div>
    <div class="formulario">
    
        <div class=wrapper>
            <a href="log.php">Login</a>
            <a href="listausers.php">Lista</a>
            <h1>Cadastro de Usuário</h1>
            
        <form method="POST" action="">
                <input type="text" placeholder="nome" name="nome"
                value=<?php 
                    if(isset($_POST['nome'])) echo $_POST['nome'] ; 
                ?>>
                <input type="text" placeholder="email" name="email" value=<?php 
                    if(isset($_POST['email'])) echo $_POST['email'] ; 
                ?>>
                <input type="password" placeholder="senha" name="senha">
                <input type="password" placeholder="confime sua senha" name="senha-confirma">
                <input type="text" placeholder="21988885555" name="telefone" value=<?php 
                    if(isset($_POST['telefone'])) echo $_POST['telefone'] ; 
                ?>>
                <input type="text" placeholder="DIA/MÊS/ANO" name="nascimento" value=<?php 
                    if(isset($_POST['nascimento'])) echo $_POST['nascimento'] ; 
                ?>>
                <button type="submit">cadastrar</button>
            </form>
        </div>      
    </div>
    
</body>
</html>