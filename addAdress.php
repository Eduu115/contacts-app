<?php

require "database.php";

session_start();

if(!isset($_SESSION["user"])){
  header("Location: login.php");
  return;
}
$adress_contact = $_GET["contactName"];

$error = null;

if($_SERVER["REQUEST_METHOD"]=="POST"){
      if(empty($_POST["adress_name"])){
        $error = "Please, fill the fields.";
      }else if(strlen( $_POST["adress_location"]) < 12 ){
        $error = "Please, introduce a valid adress";
      }else{
        
        $adress_name = $_POST["adress_name"];
        $adress_location = $_POST["adress_location"];
        $userId= $_SESSION["user"]["user_id"];
        $contactId = (int) $_POST["contactId"];
        
        var_dump($adress);
        var_dump($userId);
        var_dump($contactId);

        // Verificar si el contacto existe
        $checkStatement = $conn->prepare("SELECT id FROM contacts WHERE id = :contactId");
        $checkStatement->bindParam(":contactId", $contactId);
        $checkStatement->execute();
        $contact = $checkStatement->fetch(PDO::FETCH_ASSOC);

        if (!$contact) {
            die("Invalid contact id."); // o redirigir con un mensaje de error
        }


        $statement = $conn->prepare("INSERT INTO adresses (contact_id, adress_name, adress_location) 
                                      VALUES(:contactId ,:adressName,:adressLocation)");
        $statement->bindParam(":contactId", $contactId);
        $statement->bindParam(":adressName", $adress_name);
        $statement->bindParam(":adressLocation", $adress_location);

        $statement->execute();
        
        $_SESSION["flash"] = ["message" => "adress for Contact {$adress_contact} added successfully."];

        header("Location: home.php");
        return;
      }
    }
    

    // //Cargamos los que ya habia
    // if(file_exists("contacts.json")){
    //   $contacts=json_decode(file_get_contents("contacts.json"), true);
    // }else{
    //   $contacts=[];
    // }

    // //Añadimos el ultimo
    // $contacts[] = $contact;

    // file_put_contents("contacts.json", json_encode($contacts));

?>
<?php require "partials/adresses_header.php"; ?>
<div class="container pt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Add New Addres for <?= $adress_contact ?></div>
        <div class="card-body">
          <?php if($error){ ?>
            <p class="text-danger"> <?= $error ?></p>
          <?php }?>
          <form method="post" action="addAdress.php">
          <input type="hidden" name="contactId" value="<?= htmlspecialchars($_GET["contactId"]) ?>">

            <div class="mb-3 row">
              <label for="adress_name" class="col-md-4 col-form-label text-md-end">Name</label>  
              <div class="col-md-6">
                <input id="adress_name" type="text" class="form-control" name="adress_name" required autocomplete="adress_name" autofocus placeholder="school, apartment...">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="adress_location" class="col-md-4 col-form-label text-md-end">Adress</label>  
              <div class="col-md-6">
                <input id="adress_location" type="text" class="form-control" name="adress_location" required autocomplete="adress_location" autofocus>
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
