<div class="h-screen flex flex-wrap w-44 left-0 fixed bg-gray-100 top-12">
    <div class="h-full w-full">
        <div class="w-full flex justify-center items-center  mt-6   h-20 p-2">
            <img width="80" height="80" src="imgs/wiki.jpg" alt="b" />
        </div>
        <div class="w-full flex-col  py-8 justify-between flex mb-auto h-3/5">
            <div class="flex  items-center">
                <a href="index.php" class="flex items-center">
                    <img class="hover:bg-gray-200 hover:cursor-pointer w-16 p-3" width="37" height="37" src="https://img.icons8.com/ios/37/joomla.png" alt="joomla" />
                    <p class="paragraph ml-4">Home</p>
                </a>
            </div>
            <div class="flex  items-center">
                <a href="articles.php" class="flex items-center">
                    <img class="hover:bg-gray-200 hover:cursor-pointer w-16 p-3" width="37" height="37" src="https://img.icons8.com/ios/37/news.png" alt="news" />
                    <?php
            if(isset($_SESSION["user_id"]) && $_SESSION["role"] === "admin"){?>
                    <p class="paragraph">All Articles</p>
                    <?php  }else{?>
                        <p class="paragraph">Your Articles</p>
                        <?php }?>
                </a>
            </div>

            <?php
            if (isset($_SESSION["role"]) && $_SESSION["role"] === "admin") { ?>
                <div class="flex  items-center">

                    <a href="dashboard.php" class="flex items-center">
                        <img class="hover:bg-gray-200 hover:cursor-pointer w-16 p-3" width="37" height="37" src="https://img.icons8.com/ios/37/settings--v1.png" alt="settings--v1" />
                        <p class="paragraph">Dashboard</p>
                    </a>

                </div>
            <?php } ?>
            <?php
            if (isset($_SESSION["user_id"])) { ?>
                <div class="flex  items-center">
                    <a href="includes/logout.inc.php" class="flex items-center">
                        <button><img class="hover:bg-gray-200 hover:cursor-pointer w-full p-3" width="35" height="35" src="https://img.icons8.com/ios/35/exit--v1.png" alt="exit--v1" /></button>
                        <p class="paragraph ml-2">Log-Out</p>
                    </a>

                <?php } ?>
                <?php
                if (!isset($_SESSION["user_id"])) { ?>
                    <div class="flex  items-center">
                        <a href="login_register.php" class="flex items-center">
                            <button><img class="hover:bg-gray-200  hover:cursor-pointer w-16 p-3" src="imgs/login.png" alt="exit--v1" /></button>
                            <p class="paragraph ml-3">Log-in</p>
                        </a>
                        </div>
                    <?php } ?>

                    </div>
                </div>
        </div>
        </div>