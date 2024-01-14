<div class="sider h-screen z-50 bg-gray-100 mt-14 flex-wrap w-16 border-2 fixed top-0  shadow-lg left-0 ">
        <div class="h-full w-full">
            <div class="w-full flex border-b-2 items-center h-20 p-2">
            <img width="80" height="80" src="imgs/wiki.jpg" alt="b" />
            </div>
            <div class="w-full flex-col items-center py-8 justify-between flex mb-auto h-3/5 ">

                <a href="index.php">
                    <img class="hover:bg-gray-200 hover:cursor-pointer w-full p-3" width="37" height="37" src="https://img.icons8.com/ios/37/joomla.png" alt="joomla" />
                </a>
                <a href="articles.php">
                    <img class="hover:bg-gray-200 hover:cursor-pointer w-full p-3" width="37" height="37" src="https://img.icons8.com/ios/37/news.png" alt="news" />
                </a>
                <a href="about.php">
                    <img class="hover:bg-gray-200 hover:cursor-pointer w-full p-3" width="37" height="37" src="https://img.icons8.com/ios/37/info--v1.png" alt="info--v1" />
                </a>
                <?php
                if (isset($_SESSION["role"]) && $_SESSION["role"] === "admin") { ?>
                    <a href="dashboard.php" >
                        <img class="hover:bg-gray-200 hover:cursor-pointer w-full p-3" width="37" height="37" src="https://img.icons8.com/ios/37/settings--v1.png" alt="settings--v1" />
                    </a>
                <?php } ?>
                <?php
                if (isset($_SESSION["user_id"])) { ?>
                    <form  action="includes\logout.inc.php" method="post">

                        <button><img class="hover:bg-gray-200 hover:cursor-pointer w-16 p-3" width="35" height="35" src="https://img.icons8.com/ios/35/exit--v1.png" alt="exit--v1" /></button>

                    </form>
                <?php } ?>
                <?php
                if (!isset($_SESSION["user_id"])) { ?>
                    <form  action="login_register.php" method="post">

                        <button class="mr-6"><img class="hover:bg-gray-200 ml-3 hover:cursor-pointer w-16 p-3" src="imgs/login.png" alt="exit--v1" /></button>


                    </form>
                <?php } ?>
            </div>
        </div>

    </div>
