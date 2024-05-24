<?php session_start();
if (empty($_SESSION["admin"])) {
    $msg = "Please Login";
    echo "<script>alert('$msg');window.location.href='adminlogin.php';</script>";
}
include("dbconn.php");
?>
<?php
$student = $_GET['student'];
$qstudent = "select *from student where slno='$student'";
$resstudent = mysqli_query($conn, $qstudent);
$rowstudent = mysqli_fetch_assoc($resstudent);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Edit Student</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <!-- THEME STYLES-->
    <link href="assets/css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="./assets/vendors/DataTables/datatables.min.css" rel="stylesheet" />

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
                <h1 class="page-title">Edit Student</h1>
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
                                <div class="ibox-title">Edit Student Details Here</div>
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

                                    <div class="form-group">
                                        <label>Student First Name :</label>
                                        <input class="form-control" placeholder="Enter Full Name" name="firstname" type="text" title="Please Enter First Name In Character" value="<?php echo $rowstudent['firstname']; ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Student Last Name :</label>
                                        <input class="form-control" placeholder="Enter Last Name" name="lastname" type="text" title="Please Enter Last Name In Character" value="<?php echo $rowstudent['lastname']; ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Student Roll No.</label>
                                        <input class="form-control" type="number" placeholder="Enter Roll Of The Student" name="studentroll" value="<?php echo $rowstudent['studentroll']; ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Course Name :</label>
                                        <select class="form-control" id="course-dropdown" name="studentcourse" onchange="getdepartment(this.value);">
                                            <option value="<?php echo $rowstudent['studentcourse']; ?>"><?php echo $rowstudent['studentcourse']; ?></option>
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
                                        <label>Department Name :</label>
                                        <select class="form-control" id="department" name="studentdepartment" required>
                                            <option value="<?php echo $rowstudent['studentdepartment']; ?>"><?php echo $rowstudent['studentdepartment']; ?></option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Semester :</label>
                                        <select class="form-control" id="course-dropdown" name="studentsemester">
                                            <option value="<?php echo $rowstudent['studentsemester']; ?>"><?php echo $rowstudent['studentsemester']; ?></option>
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
                                        <label>Phone Number</label>
                                        <input class="form-control" placeholder="Enter Phone Number" name="studentphonenumber" type="text" pattern="[0-9]{10}" title="Please Enter 10 digit Phone Number" maxlength="10" id="num" oninput="return onlynum()" value="<?php echo $rowstudent['studentphonenumber']; ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" type="email" placeholder="Email address" name="studentemail" value="<?php echo $rowstudent['studentemail']; ?>" readonly required>
                                    </div>

                                    <div class="form-group">
                                        <label>Student Password</label>
                                        <input class="form-control" placeholder="Password would be the phone no. of the student" name="studentpassword" value="<?php echo $rowstudent['password']; ?>" readonly required>
                                    </div>

                                    <!-- <div class="form-group">
                                        <label class="ui-checkbox">
                                            <input type="checkbox">
                                            <span class="input-span"></span>Remamber me</label>
                                    </div> -->
                                    <center>
                                        <div class="form-group">
                                            <a class="btn btn-danger btn-lg" href="allstudents.php">Cancel</a>&nbsp
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
        $studentroll = $_POST["studentroll"];
        $studentcourse = $_POST["studentcourse"];
        $studentdepartment = $_POST["studentdepartment"];
        $studentsemester = $_POST["studentsemester"];
        $studentphonenumber = $_POST["studentphonenumber"];
        $studentemail = $_POST["studentemail"];
        $studentpassword = $_POST["studentpassword"];
        // $alreadycheck = "select *from librariandetails where email='$email' or phonenumber='$phonenumber'";
        // $resac = mysqli_query($conn, $alreadycheck);
        // $rcac = mysqli_num_rows($resac);
        // if ($rcac == 0) {
        $update = "UPDATE student SET firstname ='$firstname',lastname ='$lastname', studentroll='$studentroll', studentcourse='$studentcourse', studentdepartment='$studentdepartment',studentsemester='$studentsemester', studentphonenumber='$studentphonenumber', studentemail='$studentemail', password='$studentpassword' where slno='$student'";

        if (mysqli_query($conn, $update)) {
            $message = "Student Details Edited Successfully";
            echo "<script>alert('$message');window.location.href='allstudents.php';</script>";
        } else {
            $message = "Student Details Not Edited";
            echo "<script>alert('$message');window.location.href='editstudent.php';</script>";
        }
        // } else {
        //     echo "<script>alert('Librarian Details Already Exist')</>";
        // }
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