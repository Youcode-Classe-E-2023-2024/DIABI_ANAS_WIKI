<?php
require_once 'dbh.inc.php';
require_once '../model/dashboard_model.php';

if (isset($_POST["submit"])) {

    $title = $_POST['title'];
    $content = $_POST['content'];
    $ctg = $_POST['selectedCategoryId'];
    $user_id = $_POST['user_id'];

    try {



        set_article($pdo, $title, $content, $ctg, $user_id);
        header("location: ../articles.php?add_article=success");
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} elseif (isset($_POST["update"])) {

    $title = $_POST["title"];
    $content = $_POST["content"];
    $ctgr = $_POST["selectedCategoryId"];
    $id = $_POST['artclId'];


    update_article($pdo, $title, $content, $ctgr, $id);

    header("location: ../articles.php?update_article=success");
    exit();
}
if (isset($_GET['search'])) {   

    $searchTerm = $_GET['search'];

    if (!empty($searchTerm)) {
        // Search term is provided, filter articles based on the search term
        $filteredArticles = filter_articles_by_search($pdo, $searchTerm);

        foreach ($filteredArticles as $Article) {
            echo '

            <article class="group relative flex flex-col items-start" style="margin-bottom: 30px;">
                <div class="absolute -inset-x-4 -inset-y-6 z-0 scale-95 bg-gray-200 opacity-0 transition group-hover:scale-100 group-hover:opacity-100 dark:bg-black-900/50 sm:-inset-x-6 sm:rounded-2xl"></div>
        
                <a href="#" class="relative z-10">
                    <span class="absolute -inset-x-4 -inset-y-6 z-20 sm:-inset-x-6 sm:rounded-2xl"></span>
                    <span class="text-blue-800 relative z-10" id="Blogtitle">' . $Article['title'] . '</span>
                </a>';

            $auteurid = $Article['user_id'];
            $auteur = get_user_by_id($pdo, $auteurid);
            $createdAt = $Article['createdAt'];
            $formatedDate = convert_article_created_date($createdAt);

            echo '
                <p id="Blogcontent" class="relative z-10 mt-2 text-sm dark:text-gray-700">Auteur: ' . $auteur . '</p>
                <p id="Blogcontent" class="relative z-10 mt-2 text-sm text-gray-500 dark:text-gray-700">';

            $id = $Article['category_id'];
            if ($id != false) {
                $ctgrname = get_ctgr_name($pdo, $id);
                echo 'Category: ' . $ctgrname;
            } else {
                echo 'No Assigned categories';
            }

            echo '
                </p>
                <time class="relative z-10 order-first mb-3  flex items-center text-sm text-zinc-400 dark:text-zinc-500 pl-3.5" datetime="2022-09-05">
                    <span class="absolute inset-y-0 left-0 flex items-center" aria-hidden="true">
                        <span class="h-4 w-0.5 rounded-full bg-zinc-200 dark:bg-zinc-500"></span>
                    </span>' . $formatedDate . '
                </time>
                <p id="Blogcontent" class="relative z-10 mt-2 text-sm text-zinc-600 dark:text-zinc-400">' . $Article['content'] . '..</p>
                <div aria-hidden="true" class="relative z-10 mt-4 flex items-center text-sm font-medium text-teal-500">
                    <a href="Article_details.php?id=' . $Article['id'] . '&artclctgr=' . urlencode($ctgrname) . '&auteurid=' . $Article['user_id'] . '">
                        <i class="fas fa-eye"></i> Read article
                    </a>
                    <svg viewBox="0 0 16 16" fill="none" aria-hidden="true" class="ml-1 h-4 w-4 stroke-current">
                        <path d="M6.75 5.75 9.25 8l-2.5 2.25" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </div>
                
            </article>
            <hr style="margin-bottom: 30px;">
            ';
        }
    }
}
