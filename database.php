<?php

/**
 * Class database
 * @author Luiz Carlos da Silva
 * @data 19/03/18
 */
class database extends PDO{
    public $select="";
    public $insert="";
    public $update="";
    public $delete="";

    //CONSTRUCT
    public function __construct($dsn="mysql:host=localhost;dbname=pdo",$usuario="root",$senha="")
    {
        try{
            $this->conn= parent::__construct($dsn, $usuario, $senha);
        }catch (PDOException $e){
            echo "ERRO: ".$e->getMessage();
        }
    }

    //SELECT
    public function Select()
    {
        try
        {
            $resultado=$this->query($this->select);
            $this->dados =$resultado->fetchAll();
        }catch (PDOException $e){
            echo"erro: ". $e->getMessage();
        }
    }

    //INSERT
    public function Insert()
    {
        try
        {
           $this->query($this->insert);
        }catch (PDOException $e){
            echo"erro: ". $e->getMessage();
        }
    }




}





?>