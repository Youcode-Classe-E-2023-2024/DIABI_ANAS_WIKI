<?php

require_once 'dbh.inc.php';
require_once '../model/dashboard_model.php';


if (isset($_POST["submit"])) {
    // Handle form submission for adding a category
    $name = $_POST['ctgname'];

    try {
        set_categorie($pdo, $name);
        header("location: ../categories.php?add_categorie=success");
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} elseif (isset($_POST["update"])) {
    // Handle form submission for updating a category
    $name = $_POST['ctgrname'];
    $newName = $_POST['newctgrname'];

    $ctgData = get_ctgr_id($pdo, $name);


    $id = $ctgData;
    update_categorie($pdo, $newName, $id);

    header("location: ../categories.php?update_categorie=success");
    exit(); // Add this line to prevent further code execution after the header redirect

} elseif (isset($_GET['search'])) {

    $searchTerm = $_GET['search'];
    $filteredCategories = filter_categorie_by_search($pdo, $searchTerm);

    

    foreach ($filteredCategories as $category) {
   echo'
        <a class="view-articles-link flex gap-4" href="categorie_articles.php?ctgr=' . $category['id'] . '">

            <li class="flex gap-4">
                <div class="relative mt-1 flex h-10 w-10 flex-none items-center justify-center rounded-full shadow-md shadow-zinc-800/5 ring-1 ring-zinc-900/5 dark:border dark:border-zinc-700/50 dark:bg-zinc-800 dark:ring-0">

                </div>
                <dl class="flex flex-auto flex-wrap gap-x-2">

                    <dd class="w-full flex-none text-sm  font-medium text-black-900 ">
                        '. $category['name'] . '</dd>
                </dl>
            </li>
        </a>';
   
    }
    




}
