<?php

include 'database.php';
$table="";

class crud
{
    public function seleciona($table, $id)
    {

    }
    public function selecionaTodos()
    {
        $sql = new database();
        $sql->select = "select * from ".$this->table."";
        $sql->Select();
        //retorna em formato json
        echo json_encode($this->dados);
        $sql->Desconectar();

    }

    public function inserir()
    {

    }

    public function atualizar()
    {

    }

    public function apagar()
    {

    }
}
