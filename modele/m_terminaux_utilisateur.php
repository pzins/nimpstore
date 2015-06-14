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
    $sql = "select count(*) from terminal t WHERE t.client=$login";
    $nb = pg_query($conn, $sql);
    if(nb > 5)
    {
        echo "<h5 class='error'>Impossible d'avoir plus de 5 terminaux</h5>";
    }
    else if(!is_numeric($numserie))
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

function getAppliDispo($login, $conn)
{
    $sql = "select t.numserie num, va.titre ti, va.description des, va.editeur ed,
    va.coutfixe cf, va.coutperiodique cp, o.constructeur cons, o.version ver
    from terminal t, modele m, os o, vapplication va, contenudisponiblesur c
    WHERE t.idmodele=m.id and m.idos=o.id and c.idos=o.id and c.idcontenu=va.id and
    t.client='$login'";
    $query = pg_query($conn, $sql);
    while($res = pg_fetch_array($query))
    {
        echo "<tr>";
        echo "<td>$res[num]</td>";
        echo "<td>$res[ti]</td>";
        echo "<td>$res[des]</td>";
        echo "<td>$res[ed]</td>";
        echo "<td>$res[cf]</td>";
        echo "<td>$res[cp]</td>";
        echo "<td>$res[cons] $res[ver]</td>";
        echo "</tr>";
    }
}

function getAppliDispoForm($login, $conn)
{
    $sql = "select distinct va.id id, va.titre ti, va.description des, va.coutfixe cf, va.coutperiodique cp
    from terminal t, modele m, os o, vapplication va, contenudisponiblesur c
    WHERE t.idmodele=m.id and m.idos=o.id and c.idos=o.id and c.idcontenu=va.id and
    t.client='$login'";
    $query = pg_query($conn, $sql);
    while($res = pg_fetch_array($query))
    {
        echo "<option value='$res[id]'>$res[ti] : $res[des] :
            cout fixe : $res[cf], cout periodique : $res[cp]</option>";
    }
}

function getRessourceForm($conn)
{
    $sql = "select id id, titre t from vressource;";
    $query = pg_query($conn, $sql);
    while($res = pg_fetch_array($query))
    {
        echo "<option value='$res[id]'> $res[t] </option>";
    }
}

function getClientForm($conn)
{
    $sql = "select login l, nom n, prenom p from client";
    $query = pg_query($conn, $sql);
    while($res = pg_fetch_array($query))
    {
        echo "<option value='$res[l]'> $res[l] : $res[n], $res[p]</option>";
    }
}

/**
 * @param $conn
 * @param $type
 * @param $login
 * @param $client
 * @param $idApp
 * @param $idRes
 */
function achatContenu($conn, $type, $login, $client, $idApp, $idRes)
{
    $sql = "SELECT nextval('seq_transaction') id;";
    $id = pg_fetch_array(pg_query($conn, $sql));

    $sql = "select num n from carte where client='$login'";
    $carte = pg_fetch_array(pg_query($conn, $sql));
    if($type == 'a'){
        $sql = "select coutfixe p from contenu where id=$idApp;";
        $prixfixe = pg_fetch_array(pg_query($conn, $sql))[p];

        $sql = "select coutperiodique p from application where idapp=$idApp;";
        $prixperio = pg_fetch_array(pg_query($conn, $sql))[p];
        $prix = $prixperio + $prixfixe;

        $sql = "insert into transaction values ($id[id], now(), $prix, '$login',
                      '$client', $carte[n]);";
        pg_query($conn, $sql);
        if($prixperio == '0')
        {
            $duree = -1;
        }
        else
        {
            $duree = 1;
        }

        $sql = "insert into dureeacces values ($idApp, $id[id], $duree, false )";
        pg_query($conn, $sql);
    } else if($type == 'r')
    {
        $sql = "select coutfixe p from contenu where id=$idRes;";
        $prix = pg_fetch_array(pg_query($conn, $sql))[p];

        $sql = "insert into transaction values ($id[id], now(), $prix, '$login',
                      '$client', $carte[n]);";
        pg_query($conn, $sql);
        $sql = "insert into dureeacces values ($idApp, $id[id], -1, false )";
        pg_query($conn, $sql);

    }
}

function installer($conn, $type, $login, $idapp, $idres)
{
    if($type == 'a')
    {
        $id = $idapp;
    }else
    {
        $id = $idres;
    }
    $sql = "select t.numserie num
            from terminal t
            WHERE t.client='$login'";
    $query = pg_query($conn, $sql);
    while($res = pg_fetch_array($query))
    {
        $sql = "insert into installation VALUES ($id, $res[num], current_date);";
        pg_query($conn, $sql);
    }
}


function getAchat($conn, $login)
{
    $sql = "select t.dateachat d, t.montanttotal m, t.destinateur d, numcarte n,
            c.titre t, c.description descr, c.editeur e
            from transaction t, dureeacces d, contenu c
            WHERE t.acheteur='$login' and d.numtransaction=t.num
            and c.id=d.idcontenu;";
    $query = pg_query($conn, $sql);
    while($res = pg_fetch_array($query))
    {
        echo "<tr>";
        echo "<td>$res[d]</td>";
        echo "<td>$res[m]</td>";
        echo "<td>$res[d]</td>";
        echo "<td>$res[n]</td>";
        echo "<td>$res[t]</td>";
        echo "<td>$res[descr]</td>";
        echo "<td>$res[e]</td>";
        echo "</tr>";
    }
}

function getHistoInstallation($conn, $login)
{
    $sql = "select c.titre titre, t.numserie num
            from installation i, contenu c, terminal t
            WHERE t.client='$login' and t.numserie=i.numserieterminal
            and i.idcontenu=c.id;";
            $query = pg_query($conn, $sql);
    while($res = pg_fetch_array($query))
    {
        echo "<tr>";
        echo "<td>$res[titre]</td>";
        echo "<td>$res[num]</td>";
        echo "</tr>";
    }
}


?>