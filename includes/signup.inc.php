<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    try {
        require_once 'dbh.inc.php';
        require_once '../model/signup_model.inc.php';
        require_once '../controller/signup_contr.inc.php';

        //! Error handlers
        $errors = [];

        if (is_input_empty($username, $pwd, $email)) {
            $errors[] = "Fill in all the fields";
        }

        if (is_email_invalid($email)) {
            $errors[] = "Invalid email";
        }

        if (is_username_taken($pdo, $username)) {
            $errors[] = "Username is taken";
        }

        if (is_email_registered($pdo, $email)) {
            $errors[] = "Email is already registered";
        }

        if ($errors) {
            $response = [
                'success' => false,
                'errors' => $errors
            ];
            echo json_encode($response);
            die();
        }

        create_user($pdo, $email, $pwd, $username);

        $response = [
            'success' => true
        ];
        echo json_encode($response);

    } catch (PDOException $e) {
        $response = [
            'success' => false,
            'errors' => ['Query failed: ' . $e->getMessage()]
        ];
        echo json_encode($response);
    }
} else {
    $response = [
        'success' => false,
        'errors' => ['Invalid request method']
    ];
    echo json_encode($response);
    die();
}
?>
