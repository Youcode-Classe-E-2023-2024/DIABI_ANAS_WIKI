<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    

    try {
        require_once 'dbh.inc.php';
        require_once '../model/login_model.inc.php';
        require_once '../controller/login_contr.inc.php';


        //! ERROR HANDLERS

        $errors = [];

        if (is_input_empty($username, $pwd)) {

            $errors["empty_input"] = "Fill in all the fields";
        }

        $result = get_user($pdo, $username);

        if (is_username_wrong($result)) {
            $errors["login_incorrect"] = "Incorrect username";
        }
        if (is_username_wrong($result) || !is_password_wrong($pwd, $result["pwd"])) {
            $errors["login_incorrect"] = "Incorrect informations.";
        }

        require_once 'config_session.inc.php';


        if ($errors) {
            $_SESSION["errors_login"] = $errors;

        
            header("location: ../login_register.php");
            die();
        }

        //Creating a new session id

            $newSessionId = session_create_id();
            $sessionId = $newSessionId . "_" . $result["id"] ;
            session_id($sessionId);
           
            $_SESSION["role"] = $result["role"];
            $_SESSION["user_id"] = $result["id"];
            $_SESSION["user_username"] = htmlspecialchars($result["username"]);

            $_SESSION["last_regeneration"] = time();

            $userRole = $result["role"]; 

            // Check the user's role and redirect accordingly
            if ($userRole === "admin") {
                header("location: ../dashboard.php?login=success");
            } elseif ($userRole === "auteur") {
                header("location: ../nouveaute.php?login=success");
            } else {    
                // Handle unknown or undefined roles
                
                header("location: ../error.php");
            }
            $pdo = null;
            $statement = null;

            die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../login_register.php");
    die();
}
