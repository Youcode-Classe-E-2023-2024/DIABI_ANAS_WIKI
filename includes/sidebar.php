<div class="h-screen flex flex-wrap w-16 left-0 fixed bg-white top-12">
        <div class="h-full w-full">
            <div class="w-full flex items-center h-20 p-2">
                <img width="50" height="50" src="https://img.icons8.com/ios-filled/50/4A9DEC/a.png" alt="b" />
            </div>
            <div class="w-full flex-col items-center py-8 justify-between flex mb-auto h-3/5">
                <a href="home.html">

                </a>
                <a href="index.php">
                    <img class="hover:bg-gray-200 hover:cursor-pointer w-full p-3" width="37" height="37" src="https://img.icons8.com/ios/37/joomla.png" alt="joomla" />

                </a>
                <a href="blogs.php">
                    <img class="hover:bg-gray-200 hover:cursor-pointer w-full p-3" width="37" height="37" src="https://img.icons8.com/ios/37/news.png" alt="news" />
                </a>
                <a href="about.html">
                    <img class="hover:bg-gray-200 hover:cursor-pointer w-full p-3" width="37" height="37" src="https://img.icons8.com/ios/37/info--v1.png" alt="info--v1" />
                </a>
                <a href="dashboard.php">
                    <img class="hover:bg-gray-200 hover:cursor-pointer w-full p-3" width="37" height="37" src="https://img.icons8.com/ios/37/settings--v1.png" alt="settings--v1" />
                </a>
                <?php
                if (isset($_SESSION["user_id"])) { ?>
                    <form class="form-inline my-2 my-lg-0" action="includes\logout.inc.php" method="post">

                        <button><img class="hover:bg-gray-200 hover:cursor-pointer w-full p-3" width="35" height="35" src="https://img.icons8.com/ios/35/exit--v1.png" alt="exit--v1" /></button>
                    </form>
                <?php } ?>

            </div>
        </div>
    </div>