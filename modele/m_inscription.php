<?php

/*
 * test si le login entré n'existe pas déjà
 */
function verif_login ($login, $conn)
{
    $sql = "SELECT login FROM comptesutilisateurs WHERE login='$login'";
    $query = pg_query($conn, $sql);
    if(pg_num_rows($query)>0)
        return false;
    return true;
}

/*
 * ajoute un client + compte utilisateur
 */
function ajouterClient($conn, $login, $password, $nom, $prenom, $mail)
{
    $sql = "INSERT INTO client(id, email, nom, prenom) VALUES (10, '$mail', '$nom', '$prenom')";
    $query = pg_query($conn, $sql);
    $sql = "INSERT INTO comptesutilisateurs(id, login, mdp) VALUES (10,'$login', '$password')";
    $query = pg_query($conn, $sql);
}

?>