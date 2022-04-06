<?php 

    @include('connect.php') ; 

    $id = intval($_GET['id']) ; 
    $sql_code = "SELECT * FROM frutas WHERE id='$id'" ; 
    $query_fruit = $mysqli->query($sql_code) or die($mysqli->error) ; 
    $fruit = $query_fruit->fetch_assoc() ; 
   
    if(count($_POST) > 0) {

    
    $nome = $_POST['name'] ; 
    $cor = $_POST['color'] ; 
    $und = intval($_POST['und']) ; 
    $priceund = floatval($_POST['und_price']) ;
    $payment = ($priceund * $und) ;
    $erro = false ;  
   

    if(empty($nome) || strlen($nome) < 3)
    {
        $erro .= "insira uma fruta válida para o banco de frutas." ; 
    }
    if(empty($cor) || strlen($cor) < 4)
    {
        $erro .= "insira uma cor válida por extenso para o banco de cores." ;
    }
     

    
   

    $code_sql = "UPDATE frutas SET nome='$nome',cor='$cor',unidade='$und',preco='$payment' 
                    WHERE id='$id'" ; 
    $sucess = $mysqli->query($code_sql) or die($mysqli->error) ; 
    if($sucess)
    {
        echo "fruta atualizada com sucesso !" ; 
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
            <input type="text" name="name" placeholder="Fruta" value=<?php echo $fruit['nome'] ?>>
        </div>
        <div>
            <input type="text" name="color" placeholder="Cor" value=<?php echo $fruit['cor'] ?>>
        </div>
        <div>
            <input type="number" name="und" placeholder="Unidades" value=<?php echo $fruit['unidade'] ?>>
        </div>
        <div>
            <input type="text" name="und_price" placeholder="Preço por unidade" value=<?php echo $fruit['preco'] ?>>
        </div>
        <div>
            <button type="submit">Cadastrar</button>
        </div>
    </form>
</div>
  
</div>

</body>
</html>