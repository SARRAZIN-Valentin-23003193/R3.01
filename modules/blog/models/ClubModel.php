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

    public function fetchClubs($currentPage = 1, $postsPerPage = 5) {
        // Get the total number of posts
        $result = mysqli_query($this->conn, 'SELECT COUNT(*) as count FROM Club');
        $row = mysqli_fetch_assoc($result);
        $totalPosts = (int)$row['count'];

        // Calculate the offset
        $offset = ($currentPage - 1) * $postsPerPage;

        // Fetch the posts for the current page
        $query = 'SELECT Clubid, Nom_C, Adresse_C FROM Club LIMIT ' . $postsPerPage . ' OFFSET ' . $offset;
        $result = mysqli_query($this->conn, $query);

        $clubs = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $clubs[] = $row;
        }

        return [$clubs, $totalPosts];
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

?>
