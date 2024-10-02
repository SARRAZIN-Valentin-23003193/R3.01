<?php
namespace blog\controllers;
use blog\models\Authentification_Model;
use blog\views\Authentification_View;
require_once 'modules/blog/models/Authentification_Model.php';
require_once 'modules/blog/views/Authentification_View.php';
class Authentification_Controller {
    private $userModel; // sert à stocker l'instance du modèle
    private $view; // stocke l'instance de la vue

    public function __construct() {
        $this->userModel = new Authentification_Model(); // Initialisation du modèle
        $this->view = new Authentification_View(); // Initialisation de la vue
    }

    public function execute() : void {
        (new \blog\views\Authentification_View())->show();
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
                ob_start(); // Démarre la bufferisation
                $this->view->show($error); // Affiche la vue avec l'erreur
                echo ob_get_clean(); // Nettoie le tampon de sortie
                //                require 'modules/blog/views/Authentification_View.php';
            }
        } else {
//            require 'modules/blog/views/Authentification_View.php';
            ob_start(); // Démarre la bufferisation
            $this->view->show(); // Affiche la vue
            echo ob_get_clean(); // Nettoie le tampon de sortie
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
?>