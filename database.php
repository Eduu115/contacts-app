<?php

$host = "localhost";
$database = "contacts_app";
$user = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$host;dbname=$database", $user, $password);
  //testing first time
  // foreach($conn->query("SHOW DATABASES") as $row){
  //   print_r($row);
  // }
  // die();
} catch (PDOException $e) {
  die("PDO Connection error: " . $e ->getMessage());
}

?>
