<?php
//inclusao da classe
include('database.php');
include('interface.php');

$banco = new crud();
$banco->selecionaTodos();
