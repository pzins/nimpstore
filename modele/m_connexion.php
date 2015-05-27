<?php

/*
 * vérifie si login + password st corrects
 */
function identification($login, $password, $conn, $base)
{
    $sql = "SELECT U.login, U.mdp FROM $base U
                WHERE U.login='$login' AND U.mdp='$password';";
    $query = pg_query($conn, $sql);
    $res = pg_fetch_array($query);
    return $res;
}



?>