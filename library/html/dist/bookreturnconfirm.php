<?php session_start();
if (empty($_SESSION["librarian"])) {
    $msg = "Please Login";
    echo "<script>alert('$msg');window.location.href='librarianlogin.php';</script>";
}
include("dbconn.php");
?>
<?php
$bookingid = $_GET['brc'];
$qbrc = "select *from booking where bookingno='$bookingid'";
$resbrc = mysqli_query($conn, $qbrc);
$rowbrc = mysqli_fetch_assoc($resbrc);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Book Return Confirm</title>
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
                <h1 class="page-title">Book Return Confirm</h1>
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
                                <div class="ibox-title">Check The Book Code And Return The Book</div>
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
                                        <label><b>Book Code :</b></label>
                                        <input class="form-control" placeholder="Enter Book Code" name="bookcode" type="text" title="Please Enter The Book Code" value="<?php echo $rowbrc['bookcode']; ?>" readonly>
                                    </div>

                                    <br>
                                    <center>
                                        <div class="form-group">
                                            <button class="btn btn-info btn-lg" type="submit" name="return">Return</button>
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
    if (isset($_POST["return"])) {
        $bookingid = $_GET["brc"];
        $bookcode = $_POST["bookcode"];
        date_default_timezone_set('Asia/Kolkata');
        $returndate = date("Y-m-d");

        $getbookid =  "select *from booking where bookingno ='$bookingid'";
        $resbookid = mysqli_query($conn, $getbookid);
        $rowbookid = mysqli_fetch_assoc($resbookid);

        $bookid = $rowbookid['bookid'];
        $issuedate1 = $rowbookid['issuedate'];
        $returndate1 =  $returndate;
        $issuedate = new DateTime($rowbookid['issuedate']);
        $returndate =  new DateTime($returndate);
        $remdate = date_diff($issuedate, $returndate);
        $days = $remdate->format("%a");
        if ($days <= 7) 
        {
            $fine = 0;
        } 
        else if($days > 7 && $days <= 15)
        {
            $fine = $days * 1;
        }
        else if($days > 15 && $days <=30)
        {
            $fine = $days * 1.5;
        }
        else if($days > 30 && $days <= 60)
        {
            $fine = $days * 2;
        }
        else if($days > 60 && $days <= 90)
        {
            $fine = $days * 2.5;
        }
        else if($days > 90 && $days <= 120)
        {
            $fine = $days * 3;
        }
        else if($days > 120 && $days <= 150)
        {
            $fine = $days * 3.5;
        }
        else if($days > 150 && $days <= 180)
        {
            $fine = $days * 4;
        }
        else if($days > 180 && $days <= 210)
        {
            $fine = $days * 4.5;
        }
        else if($days > 210 && $days <= 240)
        {
            $fine = $days * 5;
        }
        else
        {
            $fine = $days * 10;
        }
        $updatestatus = "UPDATE booking SET status ='Returned',bookcode='$bookcode',returndate = '$returndate1', fineamount='$fine' where bookingno ='$bookingid'";
        if (mysqli_query($conn, $updatestatus)) {
            $updatebookstock = "UPDATE stock SET quantity = quantity + 1 where bookid='$bookid'";
            mysqli_query($conn, $updatebookstock);
            echo "<script>alert('Book Returned Successfully');window.location.href='bookreturn.php';</script>";
        } else {
            echo "<script>alert('Book Not Returned');window.location.href='bookreturn.php';</script>";
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