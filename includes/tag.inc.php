<?php

if (isset($_POST["submit"])) {

    $name = $_POST['tagName'];

    try {

        require_once 'dbh.inc.php';
        require_once '../model/process_add_tag.php';
        require_once '../controller/tag_contr.inc.php';
        
        
        create_tag($pdo, $name);
        header("location: ../dashboard.php?add_tag=success");
        
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("location: ../dashboard.php");
    die();
}
