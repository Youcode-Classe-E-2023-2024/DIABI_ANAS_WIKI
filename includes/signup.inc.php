<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    try {

        require_once 'dbh.inc.php';
        require_once 'model\signup_model.inc.php';
        require_once 'controller\signup_contr.inc.php';

        //! Error handlers

        $errors = [];

        if (is_input_empty($username, $pwd, $email)) {

            $errors["empty_input"] = "Fill in all the fields";
        }
        if (is_email_invalid($email)) {

            $errors["invalid_email"] = "invalid email!!";
        }

        if (is_username_taken($pdo, $username)) {

            $errors["username_taken"] = "username taken!!";
        }
        if (is_email_registered($pdo, $email)) {

            $errors["email_taken"] = "email taken!!";
        }

        require_once 'config_session.inc.php';


        if ($errors) {
            $_SESSION["errors_signup"] = $errors;
            $inputData = [
                "username" => $username,
                "email" => $email
            ];
            $_SESSION["input_data"] = $inputData;


            header("location: ../index.php");
            die();
        }


        create_user($pdo, $email, $pwd,  $username);

        header("location: ../index.php?signup=success");
        $pdo = null;
        $stmt = null;


        //***************************************** */



    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("location: ../index.php");
    die();
}
