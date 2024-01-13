<?php
require_once 'includes/config_session.inc.php';
require_once 'model/dashboard_model.php';
require_once 'includes/dbh.inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<?php
require_once 'includes/header.php';
?>

<body class="bg-gray-100">
    <?php
    require_once 'includes/navbar.php';
    require_once 'includes/sidebar.php';
    ?>
    <div class="container mt-5">
        <br>
        <br>
        
        <?php
        $ctgr = $_GET['ctgr'];
        $Articles = get_article_by_categorie($pdo, $ctgr);
        

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

                                
                                <div class="container mt-5">


                                </div>

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

                                    <a href="Article_details.php?id=<?= $Article['id']; ?>" class="btn btn-primary"><i class="fas fa-eye"></i> View Details</a>


                                   

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

</body>

</html>