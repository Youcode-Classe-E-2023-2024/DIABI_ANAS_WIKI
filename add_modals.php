<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Add Tag</title>
</head>

<body>
    <!-- Content for Add Tag Page -->
    <div class="modal fade" id="addTagModal" tabindex="-1" role="dialog" aria-labelledby="addTagModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTagModalLabel">Add Tag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="includes/tag.inc.php" method="POST">
                        <div class="form-group">
                            <label for="tagName">Tag Name:</label>
                            <input type="text" name="tagName" class="form-control" id="tagName" placeholder="Enter tag name">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Content for Update Tag Page -->
    <div class="modal fade" id="updateTagModal" tabindex="-1" role="dialog" aria-labelledby="updateTagModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateTagModalLabel">Add Tag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="includes/tag.inc.php" method="POST">
                        <div class="form-group">
                            <label for="tagName">Tag Name:</label>
                            <input type="text" value="<?= $tag['name']; ?>" name="newtagname" class="form-control" id="tagname" placeholder="Enter tag name">
                        </div>
                        <input type="hidden" name="tagname" value="<?= $tag['name']; ?>">
                        <input type="hidden" name="action" value="">
                        <button type="submit" name="update" class="btn btn-primary">Update tag</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Content for Add Categorie Page -->

    <div class="modal fade" id="addcategorieModal" tabindex="-1" role="dialog" aria-labelledby="addTagModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addcategorieModal">Add Categorie</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form action="includes/categorie.inc.php" method="POST">
                        <div class="form-group">
                            <label for="tagName">categorie Name:</label>
                            <input type="text" name="ctgname" class="form-control" id="ctgrname" placeholder="Enter categorie name">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Content for Update_Categorie Page -->


    <div class="modal fade" id="updatecategorieModal" tabindex="-1" role="dialog" aria-labelledby="updatectgrModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updatecategorieModal">Update Categorie</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form action="includes/categorie.inc.php" method="POST">
                        <div class="form-group">
                            <label for="tagName">categorie Name:</label>
                            <input type="text" value="<?= $ctg['name']; ?>" name="newctgrname" class="form-control" id="ctgname" placeholder="Enter categorie name">
                        </div>
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="ctgrname" value="<?= $ctg['name']; ?>">
                        <button type="submit" name="update" class="btn btn-primary">Update Category</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Content for Add article Page -->
    <div class="modal fade" id="addarticleModal" tabindex="-1" role="dialog" aria-labelledby="addarticleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addarticleModalLabel">Add article</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="includes/article.inc.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="tagName">Article title:</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter title">
                        </div>
                        <div class="form-group">
                            <label for="tagName">Article content:</label>
                            <textarea name="content" class="form-control" id="content" placeholder="Enter content"></textarea>
                            <input type="hidden" name="user_id" class="form-control" id="user_id" value="<?= $_SESSION["user_id"] ?>">
                        </div>
                        <div class="form-group">
                            <label for="image">Select Image:</label>
                            <input type="file" class="form-control-file" name="imgdata" id="image" accept="image/*">
                        </div>
                        <div class="container mt-5">
                            <h2>Select a Category</h2>
                            <div class="dropdown mt-3">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="categoryDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Select Category
                                </button>
                                <div class="dropdown-menu" aria-labelledby="categoryDropdown">
                                    <?php
                                    $ctgsData = get_categories_and_count($pdo);
                                    $ctgs = $ctgsData['ctgrs'];

                                    foreach ($ctgs as $ctg) {
                                        echo '<button type="button"  class="dropdown-item" onclick="selectCategory(' . $ctg['id'] . ', \'' . $ctg['name'] . '\')">' . $ctg['name'] . '</button>';
                                    }
                                    ?>
                                </div>
                                <input type="hidden" required name="selectedCategoryId" id="selectedCategoryId">
                            </div>
                        </div>
                        <br>
                        <button type="submit" name="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Content for Update article Page -->
    <div class="modal fade" id="eidtearticleModal" tabindex="-1" role="dialog" aria-labelledby="eidtearticleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eidtearticleModalLabel">Update Article</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="includes/article.inc.php" method="POST">
                        <div class="form-group">
                            <label for="tagName">Article title:</label>
                            <input type="text" name="title" class="form-control" id="artclTitle" placeholder="Enter title">
                        </div>
                        <div class="form-group">
                            <label for="tagName">Article content:</label>
                            <textarea type="text" name="content" class="form-control" id="artclContent" placeholder="Enter content"></textarea>
                            <input type="hidden" name="artclId" class="form-control" id="artclId">
                        </div>
                        <div class="container mt-5">
                            <h2>Select a Category</h2>
                            <div class="dropdown mt-3">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="categoryDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Select Category
                                </button>
                                <div class="dropdown-menu" aria-labelledby="categoryDropdown">
                                    <?php
                                    $ctgsData = get_categories_and_count($pdo);
                                    $ctgs = $ctgsData['ctgrs'];

                                    foreach ($ctgs as $ctg) {
                                        echo '<button type="button"  class="dropdown-item" onclick="selectCategory(' . $ctg['id'] . ')">' . $ctg['name'] . '</button>';
                                    }
                                    ?>
                                </div>
                                <input type="hidden" required name="selectedCategoryId" id="selectedCategoryId1">
                            </div>
                        </div>
                        <br>
                        <input type="hidden" name="action" value="update">
                        <button type="submit" name="update" class="btn btn-success">Update</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function selectCategory(categoryId) {
            document.getElementById('selectedCategoryId').value = categoryId;
            document.getElementById('selectedCategoryId1').value = categoryId;
        }
    </script>

    <!-- Content for Add user Page -->




    <!-- Bootstrap JS Bundle (Popper included) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>