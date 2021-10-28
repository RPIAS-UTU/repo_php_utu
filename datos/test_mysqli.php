<?php
    
    const USER = "root";
    const PASS = "root";
    const DB = "pruebas_2021";
    const PORT = "3306";
    const HOST = "172.22.0.2";
    const DSN = "mysql:host=" . HOST . ";dbname=" . DB;
  

    // Create connection
    $conn = mysqli_connect(HOST, USER, PASS, DB, PORT);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    echo "Connected successfully";

    mysqli_close($conn);
