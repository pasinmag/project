<?php 

// Create connection
$conn = new mysqli("localhost", "root", "password", "tamjaisangrestaurant");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//try {
//    $conn = new PDO("mysql:host=localhost;dbname=tamjaisangrestaurant", "root", "0289776ZA");
//    // set the PDO error mode to exception
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Connected successfully";
//} catch(PDOException $e) {
//    echo "Connection failed: " . $e->getMessage();
//}
