<?php
require_once 'includes/config_session.inc.php';
require_once 'view\signup_view.inc.php';
require_once 'view\login_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Registration</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- style -->
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
            <?php
            output_username()
            ?>
            <?php
            if (isset($_SESSION["user_id"])) { ?>
            <form class="form-inline my-2 my-lg-0" action="includes\logout.inc.php" method="post">
                <button class="btn btn-danger">Logout</button>

            </form>
                <?php } ?>
        </div>
    </nav>

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
                        <form action="includes/signup.inc.php" method="POST">
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