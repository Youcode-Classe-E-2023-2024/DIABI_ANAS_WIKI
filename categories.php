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

<header>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

</header>
<body class="bg-gray-100">
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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addcategorieModal"><i class="fas fa-plus"></i> Add Category</button>
        <br>
        <?php
        $ctgsData = get_categories_and_count($pdo);
        $ctgs = $ctgsData['ctgrs'];
        if (count($ctgs) === 0) {
            echo "<div class='container mt-5'>";
            echo "<h2>No Categories available</h2>";
            echo "<p>There are currently no Categories to display.</p>";
            echo "</div>";
        } else { ?>
            <br><br>
            <h2 class="mb-4">Existing Categories</h2>

            <div class="row">


                <?php

                foreach ($ctgs as $ctg) {
                ?>
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?= $ctg['name']; ?></h5>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-primary" onclick="setCategoryName('<?= $ctg['name']; ?>')" data-toggle="modal" data-target="#updatecategorieModal"><i class="fas fa-plus"></i> edit</button>
                                    <a href="#" class="btn btn-danger" onclick="confirmDelete(<?= $ctg['id']; ?>)">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                }
                ?>
            <?php
        }
            ?>
            </div>
    </div>

    <script>
        function setCategoryName(categoryName) {
            // Set the category name to a hidden input field in the modal form
            document.getElementById('ctgname').value = categoryName;
            document.getElementById('ctgname2').value = categoryName;
        }
    </script>

    <?php include_once 'add_modals.php'; ?>

    <!-- Bootstrap JS Bundle (Popper included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>


<script>
    function confirmDelete(ctgrId) {
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
                window.location.href = "delete_archive/delete_categorie.php?del=" + ctgrId});
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: "Cancelled",
                    text: "Your Categorie is safe :)",
                    icon: "error"
                });
            }
        });
    }
</script>


</html>