<?php


/*
 * retourne le nom d'un client à partir du login
 */
function getNom($login, $conn)
{
    $sql = "SELECT C.prenom AS p, C.nom AS n, C.id AS id FROM client C, comptesutilisateurs U
                WHERE U.id = C.id AND U.login = '$login';";
    $query = pg_query($conn, $sql);
    $res  =pg_fetch_array($query);
    return $res;
}

/*
 * affiche les lignes de la tables des terminaux d'un client
 */
function getTerminal($login, $conn)
{
    $sql = "SELECT T.numSerie num, M.designation desig, C.nom cons, S.version v, O.nom os
from terminal T, modele M, constructeur_dev C, systemeexploitation S, constructeur_os O, comptesutilisateurs U
WHERE U.login='$login' AND U.id=T.numclient AND T.idmodele=M.id AND C.id=S.id AND M.idsystemeexploitation=S.id AND
O.id=S.idconstructeur;";
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
 */
function getIdClient($conn, $login)
{
    $sql = "select id as id from comptesutilisateurs where login='$login'";
    $query = pg_query($conn, $sql);
    $res = pg_fetch_array($query);
    return $res[id];
}

/*
 * ajoute un terminal à un client
 */
function ajouter_terminal($conn, $numserie, $modele, $login)
{
    $id = getIdClient($conn, $login);
    if(is_numeric($numserie))
    {
        $sql = "INSERT INTO terminal(numserie, numclient, idmodele) VALUES ('$numserie', '$id', '$modele')";
        return pg_query($conn, $sql);
    }
    return false;
}

/*
 * retourne les num de serie de ts les terminaux d'un client
 */
function getNumserie($conn, $login)
{
    $sql = "SELECT T.numSerie num  from terminal T, comptesutilisateurs U
    WHERE U.login='$login' AND U.id=T.numclient";
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
function supprimer_terminal($conn, $numserie, $login)
{
    $id = getIdClient($conn, $login);
    $sql = "DELETE FROM Terminal WHERE numserie='$numserie'";
    return pg_query($conn, $sql);
}


?>