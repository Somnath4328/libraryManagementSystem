<?php session_start();
if (empty($_SESSION["librarian"])) {
    $msg = "Please Login";
    echo "<script>alert('$msg');window.location.href='librarianlogin.php';</script>";
}
include("dbconn.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Librarian | Dashboard</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="./assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="assets/css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER-->
        <!-- START SIDEBAR-->
        <?php
        include("librarianheader.php");
        include("librariansidebar.php");
        ?>


        <!-- END HEADER-->
        <!-- END SIDEBAR-->
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-success color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong">
                                    <?php
                                    $querysubject = "select * from subjects";
                                    $resultsubject = mysqli_query($conn, $querysubject);
                                    $rowcountsubject = mysqli_num_rows($resultsubject);
                                    ?>
                                    <a href="subjects.php" style="color:white">
                                        <?php
                                        echo "$rowcountsubject";
                                        ?>
                                    </a>
                                </h2>
                                <div class="m-b-5">Total Subjects</div><i class="ti-layout widget-stat-icon"></i>
                                <!-- <div><i class="fa fa-level-up m-r-5"></i><small>25% higher</small></div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-info color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong">
                                    <?php
                                    $querybooks = "select * from books";
                                    $resultbooks = mysqli_query($conn, $querybooks);
                                    $rowcountbooks = mysqli_num_rows($resultbooks);
                                    ?>
                                    <a href="addbook.php" style="color:white">
                                        <?php
                                        echo "$rowcountbooks";
                                        ?>
                                    </a>
                                </h2>
                                <div class="m-b-5">Total Books</div><i class="ti-book widget-stat-icon"></i>
                                <!-- <div><i class="fa fa-level-up m-r-5"></i><small>17% higher</small></div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-warning color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong">
                                    <?php
                                    $querystock = "select * from stock where quantity > 0";
                                    $resultstock = mysqli_query($conn, $querystock);
                                    $rowcountstock = mysqli_num_rows($resultstock);
                                    ?>
                                    <a href="allbookstock.php" style="color:white">
                                        <?php
                                        echo "$rowcountstock";
                                        ?>
                                    </a>
                                </h2>
                                <div class="m-b-5">Available Books In Stock</div><i class="fa fa-cart-arrow-down widget-stat-icon"></i>
                                <!-- <div><i class="fa fa-level-up m-r-5"></i><small>22% higher</small></div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-danger color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong">
                                    <?php
                                    $querybookissue = "select * from booking where status = 'Booked'";
                                    $resultbookissue = mysqli_query($conn, $querybookissue);
                                    $rowcountbookissue = mysqli_num_rows($resultbookissue);
                                    ?>
                                    <a href="bookissue.php" style="color:white">
                                        <?php
                                        echo "$rowcountbookissue";
                                        ?>
                                    </a>
                                </h2>
                                <div class="m-b-5">Book Issue Request</div><i class="ti-user widget-stat-icon"></i>
                                <!-- <div><i class="fa fa-level-down m-r-5"></i><small>-12% Lower</small></div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-success color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong">
                                    <?php
                                    $queryfine = "select *from booking where not fineamount = '0'";
                                    $resultfine = mysqli_query($conn, $queryfine);
                                    $rowcountfine = mysqli_num_rows($resultfine);
                                    ?>
                                    <a href="fine.php" style="color:white">
                                        <?php
                                        echo "$rowcountfine";
                                        ?>
                                    </a>
                                </h2>
                                <div class="m-b-5">Fine</div><i class="fa fa-money widget-stat-icon"></i>
                                <!-- <div><i class="fa fa-level-up m-r-5"></i><small>25% higher</small></div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    .visitors-table tbody tr td:last-child {
                        display: flex;
                        align-items: center;
                    }

                    .visitors-table .progress {
                        flex: 1;
                    }

                    .visitors-table .progress-parcent {
                        text-align: right;
                        margin-left: 10px;
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
    <script src="./assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <script src="./assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="assets/js/app.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script src="./assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
</body>

</html>