<?php
require_once 'includes/config_session.inc.php';
require_once 'model/dashboard_model.php';
require_once 'includes/dbh.inc.php';

?>
<?php
include_once 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/f2976792f3.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/nouveautéAnas.css">
    <title>Your Title</title>
    <style>
        #Blogcontent {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
            -webkit-line-clamp: 5;
            /* Number of lines to show */
        }
        #searchInput{
            box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;        
         }

        body {
            background-image: url(imgs/Cover-1.png);
            background-size: 100%;
        }
    </style>
</head>

<body class="bg-gray-100">
    <?php
    include_once 'includes/navbar.php';
    ?>

    <!--! sidebar  -->
    <div class="sider h-screen z-50 bg-gray-100 shadow-lg mt-14 flex-wrap w-16 border-2 fixed top-0  left-0 ">
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
                    <a href="dashboard.php">
                        <img class="hover:bg-gray-200 hover:cursor-pointer w-full p-3" width="37" height="37" src="https://img.icons8.com/ios/37/settings--v1.png" alt="settings--v1" />
                    </a>
                <?php } ?>
                <?php
                if (isset($_SESSION["user_id"])) { ?>
                    <form action="includes\logout.inc.php" method="post">

                        <button><img class="hover:bg-gray-200 hover:cursor-pointer w-16 p-3" width="35" height="35" src="https://img.icons8.com/ios/35/exit--v1.png" alt="exit--v1" /></button>

                    </form>
                <?php } ?>
                <?php
                if (!isset($_SESSION["user_id"])) { ?>
                    <form action="login_register.php" method="post">

                        <button class="mr-6"><img class="hover:bg-gray-200 ml-3 hover:cursor-pointer w-16 p-3" src="imgs/login.png" alt="exit--v1" /></button>


                    </form>
                <?php } ?>
            </div>
        </div>

    </div>




    <!--!Carousell-->

    <div class="max-w-3xl w-full bg-gray-100 shadow-lg mt-20 mx-auto">
        <div class="relative mt-20" data-carousel="static">

            <div class="overflow-hidden relative bg-gray-100 rounded-lg h-96 sm:h-96 xl:h-96 2xl:h-96 ">

                <div id="Blogimage" class="hidden duration-700 bg-gray-100 ease-in-out" data-carousel-item>
                    <span class="absolute top-1/2 left-1/2 text-2xl font-semibold text-white -translate-x-1/2 -translate-y-1/2 sm:text-3xl ">Primer
                        Slide</span>
                    <img class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" src="imgs/3839300.jpg" alt="...">
                </div>

                <div id="Blogimage" class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" src="imgs/3d-illustration-smartphone-with-products-coming-out-screen-online-shopping-e-commerce-concept.jpg" alt="...">
                </div>

                <div id="Blogimage" class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" src="imgs/blog-outline-640x320.webp" alt="...">
                </div>
            </div>
            <!--!Fixed-->

            <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            </div>

            <button type="button" class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30  group-focus:ring-4 group-focus:ring-white  group-focus:outline-none">
                    <svg class="w-5 h-5 text-white sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                    <span class="hidden">Anterior</span>
                </span>
            </button>
            <button type="button" class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 0 group-focus:ring-4 group-focus:ring-white  group-focus:outline-none">
                    <svg class="w-5 h-5 text-white sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="hidden">Siguiente</span>
                </span>
            </button>
        </div>


        <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
    </div>
    <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
    <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
    <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->


    <!--************************************-->

    <div class="flex w-full mt-6">
        
    <div class="relative flex w-full bg-gray-100  flex-col">
            <header class="pointer-events-none relative z-50 flex flex-none flex-col" style="height:var(--header-height);margin-bottom:var(--header-mb)">
                <div class="order-last mt-[calc(theme(spacing.16)-theme(spacing.3))]"></div>
                <div class="sm:px-8 top-0 order-last -mb-3 pt-3" style="position:var(--header-position)">
                    <div class="mx-auto w-full max-w-7xl lg:px-8">
                        <div class="relative px-4 sm:px-8 lg:px-12">
                            <div class="mx-auto max-w-2xl lg:max-w-5xl">
                                <div class="top-[var(--avatar-top,theme(spacing.3))] w-full" style="position:var(--header-inner-position)">
                                    <div class="relative">
                                        <div class="absolute left-0 top-3 origin-left transition-opacity h-10 w-10 rounded-full bg-white/90 p-0.5 shadow-lg shadow-zinc-800/5 ring-1 ring-zinc-900/5 backdrop-blur dark:bg-zinc-800/90 dark:ring-white/10" style="opacity:var(--avatar-border-opacity, 0);transform:var(--avatar-border-transform)">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="top-0 z-10 h-16 pt-6" style="position:var(--header-position)">
                            <div class="sm:px-8 top-[var(--header-top,theme(spacing.6))] w-full" style="position:var(--header-inner-position)">
                                <div class="mx-auto w-full max-w-7xl lg:px-8">
                                    <div class="relative px-4 sm:px-8 lg:px-12">
                                        <div class="mx-auto max-w-2xl lg:max-w-5xl">
                                            <div class="relative flex gap-4">
                                                <div class="flex flex-1"></div>
                                                <div class="flex flex-1 justify-end md:justify-center">
                                                    <div class="pointer-events-auto md:hidden" data-headlessui-state="">
                                                        <button class="group flex items-center rounded-full bg-white/90 px-4 py-2 text-sm font-medium text-zinc-800 shadow-lg shadow-zinc-800/5 ring-1 ring-zinc-900/5 backdrop-blur dark:bg-zinc-800/90 dark:text-zinc-200 dark:ring-white/10 dark:hover:ring-white/20" type="button" aria-expanded="false" data-headlessui-state="" id="headlessui-popover-button-:R2miqla:">Menu<svg viewBox="0 0 8 6" aria-hidden="true" class="ml-3 h-auto w-2 stroke-zinc-500 group-hover:stroke-zinc-700 dark:group-hover:stroke-zinc-400">
                                                                <path d="M1.75 1.75 4 4.25l2.25-2.5" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg></button>
                                                    </div>
                                                    <div style="position:fixed;top:1px;left:1px;width:1px;height:0;padding:0;margin:-1px;overflow:hidden;clip:rect(0, 0, 0, 0);white-space:nowrap;border-width:0;display:none">
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            </header>
            <div class="flex-none" style="height:var(--content-offset)"></div>
            <main class="flex-auto">
                <div class="sm:px-8 mt-9">
                    <div class="mx-auto w-full max-w-7xl lg:px-8">
                        <div class="relative px-4 sm:px-8 lg:px-12">
                            <div class="mx-auto max-w-2xl lg:max-w-5xl">
                                <div class="max-w-2xl">
                                    <h1 class="text-4xl font-bold tracking-tight text-blue-700 dark:text-zinc-900 sm:text-5xl">
                                        What's New? Articles and News:</h1>
                                    <p class="mt-6 text-base text-zinc-600 dark:text-zinc-400">Latest Articles:
                                        serving as dynamic hubs of information and inspiration for enthusiasts and
                                        aspiring entrepreneurs alike. From the latest trends in online retail to
                                        insightful tips on optimizing digital storefronts, your blogs offer a wealth of
                                        knowledge in an engaging and accessible manner.
                                    </p>
                                    <div class="mt-6 flex gap-6"><a class="group -m-1 p-1" aria-label="Follow on Twitter" href="https://twitter.com"><svg viewBox="0 0 24 24" aria-hidden="true" class="h-6 w-6 fill-zinc-500 transition group-hover:fill-zinc-600 dark:fill-zinc-400 dark:group-hover:fill-zinc-300">
                                                <path d="M20.055 7.983c.011.174.011.347.011.523 0 5.338-3.92 11.494-11.09 11.494v-.003A10.755 10.755 0 0 1 3 18.186c.308.038.618.057.928.058a7.655 7.655 0 0 0 4.841-1.733c-1.668-.032-3.13-1.16-3.642-2.805a3.753 3.753 0 0 0 1.76-.07C5.07 13.256 3.76 11.6 3.76 9.676v-.05a3.77 3.77 0 0 0 1.77.505C3.816 8.945 3.288 6.583 4.322 4.737c1.98 2.524 4.9 4.058 8.034 4.22a4.137 4.137 0 0 1 1.128-3.86A3.807 3.807 0 0 1 19 5.274a7.657 7.657 0 0 0 2.475-.98c-.29.934-.9 1.729-1.713 2.233A7.54 7.54 0 0 0 22 5.89a8.084 8.084 0 0 1-1.945 2.093Z">
                                                </path>
                                            </svg></a><a class="group -m-1 p-1" aria-label="Follow on Instagram" href="https://instagram.com"><svg viewBox="0 0 24 24" aria-hidden="true" class="h-6 w-6 fill-zinc-500 transition group-hover:fill-zinc-600 dark:fill-zinc-400 dark:group-hover:fill-zinc-300">
                                                <path d="M12 3c-2.444 0-2.75.01-3.71.054-.959.044-1.613.196-2.185.418A4.412 4.412 0 0 0 4.51 4.511c-.5.5-.809 1.002-1.039 1.594-.222.572-.374 1.226-.418 2.184C3.01 9.25 3 9.556 3 12s.01 2.75.054 3.71c.044.959.196 1.613.418 2.185.23.592.538 1.094 1.039 1.595.5.5 1.002.808 1.594 1.038.572.222 1.226.374 2.184.418C9.25 20.99 9.556 21 12 21s2.75-.01 3.71-.054c.959-.044 1.613-.196 2.185-.419a4.412 4.412 0 0 0 1.595-1.038c.5-.5.808-1.002 1.038-1.594.222-.572.374-1.226.418-2.184.044-.96.054-1.267.054-3.711s-.01-2.75-.054-3.71c-.044-.959-.196-1.613-.419-2.185A4.412 4.412 0 0 0 19.49 4.51c-.5-.5-1.002-.809-1.594-1.039-.572-.222-1.226-.374-2.184-.418C14.75 3.01 14.444 3 12 3Zm0 1.622c2.403 0 2.688.009 3.637.052.877.04 1.354.187 1.67.31.421.163.72.358 1.036.673.315.315.51.615.673 1.035.123.317.27.794.31 1.671.043.95.052 1.234.052 3.637s-.009 2.688-.052 3.637c-.04.877-.187 1.354-.31 1.67-.163.421-.358.72-.673 1.036a2.79 2.79 0 0 1-1.035.673c-.317.123-.794.27-1.671.31-.95.043-1.234.052-3.637.052s-2.688-.009-3.637-.052c-.877-.04-1.354-.187-1.67-.31a2.789 2.789 0 0 1-1.036-.673 2.79 2.79 0 0 1-.673-1.035c-.123-.317-.27-.794-.31-1.671-.043-.95-.052-1.234-.052-3.637s.009-2.688.052-3.637c.04-.877.187-1.354.31-1.67.163-.421.358-.72.673-1.036.315-.315.615-.51 1.035-.673.317-.123.794-.27 1.671-.31.95-.043 1.234-.052 3.637-.052Z">
                                                </path>
                                                <path d="M12 15a3 3 0 1 1 0-6 3 3 0 0 1 0 6Zm0-7.622a4.622 4.622 0 1 0 0 9.244 4.622 4.622 0 0 0 0-9.244Zm5.884-.182a1.08 1.08 0 1 1-2.16 0 1.08 1.08 0 0 1 2.16 0Z">
                                                </path>
                                            </svg></a><a class="group -m-1 p-1" aria-label="Follow on GitHub" href="https://github.com"><svg viewBox="0 0 24 24" aria-hidden="true" class="h-6 w-6 fill-zinc-500 transition group-hover:fill-zinc-600 dark:fill-zinc-400 dark:group-hover:fill-zinc-300">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.475 2 2 6.588 2 12.253c0 4.537 2.862 8.369 6.838 9.727.5.09.687-.218.687-.487 0-.243-.013-1.05-.013-1.91C7 20.059 6.35 18.957 6.15 18.38c-.113-.295-.6-1.205-1.025-1.448-.35-.192-.85-.667-.013-.68.788-.012 1.35.744 1.538 1.051.9 1.551 2.338 1.116 2.912.846.088-.666.35-1.115.638-1.371-2.225-.256-4.55-1.14-4.55-5.062 0-1.115.387-2.038 1.025-2.756-.1-.256-.45-1.307.1-2.717 0 0 .837-.269 2.75 1.051.8-.23 1.65-.346 2.5-.346.85 0 1.7.115 2.5.346 1.912-1.333 2.75-1.05 2.75-1.05.55 1.409.2 2.46.1 2.716.637.718 1.025 1.628 1.025 2.756 0 3.934-2.337 4.806-4.562 5.062.362.32.675.936.675 1.897 0 1.371-.013 2.473-.013 2.82 0 .268.188.589.688.486a10.039 10.039 0 0 0 4.932-3.74A10.447 10.447 0 0 0 22 12.253C22 6.588 17.525 2 12 2Z">
                                                </path>
                                            </svg></a><a class="group -m-1 p-1" aria-label="Follow on LinkedIn" href="https://linkedin.com"><svg viewBox="0 0 24 24" aria-hidden="true" class="h-6 w-6 fill-zinc-500 transition group-hover:fill-zinc-600 dark:fill-zinc-400 dark:group-hover:fill-zinc-300">
                                                <path d="M18.335 18.339H15.67v-4.177c0-.996-.02-2.278-1.39-2.278-1.389 0-1.601 1.084-1.601 2.205v4.25h-2.666V9.75h2.56v1.17h.035c.358-.674 1.228-1.387 2.528-1.387 2.7 0 3.2 1.778 3.2 4.091v4.715zM7.003 8.575a1.546 1.546 0 01-1.548-1.549 1.548 1.548 0 111.547 1.549zm1.336 9.764H5.666V9.75H8.34v8.589zM19.67 3H4.329C3.593 3 3 3.58 3 4.297v15.406C3 20.42 3.594 21 4.328 21h15.338C20.4 21 21 20.42 21 19.703V4.297C21 3.58 20.4 3 19.666 3h.003z">
                                                </path>
                                            </svg></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-16 sm:mt-20">
                    <div class="-my-4 flex  justify-center gap-5 overflow-hidden py-4 sm:gap-8">
                        <div class="relative blog1 aspect-[9/10] w-44 shadow-lg flex-none overflow-hidden rounded-xl bg-zinc-100 dark:bg-zinc-800 sm:w-72 sm:rounded-2xl rotate-2 h-48">
                            <a href="#" class="block  w-full h-full group">
                                <img alt="" loading="lazy" decoding="async" data-nimg="1" class=" absolute  inset-0 h-full  object-cover transition-transform transform-gpu duration-300 group-hover:scale-105" style="color:transparent" sizes="(min-width: 240px) 18rem, 11rem" src="imgs/3839300.jpg">
                            </a>
                        </div>
                        <div class="relative blog2 aspect-[9/10] w-4 shadow-lg flex-none overflow-hidden rounded-xl bg-zinc-100 dark:bg-zinc-800 sm:w-64 sm:rounded-2xl -rotate-2 h-48">
                            <a href="#" class="block w-full h-full group">
                                <img alt="" loading="lazy" decoding="async" data-nimg="1" class="absolute inset-0 h-full w-full object-cover transition-transform transform-gpu duration-300 group-hover:scale-105" style="color:transparent" sizes="(min-width: 240px) 18rem, 11rem" src="imgs/4347955.jpg" i>
                            </a>
                        </div>

                        <div class="relative blog3 aspect-[9/10] w-4 shadow-lg flex-none overflow-hidden rounded-xl bg-zinc-100 dark:bg-zinc-800 sm:w-64 sm:rounded-2xl rotate-2 h-48">
                            <a href="#" class="block w-full h-full group">
                                <img alt="" loading="lazy" decoding="async" data-nimg="1" class="absolute inset-0 h-full w-full object-cover transition-transform transform-gpu duration-300 group-hover:scale-105" style="color:transparent" sizes="(min-width: 240px) 18rem, 11rem" src="imgs/blog-outline-640x320.webp" id="blog3">
                            </a>
                        </div>
                        <div class="relative blog4 aspect-[9/10] w-4 shadow-lg flex-none overflow-hidden rounded-xl bg-zinc-100 dark:bg-zinc-800 sm:w-64 sm:rounded-2xl rotate-2 h-48">
                            <a href="#" class="block w-full h-full group">
                                <img alt="" loading="lazy" decoding="async" data-nimg="1" class="absolute inset-0 h-full w-full object-cover transition-transform transform-gpu duration-300 group-hover:scale-105" style="color:transparent" sizes="(min-width: 240px) 18rem, 11rem" src="imgs/shop_laptop_w.jpg" id="blog4">
                            </a>
                        </div>
                        <div class="relative blog5 aspect-[9/10] w-4 flex-none overflow-hidden rounded-xl bg-zinc-100 dark:bg-zinc-800 sm:w-64 sm:rounded-2xl -rotate-2 h-48">
                            <a href="#" class="block w-full h-full group">
                                <img alt="" loading="lazy" decoding="async" data-nimg="1" class="absolute inset-0 h-full w-full object-cover transition-transform transform-gpu duration-300 group-hover:scale-105" style="color:transparent" sizes="(min-width: 240px) 18rem, 11rem" src="imgs/Blogging.png" id="blog5">
                            </a>
                        </div>
                    </div>
                </div>


                <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->






                <div class="sm:px-8 mt-24 md:mt-28">

                    <div class="mx-auto w-full max-w-7xl lg:px-8">

                        <div class="relative px-4 sm:px-8 lg:px-12">

                            <div class="mx-auto max-w-2xl lg:max-w-5xl">
                                <div class="relative flex mb-6  items-center">
                                    <div class="absolute inset-y-0 flex  items-center  pointer-events-none">
                                        <svg class="w-4 h-4 m-2 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                    </div>
                                    <input type="search" id="searchInput" class="block w-1/4 px-6 py-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Articles..." required>
                                </div>




                                <div class="mx-auto grid max-w-xl grid-cols-1 gap-y-20 lg:max-w-none lg:grid-cols-2">

                                    <div class="flex flex-col gap-16">
                                        <!-------------------       
                                         //    Get Articles   //
                                          ------------------->
                                        <?php

                                        $latestArticles = get_latest_articles($pdo);



                                        if (count($latestArticles) === 0) {
                                            echo "<div class='container mt-5'>";
                                            echo "<h2 class='mb-4 display-4 font-weight-bold shaded  d-inline-block px-3 py-2 rounded'>No articles available</h2>";
                                            echo "<p class='text-white'>There are currently no articles to display.</p>";
                                            echo "</div>";
                                        } else {



                                        ?>

                                            <div id="searchResults"></div>


                                        <?php
                                        }
                                        ?>
                                    </div>

                                    <div class="space-y-10 lg:pl-16 xl:pl-24">

                                        <form class="rounded-2xl border border-zinc-100 p-6 dark:border-zinc-700/40" action="/thank-you">
                                            <h2 class="flex text-sm font-semibold text-zinc-900 dark:text-zinc-100"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" class="h-6 w-6 flex-none">
                                                    <path d="M2.75 7.75a3 3 0 0 1 3-3h12.5a3 3 0 0 1 3 3v8.5a3 3 0 0 1-3 3H5.75a3 3 0 0 1-3-3v-8.5Z" class="fill-zinc-100 stroke-zinc-400 dark:fill-zinc-100/10 dark:stroke-zinc-500">
                                                    </path>
                                                    <path d="m4 6 6.024 5.479a2.915 2.915 0 0 0 3.952 0L20 6" class="stroke-zinc-400 dark:stroke-zinc-500"></path>
                                                </svg><span class="ml-3 text-black">Stay up to date</span></h2>
                                            <p class="mt-2 text-sm text-zinc-600 dark:text-zinc-400">Get notified when I
                                                publish something new, and unsubscribe at any time.</p>
                                            <div class="mt-6 flex"><input type="email" placeholder="Email address" aria-label="Email address" required="" class="min-w-0 flex-auto appearance-none rounded-md border border-zinc-900/10 bg-white px-3 py-[calc(theme(spacing.2)-1px)] shadow-md shadow-zinc-800/5 placeholder:text-zinc-400 focus:border-teal-500 focus:outline-none focus:ring-4 focus:ring-teal-500/10 dark:border-zinc-700 dark:bg-zinc-700/[0.15] dark:text-zinc-200 dark:placeholder:text-zinc-500 dark:focus:border-teal-400 dark:focus:ring-teal-400/10 sm:text-sm"><button class="inline-flex items-center gap-2 justify-center rounded-md py-2 px-3 text-sm outline-offset-2 transition active:transition-none bg-zinc-800 font-semibold text-zinc-100 hover:bg-zinc-700 active:bg-zinc-800 active:text-zinc-100/70 dark:bg-zinc-700 dark:hover:bg-zinc-600 dark:active:bg-zinc-700 dark:active:text-zinc-100/70 ml-4 flex-none" type="submit">Join</button></div>
                                        </form>
                                        <div class="rounded-2xl border border-zinc-100 p-6 dark:border-zinc-700/40">
                                            <h2 class="flex text-sm font-semibold text-zinc-900 dark:text-zinc-100"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" class="h-6 w-6 flex-none">
                                                    <path d="M2.75 9.75a3 3 0 0 1 3-3h12.5a3 3 0 0 1 3 3v8.5a3 3 0 0 1-3 3H5.75a3 3 0 0 1-3-3v-8.5Z" class="fill-zinc-100 stroke-zinc-400 dark:fill-zinc-100/10 dark:stroke-zinc-500">
                                                    </path>
                                                    <path d="M3 14.25h6.249c.484 0 .952-.002 1.316.319l.777.682a.996.996 0 0 0 1.316 0l.777-.682c.364-.32.832-.319 1.316-.319H21M8.75 6.5V4.75a2 2 0 0 1 2-2h2.5a2 2 0 0 1 2 2V6.5" class="stroke-zinc-400 dark:stroke-zinc-500"></path>
                                                </svg><span class="ml-3 text-black">Categories</span></h2>
                                            <ol class="mt-6 space-y-4">
                                                <?php
                                                $latestCategories = get_latest_categories($pdo, 3);

                                                foreach ($latestCategories as $category) {
                                                ?>
                                                    <a class="view-articles-link flex gap-4" href="categorie_articles.php?ctgr=<?php echo $category['id']; ?>">

                                                        <li class="flex gap-4">
                                                            <div class="relative mt-1 flex h-10 w-10 flex-none items-center justify-center rounded-full shadow-md shadow-zinc-800/5 ring-1 ring-zinc-900/5 dark:border dark:border-zinc-700/50 dark:bg-zinc-800 dark:ring-0">

                                                            </div>
                                                            <dl class="flex flex-auto flex-wrap gap-x-2">

                                                                <dd class="w-full flex-none text-sm  font-medium text-black-900 ">
                                                                    <?php echo $category['name']; ?></dd>
                                                            </dl>
                                                        </li>
                                                    </a>
                                                <?php
                                                }
                                                ?>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="mt-32 flex-none">
                <div class="sm:px-8">
                    <div class="mx-auto w-full max-w-7xl lg:px-8">
                        <div class="border-t border-zinc-100 pb-16 pt-10 dark:border-zinc-700/40">
                            <div class="relative px-4 sm:px-8 lg:px-12">
                                <div class="mx-auto max-w-2xl lg:max-w-5xl">
                                    <div class="flex flex-col items-center justify-between gap-6 sm:flex-row">
                                        <div class="flex flex-wrap justify-center gap-x-6 gap-y-1 text-sm font-medium text-gray-800 dark:text-gray-800">
                                            <a class="transition hover:text-black-500 dark:hover:text-teal-400" href="/about">About</a><a class="transition hover:text-teal-500 dark:hover:text-teal-400" href="/projects">Projects</a><a class="transition hover:text-teal-500 dark:hover:text-teal-400" href="/speaking">Speaking</a><a class="transition hover:text-teal-500 dark:hover:text-teal-400" href="/uses">Uses</a>
                                        </div>
                                        <p class="text-sm text-zinc-400 dark:text-zinc-500">© <!-- -->2023<!-- -->
                                            Spencer Sharp. All rights reserved.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>





  
    

    <script>
        $(document).ready(function() {
            loadAllArticles();
            $('#searchInput').on('input', function() {
                var searchTerm = $(this).val();
                if (searchTerm.length >= 1) { 
                    searchArticles(searchTerm);
                } else {
                    loadAllArticles();
                }
            });

            function searchArticles(searchTerm) {
                $.ajax({
                    type: 'GET',
                    url: 'includes/article.inc.php', 
                    data: {
                        search: searchTerm
                    },
                    success: function(data) {
                        $('#searchResults').html(data);
                    }
                });
            }

            function loadAllArticles() {
               
                $.ajax({
                    type: 'GET',
                    url: 'view/articles_view.php',
                    success: function(data) {
                        $('#searchResults').html(data);
                    }
                });
            }
        });
    </script>



</body>

</html>