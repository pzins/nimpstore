<?php

/*
 * vérifie si login + password st corrects
 */
function identification($login, $password, $conn)
{
    $sql = "SELECT U.login, U.mdp FROM Client U
                WHERE U.login='$login' AND U.mdp='$password';";
    $query = pg_query($conn, $sql);
    $res = pg_fetch_array($query);
    return $res;
}

?>