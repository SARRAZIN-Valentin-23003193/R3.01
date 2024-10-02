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

    // Méthode pour ajouter un tenrac
    public function ajouterTenrac($nom, $num, $mail, $adresse, $grade, $titre, $rang, $dignite) {
        // Connexion à la base de données (adapter les valeurs de connexion)
        $host = 'mysql-tenrac45.alwaysdata.net';
        $dbname = 'tenrac45_1';
        $username = 'tenrac45';
        $password = 'projetwebtenrac';

        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Préparation de la requête d'insertion
            $sql = "INSERT INTO Tenracs (Nom_T, NumTel, Courriel, Adresse_T, Grade, Titre, Rang, Dignite) VALUES (:nom, :num, :mail, :adresse, :grade, :titre, :rang, :dignite)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':num', $num);
            $stmt->bindParam(':mail', $mail);
            $stmt->bindParam(':adresse', $adresse);
            $stmt->bindParam(':grade', $grade);
            $stmt->bindParam(':titre', $titre);
            $stmt->bindParam(':rang', $rang);
            $stmt->bindParam(':dignite', $dignite);

            // Exécuter la requête
            $stmt->execute();
            // echo "Tenrac ajouté avec succès !";
        } catch(PDOException $e) {
            // echo "Erreur";
        }
        header('location:https://tenrac45.alwaysdata.net/modules/blog/views/tenrac.php');
    }

    // Méthode pour modifier un tenrac
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

    // Méthode pour supprimer un tenrac
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

// Utilisation de la classe Club

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tenrac = new TenracModel();

    if (isset($_POST['ajouter'])) {
        $nom = $_POST['nom'];
        $num = $_POST['num'];
        $mail = $_POST['mail'];
        $adresse = $_POST['adresse'];
        $grade = $_POST['grade'];
        $titre = $_POST['titre'];
        $rang = $_POST['rang'];
        $dignite = $_POST['dignite'];
        $tenrac->ajouterTenrac($nom, $num, $mail, $adresse, $grade, $titre, $rang, $dignite);
    } elseif (isset($_POST['modifier'])) {
        $idModif = $_POST['Tenracid'];
        $Nom = $_POST['Nom'];
        $Num = $_POST['Num'];
        $Mail = $_POST['Mail'];
        $Adresse = $_POST['Adresse'];
        $Grade = $_POST['Grade'];
        $Titre = $_POST['Titre'];
        $Rang = $_POST['Rang'];
        $Dignite = $_POST['Dignite'];
        $tenrac->modifierTenrac($idModif, $Nom, $Num, $Mail, $Adresse, $Grade, $Titre, $Rang, $Dignite);
    } elseif (isset($_POST['supprimer'])) {
        $idSup = $_POST['Tenracid'];
        $tenrac->supprimerTenrac($idSup);
    }
}
?>