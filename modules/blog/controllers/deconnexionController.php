<?php
session_start();
unset($_SESSION['suid']);
header('location: /index.php');
?>