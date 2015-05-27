<?php

function getApplication($conn)
{
    $sql = "SELECT titre t, description d, coutfixe c, editeur e,
    coutperiodique p  FROM vapplication";
    $query = pg_query($conn, $sql);
    while($res = pg_fetch_array($query))
    {
        echo "<td>$res[t]</td>";
        echo "<td>$res[d]</td>";
        echo "<td>$res[c]</td>";
        echo "<td>$res[e]</td>";
        echo "<td>$res[p]</td>";
    }
}

function getRessource($conn)
{
    $sql = "SELECT v.titre t, v.description d, v.coutfixe c, v.editeur e, c.titre tt
     FROM vressource v, contenu c
     WHERE c.id=v.idapp";
    $query = pg_query($conn, $sql);
    while($res = pg_fetch_array($query))
    {
        echo "<td>$res[t]</td>";
        echo "<td>$res[d]</td>";
        echo "<td>$res[c]</td>";
        echo "<td>$res[e]</td>";
        echo "<td>$res[tt]</td>";
    }
}

function getEditeur($conn)
{
    $sql = "SELECT nom n FROM editeur";
    $query = pg_query($conn, $sql);
    echo "Editeur: <select name='editeur'>";
    while($res = pg_fetch_array($query))
    {
        echo "<option>$res[n]</option>";
    }
    echo "</select></br>";
}

function ajouterApplication($conn, $titre, $desc, $coutfixe, $editeur, $coutperio)
{
    $sql = "SELECT nextval('seq_contenu');";
    $id = pg_num_rows(pg_query($conn, $sql));
    $sql = "INSERT INTO contenu(id, titre, description, coutfixe, editeur)
   VALUES ($id, '$titre', '$desc', $coutfixe, '$editeur')";
    $query = pg_query($conn, $sql);
    $sql = "INSERT INTO application(idapp, coutperiodique)
    VALUES ($id, $coutperio)";
    pg_query($conn, $sql);
}

function ajouterRessource($conn,  $titre, $desc, $coutfixe, $editeur, $applibase)
{
    $idApp = getIdAppli($conn, $applibase);
    $sql = "SELECT nextval('seq_contenu');";
    $id = pg_num_rows(pg_query($conn, $sql));
    $sql = "INSERT INTO contenu(id, titre, description, coutfixe, editeur)
   VALUES ($id, '$titre', '$desc', $coutfixe, '$editeur'";
    pg_query($conn, $sql);
    $sql = "INSERT INTO ressource(idressource, idapp)
    VALUES ($id, $idApp)";
    pg_query($conn, $sql);
}

function getIdAppli($conn, $titre)
{
    $sql = "SELECT id i FROM contenu WHERE titre='$titre'";
    return pg_fetch_array(pg_query($conn, $sql))[i];
}