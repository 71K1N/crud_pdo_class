<?php
include('database.php');
$sql = new database();
$sql->select= "select * from produto";
$sql->Select();

foreach ($sql->dados as $dado)
{
    echo $dado['NOME']."<br>";
}
