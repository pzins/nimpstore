<?php

function getTop5($conn)
{
    $sql = "select a.titre t, a.coutfixe cf, a.description d,
    a.editeur e, count(*) nb, sum(a.coutfixe) somme
            FROM vapplication a , dureeacces d
            where d.idcontenu=a.id
            group by a.titre, a.coutfixe, a.description, a.editeur
            ORDER BY sum(a.coutfixe) desc
            limit 5";
    $query = pg_query($conn, $sql);
    while($res = pg_fetch_array($query))
    {
        echo "<tr>";
        echo "<td>$res[t]</td>";
        echo "<td>$res[cf]</td>";
        echo "<td>$res[d]</td>";
        echo "<td>$res[e]</td>";
        echo "<td>$res[nb]</td>";
        echo "<td>$res[somme]</td>";
        echo "</tr>";
    }
}




?>