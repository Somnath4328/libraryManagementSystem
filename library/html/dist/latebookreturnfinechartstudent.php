<?php session_start();
if (empty($_SESSION["student"])) {
    $msg = "Please Login";
    echo "<script>alert('$msg');window.location.href='studentlogin.php';</script>";
}
include("dbconn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Fine Chart</title>
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
        <?php
        include("studentheader.php");
        include("studentsidebar.php");
        ?>
        <!-- END HEADER-->
        <!-- START SIDEBAR-->

        <!-- END SIDEBAR-->
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Late Book Submission Fine</h1>
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
                                <div class="ibox-title">Late Book Submission Fine</div>
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
                                <!-- <form role="form" name="f" method="POST" onsubmit="return check(f);" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label><b>Subject Name :</b></label>
                                        <input class="form-control" placeholder="Enter Subject Name (Ex.- C, Java, Python)" name="subjectname" type="text" title="Please Enter Subject Name" required>
                                    </div>

                                    <br>
                                    <center>
                                        <div class="form-group">
                                            <button class="btn btn-info" type="submit" name="add">Add</button>
                                        </div>
                                    </center>
                                </form> -->
                                <div style="overflow-x:auto;">
                                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Days</th>
                                                <th>Fine Amount</th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Days</th>
                                                <th>Fine Amount</th>

                                            </tr>
                                        </tfoot>
                                        <tbody>

                                            <tr>
                                                <td>(Issue Date - Return Date) <= 7 Days</td>
                                                <td>No Fine</td>
                                            </tr>
                                            <tr>
                                                <td>(Issue Date - Return Date) > 7 Days and <= 15 Days</td>
                                                <td>Days * 1.0</td>
                                            </tr>
                                            <tr>
                                                <td>(Issue Date - Return Date) > 15 Days and <= 30 Days</td>
                                                <td>Days * 1.5</td>
                                            </tr>
                                            <tr>
                                                <td>(Issue Date - Return Date) > 30 Days and <= 60 Days</td>
                                                <td>Days * 2.0</td>
                                            </tr>
                                            <tr>
                                                <td>(Issue Date - Return Date) > 60 Days and <= 90 Days</td>
                                                <td>Days * 2.5</td>
                                            </tr>
                                            <tr>
                                                <td>(Issue Date - Return Date) > 90 Days and <= 120 Days</td>
                                                <td>Days * 3.0</td>
                                            </tr>
                                            <tr>
                                                <td>(Issue Date - Return Date) > 120 Days and <= 150 Days</td>
                                                <td>Days * 3.5</td>
                                            </tr>
                                            <tr>
                                                <td>(Issue Date - Return Date) > 150 Days and <= 180 Days</td>
                                                <td>Days * 4.0</td>
                                            </tr>
                                            <tr>
                                                <td>(Issue Date - Return Date) > 180 Days and <= 210 Days</td>
                                                <td>Days * 4.5</td>
                                            </tr>
                                            <tr>
                                                <td>(Issue Date - Return Date) > 210 Days and <= 240 Days</td>
                                                <td>Days * 5.0</td>
                                            </tr>
                                            <tr>
                                                <td>(Issue Date - Return Date) > 240 Days</td>
                                                <td>Days * 10.0</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
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