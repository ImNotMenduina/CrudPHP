<?php
@require_once 'classePessoa.php' ; 
$p = new Pessoa("crudpdo","localhost","root","") ; 

if(count($_POST) > 0)
{
    $nome = $_POST['nome'] ; 
    $telefone = $_POST['telefone'] ; 
    $email = $_POST['email'] ;  
    $p->insertDados($nome,$telefone,$email) ; 
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>CRUD PDO</title>
</head>
<body>
    <!-- ---------------------------------FORMULÁRIO----------------------------------------- -->
    <section id="esquerda">
        <form method="POST">
            <h2>Cadastrar Pessoa</h2>
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome">
            <label for="tel">Telefone</label>
            <input type="text" name="telefone" id="tel">
            <label for="email">E-mail</label>
            <input type="text" name="email" id="email">
            <button type="submit">Cadastrar</button>
        </form>
    </section>
    <!-- -------------------------------------TABELA----------------------------------------- -->
    <section id="direita">
        <?php
        $dados  =  $p->buscarDados();

        ?>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th colspan="2">Email</th>
                </tr>
            </thead>

            <tbody>
                
                <?php 
                    for($i=0 ; $i<count($dados) ; $i++)
                    {
                ?>

                <tr>

                    <?php

                        foreach($dados[$i] as $key => $value)
                        {   
                            
                            if($key != 'id')
                            {
                                echo "<td>".$value ."</td>" ; 
                            }
                            else
                            {
                                $pathEdit = "editar.php?id=$value" ; 
                                $pathDelete = "excluir.php?id=$value" ; 
                            }
                        }
                        ?>
                        <td>
                            <a href=<?php echo "$pathEdit" ?>>Editar</a>
                            <a href=<?php echo "$pathDelete" ?>>Excluir</a>
                        </td>
                        
                </tr>

                <?php

                    }

                ?>
            </tbody>
        </table>
    </section>
</body>
</html>