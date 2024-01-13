<?php
require_once 'includes/config_session.inc.php';
require_once 'model/dashboard_model.php';
require_once 'includes/dbh.inc.php';

?>
<?php
require_once('includes/header.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Article Display</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <!-- Custom style to override h2 size -->
    <style>
        .paragraph {
            font-family: 'Montserrat', sans-serif;
        }

        a:hover {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <?php
    include_once 'includes/navbar.php';
    ?>


    <!-- sidebar -->
    <?php
    include_once 'includes/sidebar.php';
    $id = $_GET['id'];
    $artclctgr = $_GET['artclctgr'];
    $auteurid = $_GET['auteurid'];

    $auteur = get_user_by_id($pdo, $auteurid);

    $Article = get_article_by_id($pdo, $id);


    ?>
    <div class="container mt-44">
        <div class="card">
            <img src="article_image.jpg" class="card-img-top" alt="Article Image">
            <div class="card-body">
                <h2 class="card-title"><?= $Article['title']; ?></h2>
                <p class="card-text"><?= $Article['content']; ?></p>
                <div class="row">
                    <div class="col-md-6">
                        <p class="card-text"><i class="fas fa-folder"></i> <strong>Category:</strong> <?= $artclctgr; ?></p>
                    </div>
                    <div class="col-md-6">
                        <p class="card-text"><i class="fas fa-user"></i> <strong>Author:</strong> <?= $auteur; ?></p>
                    </div>
                </div>

                <hr>

                <?php
                $tagIds = get_article_tag($pdo, $id);
                $tags = [];

                if (!empty($tagIds)) {
                    foreach ($tagIds as $tagId) {
                        $tagName = get_tag_name_by_id($pdo, $tagId);
                        $tags[$tagId] = $tagName;
                    }
                }
                ?>

                <div class="row inline flex">
                    <div class="col-md-6">
                        <p class="card-subtitle text-muted">
                            <?php if (!empty($tags)) : ?>
                                <i class="fas fa-tags"></i> <strong>Assigned Tags:</strong>
                                <?php foreach ($tags as $tagId => $tagName) : ?>
                                    <span class="badge badge-pill badge-info"><?= $tagName; ?></span>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <i class="fas fa-exclamation-circle"></i> <em>No Assigned Tags</em>
                            <?php endif; ?>
                        </p>
                    </div>

                    <div class="col-md-6">
                        <time class="relative inline z-10 order-first mb-3 flex items-center text-sm text-zinc-400 dark:text-zinc-500 pl-3.5" datetime="2022-09-05">
                            <span class="absolute inset-y-0 left-0 flex items-center" aria-hidden="true">
                                <span class="h-4 w-0.5 rounded-full bg-zinc-200 dark:bg-zinc-500"></span>
                            </span>
                            <?php
                            $createdAt = $Article['createdAt'];
                            convert_article_created_date($createdAt)
                            ?>
                        </time>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>