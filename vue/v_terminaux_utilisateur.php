
<h1>Terminaux</h1>
<table border="1">
    <tr>
        <td width="100pt"><b>Serie</b></td>
        <td width="100pt"><b>Designation</b></td>
        <td width="100pt"><b>Constructeur</b></td>
        <td width="100pt"><b>Version</b></td>
        <td width="100pt"><b>Systeme d'exploitation</b></td>
    </tr>
    <?php
    $login = $_SESSION['login'];
    getTerminal($login, $conn);
    ?>
</table>
    <br/><br/>
    <a href="index.php?action=ajouter_terminal">Ajouter un terminal</a>
    <a href="index.php?action=supprimer_terminal">Supprimer un terminal</a>
