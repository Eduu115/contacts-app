<?php

require "database.php";

session_start();

if(!isset($_SESSION["user"])){
  header("Location: login.php");
  return;
}

$adressId= (int) $_GET["adress_id"];

$statement = $conn->prepare("SELECT * FROM adresses WHERE adress_id = :adressId LIMIT 1");
$statement->execute([":adressId"=> $adressId]);

if($statement->rowCount()==0){
  http_response_code(404);
  echo("HTTP 404 NOT FOUND");
  return;
}

$adress = $statement->fetch(PDO::FETCH_ASSOC);

if($adress["contact_id"] !== ((int)  $_GET["contactId"]) ){
  http_response_code(403);
  echo("HTTP 403 UNAUTHORIZED");
  return;
}

$conn->prepare("DELETE FROM adresses WHERE adress_id = :adressId")->execute([":adressId"=> $adressId]);

$_SESSION["flash"] = ["message" => "Adress {$adress['adress_name']} deleted successfully."];

header("Location: adresses.php?contactId=" . urlencode($contactId) . "&contactName=" . urlencode($contactName));

?>
