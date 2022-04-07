<?php 

if(isset($_POST['email']))
{   
    @include('conexao.php') ; 
    $time_validate = time() + (30*24*60*60) ; 
    setcookie("email" , $_POST['email'] , $time_validate) ; 
    $email = $_POST['email'] ; 
    $error = false ; 

    if(empty($email) || !filter_var($email , FILTER_VALIDATE_EMAIL))
    {
        $error = "<p>E-mail inválido</p>";
    }
    else
    {
        $sql_code = "SELECT * FROM users WHERE email='$email'" ; 
        $query_user = $mysqli->query($sql_code) or die($mysqli->error) ;
        $user = $query_user->fetch_assoc() ; 
        if(!$user)
        {
            $error .= "<p>ERROR : usuário não consta na base de dados. Verifique o e-mail do login.</p>" ; 
        }
    }
   
        

if(!$error)
 {
    if(password_verify($_POST['senha'] , $user['senha'])){
        echo "<p>SUCSSES // Ousuário válido ! </p>" ; 
    }
    else 
    {
        echo "<p>ERROR // Senha inválida para esta conta !</p> " ; 
    }
    }
    else
    {
        echo $error ; 
    }
    
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<div style="background-color:#000; box-sizing:border-box;padding:10px;">
                        <a href="cadastro.php" class="btn">Adicionar Cliente</a>
                        <a href="listausers.php" class="btn">Lista</a>
    </div>

<div class="formulario">
        <div class=wrapper>
            <a href="log.php">Login</a>
            <a href="listausers.php">Lista</a>
            <h1>Login do Cliente</h1>
            
        <form method="POST" action="">
                
                <input type="text" placeholder="email" name="email" value=<?php
                        if(isset($_COOKIE['email'])) echo $_COOKIE['email'] ; 
                    ?>>
                <input type="password" placeholder="senha" name="senha">
                     
                <button type="submit">Cadastrar</button>
            </form>
        </div>      
    </div>
    
</body>
</html>