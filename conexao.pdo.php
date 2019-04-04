<?php
/**
 *  Classe Conexao
 */
class ConexaoPdo
{

    public $servername = "";
    public $username = "";
    public $password = "";
    public $dbname = "";

    public $create = "";
    public $update = "";
    public $read = "";
    public $delete = "";
    
    public $dados = "";
    public $statement;

    /**
     * Conectar
     * 
     * Conecta uma instancia do banco de dados
     * 
     */
    public function Conectar()
    {   
        //global $password;
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    /**
     * Desconectar
     * 
     * Desconecta da instancia do banco de dados
     */
    public function Desconectar()
    {
        $this->conn=null;
    }

    /**
     * FildsToSet
     * 
     * retorna os nomes dos statements to bind
     */
    public function FildsToSet()
    {
        $params = '';
        foreach ($this->statement as $key => $value) {
            $params .= $key . ",";
        }
        $size = strlen($params);
        $params = substr($params, 0, $size - 1);
        return $params;
    }

    /**
     * Create
     * 
     * Cria um novo registro no banco de dados
     */
    public function Create()
    {

        try {

            if (isset($this->statement)) {
                $prepared = $this->conn->prepare($this->create, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            } else {
                $prepared = $this->conn->prepare($this->create);
            }

            if (isset($this->statement)) {
                $prepared->execute($this->statement);
            } else {
                $prepared->execute();
            }

            $this->retorno = 1;
        } catch (\Exception $e) {

            $this->retorno = 0;
            echo $e->getMessage();
        }
    }

    /**
     * Read
     * 
     * Recupera registros da instancia do banco
     */
    public function Read()
    {
        try {

            if (isset($this->statement)) {
                $prepared = $this->conn->prepare($this->read, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            } else {
                $prepared = $this->conn->prepare($this->read);
            }

            if (isset($this->statement)) {
                $prepared->execute($this->statement);
            } else {
                $prepared->execute();
            }

            $prepared->setFetchMode(PDO::FETCH_ASSOC);

            $this->dados = $prepared->fetchAll();
            $this->retorno = 1;
        } catch (\Exception $e) {

            $this->retorno = 0;
            echo $e->getMessage();
        }
    }


    /**
     * Update
     * 
     * Atualiza um registro no banco de dados
     */
    public function Update()
    {

        try {

            if (isset($this->statement)) {
                $prepared = $this->conn->prepare($this->update, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            } else {
                $prepared = $this->conn->prepare($this->update);
            }

            if (isset($this->statement)) {
                $prepared->execute($this->statement);
            } else {
                $prepared->execute();
            }

            $this->retorno = 1;
        } catch (\Exception $e) {

            $this->retorno = 0;
            echo $e->getMessage();
        }
    }

    /**
     * Delete
     * 
     * Exclui um registro no banco de dados
     */
    public function Delete()
    {

        try {

            if (isset($this->statement)) {
                $prepared = $this->conn->prepare($this->delete, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            } else {
                $prepared = $this->conn->prepare($this->delete);
            }

            if (isset($this->statement)) {
                $prepared->execute($this->statement);
            } else {
                $prepared->execute();
            }

            $this->retorno = 1;
        } catch (\Exception $e) {

            $this->retorno = 0;
            echo $e->getMessage();
        }
    }

    /**
     * Transaction
     * 
     * Inicia uma transa��o 
     */
    public function startTransaction()
    {
        $this->conn->beginTransaction();
        //$this->conn->setAttribute(PDO::ATTR_AUTOCOMMIT,0);
    }

    /**
     * Commit
     * 
     * Consolida as transa�oes no banco de dados
     */
    public function Commit()
    {
        $this->conn->commit();  
        //$this->conn->setAttribute(PDO::ATTR_AUTOCOMMIT,1);     
    }

    /**
    * Rollback
    * 
    * Desfas as aleracoes feitas
    */
    public function Rollback()
    {
        $this->conn->rollBack();
        //$this->conn->setAttribute(PDO::ATTR_AUTOCOMMIT,1);
    }
}

$teste = new ConexaoPdo();
