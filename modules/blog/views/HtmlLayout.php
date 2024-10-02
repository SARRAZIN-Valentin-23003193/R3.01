<?php
require __DIR__.'/../../../config.php';
class HtmlLayout {

private $content;
private $title;

public function __construct($title, $content) {
    $this->title = $title;
    $this->content = $content;
}

public function show() {
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Accueil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('_assets/styles/style.css'); ?>">
    <link rel="icon" href="<?php echo base_url('_assets/images/icons/logo_tenrac_sans_fond.ico'); ?>" type="image/x-icon">
</head>
<body>
<?php
require '_assets/includes/header.php';
?>

<?= $this->content; ?>

<?php
require '_assets/includes/footer.php';
}
}
?>








