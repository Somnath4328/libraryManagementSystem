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
    <title>Purchase Book</title>
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
        function getsubject(str) {
            if (str.length == 0) {
                document.getElementById("subject").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("subject").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "getbookname.php?q=" + str, true);
                xmlhttp.send();
            }
        }

        function getauthorname(str1, str2) {
            if (str1.length == 0) {
                document.getElementById("bookname").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("bookname").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "getauthorname.php?q=" + str1 + "&q1=" + str2, true);
                xmlhttp.send();
            }
        }

        function getbookedition(str1, str2, str3) {
            if (str1.length == 0) {
                document.getElementById("authorname").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("authorname").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "getbookedition.php?q=" + str1 + "&q1=" + str2 + "&q2=" + str3, true);
                xmlhttp.send();
            }
        }
    </script>
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
                <h1 class="page-title">Purchase Book</h1>
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
                                <div class="ibox-title">Purchase Books Here</div>
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
                                        <label>Subject Name :</label>
                                        <select class="form-control" id="category-dropdown" name="subjectname" onchange="getsubject(this.value);">
                                            <option value="">Select Subject</option>
                                            <?php
                                            require_once "dbconn.php";
                                            $result = mysqli_query($conn, "SELECT * FROM subjects");
                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                                <option value="<?php echo $row['subjectname']; ?>"><?php echo $row["subjectname"]; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Book Name :</label>
                                        <select class="form-control" id="subject" name="bookname" onchange="getauthorname(document.getElementById('category-dropdown').value,this.value);">
                                            <option value="">Select Book</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Author Name :</label>
                                        <select required class="form-control" id="bookname" name="authorname" onchange="getbookedition(document.getElementById('category-dropdown').value,document.getElementById('subject').value,this.value);">
                                            <option>Select Author Name</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Book Edition :</label>
                                        <select class="form-control" id="authorname" name="bookedition" required>
                                            <option>Select Edition</option>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>Quantity : </label>
                                        <input class="form-control" placeholder="Enter Quantity" name="quantity" type="number" pattern="[0-9]{10}" title="Please Enter Quantity" maxlength="10" id="num" oninput="return onlynum()" required>
                                    </div>

                                    <!-- <div class="form-group">
                                        <label>Stock : </label>
                                        <input class="form-control" type="number" placeholder="Total Stock" name="stock" required>
                                    </div> -->

                                    <div class="form-group">
                                        <label>Price : </label>
                                        <input class="form-control" type="number" placeholder="Enter Price" name="price" required>
                                    </div>

                                    <!-- <div class="form-group">
                                        <label class="ui-checkbox">
                                            <input type="checkbox">
                                            <span class="input-span"></span>Remamber me</label>
                                    </div> -->
                                    <center>
                                        <div class="form-group">
                                            <button class="btn btn-dark btn-lg" type="submit" name="add">Buy</button>
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
    if (isset($_POST["add"])) {
        $subjectname = $_POST["subjectname"];
        $bookname = $_POST["bookname"];
        $authorname = $_POST["authorname"];
        $bookedition = $_POST["bookedition"];
        $quantity = $_POST["quantity"];
        $price = $_POST["price"];
        $q = "select *from stock where bookid ='$bookname'";
        $res = mysqli_query($conn, $q);
        $rc = mysqli_num_rows($res);
        if ($rc == 1) {
            $update = "UPDATE stock SET  quantity = quantity+'$quantity' where bookid='$bookname'";
            if (mysqli_query($conn, $update)) {
    ?>
                <?php echo "<script>alert('Book Quantity Added Successfully');windows.location.href='purchasebook.php';</script>";  ?>

            <?php
            } else {
            ?>
                <?php echo "<script>alert('Book Quantity Not Added Successfully');windows.location.href='purchasebook.php';</script>";  ?>
            <?php
            }
        } else {
            $insert = "insert into stock values('','$subjectname','$bookname','$authorname','$bookedition','$quantity','$price')";
            if (mysqli_query($conn, $insert)) {
            ?>

                <?php echo "<script>alert('Book Purchased Successfully');windows.location.href='purchasebook.php';</script>";  ?>

            <?php
            } else {
            ?>
                <?php echo "<script>alert('Book Not Purchased');windows.location.href='purchasebook.php';</script>";  ?>
    <?php
            }
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