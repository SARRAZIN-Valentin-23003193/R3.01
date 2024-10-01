<?php
require 'connectDataBaseModel.php';
session_start();
?>
<?php
    $dbLink = connectDB();
    $identifiant = $_POST['identifiant'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Utilisateur WHERE mail = ?";
    $stmt = $dbLink->prepare($sql);
    $stmt->bind_param("s", $identifiant);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();
        $hashPassword = $row['mdp'];
        if (password_verify($password, $hashPassword)) {
            $_SESSION['suid'] = session_id();
            header('location: https://tenrac45.alwaysdata.net/index.php');
        } else {
            $_SESSION['error'] = 'Mot de passe incorrect';
            header('location: /home/tenrac45/www/modules/blog/views/authentification.php');
        }

    }
    else
    {
        $_SESSION['error'] = 'Mail non trouvé.';
        header('location: /home/tenrac45/www/modules/blog/views/authentification.php');
    }
?>
