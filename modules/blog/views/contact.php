<?php

require __DIR__ . '/HtmlLayout.php';

start_page('Contact');
addHeader();
?>

<!-- Ajout du css de la page -->
<link href="" rel="stylesheet">

<form action="mail-sending.php" method="post">

    <label for="prenom">Prénom</label>
    <input id="prenom" type="text" name="prenom">
    <label for="nom">Nom</label>
    <input id="nom" type="text" name="nom">
    <br>
    <label for="email">Mail</label>
    <input id="email" type="email" name="email">
    <br>
    <label for="contenu">Message</label>
    <textarea id="contenu" name="impression" rows="5" cols="50" placeholder="Donnez votre avis !"></textarea>
    <br>
    <input type="submit" value="Envoyer">
</form>

<?php
addFooter();
?>
