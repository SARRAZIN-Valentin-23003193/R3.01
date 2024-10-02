<?php
//Appel du modèle TenracModel
require '../models/TenracModel.php';

class TenracController {
    private $tenracModel; //Stock le modèle
    //private $nom; Fait ça

    public function __construct(){
        $this->tenracModel = new TenracModel(); //Initialise le modèle
    }

    public function ajoutTenrac() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tenrac = new TenracModel();

            if (isset($_POST['ajouter'])) {
                $nom = $_POST['nom'];
                $num = $_POST['num'];
                $mail = $_POST['mail'];
                $adresse = $_POST['adresse'];
                $grade = $_POST['grade'];
                $titre = $_POST['titre'];
                $rang = $_POST['rang'];
                $dignite = $_POST['dignite'];
                $tenrac->ajouterTenrac($nom, $num, $mail, $adresse, $grade, $titre, $rang, $dignite);
            }
        }
    }

    public function modifierTenrac() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tenrac = new TenracModel();

            if (isset($_POST['modifier'])) {
                $idModif = $_POST['Tenracid'];
                $Nom = $_POST['Nom'];
                $Num = $_POST['Num'];
                $Mail = $_POST['Mail'];
                $Adresse = $_POST['Adresse'];
                $Grade = $_POST['Grade'];
                $Titre = $_POST['Titre'];
                $Rang = $_POST['Rang'];
                $Dignite = $_POST['Dignite'];
                $tenrac->modifierTenrac($idModif, $Nom, $Num, $Mail, $Adresse, $Grade, $Titre, $Rang, $Dignite);
            }
        }
    }

    public function supprimerTenrac() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tenrac = new TenracModel();

            if (isset($_POST['supprimer'])) {
                $idSup = $_POST['Tenracid'];
                $tenrac->supprimerTenrac($idSup);
            }
        }
    }


    public function afficherTenrac($nom, $num, $mail, $adresse, $grade, $titre, $rang, $dignite) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer les valeurs du formulaire
            $nom = $_POST['nomclub'];
            $lieux = $_POST['adressclub'];
        }
    }
    // Utilisation de la classe TenracModel


}
?>


    /*function initLigne($nom, $num, $mail, $adresse, $grade, $titre, $rang, $dignite){
    <table class="tableau">
        <tr>
            <th class="nom"><?php echo $nom; ?></th>
<th class="num"><?php echo $num; ?></th>
<th class="mail"><?php echo $mail; ?></th>
<th class="adresse"><?php echo $adresse; ?></th>
<th class="grade"><?php echo $grade; ?></th>
<th class="titre"><?php echo $titre; ?></th>
<th class="rang"><?php echo $rang; ?></th>
<th class="dignite"><?php echo $dignite; ?></th>
</tr>
</table>
}*/
}

