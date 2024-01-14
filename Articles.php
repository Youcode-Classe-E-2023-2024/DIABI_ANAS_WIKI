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
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

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

        .paragraph {
            font-family: 'Montserrat', sans-serif;
        }

        a:hover {
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
    <?php if ($_SESSION["role"] === 'admin') {

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
                            <div class=" card shadow-lg ">

                                <div class="<?= ($Article['status'] === 'archived') ? 'text-muted ' : ''; ?>card-body">

                                    <h5 class="card-title inline"><?= 'Title: ' . $Article['title']; ?></h5>

                                    <div class="dropdown mt-3 inline">
                                        <button class="btn btn-warning dropdown-toggle" style="margin-left: 80px;" type="button" id="categoryDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-tag"></i>

                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="categoryDropdown">
                                            <?php
                                            $tagData = get_tags_and_count($pdo);
                                            $tags = $tagData['tags'];

                                            foreach ($tags as $tag) {
                                                echo '<a href="includes/tag.inc.php?artclid=' . $Article['id'] . '&tagid=' . $tag['id'] . '"  class="dropdown-item" style="width:fit-content;">' . $tag['name'] . '</a>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="container mt-5">


                                    </div>
                                    <?php
                                    $auteurid = $Article['user_id'];

                                    $auteur = get_user_by_id($pdo, $auteurid);  ?>
                                    <p class="card-subtitle mb-2 text-muted"><?= 'Auteur: ' . $auteur; ?></p>

                                    <p class="card-subtitle mb-2 text-muted"><?= 'Status: ' . $Article['status']; ?></p>
                                    <p class="card-subtitle mb-2 text-muted"><?php
                                                                                $id = $Article['category_id'];
                                                                                if ($id != false) {
                                                                                    $ctgrname = get_ctgr_name($pdo, $id);

                                                                                    echo 'Category: ' . $ctgrname;
                                                                                } else {
                                                                                    echo 'No Assigned categories';
                                                                                }
                                                                                ?></p>
                                    <p class="card-subtitle mb-2 text-muted"><?php
                                                                                $id = $Article['id'];
                                                                                $tagIds = get_article_tag($pdo, $id);
                                                                                $tags = [];

                                                                                if (!empty($tagIds)) {
                                                                                    foreach ($tagIds as $tagId) {
                                                                                        $tagName = get_tag_name_by_id($pdo, $tagId);
                                                                                        $tags[$tagId] = $tagName;
                                                                                    }
                                                                                }

                                                                                ?>

                                    <p class="card-subtitle mb-2 text-muted">
                                        <?php if (!empty($tags)) : ?>
                                            <strong>Assigned Tags:</strong>
                                            <select>
                                                <?php foreach ($tags as $tagId => $tagName) : ?>
                                                    <option value="<?= $tagId; ?>"><?= $tagName; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        <?php else : ?>
                                            <em>No Assigned Tags</em>
                                        <?php endif; ?>
                                    </p>
                                    </p>
                                    <div class="content-container overflow-hidden" style="height: 95px;">
                                        <p class="card-text"><?= '<h6>Content:</h6>' . $Article['content']; ?></p>
                                    </div>
                                    <div class="btn-group mt-3" role="group">

                                        <a href="Article_details.php?id=<?php echo $Article['id']; ?>&artclctgr=<?php echo urlencode($ctgrname); ?>&auteurid=<?php echo $Article['user_id']; ?>" class="btn btn-primary"><i class="fas fa-eye"></i> View Details</a>


                                        <?php if ($Article['status'] === 'public') { ?>
                                            <a href="#" class="btn btn-danger" onclick="confirmarchive(<?= $Article['id']; ?>, 'archived')">
                                                <i class="fas fa-archive"></i> Archive
                                            </a>
                                        <?php } else { ?>
                                            <a href="#" class="btn btn-info" onclick="confirmarchive(<?= $Article['id']; ?>, 'public')">
                                                <i class="fas fa-archive"></i> Publier
                                            </a> <?php } ?>

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



    <?php
    } else { ?>
        <div class="container mt-5">
            <br>
            <br>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addarticleModal"><i class="fas fa-plus"></i> Add article</button>
            <br>
            <?php

            $id = $_SESSION["user_id"];

            $Articles = get_user_articles($pdo, $id);

            if (count($Articles) === 0) {
                echo "<div class='container mt-5'>";
                echo "<h2>You have no articles available</h2>";
                echo "<p>There are currently no articles to display.</p>";
                echo "</div>";
            } else {
            ?>
                <br><br>
                <h2 class="mb-4">Your articles</h2>

                <div class="row">
                    <?php
                    foreach ($Articles as $Article) {
                    ?>
                        <div class="col-lg-4 mb-4">
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <h5 class="card-title"><?= 'Title: ' . $Article['title']; ?></h5>
                                    <?php
                                    $auteurid = $Article['user_id'];

                                    $auteur = get_user_by_id($pdo, $auteurid);  ?>
                                    <p class="card-subtitle mb-2 text-muted"><?= 'Auteur: ' . $auteur; ?></p>
                                    <p class="card-subtitle mb-2 text-muted"><?= 'Status: ' . $Article['status']; ?></p>
                                    <p class="card-subtitle mb-2 text-muted"><?php
                                                                                $id = $Article['category_id'];
                                                                                if ($id != false) {
                                                                                    $ctgrname = get_ctgr_name($pdo, $id);

                                                                                    echo 'Category: ' . $ctgrname;
                                                                                } else {
                                                                                    echo 'No Assigned categories';
                                                                                }
                                                                                ?></p>
                                    <p class="card-subtitle mb-2 text-muted"><?php
                                                                                $id = $Article['id'];
                                                                                $tagIds = get_article_tag($pdo, $id);
                                                                                $tags = [];

                                                                                if (!empty($tagIds)) {
                                                                                    foreach ($tagIds as $tagId) {
                                                                                        $tagName = get_tag_name_by_id($pdo, $tagId);
                                                                                        $tags[$tagId] = $tagName;
                                                                                    }
                                                                                }

                                                                                ?>

                                    <p class="card-subtitle mb-2 text-muted">
                                        <?php if (!empty($tags)) : ?>
                                            <strong>Assigned Tags:</strong>
                                            <select>
                                                <?php foreach ($tags as $tagId => $tagName) : ?>
                                                    <option value="<?= $tagId; ?>"><?= $tagName; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        <?php else : ?>
                                            <em>No Assigned Tags</em>
                                        <?php endif; ?>
                                    </p>
                                    </p>
                                    <div class="content-container overflow-hidden" style="height: 95px;">
                                        <p class="card-text"><?= '<h6>Content:</h6>' . $Article['content']; ?></p>
                                    </div>
                                    <div class="btn-group mt-3" role="group">
                                        <a href="Article_details.php?id=<?php echo $Article['id']; ?>&artclctgr=<?php echo urlencode($ctgrname); ?>&auteurid=<?php echo $Article['user_id']; ?>" class="btn btn-primary"><i class="fas fa-eye"></i> View Details</a>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" onclick="setartclDetails('<?= $Article['title']; ?>', '<?= $Article['content']; ?>', '<?= $Article['category_id']; ?>', '<?= $Article['id']; ?>')" data-target="#eidtearticleModal"><i class="fas fa-plus"></i>Edit</button>

                                        <a href="#" class="btn btn-danger" onclick="confirmDelete(<?= $Article['id']; ?>)">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </a>
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
    <?php
    }
    ?>
    <script>
        function setartclDetails(artclTitle, artclContent, ctgrId, artclId) {
            // Set the category name to a hidden input field in the modal form
            document.getElementById('artclTitle').value = artclTitle;
            document.getElementById('artclContent').value = artclContent;
            document.getElementById('selectedCategoryId').value = ctgrId;
            document.getElementById('artclId').value = artclId;
        }
    </script>
    <?php include_once 'add_modals.php'; ?>

    <!-- Bootstrap JS Bundle (Popper included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/your-fontawesome-kit-id.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

</body>

<script>
    function confirmDelete(articleId) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                swalWithBootstrapButtons.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                }).then(() => {
                    // If confirmed, redirect to the delete URL
                    window.location.href = "delete_archive/archive_Article.php?del=" + articleId
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: "Cancelled",
                    text: "Your article is safe :)",
                    icon: "error"
                });
            }
        });
    }
</script>



<script>
    function confirmarchive(artclId, status) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No, cancel!",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                swalWithBootstrapButtons.fire({
                    title: "Updated!",
                    text: "Status Changed!!.",
                    icon: "success"
                }).then(() => {
                    window.location.href = "delete_archive/archive_Article.php?id=" + artclId + "&status=" + status;
                });


            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: "Cancelled",
                    text: "Your Article is safe :)",
                    icon: "error"
                });
            }
        });
    }
</script>

</html>