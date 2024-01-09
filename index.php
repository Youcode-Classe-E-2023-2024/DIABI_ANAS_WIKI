<?php
include_once 'includes/header.php';
?>

<body>
    <?php
    include_once 'includes/navbar.php';
    ?>
    <?php
    include_once 'includes/sidebar.php';
    ?>
    <?php

    if (!isset($_SESSION["user_id"])) { ?>

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <!-- Login Form -->
                    <div class="card">
                        <div class="card-header">
                            <h2 class="text-center">Login</h2>
                        </div>
                        <div class="card-body">


                            <form action="includes/login.inc.php" method="POST">
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




                            <?php

                            check_login_errors();

                            ?>
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
                            <form action="includes\signup.inc.php" method="POST">
                                <?php

                                input_data();

                                ?>
                                <button type="submit" name="submit" class="btn btn-success">Register</button>
                            </form>
                            <?php

                            check_signup_errors();

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php }
    ?>


    <script src="script.js"></script>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>