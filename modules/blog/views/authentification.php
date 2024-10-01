<?php
require __DIR__ . '/HtmlLayout.php';
start_page("L'ordre des tenracs");
addHeader();
?>
<?php
if(isset($_SESSION['suid'])) {
    header('Location: /home/tenrac45/www/index.php');
}
if (isset($_SESSION['error'])) {
    echo $_SESSION['error']; // Afficher le message d'erreur
    unset($_SESSION['error']); // Supprimer le message après l'affichage
}
?>
<form action="" method="post" >
    <label for="identifiant">Identifiant :</label>
    <input type="text" id="identifiant" name="identifiant" required>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required>
    <br><br>

    <input type="submit" name="action" value="mailer">
</form>

<?php
addFooter();
end_page();

?>
