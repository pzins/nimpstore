<form method="POST" action="index.php?action=contenu_administrateur">
    <?php
    getContenu($conn, $login);
    ?>
    <input type="submit"/>
</form>
