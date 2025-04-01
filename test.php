<?php $contacts = ["Pepe", "Ana", "Carlos", "Julian"]; ?>

<?php foreach($contacts as $contact){
  if ($contact != "Pepe"){ ?>
    <div> <?= $contact ?> </div>
  <?php } 
     } ?>
