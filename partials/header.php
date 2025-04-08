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
 
<?php require "navbar.php"; ?>
  
  <main>
 
<!-- Content here -->
