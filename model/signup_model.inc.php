<?php

declare(strict_types= 1);

function get_username(object $pdo, string $username) {
    $query = "SELECT username FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}



function get_email(object $pdo, string $email) {
    $query = "SELECT username FROM users WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function set_user(object $pdo, string $email, string $pwd, string $username , string $edited_at) {

    // SQL query with placeholders
    $query = "INSERT INTO users (username, pwd, email) VALUES (:username, :pwd, :email)";

    // Prepare the SQL statement
    $stmt = $pdo->prepare($query);

    // Hash the password using BCRYPT algorithm
    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT);

    // Bind parameters to the placeholders
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":pwd", $hashedPwd);
    $stmt->bindParam(":email", $email);

    // Execute the prepared statement and handle errors
    if (!$stmt->execute()) {
        // Handle the error, e.g., log it or show a user-friendly message
        echo "Error: " . implode(" ", $stmt->errorInfo());
    }
}

