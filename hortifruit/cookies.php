<?php   

    if(isset($_POST['nome'])){
        $venc = time() + 30 * 24 * 60 * 60 ; 
        setcookie("nome" , $_POST['nome'],$venc) ; 
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    if(isset($_COOKIE['nome'])){
        echo "BEM-VINDO, ". $_COOKIE['nome'] ; 
        die() ; 
    }
    else
    {

?>
    <form method="post" action="">
        <p>QUAL É O SEU NOME ? </p>
        <input type="text" name="nome">
        <button type="submit">Salvar</button>
    </form>

<?php
    }
?>
</body>
</html>