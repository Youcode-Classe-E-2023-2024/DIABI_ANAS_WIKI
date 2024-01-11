<?php
   
   include("../includes/dbh.inc.php");

   if(isset($_GET["del"])){

    $id = $_GET["del"];
    $query = "DELETE from tags WHERE id = :id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    header("location: ../tags.php");
    

   }