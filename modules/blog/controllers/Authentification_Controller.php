<?php
require_once '../models/Authentification_Model.php';
session_start();
class Authentification_Controller {
    private $userModel; // sert à stocker l'instance du modèle

    public function __construct() {
        $this->userModel = new Authentification_Model(); // Initialisation du modèle
    }

    public function connexion() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $identifiant = $_POST['identifiant'];
            $password = $_POST['password'];

            // Authentification de l'utilisateur
            $user = $this->userModel->test_Pass($identifiant, $password);

            if ($user) {
                // Démarre une session si l'authentification réussit
                session_start();
                $_SESSION['suid'] = session_id();
                header('Location: https://tenrac45.alwaysdata.net/index.php');
                exit();
            } else {
                // Retourne un message d'erreur si la connexion échoue
                $error = "Nom d'utilisateur ou mot de passe incorrect.";
                require '../views/authentification.php';
            }
        } else {
            require '../views/authentification.php';
        }
    }

    public function deconnexion() {
        // Déconnecte l'utilisateur
        session_start();
        session_destroy();
        header('Location: https://tenrac45.alwaysdata.net/index.php');
        exit();
    }
}
$controller = new Authentification_Controller();
if(isset($_SESSION['suid'])) {
    $controller->deconnexion();
} else {
    $controller->connexion();
}
?>