<?php
require_once __DIR__ . '/../models/Sujet.php';
require_once __DIR__. '/../models/Question.php';

class SujetController {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }



    public function index() {
        $sujet = new Sujet($this->conn);
        $stmt = $sujet->readAll();
        $sujets = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require_once __DIR__ . '/../views/liste_sujets.php';
    }


    /*public function index() {
        $sujets = $this->getAllSujets();
        require_once __DIR__ . '/../views/liste_sujets.php';
    }
    
    public function getAllSujets() {
        $query = "SELECT * FROM sujets";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }*/
    



    public function create($nom) {
        $sujet = new Sujet($this->conn);
        $sujet->nom = $nom;
        if ($sujet->create()) {
            header("Location: index.php?action=index");
        }
    }

    //Modifier un sujet

    public function update($numero, $nom) {
        $sujet = new Sujet($this->conn);
        $sujet->numero = $numero;
        $sujet->nom = $nom;
        if ($sujet->update()) {
            header("Location: index.php?action=index");
        }
    }

    //Supprimer un sujet

    public function delete($numero) {
        $sujet = new Sujet($this->conn);
        $sujet->numero = $numero;
        if ($sujet->delete()) {
            header("Location: index.php?action=index");
        }
    }

    //Afficher questions d un sujet

    public function showQuestions($numero) {
        $sujet = new Sujet($this->conn);
        $sujet->numero = $numero;
        $stmt = $sujet->readQuestions();
        $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require_once __DIR__ . '/../views/liste_questions.php';
    }
}
