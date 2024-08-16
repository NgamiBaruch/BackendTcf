<?php
require_once __DIR__. '/../models/Question.php';

class QuestionController {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Méthode pour créer une nouvelle question

    public function create($sujet_numero, $proposition1, $proposition2, $proposition3, $proposition4) {
        $question = new Question($this->conn);
        $question->sujet_numero = $sujet_numero;
        $question->proposition1 = $proposition1;
        $question->proposition2 = $proposition2;
        $question->proposition3 = $proposition3;
        $question->proposition4 = $proposition4;
        
        if ($question->create()) {
            header("Location: index.php?action=showQuestions&numero=$sujet_numero");
        }
    }

    // Méthode pour mettre à jour une question existante

    public function update($id, $sujet_numero, $proposition1, $proposition2, $proposition3, $proposition4) {
        $question = new Question($this->conn);
        $question->id = $id;
        $question->sujet_numero = $sujet_numero;
        $question->proposition1 = $proposition1;
        $question->proposition2 = $proposition2;
        $question->proposition3 = $proposition3;
        $question->proposition4 = $proposition4;
        
        if ($question->update()) {
            header("Location: index.php?action=showQuestions&numero=$sujet_numero");
        }
    }


    // Méthode pour supprimer une question


    public function delete($id, $sujet_numero) {
        $question = new Question($this->conn);
        $question->id = $id;
        
        if ($question->delete()) {
            header("Location: index.php?action=showQuestions&numero=$sujet_numero");
        }

    }


    // Méthode pour afficher les questions d'un sujet

    public function showQuestions($sujet_numero) {
        $question = new Question($this->conn);
        $questions = $question->getBySujet($sujet_numero);
        require_once __DIR__ . '/../views/liste_questions.php';
    }

}
