<?php
require 'utils.inc.php';
require 'modules/blog/models/ajout-tenrac.php';
start_page('Tenracs');
?>
<body>
<div class="login-modal">
    <div class="header">
        <h1> Bienvenue sur la page des Tenracs, ici vous pouvez consulter la liste des membres de l'Ordre</h1>
        <table>
            <?php require 'modules/blog/controllers/recup-tenrac.php'?>
            <tr>
                <th>Nom</th><th>N°Tel</th><th>Mail</th><th>Adresse</th><th>Grade</th><th>Rang</th><th>Titre</th><th>Dignité</th>
            </tr>
            <tr>
                <th>Nom</th>
            </tr>
        </table>
        <form action="ajout-tenrac.php" method="post">
            <label>Nom du tenrac<input type="text" name="nom"></label>
            <label>Numéro de téléphone<input type="text" name="num"></label>
            <label>Mail<input type="text" name="mail"></label>
            <label>Adresse<input type="text" name="adresse"></label>
            <label>Grade
                <select name="grade">
                    <option value="affilie" selected>Affilié</option>
                    <option value="sympathisant">Sympathisant</option>
                    <option value="adhérent">Adhérent</option>
                    <option value="chevalier">Chevalier</option>
                    <option value="dame">Dame</option>
                    <option value="grand_chevalier">Grand Chevalier</option>
                    <option value="haute_dame">Haute Dame</option>
                    <option value="commandeur">Commandeur</option>
                    <option value="grand_croix">Grand'Croix</option>
                </select>
            </label>
            <label>Rang
                <select name="rang">
                    <option value="novice" selected>Novice</option>
                    <option value="compagnon">Compagnon</option>
                </select>
            </label>
            <label>Titre
                <select name="titre">
                    <option value="pasdetitre" selected>Pas de titre</option>
                    <option value="philanthrope">Philanthrope</option>
                    <option value="protecteur">Protecteur</option>
                    <option value="honorable">Honorable</option>
                </select>
            </label>
            <label>Dignité
                <select name="dignite">
                    <option value="pasdedignite" selected>Pas de dignité</option>
                    <option value="maitre">Maître</option>
                    <option value="grand_chancelier">Grand Chancelier</option>
                    <option value="grand_maitre">Grand Maître</option>
                </select>
            </label>
            <button type="submit">envoyer</button>
        </form>
    </div>
</div>
</body>
</html>
