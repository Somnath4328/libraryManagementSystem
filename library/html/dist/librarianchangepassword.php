<?php
session_start();
if (empty($_SESSION["librarian"])) {
    $msg = "Please Login";
    echo "<script>alert('$msg');window.location.href='librarianlogin.php';</script>";
}
include("dbconn.php");
$librarianemail = $_SESSION['librarian'];
$qlibrarian = "select * from librariandetails where email ='$librarianemail'";
$reslibrarian = mysqli_query($conn, $qlibrarian);
$rowlibrarian = mysqli_fetch_assoc($reslibrarian);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Librarian Change Password</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <!-- THEME STYLES-->
    <link href="assets/css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <script type="text/javascript">
        function check(librarian) {
            var password = librarian.newpassword.value;
            var confirmpassword = librarian.confirmpassword.value;
            if (password != confirmpassword) {
                alert("Re Enter Password does not match !!!");
                librarian.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>
</head>

<body class="fixed-navbar sidebar-mini">
    <div class="page-wrapper">
        <!-- START HEADER-->

        <!-- END HEADER-->
        <!-- START SIDEBAR-->
        <?php include("librarianheader.php");
        include("librariansidebar.php"); ?>
        <!-- END SIDEBAR-->
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title"><?php echo $rowlibrarian['firstname'] ?> <?php echo $rowlibrarian['lastname'] ?></h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="la la-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">Change Pssword</li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="ibox">
                            <div class="ibox-body text-center">
                                <div class="m-t-20">

                                <?php
                                    if ($rowlibrarian['librarianimage'] == '') {
                                    ?>
                                        <img src="./assets/img/admin-avatar.png" width="145px" />
                                    <?php } else {
                                    ?>
                                        <img class="img-circle" src="librarianimage/<?php echo $rowlibrarian['librarianimage']; ?>" width="150px" />
                                    <?php
                                    }
                                    ?>


                                </div>
                                <h5 class="font-strong m-b-10 m-t-10"><?php echo $rowlibrarian['firstname'] ?> <?php echo $rowlibrarian['lastname'] ?></h5>
                                <div class="m-b-20 text-muted">Librarian</div>
                                <!-- <div class="profile-social m-b-20">
                                    <a href="javascript:;"><i class="fa fa-twitter"></i></a>
                                    <a href="javascript:;"><i class="fa fa-facebook"></i></a>
                                    <a href="javascript:;"><i class="fa fa-pinterest"></i></a>
                                    <a href="javascript:;"><i class="fa fa-dribbble"></i></a>
                                </div> -->

                                
                            </div>
                        </div>
                        <!-- <div class="ibox">
                            <div class="ibox-body">
                                <div class="row text-center m-b-20">
                                    <div class="col-4">
                                        <div class="font-24 profile-stat-count">140</div>
                                        <div class="text-muted">Followers</div>
                                    </div>
                                    <div class="col-4">
                                        <div class="font-24 profile-stat-count">$780</div>
                                        <div class="text-muted">Sales</div>
                                    </div>
                                    <div class="col-4">
                                        <div class="font-24 profile-stat-count">15</div>
                                        <div class="text-muted">Projects</div>
                                    </div>
                                </div>
                                <p class="text-center">Lorem Ipsum is simply dummy text of the printing and industry. Lorem Ipsum has been</p>
                            </div>
                        </div> -->
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <div class="ibox">
                            <div class="ibox-body">
                                <ul class="nav nav-tabs tabs-line">
                                    
                                    <li class="nav-item">
                                        <a class="nav-link" href="#tab-2" data-toggle="tab"><i class="ti-settings"></i> Change Password</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="nav-link" href="#tab-3" data-toggle="tab"><i class="ti-announcement"></i> Feeds</a>
                                    </li> -->
                                </ul>
                                <div class="tab-content">
                                    
                                    <div class="tab-pane fade show active" id="tab-2">
                                        <form role="form" name="librarian" method="POST" onSubmit="return check(librarian)" enctype="multipart/form-data">

                                            <div class="form-group">
                                                <label>Enter Old Password</label>
                                                <input class="form-control" name="oldpassword" type="" placeholder="Enter Old Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <label>Enter New Password</label>
                                                    <input class="form-control" name="newpassword" type="" placeholder="Enter New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label>Re Enter New Password</label>
                                                    <input class="form-control" name="confirmpassword" type="" placeholder="Re Enter New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                                </div>
                                            </div>
                                            <center>
                                                <div class="form-group">
                                                    <button class="btn btn-danger" type="submit" name="changepassword">Change</button>
                                                </div>
                                            </center>
                                        </form>
                                    </div>
                                    <!-- <div class="tab-pane fade" id="tab-3">
                                        <h5 class="text-info m-b-20 m-t-20"><i class="fa fa-bullhorn"></i> Latest Feeds</h5>
                                        <ul class="media-list media-list-divider m-0">
                                            <li class="media">
                                                <div class="media-img"><i class="ti-user font-18 text-muted"></i></div>
                                                <div class="media-body">
                                                    <div class="media-heading">New customer <small class="float-right text-muted">12:05</small></div>
                                                    <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="media-img"><i class="ti-info-alt font-18 text-muted"></i></div>
                                                <div class="media-body">
                                                    <div class="media-heading text-warning">Server Warning <small class="float-right text-muted">12:05</small></div>
                                                    <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="media-img"><i class="ti-announcement font-18 text-muted"></i></div>
                                                <div class="media-body">
                                                    <div class="media-heading">7 new feedback <small class="float-right text-muted">Today</small></div>
                                                    <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="media-img"><i class="ti-check font-18 text-muted"></i></div>
                                                <div class="media-body">
                                                    <div class="media-heading text-success">Issue fixed <small class="float-right text-muted">12:05</small></div>
                                                    <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="media-img"><i class="ti-shopping-cart font-18 text-muted"></i></div>
                                                <div class="media-body">
                                                    <div class="media-heading">7 New orders <small class="float-right text-muted">12:05</small></div>
                                                    <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="media-img"><i class="ti-reload font-18 text-muted"></i></div>
                                                <div class="media-body">
                                                    <div class="media-heading text-danger">Server warning <small class="float-right text-muted">12:05</small></div>
                                                    <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    .profile-social a {
                        font-size: 16px;
                        margin: 0 10px;
                        color: #999;
                    }

                    .profile-social a:hover {
                        color: #485b6f;
                    }

                    .profile-stat-count {
                        font-size: 22px
                    }
                </style>

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
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS-->
    <script src="./assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="./assets/vendors/chart.js/dist/Chart.min.js" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="assets/js/app.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script src="./assets/js/scripts/profile-demo.js" type="text/javascript"></script>

    <?php
    if (isset($_POST['changepassword'])) {
        $oldpassword = $_POST["oldpassword"];
        $newpassword = $_POST["newpassword"];
        $check = "select * from librariandetails where email='$librarianemail' and password='$oldpassword'";
        $res = mysqli_query($conn, $check);
        $rc = mysqli_num_rows($res);
        if ($rc == 1) {
            $qchange = "UPDATE librariandetails set password='$newpassword',confirmpassword='$newpassword' where email='$librarianemail'";
            if (mysqli_query($conn, $qchange)) {
                echo "<script>alert('Password Changed Successfully');window.location.href='librarianchangepassword.php';</script>";
            } else {
                echo "<script>alert('Password Not Changed');window.location.href='librarianchangepassword.php';</script>";
            }
        }
        else
        {
            echo "<script>alert('Old Password Does Not Match');window.location.href='librarianchangepassword.php';</script>";
        }
    }
    ?>
</body>

</html>