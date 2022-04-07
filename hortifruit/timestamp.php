<?php 

/* echo time() ; // retorna o tempo em segundos desde 01/01/1970
echo "<br>" . strtotime(2020-10-04); //retorna uma data no formato americano EM SEGUNDOS

echo "<br>" . date("d/m/Y" , strtotime("1970-01-01")) ; 

 */

 //MOSTRAR A DATA ATUAL EM STIMESTAMP (time() retorna a data atual em segundos)
    echo "<p>Data atual em timestemp :" . time() ."</p><br>" ; 

//TRANSFORMAR TIMESTAMP EM DATA ATUAL (data("formato" , dataEmSegundos))
    echo "<p>Data atual em timestamp : " . date("d/m/Y" , time()) . "</p><br>";

//TRANSFORMAR DATA ATUAL EM TIMESTAMP (strtotime("ano-mes-dia")) retorna a data em segundos
    echo "<p>Data atual em timestamp :". strtotime("2022-04-06") ." </p> <br>" ; 

//SOMAR 10 DIAS EM UMA DATA 

     $soma = strtotime("2022-04-06") + (10*86400) ; 
    echo  date("d/m/Y" , $soma) . "<br>" ; 

//SUBTRAIR 10 DIAS EM UMA DATA 
    $subtrai = strtotime("2022-04-06") - (10*86400) ; 
    echo date("d/m/Y" , $subtrai) . "<br>" ; 

//CONVERTENDO O TIMESTAMP PARA O FORMATO DO BANCO DE DADOS 
    echo "<p>Formato para banco de dados : " . date("Y-m-d H:i:s", time()) . "</p><br>" ; 

//DESCOBRI O DIA DA SEMANA DE UMA DATA 
    echo "<p>Dia da semana de 06/04/2022 : " . date('D' , time()) . "</p>"
?>