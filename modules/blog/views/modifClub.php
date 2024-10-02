<?php
require __DIR__ . '/HtmlLayout.php';

start_page("L'ordre des tenracs");
addHeader();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $idModif = $_POST['Clubid'];
    $ClubNom = $_POST['ClubNom'];
    $ClubAdresse = $_POST['ClubAdresse'];

}
?>
    <form method="POST" action="../../controllers/modif-club.php">
        <input type="hidden" name="Clubid" value="<?php echo $_GET['id']; ?>">

        <label for="ClubNom">Nom du club :</label>
        <input type="text" id="ClubNom" name="ClubNom" value="<?php echo $ClubNom; ?>" required>

        <label for="ClubAdresse">Adresse du club :</label>
        <input type="text" id="ClubAdresse" name="ClubAdresse" value="<?php echo $ClubAdresse; ?>" required>
        <button type="submit">Modifier</button>
    </form>

<?php

addFooter();
end_page();

?>