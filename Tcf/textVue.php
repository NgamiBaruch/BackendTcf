<?php
require_once 'config/database.php';
require_once 'controllers/SujetController.php';

$database = new Database();
$db = $database->getConnection();

$controller = new SujetController($db);

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->create($_POST['nom']);
        } else {
            require_once 'views/form_sujets.php';
        }
        break;
    case 'update':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->update($_POST['numero'], $_POST['nom']);
        } else {
            // Assuming $sujet is fetched here
            $numero = $_GET['numero'];
            $stmt = $controller->showQuestions($numero);
            $sujet = $stmt->fetch(PDO::FETCH_ASSOC);
            require_once 'views/form_sujets.php';
        }
        break;
    case 'delete':
        $controller->delete($_GET['numero']);
        break;
    case 'showQuestions':
        $controller->showQuestions($_GET['numero']);
        break;
    default:
        $controller->index();
        break;
}
