<?php session_start();
$_SESSION["student"] = "";
include("dbconn.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Student | Login</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="assets/css/main.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="./assets/css/pages/auth-light.css" rel="stylesheet" />
</head>

<body class="bg-silver-300">
    <div class="content">
        <div class="brand">
            <a class="link" href="studentlogin.php">Student</a>
        </div>
        <form role="form" name="form" method="POST">
            <h2 class="login-title">Log in</h2>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-envelope"></i></div>
                    <input class="form-control" name="email" type="email" placeholder="Email" value="<?php if (isset($_COOKIE["email"])) {
                                                                                                            echo $_COOKIE["email"];
                                                                                                        } ?>" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                    <input class="form-control" name="password" placeholder="Password" type="password" value="<?php if (isset($_COOKIE["password"])) {
                                                                                                                    echo $_COOKIE["password"];
                                                                                                                } ?>" required>
                </div>
            </div>
            <div class="form-group d-flex justify-content-between">
                <label class="ui-checkbox ui-checkbox-info">
                    <input type="checkbox">
                    <span class="input-span"></span>Remember me</label>
                <!-- <a href="forgot_password.html">Forgot password?</a> -->
            </div>
            <div class="form-group d-flex justify-content-between">
                <label class=" ui-checkbox-info">
                    <span class="input-span"></span>Not Registered</label>
                <a href="studentregister.php">Register Here</a>
            </div>
            <div class="form-group">
                <input class="btn btn-info btn-block" type="submit" name="login" value="Login">
            </div>
            <!-- <div class="social-auth-hr">
                <span>Or login with</span>
            </div>
            <div class="text-center social-auth m-b-20">
                <a class="btn btn-social-icon btn-twitter m-r-5" href="javascript:;"><i class="fa fa-twitter"></i></a>
                <a class="btn btn-social-icon btn-facebook m-r-5" href="javascript:;"><i class="fa fa-facebook"></i></a>
                <a class="btn btn-social-icon btn-google m-r-5" href="javascript:;"><i class="fa fa-google-plus"></i></a>
                <a class="btn btn-social-icon btn-linkedin m-r-5" href="javascript:;"><i class="fa fa-linkedin"></i></a>
                <a class="btn btn-social-icon btn-vk" href="javascript:;"><i class="fa fa-vk"></i></a>
            </div>
            <div class="text-center">Not a member?
                <a class="color-blue" href="register.html">Create accaunt</a>
            </div> -->
        </form>
    </div>
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>

    <?php
    if (isset($_POST["login"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $checkapprove = "select *from student where studentemail='$email' and approvestatus = 'AP'";
        $resapprove = mysqli_query($conn, $checkapprove);
        $rcapprove = mysqli_num_rows($resapprove);
        if ($rcapprove == 1) {
            $abd = "select *from student where studentemail='$email' and password='$password'";
            $res = mysqli_query($conn, $abd);
            $rc = mysqli_num_rows($res);
            if ($rc == 1) {
                if (isset($_POST["remember"])) {
                    setcookie("email", $email, time() + (86400 * 30), "/");
                    setcookie("password", $password, time() + (86400 * 30), "/");
                }
                $_SESSION["student"] = $email;
                $message = "Login Sucessfull";
                echo "<script>alert('$message');window.location.href='studentdashboard.php';</script>";
            } else {
                $message1 = "Login UnSucessfull";
                echo "<script>alert('$message1');window.location.href='studentlogin.php';</script>";
            }
        } else {
            $message2 = "You Have Registered Successfully But Your Details Is Not Approved (You can login after your details are approved,It takes 1-2 days)";
            echo "<script>alert('$message2');window.location.href='studentlogin.php';</script>";
        }
    }
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
    <script type="text/javascript">
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
    </script>
</body>

</html>