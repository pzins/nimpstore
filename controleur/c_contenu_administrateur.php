<?php

include_once(dirname(__FILE__).'/../modele/m_contenu_administrateur.php');

//si on ajoute un contenu
if(isset($_POST["type"]))
{
    if(isset($_POST["titre"]) && isset($_POST["description"]) && isset($_POST["coutfixe"])
        && isset($_POST["editeur"]))
    {
        //ajout d'une ressource
        if ($_POST["type"] == 'r') {
            $id = ajouterRessource($conn, $_POST["titre"], $_POST["description"],
                $_POST["coutfixe"], $_POST["editeur"], $_POST["applibase"]);
            ajouterContenuDispo($conn, $id, $_POST["os"]);
        } //ajout d'une application
        else if (!empty($_POST["coutperiodique"]) || $_POST["coutperiodique"] == 0) {
            $id = ajouterApplication($conn, $_POST["titre"], $_POST["description"],
                $_POST["coutfixe"], $_POST["editeur"], $_POST["coutperiodique"]);
            ajouterContenuDispo($conn, $id, $_POST["os"]);

        }
        include_once(dirname(__FILE__) . '/../vue/v_contenu_administrateur.php');
    }
} else if (isset($_POST["contact"]) && isset($_POST["nom"]) && isset($_POST["url"])){
    if(!ajouterEditeur($conn, $_POST["nom"], $_POST["contact"], $_POST["url"])){
        echo "<h2>Erreur dans l'ajout : nom deja existant ou URL non valide</h2>";
        include_once(dirname(__FILE__).'/../vue/v_contenu_administrateur.php');
    }
}
else
{
    include_once(dirname(__FILE__) . '/../modele/m_connexion.php');
    $ident = identification($_POST["login"], $_POST["password"], $conn, 'comptesadministrateurs');
    if (!empty($ident)) {
        session_start();
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['pwd'] = $_POST['password'];

        include_once(dirname(__FILE__).'/../vue/v_contenu_administrateur.php');

    }
    else {
        echo "<h2>L'identification a echouee</h2>";
    }
}
?>

