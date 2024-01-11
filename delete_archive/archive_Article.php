<?php
   
   include("../includes/dbh.inc.php");

   if(isset($_GET["arch"])){

    $id = $_GET["arch"];
    $query = "UPDATE articles SET status = 'archived' WHERE id = :id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    header("location: ../Articles.php");
    

   }elseif(isset($_GET["pub"])){
      $id = $_GET["pub"];
    $query = "UPDATE articles SET status = 'public' WHERE id = :id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    header("location: ../Articles.php");
    
   }