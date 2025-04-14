<?php

require "database.php";

session_start();

if(!isset($_SESSION["user"])){
  header("Location: login.php");
  return;
}
// hay que hacer la consulta pero con Adresses
$id = (int) $_SESSION["user"]["user_id"];

$contactId= (int) $_GET["contactId"];
$contactName= $_GET["contactName"];
var_dump($contactId);
var_dump($contactName);

//AHORA QUE YA HEMOS TRATADO EL POST

var_dump($id);

$adresses = $conn->prepare("SELECT * FROM adresses WHERE contact_id = :id");
$adresses->bindParam(":id", $contactId, PDO::PARAM_INT);
$adresses->execute();

$result = $adresses->fetchAll(PDO::FETCH_ASSOC);

var_dump($result);
var_dump($adresses->rowCount() );


?>

<?php require "partials/adresses_header.php"; ?>

<div class="container pt-4 p-3">
  <h4 class="title">Adresses for <?= $contactName?></h4>

  <div class="row">
  <?php if (count($result) == 0 ): ?>
    <div class="col-md-4 mx-auto">
      <div class="card card-body text-center">
        <p>No adresses saved yet</p>
        <a href="./addAdress.php?contactId=<?= $contactId ?>&contactName=<?= $contactName ?>">Add one!!</a>
      </div>
    </div>
  <?php endif ?>
  <?php foreach($result as $adress): ?>

    <div class="col-md-4 mb-3">
      <div class="card text-center">
        <div class="card-body">
          <h3 class="card-title text-capitalize"><?= $adress["adress_name"]?></h3>
          <p class="m-2"> <?= $adress["adress_location"]?> </p>
          
        <!-- EDIT&DELETE -->
          <a href="editAdress.php?adress_id=<?= $adress["adress_id"] ?>&contactId=<?= $contactId ?>&contactName=<?=$contactName?>" class="btn btn-secondary mb-2">Edit Address</a>
          <a href="deleteAdress.php?adress_id=<?= $adress["adress_id"] ?>&contactId=<?= $contactId ?>&contactName=<?=$contactName?>" class="btn btn-danger mb-2">DELETE Adress</a>

        </div>
      </div>
    </div>
  <?php endforeach ?>
  </div>
</div>

<?php require "partials/footer.php"; ?>
