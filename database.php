<?php
/*
CLASSE:             DATABASE
AUTOR:              Luiz Carlos da Silva
DATA DE CRIAวรO:    19/03/18
================================================
1   -   CONSTRUTOR  -   LUIZ CARLOS -   19-03-18
2   -   SELECT      -   LUIZ CARLOS -   19-03-18
3   -   INSERT      -   LUIZ CARLOS -   19-03-18
4   -   UPDTAE      -   LUIZ CARLOS -   19-03-18
5   -   DELETE      -   LUIZ CARLOS -   20-03-18
6   -   DESCONECTAR -   LUIZ CARLOS -   20-03-18
================================================
 */
class database extends PDO{
    public $select="";
    public $insert="";
    public $update="";
    public $delete="";

    //==================================================================================================================
    //CONSTRUCT
    //==================================================================================================================
    public function __construct($dsn="mysql:host=localhost;dbname=pdo",$usuario="root",$senha="")
    {
        try{
            $this->conn= parent::__construct($dsn, $usuario, $senha);
        }catch (PDOException $e){
            echo "ERRO: ".$e->getMessage();
        }
    }
    //==================================================================================================================
    //  SELECT
    //==================================================================================================================
    public function Select()
    {
        try
        {
            $resultado=$this->query($this->select);
            $this->dados =$resultado->fetchAll();
        }catch (PDOException $e){
            echo"ERRO: ". $e->getMessage();
        }
    }
    //==================================================================================================================
    //  INSERT
    //==================================================================================================================
    public function Insert()
    {
        try
        {
           $this->query($this->insert);
        }catch (PDOException $e){
            echo"ERRO: ". $e->getMessage();
        }
    }
    //==================================================================================================================
    //  UPDATE
    //==================================================================================================================
    public function Update()
    {
        try
        {
            $this->query($this->update);
        }catch (PDOException $e){
            echo"ERRO: ". $e->getMessage();
        }
    }
    //==================================================================================================================
    //  DELETE
    //==================================================================================================================
    public function Delete()
    {
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try
        {
           $this->query($this->delete);
        }catch (PDOException $e){
            echo"ERRO: ". $e->getMessage();
        }
    }
    //==================================================================================================================
    //  DESCONECTAR
    //==================================================================================================================
    public function Desconectar()
    {
        $this->conn = null;
    }
}
?>