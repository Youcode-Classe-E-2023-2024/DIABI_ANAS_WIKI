<?php

declare(strict_types=1);

function input_data()
{


    if (
        isset($_SESSION["input_data"]["username"])
        && !isset($_SESSION["errors_signup"]["username_taken"])
    ) {
        echo '    <div class="form-group">
                            <label for="registerUsername">Username:</label>
                            <input type="text" required class="form-control" id="registerUsername" name="username" value="' . $_SESSION["input_data"]["username"] . '" >
                        </div>';
    } else {
        echo '<div class="form-group">
                            <label for="registerUsername">Username:</label>
                            <input type="text" required class="form-control" id="registerUsername" name="username" >
                        </div>';
    }
    if (
        isset($_SESSION["input_data"]["email"])
        && !isset($_SESSION["errors_signup"]["email_taken"])
        && !isset($_SESSION["errors_signup"]["invalid_email"])
    ) {

        echo '    <div class="form-group">
                            <label for="registerEmail">Email:</label>
                            <input type="email" required class="form-control" id="registerEmail" name="email" value="' . $_SESSION["input_data"]["email"] . '" >
                        </div>';
    } else {
        echo '<div class="form-group">
                            <label for="registerEmail">Email:</label>
                            <input type="email" required class="form-control" id="registerEmail" name="email" >
                        </div>';
    }
    echo '<div class="form-group">
                        <label for="registerPassword">Password:</label>
                        <input type="password" required class="form-control" id="registerPassword" name="pwd" >
                    </div>';
}

function check_signup_errors()
{
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];

        echo "<br>";
        foreach ($errors as $error) {
            echo '<p class="error">' . $error . "<br>" . '</p>';
        }

        unset($_SESSION['errors_signup']);
    } else if (isset($_GET["signup"]) && $_GET["signup"] == "success") {
        echo '<br>';
        echo '<p class="success"> Signup success!</p>';
    }
}
