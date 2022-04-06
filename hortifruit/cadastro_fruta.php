<?php 
if(count($_POST) > 0 ){
    @include('connect.php') ; 
    $nome = $_POST['name'] ; 
    $cor = $_POST['color'] ; 
    $und = intval($_POST['und']) ; 
    $priceund = floatval($_POST['und_price']) ; 
    $erro = false ; 

    if(empty($nome) || strlen($nome) < 3)
    {
        $erro .= "insira uma fruta válida para o banco de frutas." ; 
    }
    if(empty($cor) || strlen($cor) < 4)
    {
        $erro .= "insira uma cor válida por extenso para o banco de cores." ;
    }
    $payment = ($priceund * $und) ; 

    $code_sql = "INSERT INTO frutas (nome,cor,unidade,preco) 
                    VALUES ('$nome','$cor','$und','$payment') " ; 
    $sucess = $mysqli->query($code_sql) or die($mysqli->error) ; 
    if($sucess)
    {
        echo "fruta cadastrada com sucesso !" ; 
    }
    

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hortifruit</title>
    <style>
        input{
            border : none ; 
            border-bottom : 1px solid blue ; 
            outline : none ; 
            padding : 5px  ;
        }
        button {
            border : none ; 
            padding : 10px ; 
            border-radius : 12px ;
            cursor : pointer ; 
        }
    </style>
</head>
<body>
    
<div class="container" style="margin:auto; text-align : center">
<a href="listafrutas.php">Voltar para a lista</a>
<div>
<form action="" method="post">
        <div>
            <input type="text" name="name" placeholder="Fruta">
        </div>
        <div>
            <input type="text" name="color" placeholder="Cor">
        </div>
        <div>
            <input type="number" name="und" placeholder="Unidades">
        </div>
        <div>
            <input type="text" name="und_price" placeholder="Preço por unidade" >
        </div>
        <div>
            <button type="submit">Cadastrar</button>
        </div>
    </form>
</div>
  
</div>

</body>
</html>