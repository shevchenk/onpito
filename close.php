<?php
    session_start();
    unset($_SESSION['SISTEMA']);
    session_unset();
    session_destroy();
    header('Location: index.php');
?>
