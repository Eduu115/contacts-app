<?php
// EMPEZAMOS EL PHP
require "database.php";

session_start();

if(!isset($_SESSION["user"])){
  header("Location: login.php");
  return;
}
$adress_id = isset($_POST["adressId"]) ? (int) $_POST["adressId"] : (int) $_GET["adress_id"];
$contactName = isset($_POST["contactName"]) ? $_POST["contactName"] :  $_GET["contactName"];
// var_dump($contactName);
// var_dump($adress_id);
$statement = $conn->prepare("SELECT * FROM adresses WHERE adress_id = :adress_id");
$statement->execute([":adress_id"=> $adress_id]);



$adress = $statement->fetch(PDO::FETCH_ASSOC);
// echo("dump");
// var_dump($adress["contact_id"]);
// var_dump($_GET["contactId"]);

if($statement->rowCount()==0){
  http_response_code(404);
  echo("HTTP 404 NOT FOUND");
  return;
}
$contactId= (int)  $_GET["contactId"];
if($adress["contact_id"] !== $contactId ){
  http_response_code(403);
  echo("HTTP 403 UNAUTHORIZED");
  return;
}

$error = null;


// TRATAMOS EL POST
if($_SERVER["REQUEST_METHOD"]=="POST"){
      if(empty($_POST["adressName"]) || empty($_POST["adressLocation"])){
        $error = "Please, fill all the fields.";
      }else if(strlen( $_POST["adressLocation"]) < 12 ){
        $error = "Please, introduce a valid adress";
      }else{
        
        $adressName = $_POST["adress_name"];
        $adressLocation = $_POST["adress_location"];
    
        $statement = $conn->prepare("UPDATE adresses 
                             SET adress_name = :adressName,
                                 adress_location = :adressLocation 
                             WHERE adress_id = :adressId");
      $statement->execute([
        ":adressId" => $adress_id,
        ":adressName" => $_POST["adressName"],
        ":adressLocation" => $_POST["adressLocation"],
      ]); 

        
        $_SESSION["flash"] = ["message" => "Adress {$_POST['adress_name']} updated successfully."];

        header("Location: adresses.php?contactId=" . urlencode($contactId) . "&contactName=" . urlencode($contactName));
        return;
      }
    }

?>
<?php require "partials/adresses_header.php"; ?>
<div class="container pt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Edit the adress for <?= $contactName?></div>
        <div class="card-body">
          <?php if($error){ ?>
            <p class="text-danger"> <?= $error ?></p>
          <?php }?>
          <form method="POST" action="editAdress.php?adress_id=<?= $adress["adress_id"] ?>&contactId=<?= $adress["contact_id"] ?>">
          <input type="hidden" name="adress_id" id="adress_id" value="<?= $_GET["adress_id"] ?>">
          <input type="hidden" name="contactName" value="<?= isset($_POST["contactName"]) ? $_POST["contactName"] :  $_GET["contactName"] ?>">

          <div class="mb-3 row">
              <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>  
              <div class="col-md-6">
                <input value="<?= $adress["adress_name"] ?>" id="adressName" type="text" class="form-control" name="adressName" required autocomplete="adressName" autofocus placeholder="School, apartment...">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="phone_number" class="col-md-4 col-form-label text-md-end">Adress</label>
              <div class="col-md-6">
                <input value="<?= $adress["adress_location"] ?>" id="adressLocation" type="text" class="form-control" name="adressLocation" required autocomplete="adressLocation" autofocus>
              </div>
            </div>

            <div class="mb-3 row">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<?php require "partials/footer.php"; ?>
