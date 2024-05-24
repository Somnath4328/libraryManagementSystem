<?php session_start();
if (empty($_SESSION["librarian"])) {
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
    <title>All Books Stock</title>
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
        <?php include("librarianheader.php");
        include("librariansidebar.php"); ?>
        <!-- END HEADER-->
        <!-- START SIDEBAR-->

        <!-- END SIDEBAR-->
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Books Stock</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="la la-home font-20"></i></a>
                    </li>
                    <!-- <li class="breadcrumb-item">DataTables</li> -->
                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">All Book Stock Details Here</div>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Book Id</th>
                                    <th>Subject Name</th>

                                    <th>Author Name</th>
                                    <th>Book Edition</th>
                                    <th>Total Quantity</th>
                                    <!-- <th>Price Per Piece</th> -->

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Book Id</th>
                                    <th>Subject Name</th>

                                    <th>Author Name</th>
                                    <th>Book Edition</th>
                                    <th>Total Quantity</th>
                                    <!-- <th>Price Per Piece</th> -->

                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $qstock = "select * from stock";
                                $resstock = mysqli_query($conn, $qstock);
                                $c = 1;
                                while ($rowstock = mysqli_fetch_assoc($resstock)) {
                                ?>
                                    <tr>
                                        <td><?php echo $c; ?></td>
                                        <td><?php echo $rowstock['bookid']; ?></td>
                                        <td><?php echo $rowstock['subjectname']; ?></td>

                                        <td><?php echo $rowstock['authorname']; ?></td>
                                        <td><?php echo $rowstock['bookedition']; ?></td>
                                        <td><b><?php echo $rowstock['quantity']; ?></b></td>

                                    </tr>
                                <?php
                                    $c++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
            <!-- <footer class="page-footer">
                <div class="font-13">2018 © <b>AdminCAST</b> - All rights reserved.</div>
                <a class="px-4" href="http://themeforest.net/item/adminca-responsive-bootstrap-4-3-angular-4-admin-dashboard-template/20912589" target="_blank">BUY PREMIUM</a>
                <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
            </footer> -->
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

    if (isset($_POST["registar"])) {

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
            $abd = "insert into librariandetails values('','$firstname','$lastname','$email','$phonenumber','$password','$confirmpassword')";
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
    <!-- PAGE LEVEL SCRIPTS-->
</body>

</html>