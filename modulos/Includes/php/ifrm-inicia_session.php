<?php
session_start();
if (empty($_SESSION['SISTEMA'])) {
   header('Location: ../../../index.php');
}
?>
        

