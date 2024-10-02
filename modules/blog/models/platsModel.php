<?php
class Plat {
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

    // Méthode pour ajouter un plat
    public function ajouterPlat($plat) {
        try {
            $sql = "INSERT INTO Plat (Nom_P) VALUES (:plat)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':plat', $plat);
            $stmt->execute();
            header('Location: https://tenrac45.alwaysdata.net/modules/blog/views/plat.php/');
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout : " . $e->getMessage();
        }
    }

    // Méthode pour modifier un plat
    public function modifierPlat($idModif, $Platnom) {
        try {
            $sql = "UPDATE Plat SET Nom_P = :Platnom WHERE Plat_id = :idModif";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':idModif', $idModif);
            $stmt->bindParam(':Platnom', $Platnom);
            $stmt->execute();
            header('Location: https://tenrac45.alwaysdata.net/modules/blog/views/plat.php/');
        } catch (PDOException $e) {
            echo "Erreur lors de la modification : " . $e->getMessage();
        }
    }

    // Méthode pour supprimer un plat
    public function supprimerPlat($idSup) {
        try {
            $sql = "DELETE FROM Plat WHERE Plat_id = :idSup";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':idSup', $idSup);
            $stmt->execute();
            header('Location: https://tenrac45.alwaysdata.net/modules/blog/views/plat.php/');
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression : " . $e->getMessage();
        }
    }
}

// Utilisation de la classe Plat

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $plat = new Plat();

    if (isset($_POST['ajouter'])) {
        $nom = $_POST['nomplat'];
        $plat->ajouterPlat($nom);
    } elseif (isset($_POST['modifier'])) {
        $idModif = $_POST['Clubid'];
        $PlatNom = $_POST['PlatNom'];
        $plat->modifierPlat($idModif, $PlatNom);
    } elseif (isset($_POST['supprimer'])) {
        $idSup = $_POST['Plat_id'];
        $plat->supprimerPLat($idSup);
    }
}
?>
