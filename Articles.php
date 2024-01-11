<?php
require_once 'includes/config_session.inc.php';
require_once 'model/dashboard_model.php';
require_once 'includes/dbh.inc.php';

?>
<?php
require_once('includes/header.php');
if (!isset($_SESSION["user_id"])) {
    header("location: index.php");
}
if ($_SESSION["role"] !='admin') {
    header("location: index.php");
}
?>

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
        .carded {
            padding: 40px;
            border-radius: 15px;
        }
    </style>
    <title>Your Title</title>


</head>

<body>
    <?php
    include_once 'includes/navbar.php';
    ?>


    <!-- sidebar -->
    <?php
    include_once 'includes/sidebar.php';
    ?>

    <div class="container mt-5">
    <br>
        <br>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addarticleModal"><i class="fas fa-plus"></i> Add article</button>
<br>
        <?php
        $ArticlesData = get_articles_and_count($pdo);
        $Articles = $ArticlesData['artcls'];

        if (count($Articles) === 0) {
            echo "<div class='container mt-5'>";
            echo "<h2>No articles available</h2>";
            echo "<p>There are currently no articles to display.</p>";
            echo "</div>";
        } else {
        ?>
        <br><br>
            <h2 class="mb-4">Existing articles</h2>

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
                                    <?php if($Article['status'] === 'public' ){?>
                                    <a href="delete_archive/archive_Article.php?arch=<?= $Article['id']; ?>" class="btn btn-danger"><i class="fas fa-archive"></i> Archive</a>
                               <?php }else {?>
                                <a href="delete_archive/archive_Article.php?pub=<?= $Article['id']; ?>" class="btn btn-danger"><i class="fas fa-archive"></i> publish</a>

                               <?php  } ?>
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
    </div>

    <?php include_once 'add_modals.php'; ?>

    <!-- Bootstrap JS Bundle (Popper included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/your-fontawesome-kit-id.js" crossorigin="anonymous"></script>
</body>


</html>