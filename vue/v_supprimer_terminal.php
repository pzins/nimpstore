<form method="POST" action="index.php?action=terminaux_utilisateur">
<?php
    session_start();
    $login = $_SESSION['login'];
    getNumserie($conn, $login);
    ?>
    <input type="submit"/>
</form>
