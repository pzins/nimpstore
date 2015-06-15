<?php

//liste de toutes les applications
function getApplication($conn)
{
    $sql = "SELECT titre t, description d, coutfixe c, editeur e,
    coutperiodique p  FROM vapplication";
    $query = pg_query($conn, $sql);
    while($res = pg_fetch_array($query))
    {
        echo "<tr><td>$res[t]</td>";
        echo "<td>$res[d]</td>";
        echo "<td>$res[c]</td>";
        echo "<td>$res[e]</td>";
        echo "<td>$res[p]</td></tr>";
    }
}

//affiche les lignes de ttes les ressources
function getRessource($conn)
{
    $sql = "SELECT v.titre t, v.description d, v.coutfixe c, v.editeur e, c.titre tt
     FROM vressource v, contenu c
     WHERE c.id=v.idapp";
    $query = pg_query($conn, $sql);
    while($res = pg_fetch_array($query))
    {
        echo "<tr>";
        echo "<td>$res[t]</td>";
        echo "<td>$res[d]</td>";
        echo "<td>$res[c]</td>";
        echo "<td>$res[e]</td>";
        echo "<td>$res[tt]</td>";
        echo "</tr>";
    }
}

//affiche les options du select pour le choix de l'éditeur
//lors de l'ajout d'un contenu
function getEditeur($conn)
{
    $sql = "SELECT nom n FROM editeur";
    $query = pg_query($conn, $sql);
    echo "<tr><td>Editeur: </td><td><select name='editeur'>";
    while($res = pg_fetch_array($query))
    {
        echo "<option>$res[n]</option>";
    }
    echo "</select></td></tr>";
}

//affiche les options du select pour le choix de l'os
//lors de l'ajout d'un contenu
function getOs($conn)
{
    $sql = "SELECT id i, version v, constructeur c
            FROM os";
    $query = pg_query($conn, $sql);
    echo "<tr><td>Os: </td><td><select name='os'>";
    while($res = pg_fetch_array($query))
    {
        echo "<option value='$res[i]'>$res[c] $res[v]</option>";
    }
    echo "</select></td></tr>";
}

//réalise l'ajout d'une nouvelle application
function ajouterApplication($conn, $titre, $desc, $coutfixe, $editeur, $coutperio)
{
    $sql = "SELECT nextval('seq_contenu') id;";
    $id = pg_fetch_array(pg_query($conn, $sql));
    $sql = "INSERT INTO contenu(id, titre, description, coutfixe, editeur)
   VALUES ($id[id], '$titre', '$desc', $coutfixe, '$editeur')";
    $query = pg_query($conn, $sql);
    $sql = "INSERT INTO application(idapp, coutperiodique) VALUES ($id[id], $coutperio)";
    pg_query($conn, $sql);
    return $id[id];
}

//réalise l'ajout d'un nouvelle ressource
function ajouterRessource($conn,  $titre, $desc, $coutfixe, $editeur, $applibase)
{
    $sql = "SELECT nextval('seq_contenu') id;";
    $id = pg_fetch_array(pg_query($conn, $sql));
    $sql = "INSERT INTO contenu(id, titre, description, coutfixe, editeur)
   VALUES ($id[id], '$titre', '$desc', $coutfixe, '$editeur');";
    pg_query($conn, $sql);
    $sql = "INSERT INTO ressource(idressource, idapp)
    VALUES ($id[id], $applibase)";
    pg_query($conn, $sql);
    return $id[id];
}

//met à jour la table des contenu dispo
function ajouterContenuDispo($conn, $contenu, $os)
{
    $sql = "insert into contenudisponiblesur values ($contenu, $os);";
    $query = pg_query($conn, $sql);
}

//affiche les options pour le select du choix de l'applicaiton
//lors de lajout d'une ressource
function getApplications($conn)
{

    $sql = "SELECT c.titre n, a.idapp i FROM application a, contenu c
            WHERE a.idapp=c.id";
    $query = pg_query($conn, $sql);
    while($res = pg_fetch_array($query))
    {
        echo "<option value='$res[i]'> $res[n]</option>";
    }
}


//realise l'ajout d'un nouvel editeur
function ajouterEditeur($conn, $nom, $contact, $url)
{
    $sql = "INSERT INTO editeur VALUES ('$nom', '$contact', '$url')";
    $query = pg_query($conn, $sql);
    return $query;
}

//ajouter carte à un client
function ajouterCarte($conn, $montant, $validite, $client)
{
    $sql = "insert into carte VALUES (nextval('seq_carte'), $montant,
            $montant, '$validite', '$client');";
    pg_query($conn, $sql);
}

//affiche les option du select pour les clients destinataires de l'achat
function getClientForm($conn)
{
    $sql = "select login l, nom n, prenom p from client";
    $query = pg_query($conn, $sql);
    while($res = pg_fetch_array($query))
    {
        echo "<option value='$res[l]'> $res[l] : $res[n], $res[p]</option>";
    }
}