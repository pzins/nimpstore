
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
    <a id="mid_title" href="index.php?action=ajouter_terminal">Ajouter un terminal</a>
<br/><br/>
    <a id="mid_title" href="index.php?action=supprimer_terminal">Supprimer un terminal</a>
<br/><br/>
<a id="mid_title" href="index.php?action=appli_dispo">Applications Disponibles</a>
<br/><br/>
<a id="mid_title" href="index.php?action=achat_utilisateur">Acheter</a>

<br/><br/><br/>

<h1>Historique Achat</h1>
<table border="1">
    <tr>
        <td width="100pt"><b>Date achat</b></td>
        <td width="100pt"><b>Montant</b></td>
        <td width="100pt"><b>Destinataire</b></td>
        <td width="100pt"><b>Numéro Carte</b></td>
    </tr>
    <?php
        $login = $_SESSION['login'];
        getAchat($conn, $login);
    ?>
</table>

<br/><br/><br/>

<h1>Historique Installation</h1>
<table border="1">
    <tr>
        <td width="100pt"><b>Contenu</b></td>
        <td width="100pt"><b>Terminal</b></td>
    </tr>
    <?php
    $login = $_SESSION['login'];
    getHistoInstallation($conn, $login);
    ?>
</table>