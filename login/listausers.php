<?php 

@include('conexao.php') ; 
$sql_code = "SELECT * FROM users ORDER BY id" ; 
$list_users = $mysqli->query($sql_code) or die($mysqli->error) ; 
$n_rows = $list_users->num_rows ; 

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
    <a href="cadastro.php">+ADD</a>
    <a href="log.php">Login</a>
    <table id="alter" border="0">
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
            <?php if($n_rows == 0) { ?>
                <tr>
                    <td colspan="7"><p>Não há usuários cadastrados por enquanto no banco de dados.</p></td>
                </tr>
                <?php 
            }
            else
            {
                while($users = $list_users->fetch_assoc()){
                ?>
                <tr>
                        <td><?php echo $users['id'] ?></td>
                        <td><?php echo $users['nome'] ?></td>
                        <td><?php echo $users['email'] ?></td>
                        <td><?php echo $users['telefone'] ?></td>
                        <td><?php echo $users['nascimento'] ?></td>
                        <td><?php echo $users['data_cadastro'] ?></td>
                        <td>
                            <a href="deletar_cliente.php?id=<?php echo $users['id'] ?>" class="btn">Deletar</a>
                            <a href="editar_cliente.php?id=<?php echo $users['id'] ?>" class="btn">Editar</a>
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