<?php

require_once __DIR__ . '/../config/database.php';

class Sujet {

    private $conn;
    private $table_name = "sujet";

    public $numero;
    public $nom;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {

        $query = "INSERT INTO " . $this->table_name . " SET nom=:nom";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nom", $this->nom);
        return $stmt->execute();
    }

    public function readAll() {

        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function update() {

        $query = "UPDATE " . $this->table_name . " SET nom = :nom WHERE numero = :numero";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nom", $this->nom);
        $stmt->bindParam(":numero", $this->numero);
        return $stmt->execute();

    }

    public function delete() {

        $query = "DELETE FROM " . $this->table_name . " WHERE numero = :numero";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":numero", $this->numero);
        return $stmt->execute();

    }


    public function readQuestions() {

        $query = "SELECT * FROM questions WHERE sujet_numero = :numero";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":numero", $this->numero);
        $stmt->execute();
        return $stmt;
    }
    
}
