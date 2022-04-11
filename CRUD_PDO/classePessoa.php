<?php

class Pessoa{
    private $pdo ; 
    //6funçoes
    //CONEXÃO COM O BANCO DE DADOS ; 
    public function __construct($dbname, $host, $user , $senha) // o construtor instancia o código. O que estiver dentro do contrutor será executado primeiro
    {   
        try
        {
            $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$senha);
        }
        catch (PDOException $e)
        {
            echo "Erro com banco de dados : ".$e->getMessage() ; 
            exit() ; 
        }
        catch (Exception $e)
        {
            echo "Erro generico : ".$e->getMessage() ; 
            exit() ; 
        }
    }
    //ESSA FUNÇÃO É PARA BUSCAR OS DADOS E COLOCAR NO CANTO DIREITO DA TELA
    public function buscarDados()
    {   
        $res = array() ; 
        $cmd = $this->pdo->query("SELECT * FROM pessoa ORDER BY nome DESC") ; 
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC) ;
        return $res ;  
    }

    public function insertDados($nome,$telefone,$email)
    {
        $sql = $this->pdo->prepare("INSERT INTO pessoa (nome,telefone,email) VALUES (:nome,:telefone,:email)") ; 
        $sql->bindValue(":nome",$nome) ; 
        $sql->bindValue(":telefone",$telefone) ; 
        $sql->bindValue(":email",$email) ; 
        $sql->execute() ; 
    }

    public function editDados($nome,$telefone,$email)
    {
        $sql = $this->pdo->prepare("UPDATE pessoa 
        SET nome=':nome',
            telefone=':telefone',
            email=':email'
        WHERE id=':id' ") ; 
        $sql->bindValue(":nome","$nome"); 
        $sql->bindValue(":telefone","$telefone"); 
        $sql->bindValue(":email","$email"); 
        $sql->execute() ; 
    }
}


?>