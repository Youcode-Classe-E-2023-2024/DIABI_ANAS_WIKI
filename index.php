<?php
require_once 'includes/config_session.inc.php';
require_once 'model/dashboard_model.php';
require_once 'includes/dbh.inc.php';

?>
<?php
include_once 'includes/header.php';
?>
<style>
    body {
        box-sizing: border-box;
        background-image: url(imgs/Theimage1.png);
            background-size: 100%;
    }

    a {
        display: inline;
    }

    .paragraph {
        font-family: 'Montserrat', sans-serif;
        display: inline;
    }

    .container {
        margin-top: 100px;
        border-radius: 20%;
    }

    a:hover {
        text-decoration: none;
    }

    .container h1 {
        text-align: center;
    }

    .carded {
        height: 100%;
        transition: 0.3s;
    }

    .carded:hover {
        box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
    }

    .carded:hover .yell {
        color: #FFFF00;
    }

    .flex {
        display: flex;
    }

    .shaded {
        text-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;

    }

    .yell {

        /* Yellow color code */
        margin-left: 5px;
        line-height: 15px;
    }

    .card-title1 {
        font-size: 1.5rem;
        margin-bottom: 10px;
    }

    .card-title1:hover {
        color: #fff;
    }

    .category-link {
        color: #fff;
        text-decoration: none;
    }

    .category-link:hover {
        text-decoration: underline;
    }

    .view-articles-link {
        color: #fff;
        text-decoration: none;
        /* Remove underline */
    }

    .view-articles-link:hover {
        text-decoration: none;
        color: #FFFF00;

    }
</style>

<body class="bg-gray-100">
    <?php
    include_once 'includes/navbar.php';
    ?>
    <?php
    include_once 'includes/sidebar.php';
    ?>






    <div class="container">

        <div class="row">
            <?php
            // Assuming get_latest_categories returns an array of the latest categories
            $latestCategories = get_latest_categories($pdo, 3);

            foreach ($latestCategories as $category) {
            ?>
                <div class="col-lg-4 mb-4 ">
                    <a class="view-articles-link" href="categorie_articles.php?ctgr=<?php echo $category['id']; ?>">

                        <div class="carded shadow-lg rounded-lg bg-danger text-white p-3">
                            <h5 class="card-title1 mb-4">
                                <i class="fas fa-folder"></i>
                                <?php echo $category['name']; ?>
                            </h5>

                            <div class="flex">
                                <i class="yell fas fa-newspaper"></i>
                                <p class="yell">View Related Articles</p>
                            </div>
                            <!-- Add any additional information you want to display for each category -->
                        </div>
                    </a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <div class="container mt-5">
        <br>
        <br>
        <br>
        <?php

        $Articles = get_published_articles($pdo);
        $latestArticles = get_latest_articles($pdo);

        if (count($latestArticles) === 0) {
            echo "<div class='container mt-5'>";
            echo "<h2 class='mb-4 display-4 font-weight-bold shaded  d-inline-block px-3 py-2 rounded'>No articles available</h2>";
            echo "<p class='text-white'>There are currently no articles to display.</p>";
            echo "</div>";
        } else {

        ?>
            <br><br>
            <h2 class="mb-4 display-4 font-weight-bold shaded  d-inline-block px-3 py-2 rounded">Latest Articles</h2>
            <div class="row">
                <?php
                foreach ($latestArticles as $Article) {
                ?>
                    <div class="col-lg-4 mb-4">
                        <div class="card shadow-lg  transparent-card">
                            <div class="card-body">
                                <h5 class="card-title"><?= 'Title: ' . $Article['title']; ?></h5>
                                <?php
                                $auteurid = $Article['user_id'];

                                $auteur = get_user_by_id($pdo, $auteurid);  ?>
                                <p class="card-subtitle mb-2 text-muted"><?= 'Auteur: ' . $auteur; ?></p>

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

                                                                                    if ($tagName !== false) {
                                                                                        $tags[$tagId] = $tagName;
                                                                                    } 
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
        <?php
        if (count($Articles) > 0) {
            
        ?>
            <br><br>
            <h2 class="mb-4 display-4 font-weight-bold shaded   d-inline-block px-3 py-2 rounded">articles:</h2>

            <div class="row">
                <?php
                foreach ($Articles as $Article) {
                ?>
                    <div class="col-lg-4 mb-4">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <?php
                                $auteurid = $Article['user_id'];

                                $auteur = get_user_by_id($pdo, $auteurid);  ?>
                                <p class="card-subtitle mb-2 text-muted"><?= 'Auteur: ' . $auteur; ?></p>

                                <h5 class="card-title"><?= 'Title: ' . $Article['title']; ?></h5>
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


        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
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