<?php

if (isset($_POST["submit"])) {

    $title = $_POST['title'];
    $content = $_POST['content'];
    $ctg = $_POST['selectedCategoryId'];

    try {

        require_once 'dbh.inc.php';
        require_once '../model/dashboard_model.php';
        
        
        set_article($pdo, $title, $content, $ctg);
        header("location: ../articles.php?add_tag=success");
        
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("location: ../dashboard.php");
    die();
}
