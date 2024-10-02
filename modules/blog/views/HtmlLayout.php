<?php

namespace blog\views;

require __DIR__.'/../../../config.php';


class HtmlLayout {

    private $content;
    private $title;

    public function __construct($title, $content) {
        $this->title = $title;
        $this->content = $content;
    }

    public function show() : void {
        ?>

        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <title><?php echo $this->title ?></title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta charset="utf-8">
            <link rel="stylesheet" href="<?php echo base_url('_assets/styles/style.css'); ?>">
            <link rel="icon" href="<?php echo base_url('_assets/images/icons/logo_tenrac_sans_fond.ico'); ?>" type="image/x-icon">
        </head>
        <body>
        <header>
            <section>
                <!-- https://medium.com/@mateus2050/hamburguer-menu-html-and-css-only-c06364fa9bfd -->
                <div id="menuToggle">
                    <input type="checkbox" />
                    <span></span>
                    <span></span>
                    <span></span>
                    <div id="div_menu">
                        <ul id="menu">

                            <li><a href="?action=homepage">Accueil</a></li>
                            <li><a href="?action=clubs">Clubs</a></li>
                            <li><a href="?action=calendrier">Date RDV</a></li>
                            <li><a href="?action=plats">Plats</a></li>
                            <li><a href="?action=tenrac">Tenrac</a></li>
                        </ul>
                    </div>
                </div>
                <img src="<?php echo base_url('_assets/images/logo_tenrac_sans_fond.webp');?>" class="logo_tenrac_header" alt="logo tenrac">
            </section>
            <section class="MainTitle">
                <h1>L'Ordre des Tenracs</h1>
                <h2>Bienvenue sur notre site</h2>
            </section>
            <section>
                <?php
                if(isset($_SESSION['suid'])) {
                    ?><a href="<?php echo base_url('modules/blog/controllers/deconnexionController.php'); ?>">
                    <img  src="<?php echo base_url('_assets/images/login_icon.webp');?>" alt="Login logo"  class="logo_login_header"/>
                    Se déconnecter</a>
                    <?php
                } else {
                    ?><a href="<?php echo base_url('modules/blog/views/authentification.php'); ?>" >
                    <img  src="<?php echo base_url('_assets/images/login_icon.webp');?>" alt="Login logo"  class="logo_login_header"/>
                    Se connecter</a>
                    <?php
                }
                ?>
            </section>
        </header>

        <?= $this->content; ?>

        <footer>
            <p>2024 © Gallou Loic - Garcia Léo - Kanboui Jalil - Marty François - Sarrazin Valentin - Thevenet Antoine - Valente Hugo</p>
        </footer>
        </body>
        </html>
        <?php
    }
}
?>









