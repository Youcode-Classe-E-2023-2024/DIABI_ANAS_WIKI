
<?php
require_once 'includes/config_session.inc.php';
require_once 'model/dashboard_model.php';
require_once 'includes/dbh.inc.php';

?>
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
                            <form id="signupForm" method="POST">
                                <?php

                                input_data();

                                ?>
                                <button type="submit" name="submit" class="btn btn-success">Register</button>
                            </form>
                            <div id="signupErrorMessages" class="mt-3"></div>
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

<div class="container mt-5">
            <br>
            <br>
            <br>
            <?php

            $Articles = get_published_articles($pdo);
            

            if (count($Articles) === 0) {
                echo "<div class='container mt-5'>";
                echo "<h2>No articles available</h2>";
                echo "<p>There are currently no articles to display.</p>";
                echo "</div>";
            } else {
            ?>
                <br><br>
                <h2 class="mb-4">Articles</h2>

                <div class="row">
                    <?php
                    foreach ($Articles as $Article) {
                    ?>
                        <div class="col-lg-4 mb-4">
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <h5 class="card-title"><?= 'Title: ' . $Article['title']; ?></h5>
                                    <p class="card-subtitle mb-2 text-muted"><?= 'Status: ' . $Article['status']; ?></p>
                                    <p class="card-subtitle mb-2 text-muted"><?php
                                                                                $id = $Article['category_id'];
                                                                                $ctgrname = get_ctgr_name($pdo, $id);
                                                                                echo 'Category: ' . $ctgrname;
                                                                                ?></p>
                                    <div class="content-container overflow-hidden" style="height: 95px;">
                                        <p class="card-text"><?= '<h6>Content:</h6>' . $Article['content']; ?></p>
                                    </div>
                                    <div class="btn-group mt-3" role="group">
                                        <a href="view_Article.php?id=<?= $Article['id']; ?>" class="btn btn-primary"><i class="fas fa-eye"></i> View Details</a>

                                       

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            <?php
            }
            ?>



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
                    url: "includes/signup.inc.php", // Use the correct path to your signup_ajax.php file
                    data: formData,
                    success: function(response) {
                        var data = JSON.parse(response);
                        if (data.success) {
                            alert("Signup successful!"); // You can redirect or perform other actions here
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