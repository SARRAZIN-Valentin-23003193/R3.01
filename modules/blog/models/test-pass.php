<?php
require '../views/HtmlLayout.php';
session_start();
start_page('test');
?>
<?php
$pwd = "projetwebtenrac";
$user = "tenrac45";
$host = "mysql-tenrac45.alwaysdata.net";
$db = "tenrac45_1";

$dbLink = mysqli_connect($host, $user, $pwd)
or die('Erreur de connexion au serveur : ' . mysqli_connect_error());


mysqli_select_db($dbLink, $db)
or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink)
);

// Récupérer les valeurs du formulaire
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
        header('location: ../../../index.php');
    } else {
        $_SESSION['error'] = 'tie hella un zgeg';
        header('location: ../views/authentification.php');
    }

}
else
{
//    start_page('erreur');
    $_SESSION['error'] = 'Mail non trouvé.';
    header('location: ../views/authentification.php');
}
?>