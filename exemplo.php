<?php
include('interface.php');
$banco = new crud;
$banco->table="pessoa";
$banco->selecionaTodos();
