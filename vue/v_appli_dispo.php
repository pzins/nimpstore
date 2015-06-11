<h1>Applications Disponibles</h1>
<table border="1">
    <tr>
        <td width="100pt"><b>Num Serie</b></td>
        <td width="100pt"><b>Titre</b></td>
        <td width="100pt"><b>Description</b></td>
        <td width="100pt"><b>Editeur</b></td>
        <td width="100pt"><b>Cout Fixe</b></td>
        <td width="100pt"><b>Cout periodique</b></td>
        <td width="100pt"><b>OS</b></td>
    </tr>
    <?php
        session_start();
        $login = $_SESSION['login'];
        $pwd = $_SESSION['pwd'];
        getAppliDispo($login, $conn);
    ?>
</table>
<br/><br/>

<form action="index.php?action=terminaux_utilisateur" method="POST">
    <p>
        <?php
            echo "<input type='hidden' name='login' value='$login'/>";
            echo "<input type='hidden' name='password' value='$pwd'/>";
        ?>
        <input type="submit" value="Retour"/>
    </p>
</form>
