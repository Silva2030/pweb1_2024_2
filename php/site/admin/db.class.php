<?php

class db {

    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $port = 3307;
    private $dbname ="db_pweb1_2024_2_blog";
    private $table_name;

    public function __construct($table_name){
        $this->conn();
        $this->table_name = $table_name;
    }

    public function conn(){

        try{
            $conn = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname;port=$this->port;",
                $this->user,
                $this->password,
                [
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_INIT_COMMAND =>" SET NAMES utf8"
                ]
            );

            return $conn;

        } catch(PDOException $e){
            echo "Erro: ". $e->getMessage();
        }
    }

    public function insert($dados){
        $sql = "INSERT INTO $this->table_name (";

        unset($dados["id"]);
        $flag = 0;
        $arrayValues=[];
        
        foreach($dados as $campo =>$valor){
            $sql .= $flag == 0 ? "$campo " : ",$campo";
            $flag = 1;
        }
        $sql .=") VALUES(";

        $flag = 0;
        foreach($dados as $campo => $valor){
            $sql .= $flag == 0 ? "? " : ",?";
            $flag = 1;
            $arrayValues[] = $valor;
        }

        $sql .=")";
        $conn = $this->conn();

        $st = $conn->prepare($sql);

        $st->execute($arrayValues);

    }

    public function update($dados){
        
        $id = $dados['id'];
        $conn = $this->conn();

        $sql = "UPDATE $this->table_name SET ";
        $flag = 0;
         
        foreach($dados as $campo =>$valor){
            $sql .= $flag == 0 ? "$campo=?" : ",$campo=?";
            $flag =1;
            $arrayValues[] = $valor;
        }
        $sql .="WHERE id= $id";
        $st = $conn->prepare($sql);

        $st->execute($arrayValues);

    }

    public function all(){

        $conn = $this->conn();

        $sql = "SELECT * FROM $this->table_name";

        $st = $conn->prepare($sql);

        $st->execute();

        return $st->fetchAll(PDO::FETCH_CLASS);

    }

    public function destroy($id){

        $conn = $this->conn();

        $sql = "DELETE FROM $this->table_name WHERE id = ?";

        $st = $conn->prepare($sql);

        $st->execute([$id]);

    }

    public function search($dados){

        $campo = $dados['tipo'];
        $valor = $dados['valor'];

        //var_dump($dados);
        //  exit;

        $conn = $this->conn();

        $sql = "SELECT * FROM $this->table_name WHERE $campo LIKE ?";

        $st = $conn->prepare($sql);

        $st->execute(["%$valor%"]);

        return $st->fetchAll(PDO::FETCH_CLASS);

    }

    public function find($id){

        $conn = $this->conn();

        $sql = "SELECT * FROM $this->table_name WHERE id LIKE ?";

        $st = $conn->prepare($sql);

        $st->execute([$id]);

        return $st->fetchObject();

    }


}