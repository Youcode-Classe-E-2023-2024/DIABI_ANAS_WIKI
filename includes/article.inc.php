<?php
require_once 'dbh.inc.php';
require_once '../model/dashboard_model.php';

if (isset($_POST["submit"])) {

    $title = $_POST['title'];
    $content = $_POST['content'];
    $ctg = $_POST['selectedCategoryId'];
    $user_id = $_POST['user_id'];
    
    try {

        
        
        set_article($pdo, $title, $content, $ctg, $user_id);
        header("location: ../articles.php?add_article=success");
        
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} elseif(isset($_POST["update"])) {
   
    $title = $_POST["title"];
    $content = $_POST["content"];
    $ctgr = $_POST["selectedCategoryId"];
    $id = $_POST['artclId'];
    

    update_article($pdo, $title, $content, $ctgr, $id);

    header("location: ../articles.php?update_article=success");
    exit();
}
