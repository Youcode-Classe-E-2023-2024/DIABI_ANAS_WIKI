<?php
   
   include("../includes/dbh.inc.php");
   include("../model/dashboard_model.php");

   if (isset($_GET["id"]) && isset( $_GET["newstat"])) {

      $id = $_GET["id"];
      $stat = $_GET["newstat"];
      
      
      toggleArticleStatus($pdo, $id, $stat);


  } elseif (isset($_GET["pub"])) {
      $id = $_GET["pub"];
      toggleArticleStatus($pdo, $id, $stat);
  } elseif (isset($_GET["del"])) {
  
   $id = $_GET["del"];
   $query = "DELETE from articles WHERE id = :id;";
   $stmt = $pdo->prepare($query);
   $stmt->bindParam(":id", $id);
   $stmt->execute();

   header("location: ../articles.php");
   


}  