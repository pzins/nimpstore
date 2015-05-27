<?php

//include('modeles/session.php');
//pour faire les session pas besoin ici je crois
//session_start();
require('header.php');
?>
<div id="main">
    <div id="content">
        <div>
        <?php
        //à mettre la connection ici comme ça on pourra l'enlever partout après
        include "modele/connect.php";
        $conn = connexion();
        //On inclut le contrôleur s'il spécifié et s'il existe
        /* $_POST en priorité sur $_GET */
        if (!empty($_POST['action']) && is_file('controleur/c_'.$_POST['action'].'.php')) {
            include('controleur/c_'.$_POST['action'].'.php');
        }
        else if (!empty($_GET['action']) && is_file('controleur/c_'.$_GET['action'].'.php')) {
            include('controleur/c_'.$_GET['action'].'.php');
        }

        pg_close($conn);

        ?>
        </div>
    </div>
    <?php require('menu.php'); ?>
</div>
<?php require('footer.html'); ?>

