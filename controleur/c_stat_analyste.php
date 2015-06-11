<?php
include_once(dirname(__FILE__).'/../modele/m_stat_analyste.php');

if(isset($_POST["login"]) && isset($_POST["password"])) {
    include_once(dirname(__FILE__) . '/../modele/m_connexion.php');
    $ident = identification($_POST["login"], $_POST["password"], $conn, 'comptesanalystes');
    if (!empty($ident)) {
        session_start();
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['pwd'] = $_POST['password'];
        include_once(dirname(__FILE__) . '/../vue/v_stat_analyste.php');
    }else
    {
        echo "<h2>L'identification a echouee</h2>";
    }
}

?>