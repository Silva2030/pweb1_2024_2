<?php

class db {

    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $port = "3307";
    private $dbname ="db_pweb1_2024_2_blog";

    public function __construct(){
        $this->conn();
    } 
public function conn(){
    

        try{
            $conn = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname",
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
        $conn = $this->com();
        
        $sql = "INSERT INTO categoria (nome) VALUES (?)";

        $st = $conn->prepare($sql);

        $st->execute([$dados['nome']]);
    }

    public function all(){
        $conn = $this->com();
        
        $sql = "SELECT * FROM categoria";

        $st = $conn->prepare($sql);

        $st->execute();

        return $st->fethALL(PDO::FETCH_CLASS);
    }
}