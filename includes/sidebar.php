<div class="h-screen flex flex-wrap w-22 left-0 fixed bg-gray-100 top-12">
    <div class="h-full w-full">
        <div class="w-full flex justify-center items-center  mt-6 mb-32  h-20 p-2">
            <img width="80" height="80" src="imgs/wiki.jpg" alt="b" />
        </div>
        <div class="w-full flex-col mt-22 py-8 justify-between flex  mb-auto h-full">
            <div class="flex flex-col mt-22 items-center  h-full">
                <a href="index.php" class="mb-8">
                    <img class="hover:bg-gray-200 hover:cursor-pointer w-16 p-3" width="37" height="37" src="https://img.icons8.com/ios/37/joomla.png" alt="joomla" />

                </a>
                <a href="articles.php" class="mb-8">
                    <img class="hover:bg-gray-200 hover:cursor-pointer w-16 p-3" width="37" height="37" src="https://img.icons8.com/ios/37/news.png" alt="news" />

                </a>
                <a href="about.html" class="mb-8">
                    <img class="hover:bg-gray-200 hover:cursor-pointer w-16 p-3" width="37" height="37" src="https://img.icons8.com/ios/37/info--v1.png" alt="info--v1" />

                </a>
                <?php
                if (isset($_SESSION["role"]) && $_SESSION["role"] === "admin") { ?>
                    <a href="dashboard.php" class="mb-6">
                        <img class="hover:bg-gray-200 hover:cursor-pointer w-16 p-3" width="37" height="37" src="https://img.icons8.com/ios/37/settings--v1.png" alt="settings--v1" />
                    </a>
                <?php } ?>
                <?php
                if (isset($_SESSION["user_id"])) { ?>
                    <form class="form-inline my-2 my-lg-0 mb-6" action="includes\logout.inc.php" method="post">

                        <button><img class="hover:bg-gray-200 hover:cursor-pointer w-full p-3" width="35" height="35" src="https://img.icons8.com/ios/35/exit--v1.png" alt="exit--v1" /></button>

                    </form>
                <?php } ?>
                <?php
                if (!isset($_SESSION["user_id"])) { ?>
                    <form class="form-inline mr-5px mb-8" action="login_register.php" method="post">

                        <button class="mr-6"><img class="hover:bg-gray-200 ml-3 hover:cursor-pointer w-16 p-3" src="imgs/login.png" alt="exit--v1" /></button>


                    </form>
                <?php } ?>

            </div>
        </div>
    </div>
</div>