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
    <title>Add And View Departments</title>
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
                <h1 class="page-title">Add Department</h1>
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
                                <div class="ibox-title">Enter Department Details Here</div>
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
                                            <label>Course Name :</label>
                                            <select class="form-control" id="course-dropdown" name="coursename">
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
                                        <div class="col-sm-6 form-group">
                                            <label>Department Name :</label>
                                            <input class="form-control" placeholder="Enter Department Name" name="departmentname" type="text" title="Please Enter Department Name In Character" required>
                                        </div>
                                    </div>
                                    <br>
                                    <center>
                                        <div class="form-group">
                                            <button class="btn btn-dark btn-lg" type="submit" name="add">Add</button>
                                        </div>
                                    </center>
                                </form>
                                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Sl No.</th>
                                            <th>Course Name</th>
                                            <th>Department Name</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sl No.</th>
                                            <th>Course Name</th>
                                            <th>Department Name</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $qdepartments = "select * from departments";
                                        $resdepartments  = mysqli_query($conn, $qdepartments );
                                        $c = 1;
                                        while ($rowdepartments = mysqli_fetch_assoc($resdepartments )) {
                                        ?>
                                            <tr>
                                                <td><?php echo $c; ?></td>
                                                <td><?php echo $rowdepartments['coursename']; ?></td>
                                                <td><?php echo $rowdepartments['departmentname']; ?></td>
                                                <td><a class="fa fa-edit" href="editdepartment.php?s=<?php echo $rowdepartments['slno']; ?>" onclick="return confirm('Do You Want Edit Department')" ;></a></td>
                                                <td><a class="fa fa-trash" href="deletedepartment.php?departmentid=<?php echo $rowdepartments['slno']; ?>" onclick="return confirm('Do You Want Delete Department')" ;></a></td>
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

    if (isset($_POST["add"])) {

        $coursename = $_POST["coursename"];
        $departmentname = $_POST["departmentname"];
        $alreadycheck = "select *from departments where departmentname ='$departmentname'";
        $resdepartment = mysqli_query($conn, $alreadycheck);
        $rcdepartment = mysqli_num_rows($resdepartment);
        if ($rcdepartment == 0) {
            $insertdepartment = "insert into departments values('','$coursename','$departmentname')";
            if (mysqli_query($conn, $insertdepartment)) {
                echo "<script>alert('New Department Added Successfully');window.location.href='departments.php';</script>";
            } else {
                echo "<script>alert('Department Not Added');window.location.href='departments.php';</script>";
            }
        } else {
            echo "<script>alert('Department Details Already Exist');window.location.href='departments.php';</script>";
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