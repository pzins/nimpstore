<form method="POST" action="index.php?action=terminaux_utilisateur">
<?php
    session_start();
    $login = $_SESSION['login'];
    getNumserie($conn, $login);
    ?>
    <input class="btn" type="submit"/>
</form>
