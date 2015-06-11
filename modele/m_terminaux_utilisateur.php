<?php


/*
 * retourne le nom d'un client à partir du login
 */
function getNom($login, $conn)
{
    $sql = "SELECT prenom AS p, nom AS n FROM client WHERE login = '$login';";
    $query = pg_query($conn, $sql);
    $res  =pg_fetch_array($query);
    return $res;
}

/*
 * affiche les lignes de la tables des terminaux d'un client
 */
function getTerminal($login, $conn)
{
    $sql = "SELECT T.numSerie num, M.designation desig, M.constructeur cons, S.version v, S.constructeur os
from terminal T, modele M, os S
WHERE T.client='$login' AND T.idmodele=M.id AND M.idos = S.id";

    $query = pg_query($conn, $sql);

    while($res = pg_fetch_array($query))
    {
        echo "<tr>";
        echo "<td>$res[num]</td>";
        echo "<td>$res[desig]</td>";
        echo "<td>$res[cons]</td>";
        echo "<td>$res[v]</td>";
        echo "<td>$res[os]</td>";
        echo "</tr>";
    }
}

/*
 * rempli le select avec les modèles existants
 */
function getModele($conn)
{
    $sql = "SELECT designation as d, id as id FROM modele";
    $query = pg_query($conn, $sql);
    echo "<select name='modele' size=1>";
    while($res = pg_fetch_array($query)) {
        echo "<option value='$res[id]'> $res[d]";
    }
    echo "</select>";
}

/*
 * retourne l'id du client à partir de son login
 *//*
function getIdClient($conn, $login)
{
    $sql = "select id as id from comptesutilisateurs where login='$login'";
    $query = pg_query($conn, $sql);
    $res = pg_fetch_array($query);
    return $res[id];
}*/

/*
 * ajoute un terminal à un client
 */
function ajouter_terminal($conn, $numserie, $modele, $login)
{


    if(!is_numeric($numserie))
    {
        echo "<h5 class='error'>Numéro de serie invalide</h5>";
    }
    else
    {
        $sql = "INSERT INTO terminal(numserie, client, idmodele) VALUES ('$numserie', '$login', '$modele')";
        $ret = pg_query($conn, $sql);
        if($ret == false)
        {
            echo "<h5 class='error'>Le Numéro de serie existe deja</h5>";
        }
        return $ret;
    }
    return false;
}

/*
 * retourne les num de serie de ts les terminaux d'un client
 */
function getNumserie($conn, $login)
{
    $sql = "SELECT numSerie num  from terminal T
    WHERE T.client='$login'";
    $query = pg_query($conn, $sql);
    echo "<select name='terminal' size=1>";
    while($res = pg_fetch_array($query)) {
        echo "<option value='$res[num]'> $res[num]";
    }
    echo "</select>";
}

/*
 * supprime un terminal d'un client
 */
function supprimer_terminal($conn, $numserie)
{
    $sql = "DELETE FROM Terminal WHERE numserie='$numserie'";
    return pg_query($conn, $sql);
}


?>