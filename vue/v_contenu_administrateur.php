
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
<table border="1">
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
    <a href="index.php?action=ajouter_contenu">Ajouter une ressource</a>
    <a href="index.php?action=supprimer_contenu">Supprimer une ressource</a>
