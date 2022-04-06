<?php
include('conexao.php') ; 
$sql_code = "SELECT * FROM clientes" ; 
$query_clientes = $mysqli->query($sql_code) or die($mysqli->error) ; 
$list_rows = $query_clientes->num_rows ;  /* retorna o numero de linhas que a lista possui */

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
    
    <h1>CLIENTES -></h1>
    <p>Lista dos clientes cadastrados na empresa : </p>
    
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Nascimento</th>
                <th>Data de Cadastro</th>
                <th>Ações</th>
            </tr>
        </thead>
        
        <tbody>
            <?php 
                if($list_rows == 0){
            ?>
            <tr>
                <td colspan="7">Lista Vazia</td>
            </tr>
            <?php 
                }
                else
                {   
                    while($cliente = $query_clientes->fetch_assoc()){ 
                        if(!empty($cliente['nascimento'])){
                            $nascimento = $cliente['nascimento'];
                            $temp = explode('-', $nascimento) ; 
                            $nascimento = implode('/',array_reverse($temp));
                        }
                        if(!empty($cliente['telefone'])){
                            $telefone = $cliente['telefone'] ; 
                            $ddd = substr($telefone,0,2);
                            $part1 = substr($telefone,2,5) ; 
                            $part2 = substr($telefone,7) ; 
                            $telefone = "($ddd) $part1-$part2" ; 
                        }
                        $data = date( "d/m/Y H:i" , strtotime($cliente['data_cadastro'])) ; 
                        
            ?>
            <tr>
                <td><?php echo $cliente['id'] ?></td>
                <td><?php echo $cliente['nome'] ?></td>
                <td><?php echo $cliente['email'] ?></td>
                <td><?php echo  $telefone ?></td>
                <td><?php echo $nascimento ?></td>
                <td><?php echo $data ?></td>
                <td>
                    <a href="editar_cliente.php?id=<?php echo $cliente['id'] ?>">Editar</a>
                    <a href="deletar_cliente.php?id=<?php echo $cliente['id'] ?> ">Deletar</a>
                </td>
                
            </tr>
            <?php  
                    }
                }
                ?>
        </tbody>
    </table>

</body>
</html>