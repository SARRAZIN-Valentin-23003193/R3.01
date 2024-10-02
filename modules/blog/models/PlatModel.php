<?php

class PlatModel {
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

    public function fetchPlat($currentPage = 1, $postsPerPage = 5): array {
        // Get the total number of posts
        $stmt = $this->conn->query('SELECT COUNT(*) as count FROM Plat');
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $totalPosts = (int)$row['count'];

        // Calculate the offset
        $offset = ($currentPage - 1) * $postsPerPage;

        // Fetch the posts for the current page
        $stmt = $this->conn->prepare('
                SELECT Plat.Plat_id, Plat.Nom_P, Sauce_Accompagnement.Nom_S, Ingredient.Nom_I, Accompagnement.Nom_Accomp
                FROM Plat
                JOIN Accompagne ON Plat.Plat_id = Accompagne.Plat_id
                JOIN Accompagnement ON Accompagne.Accomp_id = Accompagnement.Accomp_id
                JOIN Sauce ON Plat.Plat_id = Sauce.Plat_id
                JOIN Sauce_Accompagnement ON Sauce.Sauce_id = Sauce_Accompagnement.Sauce_id
                JOIN Ingredient ON Sauce_Accompagnement.Ingredient_id = Ingredient.Ingredient_id LIMIT :limit OFFSET :offset');
        $stmt->bindValue(':limit', $postsPerPage, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        $plats = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return [$plats, $totalPosts];
    }
}

?>
