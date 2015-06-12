<?php
//cas ou on veut inscrire un nouveau client

if(isset($_POST["login"]) && isset($_POST["mdp"]) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["mail"]))
{
    include_once(dirname(__FILE__) . '/../modele/m_inscription.php');
    if(!verif_login($_POST["login"], $conn))
    {
        echo "Login déjà utilisé";
    }
    else
    {
        session_start ();
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['pwd'] = $_POST['mdp'];
        ajouterClient($conn, $_POST["login"], $_POST["mdp"], $_POST["nom"], $_POST["prenom"], $_POST["mail"]);
        include_once(dirname(__FILE__).'/../modele/m_terminaux_utilisateur.php');
        include_once(dirname(__FILE__) . '/../vue/v_terminaux_utilisateur.php');
    }
}
//cas ou un client se connecte
else if(isset($_POST["login"]) && isset($_POST["password"]))
{
    include(dirname(__FILE__) . '/../modele/m_connexion.php');
    $ident = identification($_POST["login"], $_POST["password"], $conn, 'Client');
    if (!empty($ident)) {
        session_start();
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['pwd'] = $_POST['password'];
        include_once(dirname(__FILE__).'/../modele/m_terminaux_utilisateur.php');
        include_once(dirname(__FILE__) . '/../vue/v_terminaux_utilisateur.php');
    } else {
        echo "<h2>L'identification a echouee</h2>";
    }
}
//cas ou un client s'ajoute un terminal
else if(isset($_POST["numserie"]) && isset($_POST["modele"]))
{
    include_once(dirname(__FILE__) . '/../modele/m_terminaux_utilisateur.php');
    session_start();
    $login = $_SESSION['login'];
    $res = ajouter_terminal($conn, $_POST["numserie"], $_POST["modele"], $login);
    include_once(dirname(__FILE__) . '/../vue/v_terminaux_utilisateur.php');
}
//cas ou un client se supprime un terminal
else if(isset($_POST["terminal"]))
{
    include_once(dirname(__FILE__) . '/../modele/m_terminaux_utilisateur.php');
    session_start();
    $login = $_SESSION['login'];
    $res = supprimer_terminal($conn, $_POST["terminal"]);
    include_once(dirname(__FILE__) . '/../vue/v_terminaux_utilisateur.php');
}else if(isset($_POST["typeAchat"]))
{
    echo "ol";
    include_once(dirname(__FILE__) . '/../modele/m_terminaux_utilisateur.php');
    session_start();
    $login = $_SESSION['login'];
    achatContenu($conn, $_POST["typeAchat"],$login,
        $_POST["achatClient"], $_POST["achatApp"], $_POST["achatRes"]);
}




?>
