<?php session_start();
if (empty($_SESSION["admin"])) {
    $msg = "Please Login";
    echo "<script>alert('$msg');window.location.href='adminlogin.php';</script>";
}
include("dbconn.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Librarian Register</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <!-- THEME STYLES-->
    <link href="assets/css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="./assets/vendors/DataTables/datatables.min.css" rel="stylesheet" />
    <script type="text/javascript">
        function check(librarian) {
            var password = librarian.password.value;
            var confirmpassword = librarian.confirmpassword.value;
            if (password != confirmpassword) {
                alert("Confirm Password Does Not Match !!!");
                librarian.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER-->
        <?php include("adminheader.php");
        include("adminsidebar.php"); ?>
        <!-- END HEADER-->
        <!-- START SIDEBAR-->

        <!-- END SIDEBAR-->
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Add Librarian</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="la la-home font-20"></i></a>
                    </li>
                    <!-- <li class="breadcrumb-item">Basic Form</li> -->
                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Enter Librarian Details Here</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                    <!-- <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item">option 1</a>
                                        <a class="dropdown-item">option 2</a>
                                    </div> -->
                                </div>
                            </div>
                            <div class="ibox-body">
                                <form role="form" name="librarian" method="POST" onsubmit="return check(librarian);" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>First Name</label>
                                            <input class="form-control" placeholder="Enter First Name" name="firstname" type="text" pattern="[A-Za-z]{1,40}" title="Please Enter First Name In Character" required>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Last Name</label>
                                            <input class="form-control" placeholder="Enter Last Name" name="lastname" type="text" pattern="[A-Za-z]{1,40}" title="Please Enter Last Name In Character" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" type="email" placeholder="Email address" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input class="form-control" placeholder="Enter Phone Number" name="phonenumber" type="text" pattern="[0-9]{10}" title="Please Enter 10 digit Phone Number" maxlength="10" id="num" oninput="return onlynum()" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" placeholder="Enter Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one uppercase and lowercase letter one number and ,and at least 8 or more characters" type="password" id="myInput" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input class="form-control" type="password" placeholder="Enter Confirm Password" name="confirmpassword" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Upload Image</label>
                                        <input class="form-control" type="file" placeholder="Upload Image" name="image" required>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label class="ui-checkbox">
                                            <input type="checkbox">
                                            <span class="input-span"></span>Remamber me</label>
                                    </div> -->
                                    <center>
                                        <div class="form-group">
                                            <button class="btn btn-dark btn-lg" type="submit" name="registar">Register</button>
                                        </div>
                                    </center>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
    <!-- BEGIN THEME CONFIG PANEL-->
    <!-- END THEME CONFIG PANEL-->
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>

    <?php
    function getExtension($str)
    {
        $i = strrpos($str, ".");
        if (!$i) {
            return "";
        }
        $l = strlen($str) - $i;
        $ext = substr($str, $i + 1, $l);
        return $ext;
    }
    if (isset($_POST["registar"])) {
        $image = $_FILES['image']['name'];

        if ($image) {

            $filename = stripslashes($_FILES['image']['name']);

            $extension = getExtension($filename);
            $extension = strtolower($extension);

            if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") &&  ($extension != "gif") && ($extension != "bmp") && ($extension != "pdf")) {
                echo '<h1>Unknown extension!</h1>';
                $errors = 1;
            } else {
                // $size=filesize($_FILES['image']['tmp_name']);
                $image_name = time() . '.' . $extension;
                $newname = "librarianimage/" . $image_name;
                $copied = copy($_FILES['image']['tmp_name'], $newname);
                if (!$copied) {
                    echo '<h1>Copy unsuccessfull!</h1>';
                    $errors = 1;
                }
            }
        }

        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $phonenumber = $_POST["phonenumber"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];
        $alreadycheck = "select *from librariandetails where email='$email' or phonenumber='$phonenumber'";
        $resac = mysqli_query($conn, $alreadycheck);
        $rcac = mysqli_num_rows($resac);
        if ($rcac == 0) {
            $abd = "insert into librariandetails values('','$firstname','$lastname','$email','$phonenumber','$password','$confirmpassword','$image_name')";
            if (mysqli_query($conn, $abd)) {
                echo "<script>alert('Librarian Details Added Successfully')</script>";
            } else {
                echo "<script>alert('Librarian Details Not Added')</script>";
            }
        } else {
            echo "<script>alert('Librarian Details Already Exist')</script>";
        }
    }
    ?>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS-->
    <script src="./assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <!-- CORE SCRIPTS-->
    <script src="assets/js/app.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script src="./assets/vendors/DataTables/datatables.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            $('#example-table').DataTable({
                pageLength: 10,
                //"ajax": './assets/demo/data/table_data.json',
                /*"columns": [
                    { "data": "name" },
                    { "data": "office" },
                    { "data": "extn" },
                    { "data": "start_date" },
                    { "data": "salary" }
                ]*/
            });
        })
    </script>
</body>

</html>