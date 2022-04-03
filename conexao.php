<?php

$hostname = "localhost" ; 
$username = "root" ; 
$password = "" ; 
$db = "cadastroclientes" ; 

$mysqli = new mysqli($hostname,$username,$password,$db) ; 
if($mysqli->errno)
{
    echo "Falha ao conectar com o banco de dados : " . $mysqli->errno ; 
}
else
{
    echo "db connected ! <br>" ; 
}