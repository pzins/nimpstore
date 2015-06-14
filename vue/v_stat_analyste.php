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

<br/><br/><br/>

<h2>Application et ressources les plus installées</h2>
<table border="1">
    <tr>
        <td width="100pt"><b>Titre</b></td>
        <td width="100pt"><b>Description</b></td>
        <td width="100pt"><b>Nombre d'installations</b></td>
    </tr>
    <?php
    getNbInstallation($conn);
    ?>
</table>


<br/><br/><br/>
<h2>Profit par editeur</h2>
<table border="1">
    <tr>
        <td width="100pt"><b>Nom</b></td>
        <td width="100pt"><b>Contact</b></td>
        <td width="100pt"><b>URL</b></td>
        <td width="100pt"><b>Profit</b></td>
        <td width="100pt"><b>Nombre de vente</b></td>
    </tr>
    <?php
        getInfoEditeur($conn);
    ?>
</table>




<br/><br/><br/>
<h2>Profit de la plateforme : </h2>
<h3><?php  echo getProfit($conn); ?>
</h3>

<br/><br/><br/>

<h2>Profit du service editeur : </h2>
<h3><?php  echo getProfitEdi($conn); ?>
</h3>


<br/><br/><br/>

<h2>Top 3 clients les plus actifs (nb de commentaires)</h2>
<table border="1">
    <tr>
        <td width="100pt"><b>Login</b></td>
        <td width="100pt"><b>Nom</b></td>
        <td width="100pt"><b>Prenom</b></td>
        <td width="100pt"><b>Mail</b></td>
        <td width="100pt"><b>Nombre de commentaires</b></td>
    </tr>
    <?php
    getClientActif($conn);
    ?>
</table>