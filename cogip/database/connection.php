<?php

function dbconnect(){

    $hostname = "localhost";
    $usernamedb = "root";
    $passworddb = "root";
    $dbname = "cogip";

    $conn = mysqli_connect($hostname, $usernamedb, $passworddb, $dbname) or die ("unable to connect");
    return $conn;
}
?>
