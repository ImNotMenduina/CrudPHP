<?php
@include('conexao.php') ;
$id = $_GET['id'] ; 
$query_user = $mysqli->query("SELECT * FROM users WHERE id='$id'") ; 
$user = $query_user->fetch_assoc() ;

if(isset($_POST['deletar'])){

    if($_POST['deletar']== 1){
        $sql_code = "DELETE FROM users WHERE id='$id' " ; 
        $sucess = $mysqli->query($sql_code) or die($mysqli->error) ; 
        if($sucess)
        {
            echo "<p>Usuário apagado com sucesso ! </p>" ; 
            echo "<p><a href='listausers.php'>Clique aqui</a> para ser redirecionado para a lista de usuários . </p>";
            header("Location: http://localhost/I%20LOVE%20PHP/login/listausers.php") ; 
        }
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
    <div class="formulario">
        <div class="wrapper">
            <form action="" method="POST">
                <h2>Tem certeza que deseja excluir <?php echo $user['nome'] ?> do banco de dados ? (ATENÇÃO // ESTE PROCESSO É IRREVERSSÍVEL !). </h2>
                <button name="deletar" value="1" >Sim,estou ciente.</button>

                <a href="listausers.php">
                    <div id="cancelar">
                     Retornar à Lista.
                    </div>
                </a>
                
            </form>
        </div>
    </div>
</body>
</html>