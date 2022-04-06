<?php 


    @include('connect.php') ; 
    $sql_code = "SELECT * FROM frutas ORDER BY nome DESC;" ; 
    $query_fruits = $mysqli->query($sql_code) or die($mysqli->error) ; 
    $num_rows = $query_fruits->num_rows ; 
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
<a href="cadastro_fruta.php">Cadastrar Fruta</a>
<table border="2" >
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cor</th>
            <th>Unidade(s)</th>
            <th>Preço</th>
        </tr>
    </thead>
    <tbody>
        <?php if($num_rows == 0 ){  ?>
        <tr colspan="5">Nenhuma Fruta Cadastrada no Sistema ! </tr>
        <?php 
        }
        else
        {
            while($k = $query_fruits->fetch_assoc()){
               
        ?>
        <tr>
            <td><?php echo $k['id'] ?></td>
            <td><?php echo $k['nome'] ?></td>
            <td><?php echo $k['cor'] ?></td>
            <td><?php echo $k['unidade'] ?> </td>
            <td><?php echo $k['preco'] ?></td>
            <td>
                <a href="editar_fruta.php?<?php echo "id=".$k['id']  ?>">Editar</a>
                <a href="deletar_fruta.php?<?php echo "id=".$k['id']  ?>">Deletar</a>
            </td>

        </tr>
        
        <?php 
            } 
        }
        ?>
    </tbody>
</table>
  
</div>

</body>
</html>