<?php
    
    const USER = "root";
    const PASS = "root";
    const DB = "pruebas_2021";
    const PORT = "3306";
    const HOST = "172.22.0.2" . ";port=" . PORT;
    const DSN = "mysql:host=" . HOST . ";dbname=" . DB;

    try {
        $conn = new PDO(DSN, USER, PASS);
        
        echo "Connected to " . DB . "at " . DSN . "successfully.";

    } catch (PDOException $pe) {

        die("Could not connect to the database ". DSN . " :" . $pe->getMessage());

    }


