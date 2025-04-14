<?php

require "database.php";

session_start();

if(!isset($_SESSION["user"])){
  header("Location: login.php");
  return;
}

$id = (int) $_SESSION["user"]["user_id"];
var_dump($id);

$contacts = $conn->prepare("SELECT * FROM contacts WHERE user_id = :id");
$contacts->bindParam(":id", $id, PDO::PARAM_INT);
$contacts->execute();

$result = $contacts->fetchAll(PDO::FETCH_ASSOC);

var_dump($result);
var_dump($contacts->rowCount() );


?>

<?php require "partials/header.php"; ?>

<div class="container pt-4 p-3">
  <div class="row">
  <?php if (count($result) == 0 ): ?>
    <div class="col-md-4 mx-auto">
      <div class="card card-body text-center">
        <p>No contacts saved yet</p>
        <a href="./add.php">Add one!!</a>
      </div>
    </div>
  <?php endif ?>  
  <?php foreach($result as $contact): ?>
    
    <div class="col-md-4 mb-3">
      <div class="card text-center">
        <div class="card-body">
          <h3 class="card-title text-capitalize"> <?= $contact["name"] ?></h3>
          <p class="m-2"> <?= $contact["phone_number"] ?></p>
          <h5 class="card-title">Adresses</h5>
          <p class="m-2">Aqui va la dir 1</p>
          <p class="m-2">Aqui va la dir 1</p>
          <a href="adresses.php?contactId=<?= $contact["id"] ?>&contactName= <?= $contact["name"] ?>" class="btn btn-secondary mb-2">Modify adrresses</a> <br>
        <!-- EDIT&DELETE -->
          <a href="edit.php?id=<?= $contact["id"] ?>" class="btn btn-secondary mb-2">Edit Contact</a>
          <a href="delete.php?id=<?= $contact["id"] ?>" class="btn btn-danger mb-2">Delete Contact</a>
          
        </div>
      </div>
    </div>
  <?php endforeach ?>
  </div>
</div>

<?php require "partials/footer.php"; ?>
