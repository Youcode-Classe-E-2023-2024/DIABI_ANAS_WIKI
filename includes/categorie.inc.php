<?php

require_once 'dbh.inc.php';
require_once '../model/dashboard_model.php';


if (isset($_POST["submit"])) {
    // Handle form submission for adding a category
    $name = $_POST['ctgname'];

    try {
        set_categorie($pdo, $name);
        header("location: ../categories.php?add_categorie=success");
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

} elseif (isset($_POST["update"])) {
    // Handle form submission for updating a category
    $name = $_POST['ctgname'];
    $newName = $_POST['newctgrname'];

    $ctgData = get_ctgr_id($pdo, $name);

   
        $id = $ctgData;
        update_categorie($pdo, $newName, $id);

        header("location: ../categories.php?update_categorie=success");
        exit(); // Add this line to prevent further code execution after the header redirect
    
} else {
    // Redirect to dashboard if no form submitted
    header("location: ../dashboard.php");
    exit(); // Add this line to prevent further code execution after the header redirect
}

?>
