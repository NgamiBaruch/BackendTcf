<?php

require_once __DIR__ . '/../config/database.php';

class Question {
    private $conn;
    private $table_name = "questions";

    public $id;
    public $sujet_numero;
    public $proposition1;
    public $proposition2;
    public $proposition3;
    public $proposition4;

    public function __construct($db) {

        $this->conn = $db;
    }

    public function create() {

        $query = "INSERT INTO " . $this->table_name . " SET sujet_numero=:sujet_numero, proposition1=:proposition1, proposition2=:proposition2, proposition3=:proposition3, proposition4=:proposition4";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":sujet_numero", $this->sujet_numero);
        $stmt->bindParam(":proposition1", $this->proposition1);
        $stmt->bindParam(":proposition2", $this->proposition2);
        $stmt->bindParam(":proposition3", $this->proposition3);
        $stmt->bindParam(":proposition4", $this->proposition4);
        return $stmt->execute();
    }

    public function update() {

        $query = "UPDATE " . $this->table_name . " SET proposition1 = :proposition1, proposition2 = :proposition2, proposition3 = :proposition3, proposition4 = :proposition4 WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":proposition1", $this->proposition1);
        $stmt->bindParam(":proposition2", $this->proposition2);
        $stmt->bindParam(":proposition3", $this->proposition3);
        $stmt->bindParam(":proposition4", $this->proposition4);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }

    public function delete() {

        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }
    
}
