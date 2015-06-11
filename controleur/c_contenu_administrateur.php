<?php

include_once(dirname(__FILE__).'/../modele/m_contenu_administrateur.php');

//si on ajoute un contenu
if(isset($_POST["titre"]) && isset($_POST["description"]) && isset($_POST["coutfixe"])
    && isset($_POST["editeur"]))
{
    //ajout d'une ressource
    if($_POST["type"] == 'r')
    {
        ajouterRessource($conn, $_POST["titre"], $_POST["description"],
            $_POST["coutfixe"],$_POST["editeur"], $_POST["applibase"]);
    }
    //ajout d'une application
    else if(!empty($_POST["coutperiodique"]) || $_POST["coutperiodique"] == 0)
    {
        ajouterApplication($conn, $_POST["titre"], $_POST["description"],
            $_POST["coutfixe"],$_POST["editeur"], $_POST["coutperiodique"]);
    }
    include_once(dirname(__FILE__).'/../vue/v_contenu_administrateur.php');

}
else if (isset($_POST["contenu"]))
{
    include_once(dirname(__FILE__) . '/../modele/m_connexion.php');
    supprimerContenu($conn, $_POST["contenu"]);
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

