<?php

//affiche les lignes du top 5 des appli les plus rentables
function getTop5($conn)
{
    $sql = "select a.titre t, a.coutfixe cf, a.description d,
    a.editeur e, count(*) nb, sum(a.coutfixe + a.coutperiodique) somme
            FROM vapplication a , dureeacces d
            where d.idcontenu=a.id
            group by a.titre, a.coutfixe, a.description, a.editeur
            ORDER BY sum(a.coutfixe + a.coutperiodique) desc
            limit 5";
    $query = pg_query($conn, $sql);
    while($res = pg_fetch_array($query))
    {
        echo "<tr>";
        echo "<td>$res[t]</td>";
        echo "<td>$res[d]</td>";
        echo "<td>$res[cf]</td>";
        echo "<td>$res[e]</td>";
        echo "<td>$res[nb]</td>";
        echo "<td>$res[somme]</td>";
        echo "</tr>";
    }
}

function getNbInstallation($conn)
{
    $sql = "select c.titre t, c.description d, count(*) co
            from contenu c, installation i
            WHERE i.idcontenu=c.id
            GROUP BY c.titre, c.description
            ORDER by count(*) DESC ";
    $query = pg_query($conn, $sql);
    while($res = pg_fetch_array($query))
    {
        echo "<tr>";
        echo "<td>$res[t]</td>";
        echo "<td>$res[d]</td>";
        echo "<td>$res[co]</td>";
        echo "</tr>";
    }
}

//retourne le profit de la plateforme
function getProfit($conn)
{
    $sql = "select sum(montanttotal * 0.3) from TRANSACTION;";
    $query = pg_query($conn, $sql);
    return pg_fetch_array($query)[0];
}

//retourne le profit du service editeur
function getProfitEdi($conn)
{
    $sql = "select sum(montanttotal * 0.7) from TRANSACTION;";
    $query = pg_query($conn, $sql);
    return pg_fetch_array($query)[0];
}

//affiche lignes du tableau contenant les 3 clients
//laissant le + de commentaires
function getClientActif($conn)
{
    $sql = "select c.login l, c.nom n, c.prenom p, c.email m, count(*) co
            from client c, avis a
            WHERE a.client=c.login
            GROUP BY c.login, c.nom, c.prenom, c.email
            ORDER BY COUNT(*) desc
            limit 3;";
    $query = pg_query($conn, $sql);
    while($res = pg_fetch_array($query))
    {
        echo "<tr>";
        echo "<td>$res[l]</td>";
        echo "<td>$res[n]</td>";
        echo "<td>$res[p]</td>";
        echo "<td>$res[m]</td>";
        echo "<td>$res[co]</td>";
        echo "</tr>";
    }
}

//affiche les lignes du tableau des meilleurs editeurs
function getInfoEditeur($conn)
{
    $sql = "select e.nom n, e.contact c, e.url u, count(*) co, sum(c.coutfixe) somme
            from dureeacces d, contenu c, editeur e
            WHERE d.idcontenu=c.id and c.editeur=e.nom
            GROUP BY e.nom, e.contact, e.url
            ORDER BY sum(c.coutfixe) desc;";
    $query = pg_query($conn, $sql);
    while($res = pg_fetch_array($query))
    {
        echo "<tr>";
        echo "<td>$res[n]</td>";
        echo "<td>$res[c]</td>";
        echo "<td>$res[u]</td>";
        echo "<td>$res[somme]</td>";
        echo "<td>$res[co]</td>";
        echo "</tr>";
    }
}

?>