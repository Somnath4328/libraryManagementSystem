<?php session_start();
if (empty($_SESSION["admin"])) {
    $msg = "Please Login";
    echo "<script>alert('$msg');window.location.href='adminlogin.php';</script>";
}
include("dbconn.php");
?>
<?php
$s = $_GET['s'];
$q = "select *from librariandetails where slno='$s'";
$res = mysqli_query($conn, $q);
$row = mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Edit Librarian Details</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <!-- THEME STYLES-->
    <link href="assets/css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="./assets/vendors/DataTables/datatables.min.css" rel="stylesheet" />
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
                <h1 class="page-title">Edit Librarian</h1>
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
                                <form role="form" name="f" method="POST" onsubmit="return check(f);" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>First Name</label>
                                            <input class="form-control" placeholder="Enter First Name" name="firstname" type="text" pattern="[A-Za-z]{1,40}" title="Please Enter First Name In Character" value="<?php echo $row['firstname']; ?>" required>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Last Name</label>
                                            <input class="form-control" placeholder="Enter Last Name" name="lastname" type="text" pattern="[A-Za-z]{1,40}" title="Please Enter Last Name In Character" value="<?php echo $row['lastname']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" type="email" placeholder="Email address" name="email" value="<?php echo $row['email']; ?>" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input class="form-control" placeholder="Enter Phone Number" name="phonenumber" type="text" pattern="[0-9]{10}" title="Please Enter 10 digit Phone Number" maxlength="10" id="num" oninput="return onlynum()" value="<?php echo $row['phonenumber']; ?>" required>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label class="ui-checkbox">
                                            <input type="checkbox">
                                            <span class="input-span"></span>Remamber me</label>
                                    </div> -->
                                    <center>
                                        <div class="form-group">
                                            <a class="btn btn-danger btn-lg" href="viewalllibrariandetails.php" >Cancel</a>&nbsp
                                            <button class="btn btn-success btn-lg" type="submit" name="edit">Edit</button>
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

    if (isset($_POST["edit"])) {
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $phonenumber = $_POST["phonenumber"];
        $update = "UPDATE librariandetails SET firstname ='$firstname', lastname='$lastname', email='$email', phonenumber='$phonenumber' where slno='$s'";
        if (mysqli_query($conn, $update)) {
            $message = "Librarian Details Edited Successfully Edited";
            echo "<script>alert('$message');window.location.href='viewalllibrariandetails.php';</script>";
        } else {
            $message = "ERROR... Librarian Details Not Edited";
            echo "<script>alert('$message');window.location.href='editlibrarian.php';</script>";
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