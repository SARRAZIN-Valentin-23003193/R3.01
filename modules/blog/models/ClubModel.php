<?php
class ClubModel {
    private $host = "mysql-tenrac45.alwaysdata.net";
    private $username = "tenrac45";
    private $password = "projetwebtenrac";
    private $dbname = "tenrac45_1";
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }
    }

    // Méthode pour ajouter un club
    public function ajouterClub($nom, $lieux) {
        try {
            $sql = "INSERT INTO Club (Nom_C, Adresse_C, Codepere) VALUES (:nom, :lieux, 1)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':lieux', $lieux);
            $stmt->execute();
            header('Location: https://tenrac45.alwaysdata.net/modules/blog/views/structure.php/');
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout : " . $e->getMessage();
        }
    }

    // Méthode pour modifier un club
    public function modifierClub($idModif, $ClubAdresse, $ClubNom) {
        try {
            $sql = "UPDATE Club SET Nom_C = :ClubNom, Adresse_C = :ClubAdresse WHERE Clubid = :idModif";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':idModif', $idModif);
            $stmt->bindParam(':ClubAdresse', $ClubAdresse);
            $stmt->bindParam(':ClubNom', $ClubNom);
            $stmt->execute();
            header('Location: https://tenrac45.alwaysdata.net/modules/blog/views/structure.php/');
        } catch (PDOException $e) {
            echo "Erreur lors de la modification : " . $e->getMessage();
        }
    }

    // Méthode pour supprimer un club
    public function supprimerClub($idSup) {
        try {
            $sql = "DELETE FROM Club WHERE Clubid = :idSup";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':idSup', $idSup);
            $stmt->execute();
            header('Location: https://tenrac45.alwaysdata.net/modules/blog/views/structure.php/');
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression : " . $e->getMessage();
        }
    }
}

// Utilisation de la classe Club

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $club = new ClubModel();

    if (isset($_POST['ajouter'])) {
        $nom = $_POST['nomclub'];
        $lieux = $_POST['adressclub'];
        $club->ajouterClub($nom, $lieux);
    } elseif (isset($_POST['modifier'])) {
        $idModif = $_POST['Clubid'];
        $ClubNom = $_POST['ClubNom'];
        $ClubAdresse = $_POST['ClubAdresse'];
        $club->modifierClub($idModif, $ClubAdresse, $ClubNom);
    } elseif (isset($_POST['supprimer'])) {
        $idSup = $_POST['Clubid'];
        $club->supprimerClub($idSup);
    }
}
?>
