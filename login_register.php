<!DOCTYPE html>
<html lang="en">
<?php
include("includes/header.php");
?>

<body>
    <?php
    if (isset($_SESSION["user_id"])) {
        header("location: index.php");
    }
    ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Login Form -->
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Login</h2>
                    </div>
                    <div class="card-body">


                        <form id="loginForm" action="includes/login.inc.php" method="POST">
                            <div class="form-group">
                                <label for="loginEmail">User Name:</label>
                                <input type="text" class="form-control" id="loginusername" name="username">
                            </div>
                            <div class="form-group">
                                <label for="loginPassword">Password:</label>
                                <input type="password" class="form-control" id="loginPassword" name="pwd">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Login</button>
                        </form>
                        <div id="loginErrorMessages" class="mt-3"></div>



                        <?php check_login_errors()  ?>


                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <!-- Signup Form -->
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Registration</h2>
                    </div>
                    <div class="card-body">
                        <form id="signupForm" method="POST">
                            <?php

                            input_data();

                            ?>
                            <button type="submit" name="submit" class="btn btn-success">Register</button>
                        </form>
                        <div id="signupErrorMessages" class="mt-3"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            console.log("Script is running!");
            $("#signupForm").submit(function(event) {
                event.preventDefault(); // Prevent the default form submission
                var formData = $(this).serialize(); // Serialize the form data
                $.ajax({
                    type: "POST",
                    url: "includes/signup.inc.php",
                    data: formData,
                    success: function(response) {
                        var data = JSON.parse(response);
                        if (data.success) {
                            alert("Signup successful!");
                        } else {
                            // Display errors in the designated div
                            $("#signupErrorMessages").html("<div class='alert alert-danger'>" + data.errors.join('<br>') + "</div>");
                        }
                    }
                });
            });
        });
    </script>

</body>

</html>