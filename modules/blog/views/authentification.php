<?php
require __DIR__ . '/HtmlLayout.php';
require_once '../controllers/Authentification_Controller.php';
start_page("L'ordre des tenracs");
addHeader();
if (isset($error)): ?>
    <p style="color: red;"><?php echo $error; ?></p>
<?php endif; ?>
<form action="../controllers/Authentification_Controller.php" method="post" >
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
