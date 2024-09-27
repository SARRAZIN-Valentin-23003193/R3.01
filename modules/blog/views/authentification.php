<?php
require 'HtmlLayout.php';
session_start();
start_page('Authentification');
?>
<?php
if(isset($_SESSION['suid'])) {
    header('Location: ../../../index.php');
}
if (isset($_SESSION['error'])) {
    echo $_SESSION['error']; // Afficher le message d'erreur
    unset($_SESSION['error']); // Supprimer le message après l'affichage
}
?>
    <form action="../models/test-pass.php" method="post" >
        <label for="identifiant">Identifiant :</label>
        <input type="text" id="identifiant" name="identifiant" required>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        <br><br>

        <input type="submit" name="action" value="mailer">
    </form>

<?php
end_page();
?>