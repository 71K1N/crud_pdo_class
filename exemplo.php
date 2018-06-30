<?php
include('interface.php');
$banco = new crud;
$banco->table="eventos";
$banco->selecionaTodos();
