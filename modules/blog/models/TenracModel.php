<?php

class TenracModel {
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

    public function recupTenrac($currentPage = 1, $postsPerPage = 5): array {
        // Get the total number of posts
        $stmt = $this->conn->query('SELECT COUNT(*) as count FROM Tenracs');
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $totalPosts = (int)$row['count'];

        // Calculate the offset
        $offset = ($currentPage - 1)*$postsPerPage;

        // Fetch the posts for the current page
        $stmt = $this->conn->prepare('SELECT Nom_T, NumTel, Courriel, Adresse_T, Grade, Titre, Rang, Dignite FROM Tenracs LIMIT :limit OFFSET :offset');
        $stmt->bindValue(':limit', $postsPerPage, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        $tenracs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return [$tenracs, $totalPosts];
    }

    // Méthode pour ajouter un tenracView
    public function ajouterTenrac($nom, $num, $mail, $adresse, $grade, $titre, $rang, $dignite) {
        try {
            // Préparation de la requête d'insertion
            $sql = "INSERT INTO `Tenracs`(`Nom_T`, `NumTel`, `Courriel`, `Adresse_T`, `Grade`, `Titre`, `Rang`, `Dignite`) VALUES (:nom, :num, :mail, :adresse, :grade, :titre, :rang, :dignite)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':num', $num);
            $stmt->bindParam(':mail', $mail);
            $stmt->bindParam(':adresse', $adresse);
            $stmt->bindParam(':grade', $grade);
            $stmt->bindParam(':titre', $titre);
            $stmt->bindParam(':rang', $rang);
            $stmt->bindParam(':dignite', $dignite);
            $stmt->execute();
            echo "Tenrac ajouté avec succès !";
        } catch(PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    // Méthode pour modifier un tenracView
    public function modifierTenrac($idModif, $Nom, $Num, $Mail, $Adresse, $Grade, $Titre, $Rang, $Dignite) {
        try {
            $sql = "UPDATE Tenracs SET Nom_T = :Nom, NumTel = :Num, Courriel = :Mail, Adresse_T = :Adresse, Grade = :Grade, Titre = :Titre, Rang = :Rang, Dignite = :Dignite WHERE Tenracid = :idModif";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':idModif', $idModif);
            $stmt->bindParam(':Nom', $Nom);
            $stmt->bindParam(':Num', $Num);
            $stmt->bindParam(':Mail', $Mail);
            $stmt->bindParam(':Adresse', $Adresse);
            $stmt->bindParam(':Grade', $Grade);
            $stmt->bindParam(':Titre', $Titre);
            $stmt->bindParam(':Rang', $Rang);
            $stmt->bindParam(':Dignite', $Dignite);
            $stmt->execute();
            header('Location: https://tenrac45.alwaysdata.net/modules/blog/views/structure.php/');
        } catch (PDOException $e) {
            echo "Erreur lors de la modification : " . $e->getMessage();
        }
    }

    // Méthode pour supprimer un tenracView
    public function supprimerTenrac($idSup) {
        try {
            $sql = "DELETE FROM Tenracs WHERE Tenracid = :idSup";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':idSup', $idSup);
            $stmt->execute();
            header('Location: https://tenrac45.alwaysdata.net/modules/blog/views/tenrac.php/');
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression : " . $e->getMessage();
        }
    }
}
?>