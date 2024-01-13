<?php
   
   include("../includes/dbh.inc.php");
   include("../model/dashboard_model.php");

   if (isset($_GET["id"]) && isset( $_GET["status"])) {

    $id = $_GET["id"];
    $stat = $_GET["status"];
   
    toggleArticleStatus($pdo, $id, $stat);

    header("location: ../articles.php");
  
     
  } elseif (isset($_GET["del"])) {
  
   $id = $_GET["del"];
   $query = "DELETE from articles WHERE id = :id;";
   $stmt = $pdo->prepare($query);
   $stmt->bindParam(":id", $id);
   $stmt->execute();

   header("location: ../articles.php");
   


}  else{

    echo 'wtf';
}