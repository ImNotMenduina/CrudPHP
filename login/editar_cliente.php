<?php 
@include('conexao.php') ; 
$id = $_GET['id'] ; 
$sql = "SELECT * FROM users WHERE id='$id'" ; 
$query_user = $mysqli->query($sql) or die($mysqli->error) ; 
$user = $query_user->fetch_assoc() ; 

/* TIME AMERICAN TO BRAZILIAN */


if(count($_POST) > 0)
{
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

    $sql_code = "UPDATE users 
                 SET nome='$nome',email='$email',telefone='$telefone',nascimento='$nascimento'
                    WHERE id='$id' ; " ;  
    $sucess = $mysqli->query($sql_code) or die($mysqli->error) ; 
                if($sucess)
                {
                    echo "<h2>Informações atualizadas com sucesso ! </h2>" ; 
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
            <a href="cadastro.php" class="btn">Adicionar Cliente</a>
            <a href="log.php" class="btn">Login</a>
    </div>

    <div class="formulario">
        <div class=wrapper>
            <a href="log.php">Login</a>
            <a href="listausers.php">Lista</a>
            <h1>Atualização de Usuário</h1>
            
        <form method="POST" action="">
                <input type="text" placeholder="nome" name="nome"
                value=<?php 
                    echo $user['nome'] ; 
                ?>>
                <input type="text" placeholder="email" name="email" value=<?php 
                    echo $user['email'] ; 
                ?>>
            
                <input type="text" placeholder="21988885555" name="telefone" value=<?php 
                    echo $user['telefone'] ; 
                ?>>
                <input type="text" placeholder="DIA/MÊS/ANO" name="nascimento" value=<?php 
                   echo  $user['nascimento'] ; 
                ?>>
                <button type="submit">Salvar Alterações</button>
            </form>
        </div>      
    </div>

</body>
</html>