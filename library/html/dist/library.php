<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Login Page</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="assets/css/main.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="./assets/css/pages/auth-light.css" rel="stylesheet" />
</head>

<body class="" style="background-color:black;">
    <div class="content">
        <div class="brand">
            <div class="link" style="color:white;">GodLike Library</div>
        </div>

        <h1 class="dropdown-divider"></h1>
        <div class="brand">
            <a class="link" style="color:white;" href="adminlogin.php">Admin</a>
        </div>
        <form role="form" name="form" method="POST">
            <!-- <h2 class="login-title">Log in</h2> -->
            <center>
                <h2><a class="login-title" style="color:black;" href="adminlogin.php" value="Login">Login</a></h2>
            </center>
        </form>
    </div>
    <div class="content">
        <div class="brand">
            <a class="link" style="color:white;" href="librarianlogin.php">Librarian</a>
        </div>
        <form role="form" name="form" method="POST">
            <!-- <h2 class="login-title">Log in</h2> -->
            <center>
                <h2><a class="login-title" style="color:black;" href="librarianlogin.php" value="Login">Login</a></h2>
            </center>
        </form>
    </div>
    <div class="content">
        <div class="brand">
            <a class="link" style="color:white;" href="studentlogin.php">Student</a>
        </div>
        <form role="form" name="form" method="POST">
            <!-- <h2 class="login-title">Log in</h2> -->
            <center>
                <h2><a class="login-title" style="color:black;" href="studentlogin.php" value="Login">Login</a></h2>
            </center>
        </form>
    </div>
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>

    <?php
    // if (isset($_POST["login"])) {
    //     $email = $_POST["email"];
    //     $password = $_POST["password"];
    //     $abd = "select *from admin where email='$email' and password='$password'";
    //     $res = mysqli_query($conn, $abd);
    //     $rc = mysqli_num_rows($res);
    //     if ($rc == 1) {
    //         if (isset($_POST["remember"])) {
    //             setcookie("email", $email, time() + (86400 * 30), "/");
    //             setcookie("password", $password, time() + (86400 * 30), "/");
    //         }
    //         $_SESSION["admin"] = $email;
    //         $message = "Login Sucessfull";
    //         echo "<script>alert('$message');window.location.href='admindashboard.php';</script>";
    //     } else {
    //         $message1 = "Login UnSucessfull";
    //         echo "<script>alert('$message1');window.location.href='adminlogin.php';</script>";
    //     }
    // }
    ?>

    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS -->
    <script src="./assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS -->
    <script src="./assets/vendors/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="assets/js/app.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <!-- <script type="text/javascript">
        $(function() {
            $('#login-form').validate({
                errorClass: "help-block",
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        });
    </script> -->
</body>

</html>