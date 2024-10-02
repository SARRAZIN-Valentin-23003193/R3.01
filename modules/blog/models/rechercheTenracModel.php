<?php
require 'connectDataBaseModel.php';
require 'tenracModel.php';
?>
<?php
$dbLink = connectDB();
$recherche = $_POST['recherche'];

$sql = "SELECT *
        FROM Tenracs
        WHERE Code_T LIKE '%$recherche%'
        OR Nom_T LIKE '%$recherche%'
        OR Courriel LIKE '%$recherche%'
        OR NumTel LIKE '%$recherche%'
        OR Adresse_T LIKE '%$recherche%'
        OR Grade LIKE '%$recherche%'
        OR Titre LIKE '%$recherche%'
        OR Rang LIKE '%$recherche%'
        OR Dignite LIKE '%$recherche%'";
$stmt = $dbLink->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

while ($row = mysqli_fetch_assoc($result)) {
    $nom = $row['Nom_T'];
    $num = $row['NumTel'];
    $mail = $row['Courriel'];
    $adresse = $row['Adresse_T'];
    $grade = $row['Grade'];
    $titre = $row['Titre'];
    $rang = $row['Rang'];
    $dignite = $row['Dignite'];

    initLigne($nom, $num, $mail, $adresse, $grade, $titre, $rang, $dignite);
}
?>