<!DOCTYPE html>
<html lang="en">
<?php
include("includes/header.php");
?>

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style/login.css">
</head>

<body>
    <?php
    if (isset($_SESSION["user_id"])) {
        header("location: index.php");
    }
    ?>

    <!--!!!!!!!! Size modufication later-->
    <!-- content -->
    <div class="centering flex-1 pl-16">
        <main id="pader">
            <div class="flexer min-h-[300px] flex justify-between rounded-[60px] absolute overflow-hidden  z-2">
                <div class="signin py-[5%] flex flex-col justify-evenly items-center">
                    <h1 class="font-bold text-[30px] pb-7 text-yellow-500">SIGN IN</h1>
                    <div class="icons flex w-[60%] justify-evenly">
                        <i class="fa-brands fa-square-x-twitter fa-2xl text-black"></i>
                        <i class="fa-brands fa-square-facebook fa-2xl text-black"></i>
                        <i class="fa-brands fa-linkedin fa-2xl text-black"></i>
                        <i class="fa-brands fa-youtube fa-2xl text-black"></i>
                    </div>

                    <p class="marger m-10 font-medium text-white">
                        or use your Email and Password
                    </p>

                    <!-- !!!!!!!!!!!!!!!!-->
                    <!-- !  Sign in Form-->

                    <form class="h-fit flex flex-col justify-center" id="loginForm" action="includes/login.inc.php" method="POST">
                        <input type="text" id="loginusername" name="username" placeholder="User Name" class="border-b-2 w-[100%] mb-6 outline-none text-black bg-transparent placeholder-white" required />
                        <span id="text"></span>

                        <input type="password" id="password" name="pwd" placeholder="Password" class="border-b-2 w-[100%] outline-none text-black bg-transparent placeholder-white" required />
                        <div id="loginErrorMessages"></div>
                        <?php check_login_errors()  ?>

                        <input type="submit" value="Sign-In" class="font-bold my-5 mx-auto bg-sky-600 text-white px-16 py-3 rounded-[30px]" />
                    </form>




                    <!-- !!!!!!!!!!!!!!!!-->
                </div>

                <div id="loger" class="loger absolute py-36 h-[480px] w-[70%] flex justify-evenly bg-sky-500">
                    <div id="cont" class="cont absolute flex flex-col justify-evenly items-center">
                        <h1 class="font-bold mb-5 text-[25px] text-black">
                            welcome, friend !
                        </h1>
                        <p class="messageanas text-white mb-5 font-bold text-center text-[15px] w-fit">
                            Register with your personel details to <br />
                            use all of site features
                        </p>
                        <a id="registerButton" href="#" class="font-bold bg-sky-600 border-[2px] border-yellow-300 text-yellow-200 px-28 py-3 rounded-[30px]">Sign Up</a>
                        <a id="resetButton" href="#" class="font-bold m-2 text-black underline border-white rounded-[30px]">Reset Password</a>
                    </div>
                </div>
                <div class="signin1 py-[5%] flex flex-col justify-evenly items-center">
                    <h1 class="font-bold text-center text-yellow-500 w-[100%] text-[30px] pb-7">
                        CREATE ACCOUNT
                    </h1>
                    <div class="icons flex w-[60%] justify-evenly">
                        <i class="fa-brands fa-square-x-twitter text-black fa-2xl"></i>
                        <i class="fa-brands fa-square-facebook text-black fa-2xl"></i>
                        <i class="fa-brands fa-linkedin text-black fa-2xl"></i>
                        <i class="fa-brands fa-youtube text-black fa-2xl"></i>
                    </div>
                    <!--40-->
                    <!-- !!!!!!!!!!!!!!!!-->
                    <!-- ! Create Acount Form-->

                    <form class="h-fit flex flex-col justify-center" id="registrationForm" method="POST">
                        <input type="text" id="username" name="username" placeholder="User Name" class="border-b-2 w-[100%] mb-6 mt-12 outline-none text-black bg-transparent placeholder-white" required />

                        <input type="email" id="email1" name="email" placeholder="Email" oninput="validation()" class="border-b-2 w-[100%] mb-6 outline-none text-black bg-transparent placeholder-white" required />
                        <span id="text1"></span>

                        <input type="password" id="registrationPassword" name="pwd" placeholder="Password" class="border-b-2 w-[100%] outline-none text-black bg-transparent placeholder-white" required />

                        <input type="submit" value="Sign-Up" class="font-bold cursor-pointer text-white my-5 mx-auto bg-sky-400 px-16 py-3 rounded-[30px]" />
                    </form>

                    <!-- !!!!!!!!!!!!!!!!-->
                </div>
            </div>
        </main>
    </div>



    <script>
        $(document).ready(function() {
            console.log("Script is running!");
            $("#registrationForm").submit(function(event) {
                event.preventDefault(); // Prevent the default form submission
                var formData = $(this).serialize(); // Serialize the form data
                $.ajax({
                    type: "POST",
                    url: "includes/signup.inc.php",
                    data: formData,
                    success: function(response) {
                        var data = JSON.parse(response);
                        if (data.success) {
                            alert("Signup successful!");
                        } else {
                            // Display errors in the designated div
                            $("#signupErrorMessages").html("<div class='alert alert-danger'>" + data.errors.join('<br>') + "</div>");
                        }
                    }
                });
            });
        });
    </script>







    <!--! Form script-->

    <script type="text/javascript">
        function validation() {
            var form = document.getElementById("registrationForm");
            var email = document.getElementById("email1").value;
            var text = document.getElementById("text1");
            var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

            if (email.match(pattern)) {
                form.classList.add("valid");
                form.classList.remove("invalid");
                text.innerHTML = "Your Email Address is Valid";
                text.style.color = "#00ce00";
                text.style.fontWeight = "700";
            } else {
                form.classList.remove("valid");
                form.classList.add("invalid");
                text.innerHTML = "Please enter valid Email Address";
                text.style.color = "#ff0000";
                text.style.fontWeight = "700";
            }
        }
    </script>
</body>
<!--! Moving the form-->
<script>
    var check = 0;
    var signIn = document.getElementById("registerButton");
    var loger = document.getElementById("loger");
    var logerCont = document.getElementById("cont");
    const messageanas = document.querySelector(".messageanas");
    signIn.addEventListener("click", function() {
        if (!check) {
            loger.style.left = "-15%";
            cont.style.right = "5%";
            signIn.textContent = "Sign in";
            messageanas.textContent = "allready registered? sign-in";
            check = 1;
        } else {
            loger.style.left = "47%";
            cont.style.right = "25%";
            signIn.textContent = "Sign up";
            check = 0;
            messageanas.textContent = "Register with your personel details";
        }
    });
</script>

</html>