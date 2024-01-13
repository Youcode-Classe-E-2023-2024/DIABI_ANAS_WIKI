<?php

require_once 'dbh.inc.php';
require_once '../model/dashboard_model.php';


if (isset($_POST["submit"])) {

    $name = $_POST['tagName'];

    try {


        set_tag($pdo, $name);
        header("location: ../tags.php?add_tag=success");
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} elseif (isset($_POST["update"])) {

    $name = $_POST["tagname"];
    $newName = $_POST['newtagname'];
    $tagData = get_tag_id($pdo, $name);

    $id = $tagData;

    update_tag($pdo, $newName, $id);
    header("location: ../tags.php?update_tag=success");
    exit(); // Add this line to prevent further code execution after the header redirect


} else {
    $tagid = $_GET["tagid"];
    $artclid = $_GET["artclid"];
    

    assign_tag($pdo,  $artclid, $tagid);

    header("location: ../Articles.php?assign_tag=success");
    exit();
}
