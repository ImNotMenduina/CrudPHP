<?php
$host = 'localhost' ; 
$username = 'root' ; 
$password = "" ; 
$database = "hortfruit" ; 

$mysqli = new mysqli($host , $username , $password , $database) ; 
if($mysqli->errno)
{
    echo "Falha ao conectar ao banco de dados $mysqli->errno" ; 
}
else{
    echo "Sucess ! " ; 
}