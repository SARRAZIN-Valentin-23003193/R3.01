<?php
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

function createHeader() { ?>
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
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Clubs</a></li>
                    <li><a href="#">Date RDV</a></li>
                    <li><a href="#">A propos</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </div>
        <img src="logo_tenrac_sans_fond.png" class="logo_tenrac_header" alt="logo tenrac">
    </section>
    <section class="MainTitle">
        <h1>L'Ordre des Tenracs</h1>
        <h2>Bienvenue sur notre site</h2>
    </section>
    <section>
        <img src="login_icon.png" alt="Login logo" class="logo_login_header"/>
    </section>
</header>
<?php
}

function end_page() { ?>

</body>
</html>
<?php
}

?>



