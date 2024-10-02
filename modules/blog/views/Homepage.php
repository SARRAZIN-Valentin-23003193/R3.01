<?php
namespace blog\views;

require 'HtmlLayout.php';

class Homepage {

    function show() : void {
        ob_start();
        ?>
        <main>
            <h3>Bienvenue, chère visiteur, sur notre lieu sacré de rencontre.<br>
                Vous devez vous demander quelle peut être l’objectif de ce site ?</h3>
            <section id="tenrac_presentation">
                <section id="tenrac_description">
                    <h4>La Prophétie des Tenracs</h4>
                    <p>Dans les temps anciens, alors que les vents soufflaient sur les montagnes de fromage fondu, une vision apparut aux sages. Une fusion sacrée, une harmonie parfaite entre le croustillant du tender et la douceur de la raclette. Cette révélation divine donna naissance au premier Tenrac, un miracle gastronomique célébré depuis lors par nos fidèles.</p>
                    <p>Chaque Tenrac est un symbole de la puissance de la communion entre le croustillant et le fondant, entre le Ciel et la Terre. Nos rituels sont simples, mais empreints de solennité : nous nous réunissons en cercle, entourés de nos meilleurs plats, et nous invoquons la Bénédiction du Fromage Fondu, qui unit les âmes à travers les âges.</p>
                    <p>Si votre cœur s’emballe à la simple vue d’un tendre doré ou si votre esprit s’élève lorsque le fromage fond sur votre assiette, c’est que le Tenrac vous a choisi.</p>
                    <p>Venez, rejoignez-nous dans ce festin éternel, et laissez le Tenrac guider vos pas vers une révélation croustillante.</p>
                </section>
                <section id="divine_tenrac_image">
                    <img src="_assets/images/tender_divin_accueil.webp" alt="Tender Divin" id="DivineTender"/>
                    <p><em>La Révélation, 1647, Mickael Martin Nevot</em></p>
                </section>
            </section>
        </main>
<?php
        (new HtmlLayout('Accueil', ob_get_clean()))->show();
    }
}
?>
