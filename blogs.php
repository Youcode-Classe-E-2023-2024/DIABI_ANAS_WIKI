<?php
require_once 'includes/config_session.inc.php';
require_once 'view\signup_view.inc.php';
require_once 'view\login_view.inc.php';

?>
<?php
require_once('includes/header.php');
if (!isset($_SESSION["user_id"])) {
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">


<body>
<?php
    include_once 'includes/navbar.php';
    ?>
    

    <!-- sidebar -->
    <?php
    include_once 'includes/sidebar.php';
    ?>

<div class="container mt-5">
    <h2 class="mb-4">Existing Blogs</h2>

    <div class="row">
        <!-- Blog Cards (Assuming data is retrieved from a backend) -->
        <?php
        // Sample data (replace this with your actual data retrieval logic)
        $blogs = [
            ['id' => 1, 'title' => 'Blog 1', 'content' => 'Lorem ipsum dolor sit amet.'],
            ['id' => 2, 'title' => 'Blog 2', 'content' => 'Consectetur adipiscing elit.'],
            ['id' => 3, 'title' => 'Blog 3', 'content' => 'Pellentesque habitant morbi tristique senectus.'],
            ['id' => 3, 'title' => 'Blog 3', 'content' => 'Pellentesque habitant morbi tristique senectus.'],
            ['id' => 3, 'title' => 'Blog 3', 'content' => 'Pellentesque habitant morbi tristique senectus.'],
        ];

        foreach ($blogs as $blog) {
            ?>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $blog['title']; ?></h5>
                        <p class="card-text"><?= $blog['content']; ?></p>
                        <a href="view_blog.php?id=<?= $blog['id']; ?>" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>

<!-- Bootstrap JS Bundle (Popper included) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
