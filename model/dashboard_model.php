<?php

require_once 'includes\dbh.inc.php'; 




function get_tags(object $pdo){
    $tableName = 'tags'; // Replace with your table name
    $query = "SELECT COUNT(*) as rowCount FROM $tableName";
    $statement = $pdo->query($query);
if ($statement) {
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    $rowCount = $result['rowCount'];

    echo " $rowCount";
} else {
    echo "Error executing query: " . implode(" ", $pdo->errorInfo());
}
}

function get_articles(object $pdo){
    $tableName = 'articles'; // Replace with your table name
    $query = "SELECT COUNT(*) as rowCount FROM $tableName";
    $statement = $pdo->query($query);
if ($statement) {
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    $rowCount = $result['rowCount'];

    echo " $rowCount";
} else {
    echo "Error executing query: " . implode(" ", $pdo->errorInfo());
}
}

function get_users(object $pdo){
    $tableName = 'users'; // Replace with your table name
    $query = "SELECT COUNT(*) as rowCount FROM $tableName";
    $statement = $pdo->query($query);
if ($statement) {
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    $rowCount = $result['rowCount'];

    echo " $rowCount";
} else {
    echo "Error executing query: " . implode(" ", $pdo->errorInfo());
}
}