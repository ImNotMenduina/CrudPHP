<?php 
    @include('connect.php') ; 
    $id = intval($_GET['id']) ;
    $sql_code = "SELECT * FROM frutas WHERE id='$id'" ; 
    $delete_fruit = $mysqli->query($sql_code) or die($mysqli->error) ; 
    $erase_fruit = $delete_fruit->fetch_assoc() ; 

     
    if(isset($_POST['deletar'])){
        $delete_code = "DELETE FROM frutas WHERE id='$id'" ; 
        $query_delete = $mysqli->query($delete_code) or die($mysqli->error) ; 
        if($query_delete){
         ?>
        <h1>Fruta apagada com sucesso ! </h1>
        <p><a href="listafrutas.php">Clique aqui</a> para retornar para a lista de frutas.</p>
        <?php
        die() ;   
        }
    }
?>

    <div style="width : 30% ; margin :auto ">
        <div><b>ID :</b> <?php echo $erase_fruit['id'] ?> </div>
        <div><b>Nome :</b> <?php echo $erase_fruit['nome'] ?> </div>
        <div><b>Cor :</b> <?php echo $erase_fruit['cor'] ?> </div>
        <div><b>UND :</b> <?php echo $erase_fruit['unidade'] ?> </div>
        <div><b>Preço Total :</b> <?php echo $erase_fruit['preco'] ?> </div>
        <div>
            <h3>Tem certeza que deseja excluir o item de ID <?php echo $erase_fruit['id'] ?> ? </h3>

            <form action="" method="POST">
                ID : <input type="number" name="id" value=<?php echo $id ?>  disabled>
                <button type="submit" name="deletar" value="1">SIM</button>
                <a href="listafrutas.php">NÃO</a>
                <button style="background:blue; border : none ; padding : 10px ;">CONFIRMAR</button>
            </form>
           
        </div>
    </div>