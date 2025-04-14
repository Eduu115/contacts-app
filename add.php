<?php

require "database.php";

session_start();

if(!isset($_SESSION["user"])){
  header("Location: login.php");
  return;
}

$error = null;

if($_SERVER["REQUEST_METHOD"]=="POST"){
      if(empty($_POST["name"]) || empty($_POST["phone_number"])){
        $error = "Please, fill all the fields.";
      }else if(strlen( $_POST["phone_number"]) < 9 ){
        $error = "Please, introduce a valid phone number";
      }else{
        
        $name = $_POST["name"];
        $phoneNumber = $_POST["phone_number"];
        $id= $_SESSION["user"]["user_id"];
        
        $statement = $conn->prepare("INSERT INTO contacts (user_id, name, phone_number) 
                                      VALUES(:id ,:name, :phoneNumber)");
        $statement->bindParam(":id", $id);
        $statement->bindParam(":name", $_POST["name"]);
        $statement->bindParam(":phoneNumber", $_POST["phone_number"]);
        $statement->execute();
        
        $_SESSION["flash"] = ["message" => "Contact {$_POST['name']} added successfully."];

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
<?php require "partials/header.php"; ?>
<div class="container pt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Add New Contact</div>
        <div class="card-body">
          <?php if($error){ ?>
            <p class="text-danger"> <?= $error ?></p>
          <?php }?>
          <form method="post" action="add.php">
            <div class="mb-3 row">
              <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>  
              <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" required autocomplete="name" autofocus>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="phone_number" class="col-md-4 col-form-label text-md-end">Phone Number</label>
              <div class="col-md-6">
                <input id="phone_number" type="tel" class="form-control" name="phone_number" required autocomplete="phone_number" autofocus>
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
