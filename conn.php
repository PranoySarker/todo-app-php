<?php

try{
    $host = "localhost";
    $dbname = "todos";
    $user = "root";
    $pass = "";

    $conn = new PDO("mysql:host=$host;dbname =$dbname;",$user,$pass);
    $conn->setAttribute(PDO:: ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);
    // echo "It's working"; 

}catch(PDOException $e){
    echo "error is: " .$e->getMessage();

}


?>