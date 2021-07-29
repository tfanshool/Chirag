<?php
    $hostname = 'localhost';
    $database = 'chirag';
    $username = 'root';
    $password = '';
    $dbh = new PDO('mysql:host=' . $hostname . ';dbname=' . $database, $username, $password);
?>