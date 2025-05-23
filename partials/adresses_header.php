<?php

require "database.php";

$contacts  = $conn->query("SELECT * FROM contacts")



//Validamos y cargamos todos
// if(file_exists("contacts.json")){
//   $contacts=json_decode(file_get_contents("contacts.json"), true);
// }else{
//   $contacts=[];
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Link a boosttrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.3.3/darkly/bootstrap.min.css" 
  integrity="sha512-HDszXqSUU0om4Yj5dZOUNmtwXGWDa5ppESlX98yzbBS+z+3HQ8a/7kcdI1dv+jKq+1V5b01eYurE7+yFjw6Rdg==" 
  crossorigin="anonymous" 
  referrerpolicy="no-referrer" />

  <script 
  defer
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
  crossorigin="anonymous"
  ></script>

  <!-- Static content -->
  <link rel="stylesheet" href="/contacts-app/static/css/index.css">
  <?php 
    $uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
  ?>
  <?php if ($uri == "/contacts-app/" || $uri == "/contacts-app/index.php"): ?>
    <script defer src="/contacts-app/static/js/welcome.js"></script>
  <?php endif ?>
  <title>Contacts App</title>
</head>
<body>
 
  <?php require "adresses_navbar.php"; ?>
  
    
  <?php if (isset($_SESSION["flash"])): ?>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
      </symbol>
    </svg>

    <div class="container mt-4">
      <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div class="ml-2">
          <?= $_SESSION["flash"]["message"] ?>
        </div>
      </div>
    </div>
    <?php unset($_SESSION["flash"]) ?>
  <?php endif ?>


  <main>
 
<!-- Content here -->
