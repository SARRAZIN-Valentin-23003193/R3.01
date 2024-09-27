<?php
function connectDB(){
    $host = 'mysql-gallou.alwaysdata.net';
    $user = 'gallou';
    $pwd = 'Bluestorm13.';
    $db = 'gallou_bd_test';

//Verifie la connection
    $dbLink = mysqli_connect($host, $user, $pwd)
    or die('Erreur de connexion au serveur : ' . mysqli_connect_error());

//Choix de la base
    mysqli_select_db($dbLink , $db)
    or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink)
    );
    return $dbLink;
}

function drawBloc(){
    $dbLink = connectDB();
    $result = mysqli_query($dbLink, 'SELECT COUNT(*) as count FROM POSTS');
    $row = mysqli_fetch_assoc($result);
    $count = (int)$row['count'];

    $i = 1;
    while($i < ($count+1)) {
        $qtitre = 'SELECT TITRE FROM POSTS WHERE IdPost = ' . $i;
        $titreResult = mysqli_query($dbLink, $qtitre);
        $titreRow = mysqli_fetch_assoc($titreResult);
        $titre = $titreRow['TITRE'];

        $qlieu = 'SELECT LIEU FROM POSTS WHERE IdPost = ' . $i;
        $lieuResult = mysqli_query($dbLink, $qlieu);
        $lieuRow = mysqli_fetch_assoc($lieuResult);
        $lieu = $lieuRow['LIEU'];

        $qtexte = 'SELECT TEXTE FROM POSTS WHERE IdPost = ' . $i;
        $texteResult = mysqli_query($dbLink, $qtexte);
        $texteRow = mysqli_fetch_assoc($texteResult);
        $texte = $texteRow['TEXTE'];

        $i++;

        initBloc($titre, $lieu, $texte);
    }
}

//Récupère le résultat de la requête

function initBloc($titre, $lieu, $texte){
    ?>

    <section class="bloc">
        <h2 class="titre"><?php echo(string) $titre; ?></h2>
        <p class="lieu"><?php echo(string) $lieu; ?></p>
        <p class="texte"><?php echo(string) $texte; ?></p>
        <section class="boutonfin">
            <button class="boutonsuprr">Supprimer</button>
            <button class="boutonmodif">Modifier</button>
        </section>
    </section>
    <?php
}
?>
