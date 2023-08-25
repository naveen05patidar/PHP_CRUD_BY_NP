<?php

$conn = mysqli_connect('localhost','root','',"NewPractice");

if($conn){
    echo "DataBase Connected ";
}else{
    echo "Database is not Connected";
}

// $conn = mysqli_connect('sql6.freesqldatabase.com', 'sql6642233', 'LWTLNHElSz', 'sql6642233', 3306);

// if ($conn) {
//     echo "Database Connected";
// } else {
//     echo "Database Connection Error: " . mysqli_connect_error();
// }

// $host = "sql6.freesqldatabase.com";
// $dbname = "sql6642233";
// $username = "sql6642233";
// $password = "LWTLNHElSz";

// try {
//     $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
//     // Set PDO error mode to exception
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "Connected successfully";
// } catch (PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
// }
?>