<h1>Statistiques</h1>


<h2>Top 5 applications les plus achetées</h2>
<table border="1">
    <tr>
        <td width="100pt"><b>Titre</b></td>
        <td width="100pt"><b>Description</b></td>
        <td width="100pt"><b>Cout fixe</b></td>
        <td width="100pt"><b>Editeur</b></td>
        <td width="100pt"><b>Nombre d'achat</b></td>
        <td width="100pt"><b>Gain total</b></td>
    </tr>
    <?php
        getTop5($conn);
    ?>
</table>