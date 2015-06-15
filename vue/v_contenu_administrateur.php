
<h1>Applications</h1>
<table border="1">
    <tr>
        <td width="100pt"><b>Titre</b></td>
        <td width="100pt"><b>Description</b></td>
        <td width="100pt"><b>Cout fixe</b></td>
        <td width="100pt"><b>Editeur</b></td>
        <td width="100pt"><b>Cout Periodique</b></td>
    </tr>
    <?php
    getApplication($conn);
    ?>
</table>
    <br/><br/>

<h1>Ressources</h1>
<table border="1" >
    <tr>
        <td width="100pt"><b>Titre</b></td>
        <td width="100pt"><b>Description</b></td>
        <td width="100pt"><b>Cout fixe</b></td>
        <td width="100pt"><b>Editeur</b></td>
        <td width="100pt"><b>application</b></td>
    </tr>
    <?php
    getRessource($conn);
    ?>
</table>

<br/><br/>
    <a id="mid_title" href="index.php?action=ajouter_contenu">Ajouter un contenu</a>
    <br/><br/>
    <a id="mid_title" href="index.php?action=ajouter_editeur">Ajouter un editeur</a>
    <br/><br/>
    <a id="mid_title" href="index.php?action=ajouter_carte">Accorder une carte</a>
<a class="more" href="index.php" style="margin: 50px;">Retour</a>