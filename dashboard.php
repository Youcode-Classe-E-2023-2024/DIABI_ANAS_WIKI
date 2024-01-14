<?php

require_once 'view\signup_view.inc.php';
require_once 'view\login_view.inc.php';
require_once 'model\dashboard_model.php';
require_once 'includes\dbh.inc.php';

?>
<?php
require_once('includes/header.php');
if (!isset($_SESSION["user_id"])) {
    header("location: index.php");
}
?>

<!--
    colers : blue = #4A9DEC / white / black
    font : class taillwind "italic font-mono"
 -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-dfJvW1RlZj5FpxJ3z9+uL4P6blgM5ZPaUwT4uFR16n1UvA6HgPQ9CExlJEPi2Jmw" crossorigin="anonymous">
    <!--- Css File Link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Bootstrap CSS -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

    <!-- Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-dfJvW1RlZj5FpxJ3z9+uL4P6blgM5ZPaUwT4uFR16n1UvA6HgPQ9CExlJEPi2Jmw" crossorigin="anonymous">
    <style>
        body{
            background-image: url(imgs/Theimage.jpg);
            background-size: 100%;
        }
        .carded {
            padding: 40px;
            border-radius: 15px;
        }
        .paragraph{
        font-family: 'Montserrat', sans-serif;
    }
    a:hover{
    text-decoration: none;
 }
        
    </style>
    <title>Your Title</title>


</head>

<body class="bg-gray-100">
    <?php
    include_once 'includes/navbar.php';
    ?>


    <!-- sidebar -->
    <?php
    include_once 'includes/sidebar.php';
    ?>




<div class="container  mt-20">
    <div class="row">

        <div class="col-lg-4 mb-4 rounded">
            <div class="carded shadow-lg bg-light text-dark p-3">
            <h5 class="card-title"><i class="fas fa-newspaper"></i> Articles</h5>
                <p class="card-text">Total articles: <?php $artclsData =  get_articles_and_count($pdo);
                                                        $count = $artclsData['count'];
                                                        echo $count;
                                                        ?></p>
                <a href="articles.php" class="btn btn-danger"><i class="fas fa-eye"></i> View Articles</a>
            </div>
        </div>

        <div class="col-lg-4 mb-4 rounded">
            <div class="carded shadow-lg bg-light text-dark p-3">
            <h5 class="card-title"><i class="fas fa-tags"></i> Tags</h5>
                    <p class="card-text">Total Tags: <?php $tagsData = get_tags_and_count($pdo);
                                                    $count = $tagsData['count'];
                                                    echo $count;
                                                    ?></p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTagModal"><i class="fas fa-plus"></i> Add Tag</button>
                <a href="tags.php" class="btn btn-danger"><i class="fas fa-eye"></i> View Tags</a>
            </div>
        </div>

        <div class="col-lg-4 mb-4 rounded">
            <div class="carded shadow-lg bg-light text-dark p-3">
            <h5 class="card-title"><i class="fas fa-folder"></i> Categories</h5>
                <p class="card-text">Total categories: <?php $ctgrsData = get_categories_and_count($pdo);
                                                            $count = $ctgrsData['count'];
                                                            echo $count; ?></p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addcategorieModal"><i class="fas fa-plus"></i> Add Category</button>
                <a href="categories.php" class="btn btn-warning"><i class="fas fa-eye"></i> View Categories</a>
            </div>
        </div>

    </div>
</div>

    <!-- Add Tag Modal -->
    <?php include_once 'add_modals.php'; ?>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>



</html>