<?php
//inclusao da classe
include('database.php');

//Instanciando
$sql = new database();

//Criando Select
$sql->select= "select * from produto";

//Executando Select
$sql->Select();

//Exibindo resultado do select
foreach ($sql->dados as $dado)
{
    echo $dado['NOME']."<br>";
}
