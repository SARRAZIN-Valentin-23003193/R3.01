<?php
require 'HtmlLayout.php';
require '../models/ajout-tenrac.php';
require '../controllers/recup-tenrac.php';
start_page('Tenracs');
addHeader();
?>
<body>
<div class="login-modal">
    <div class="header">
        <h1> Bienvenue sur la page des Tenracs, ici vous pouvez consulter la liste des membres de l'Ordre</h1>
        <table id="table">
            <tr>
                <th class="nom">Nom</th><th class="num">N°Tel</th><th class="mail">Mail</th><th class="adresse">Adresse</th><th class="grade">Grade</th><th class="rang">Rang</th><th class="titre">Titre</th><th class="dignite">Dignité</th>
            </tr>
            <?php
            $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $tenracsPerPage = 10;
            insertLigne($currentPage, $tenracsPerPage);
            ?>
        </table>
        <form action="../models/ajout-tenrac.php" method="post">
            <label>Nom du tenrac<input type="text" name="nom"></label>
            <label>Numéro de téléphone<input type="text" name="num"></label>
            <label>Mail<input type="text" name="mail"></label>
            <label>Adresse<input type="text" name="adresse"></label>
            <label>Grade
                <select name="grade">
                    <option value="Affilié" selected>Affilié</option>
                    <option value="Sympathisant">Sympathisant</option>
                    <option value="Adhérent">Adhérent</option>
                    <option value="Chevalier">Chevalier</option>
                    <option value="Dame">Dame</option>
                    <option value="Grand chevalier">Grand Chevalier</option>
                    <option value="Haute dame">Haute Dame</option>
                    <option value="Commandeur">Commandeur</option>
                    <option value="Grand Croix">Grand'Croix</option>
                </select>
            </label>
            <label>Rang
                <select name="rang">
                    <option value="Novice" selected>Novice</option>
                    <option value="Compagnon">Compagnon</option>
                </select>
            </label>
            <label>Titre
                <select name="titre">
                    <option value="Pas de titre" selected>Pas de titre</option>
                    <option value="Philanthrope">Philanthrope</option>
                    <option value="Protecteur">Protecteur</option>
                    <option value="Honorable">Honorable</option>
                </select>
            </label>
            <label>Dignité
                <select name="dignite">
                    <option value="Pas de dignite" selected>Pas de dignité</option>
                    <option value="Maitre">Maître</option>
                    <option value="Grand Chancelier">Grand Chancelier</option>
                    <option value="Grand Maitre">Grand Maître</option>
                </select>
            </label>
            <button type="submit">Ajouter le Tenrac</button>
        </form>
    </div>
</div>
</body>
</html>
<?php
addFooter();
end_page();

?>