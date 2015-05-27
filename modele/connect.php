<?php
    //connexion à la bdd
    function connexion()
    {
        $host = "localhost";
        $port = "5432";
        $db = "nimpstore";
        $conn = pg_connect("host=$host port=$port dbname=$db user=pierre password=pierre");
        return $conn;
    }
?>