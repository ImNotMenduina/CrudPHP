<?php 
$host = "localhost" ; 
$username = "root" ; 
$password = "" ; 
$database = "user_control" ; 

$mysqli = new mysqli($host,$username,$password,$database) ; 
if($mysqli->errno)
{
    echo "Falha ao conetar com o banco de dados!" ; 
}
