<?php
require_once '../includes/dbh.inc.php';
require_once '../model/dashboard_model.php';





$categories = get_latest_categories($pdo, $limit = 3);
foreach ($categories as $category) {


    echo '
    <a class="view-articles-link flex gap-4" href="categorie_articles.php?ctgr=' . $category['id'] . '">

        <li class="flex gap-4">
            <div class="relative mt-1 flex h-10 w-10 flex-none items-center justify-center rounded-full shadow-md shadow-zinc-800/5 ring-1 ring-zinc-900/5 dark:border dark:border-zinc-700/50 dark:bg-zinc-800 dark:ring-0">

            </div>
            <dl class="flex flex-auto flex-wrap gap-x-2">

                <dd class="w-full flex-none text-sm  font-medium text-black-900 ">
                    ' . $category['name'] . '</dd>
            </dl>
        </li>
    </a>';
}
