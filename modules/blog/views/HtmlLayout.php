<?php
require __DIR__.'/../../../config.php';
/***
 * Start a page
 * @param $title
 * @return void
 * @author Hugo Valente
 */
function start_page($title) {
?>
    <!DOCTYPE html>
<html lang="fr">
<head>
    <title><?php echo $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="_assets/styles/style.css">
</head>
<body>

<?php
}

/***
 * Add header to a page
 * @return void
 * @author Hugo Valente
 */
function addHeader() { ?>
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
                        <li><a href="../../../index.php">Accueil</a></li>
                        <li><a href="structure.php">Clubs</a></li>
                        <li><a href="calendrier.php">Date RDV</a></li>
                        <li><a href="plat.php">Plats</a></li>
                        <li><a href="tenrac.php">Tenrac</a></li>
                        <li><a href="authentification.php">Se connecter</a></li>
                        <li><a href="#">A propos</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
            <img src="_assets/images/logo_tenrac_sans_fond.webp" class="logo_tenrac_header" alt="logo tenrac">
        </section>
        <section class="MainTitle">
            <h1>L'Ordre des Tenracs</h1>
            <h2>Bienvenue sur notre site</h2>
        </section>
        <section>
            <div id="menuToggleLogin">
                <div id="div_menu_login">
                    <input type="checkbox">
                    <img src="_assets/images/login_icon.webp" alt="Login logo" class="logo_login_header"/>
                    <ul id="menuLogin">
                        <li><a>1</a></li>
                        <li><a>2</a></li>
                    </ul>
                </div>
            </div>
        </section>
    </header>
    <?php
}

/***
 * End a page
 * @return void
 * @author Hugo Valente
 */
function end_page() { ?>

</body>
</html>
<?php
}
/***
 * Add footer to a page
 * @return void
 * @author Hugo Valente
 */
function addFooter()
{ ?>

    <footer>
        <p>2024 © Gallou Loic - Garcia Léo - Kanboui Jalil - Marty François - Sarrazin Valentin - Thevenet Antoine - Valente Hugo</p>
    </footer>
    <?php
}

?>



