<?php




function set_tag(object $pdo, string $name){

    // SQL query with placeholders
    $query = "INSERT INTO tags (name) VALUES (:name)";

    // Prepare the SQL statement
    $stmt = $pdo->prepare($query);

   
    // Bind parameters to the placeholders
    $stmt->bindParam(":name", $name);
   

    // Execute the prepared statement and handle errors
    if (!$stmt->execute()) {
        // Handle the error, e.g., log it or show a user-friendly message
        echo "Error: " . implode(" ", $stmt->errorInfo());
    }
}
