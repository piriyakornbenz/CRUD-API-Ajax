<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "test";

    try {
        $db = new PDO("mysql:host={$host}; dbname={$database}", $user, $password );
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
        $e->getMessage();
    }
?>