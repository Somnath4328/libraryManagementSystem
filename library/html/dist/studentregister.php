<?php
include("dbconn.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Student | Registration</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="assets/css/main.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="./assets/css/pages/auth-light.css" rel="stylesheet" />

    <script>
        function getdepartment(str) {
            if (str.length == 0) {
                document.getElementById("department").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("department").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "getdepartment.php?q=" + str, true);
                xmlhttp.send();
            }
        }
    </script>
</head>

<body class="bg-silver-300">
    <div class="content">
        <div class="brand">
            <a class="link" href="studentregister.php">Student</a>
        </div>
        <form role="form" name="f" method="POST" onsubmit="return check(f);" enctype="multipart/form-data">
            <h2 class="login-title">Register</h2>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <input class="form-control" type="text" name="firstname" placeholder="First Name" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <input class="form-control" type="text" name="lastname" placeholder="Last Name" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <input class="form-control" type="number" placeholder="Enter Roll Of The Student" name="studentroll" required>
            </div>

            <div class="form-group">
                <input class="form-control" type="email" name="studentemail" placeholder="Email" autocomplete="off" required>
            </div>

            <div class="form-group">
                <input class="form-control" placeholder="Enter Phone Number" name="studentphonenumber" type="text" pattern="[0-9]{10}" title="Please Enter 10 digit Phone Number" maxlength="10" id="num" oninput="return onlynum()" required>
            </div>

            <div class="form-group">
                <select class="form-control" id="course-dropdown" name="studentcourse" onchange="getdepartment(this.value);" required>
                    <option value="">Select Course</option>
                    <?php
                    require_once "dbconn.php";
                    $result = mysqli_query($conn, "SELECT * FROM courses");
                    while ($rowcourse = mysqli_fetch_array($result)) {
                    ?>
                        <option value="<?php echo $rowcourse['coursename']; ?>"><?php echo $rowcourse["coursename"]; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <select class="form-control" id="department" name="studentdepartment" required>
                    <option>Select Department</option>
                </select>
            </div>

            <div class="form-group">
                <select class="form-control" id="course-dropdown" name="studentsemester" required>
                    <option value="SEMESTER 1">SEMESTER 1</option>
                    <option value="SEMESTER 2">SEMESTER 2</option>
                    <option value="SEMESTER 3">SEMESTER 3</option>
                    <option value="SEMESTER 4">SEMESTER 4</option>
                    <option value="SEMESTER 5">SEMESTER 5</option>
                    <option value="SEMESTER 6">SEMESTER 6</option>
                    <option value="SEMESTER 7">SEMESTER 7</option>
                    <option value="SEMESTER 8">SEMESTER 8</option>
                </select>
            </div>

            <div class="form-group">
                <input class="form-control" id="password" type="password" name="studentpassword" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            </div>
            <!-- <div class="form-group">
                <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password">
            </div> -->
            <div class="form-group text-left">
                <label class="ui-checkbox ui-checkbox-info">
                    <input type="checkbox" name="agree">
                    <span class="input-span"></span>I agree</label>
            </div>
            <div class="form-group">
                <button class="btn btn-info btn-block" type="submit" name="add">Sign up</button>
            </div>
            <div class="social-auth-hr">
                <!-- <span>Or Sign up with</span> -->
            </div>
            <!-- <div class="text-center social-auth m-b-20">
                <a class="btn btn-social-icon btn-twitter m-r-5" href="javascript:;"><i class="fa fa-twitter"></i></a>
                <a class="btn btn-social-icon btn-facebook m-r-5" href="javascript:;"><i class="fa fa-facebook"></i></a>
                <a class="btn btn-social-icon btn-google m-r-5" href="javascript:;"><i class="fa fa-google-plus"></i></a>
                <a class="btn btn-social-icon btn-linkedin m-r-5" href="javascript:;"><i class="fa fa-linkedin"></i></a>
                <a class="btn btn-social-icon btn-vk" href="javascript:;"><i class="fa fa-vk"></i></a>
            </div> -->
            <div class="text-center">Already Registered?
                <a class="color-blue" href="studentlogin.php">Login here</a>
            </div>
        </form>
    </div>
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
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
            $('#register-form').validate({
                errorClass: "help-block",
                rules: {
                    first_name: {
                        required: true,
                        minlength: 2
                    },
                    last_name: {
                        required: true,
                        minlength: 2
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        confirmed: true
                    },
                    password_confirmation: {
                        equalTo: password
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
<?php

if (isset($_POST["add"])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $studentroll = $_POST["studentroll"];
    $studentcourse = $_POST["studentcourse"];
    $studentdepartment = $_POST["studentdepartment"];
    $studentsemester = $_POST["studentsemester"];
    $studentphonenumber = $_POST["studentphonenumber"];
    $studentemail = $_POST["studentemail"];
    $studentpassword = $_POST["studentpassword"];
    $alreadycheck = "select *from student where studentemail='$studentemail' or studentphonenumber='$studentphonenumber'";
    $resac = mysqli_query($conn, $alreadycheck);
    $rcac = mysqli_num_rows($resac);
    if ($rcac == 0) {
        $insert = "insert into student values('','$firstname','$lastname','$studentroll','$studentcourse','$studentdepartment','$studentsemester','$studentphonenumber','$studentemail','$studentpassword','NA','')";
        if (mysqli_query($conn, $insert)) {
            echo "<script>alert('Student Details Added Successfully')</script>";
        } else {
            echo "<script>alert('Student Details Not Added')</script>";
        }
    } else {
        echo "<script>alert('Student Details Already Registered')</script>";
    }
}
?>

</html>