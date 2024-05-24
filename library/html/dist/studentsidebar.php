<?php
include("dbconn.php");
$studentemail = $_SESSION['student'];
$qstudent = "select * from student where studentemail='$studentemail'";
$resstudent = mysqli_query($conn, $qstudent);
$rowstudent = mysqli_fetch_assoc($resstudent);
?>

<!-- START SIDEBAR-->
<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>


                <?php
                if ($rowstudent['studentimage'] == '') {
                ?>
                    <img src="./assets/img/admin-avatar.png" width="45px" />

                <?php } else {
                ?>
                    <img class="img-circle" src="studentimage/<?php echo $rowstudent['studentimage']; ?>" width="45px" />
                <?php
                }


                ?>

            </div>
            <div class="admin-info">
                <div class="font-strong"><?php echo $rowstudent['firstname'];  ?> <?php echo $rowstudent['lastname'];  ?></div><small>Student</small>
            </div>
        </div>
        <ul class="side-menu metismenu">
            <li>
                <a class="active" href="studentdashboard.php"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li class="heading">FEATURES</li>
            <!-- <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                        <span class="nav-label">Librarian</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="librariandetails.php">Add Librarian</a>
                        </li>
                        <li>
                            <a href="alllibrarian.php">All Librarian</a>
                        </li>
                        
                    </ul>
                </li> -->
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-book"></i>
                    <span class="nav-label">Issue Book</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="booking.php">Issue Book</a>
                    </li>
                    <!-- <li>
                        <a href="allstudents.php">View Student</a>
                    </li> -->

                </ul>
            </li>
            <li>
                <a class="unactive" href="booktaken.php"><i class="sidebar-item-icon fa fa-history"></i>
                    <span class="nav-label">Book Taken History</span>
                </a>
            </li>
            <li>
                <a class="unactive" href="latebookreturnfinechartstudent.php"><i class="sidebar-item-icon fa fa-table"></i>
                    <span class="nav-label">Fine Chart</span>
                </a>
            </li>
            <!-- <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                        <span class="nav-label">Courses</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="courses.php">Add & View Courses</a>
                        </li>
                    </ul>
                </li> -->
            <!-- <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                        <span class="nav-label">Departments</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="departments.php">Add & View Departments</a>
                        </li>
                        
                    </ul>
                </li> -->
            <!-- <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-map"></i>
                        <span class="nav-label">Add Book</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="addbook.php">Add & View Books</a>
                        </li>
                    </ul>
                </li> -->
            <!-- <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-map"></i>
                        <span class="nav-label">Purchase Books</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="purchasebook.php">Purchase Books</a>
                        </li>
                        <li>
                            <a href="allbookstock.php">View Books Stock</a>
                        </li>
                    </ul>
                </li> -->
            <!-- <li>
                    <a href="icons.html"><i class="sidebar-item-icon fa fa-smile-o"></i>
                        <span class="nav-label">Icons</span>
                    </a>
                </li> -->
            <!-- <li class="heading">PAGES</li>
                <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-envelope"></i>
                        <span class="nav-label">Mailbox</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="mailbox.html">Inbox</a>
                        </li>
                        <li>
                            <a href="mail_view.html">Mail view</a>
                        </li>
                        <li>
                            <a href="mail_compose.html">Compose mail</a>
                        </li>
                    </ul>
                </li> -->
            <!-- <li>
                    <a href="calendar.html"><i class="sidebar-item-icon fa fa-calendar"></i>
                        <span class="nav-label">Calendar</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-file-text"></i>
                        <span class="nav-label">Pages</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="invoice.html">Invoice</a>
                        </li>
                        <li>
                            <a href="profile.html">Profile</a>
                        </li>
                        <li>
                            <a href="login.html">Login</a>
                        </li>
                        <li>
                            <a href="register.html">Register</a>
                        </li>
                        <li>
                            <a href="lockscreen.html">Lockscreen</a>
                        </li>
                        <li>
                            <a href="forgot_password.html">Forgot password</a>
                        </li>
                        <li>
                            <a href="error_404.html">404 error</a>
                        </li>
                        <li>
                            <a href="error_500.html">500 error</a>
                        </li>
                    </ul>
                </li> -->
            <!-- <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-sitemap"></i>
                        <span class="nav-label">Menu Levels</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="javascript:;">Level 2</a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <span class="nav-label">Level 2</span><i class="fa fa-angle-left arrow"></i></a>
                            <ul class="nav-3-level collapse">
                                <li>
                                    <a href="javascript:;">Level 3</a>
                                </li>
                                <li>
                                    <a href="javascript:;">Level 3</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li> -->
        </ul>
    </div>
</nav>
<!-- END SIDEBAR-->


<!-- BEGIN THEME CONFIG PANEL-->
<div class="theme-config">
    <div class="theme-config-toggle"><i class="fa fa-cog theme-config-show"></i><i class="ti-close theme-config-close"></i></div>
    <div class="theme-config-box">
        <div class="text-center font-18 m-b-20">SETTINGS</div>
        <div class="font-strong">LAYOUT OPTIONS</div>
        <div class="check-list m-b-20 m-t-10">
            <label class="ui-checkbox ui-checkbox-gray">
                <input id="_fixedNavbar" type="checkbox" checked>
                <span class="input-span"></span>Fixed navbar</label>
            <label class="ui-checkbox ui-checkbox-gray">
                <input id="_fixedlayout" type="checkbox">
                <span class="input-span"></span>Fixed layout</label>
            <label class="ui-checkbox ui-checkbox-gray">
                <input class="js-sidebar-toggler" type="checkbox">
                <span class="input-span"></span>Collapse sidebar</label>
        </div>
        <div class="font-strong">LAYOUT STYLE</div>
        <div class="m-t-10">
            <label class="ui-radio ui-radio-gray m-r-10">
                <input type="radio" name="layout-style" value="" checked="">
                <span class="input-span"></span>Fluid</label>
            <label class="ui-radio ui-radio-gray">
                <input type="radio" name="layout-style" value="1">
                <span class="input-span"></span>Boxed</label>
        </div>
        <div class="m-t-10 m-b-10 font-strong">THEME COLORS</div>
        <div class="d-flex m-b-20">
            <div class="color-skin-box" data-toggle="tooltip" data-original-title="Default">
                <label>
                    <input type="radio" name="setting-theme" value="default" checked="">
                    <span class="color-check-icon"><i class="fa fa-check"></i></span>
                    <div class="color bg-white"></div>
                    <div class="color-small bg-ebony"></div>
                </label>
            </div>
            <div class="color-skin-box" data-toggle="tooltip" data-original-title="Blue">
                <label>
                    <input type="radio" name="setting-theme" value="blue">
                    <span class="color-check-icon"><i class="fa fa-check"></i></span>
                    <div class="color bg-blue"></div>
                    <div class="color-small bg-ebony"></div>
                </label>
            </div>
            <div class="color-skin-box" data-toggle="tooltip" data-original-title="Green">
                <label>
                    <input type="radio" name="setting-theme" value="green">
                    <span class="color-check-icon"><i class="fa fa-check"></i></span>
                    <div class="color bg-green"></div>
                    <div class="color-small bg-ebony"></div>
                </label>
            </div>
            <div class="color-skin-box" data-toggle="tooltip" data-original-title="Purple">
                <label>
                    <input type="radio" name="setting-theme" value="purple">
                    <span class="color-check-icon"><i class="fa fa-check"></i></span>
                    <div class="color bg-purple"></div>
                    <div class="color-small bg-ebony"></div>
                </label>
            </div>
            <div class="color-skin-box" data-toggle="tooltip" data-original-title="Orange">
                <label>
                    <input type="radio" name="setting-theme" value="orange">
                    <span class="color-check-icon"><i class="fa fa-check"></i></span>
                    <div class="color bg-orange"></div>
                    <div class="color-small bg-ebony"></div>
                </label>
            </div>
            <div class="color-skin-box" data-toggle="tooltip" data-original-title="Pink">
                <label>
                    <input type="radio" name="setting-theme" value="pink">
                    <span class="color-check-icon"><i class="fa fa-check"></i></span>
                    <div class="color bg-pink"></div>
                    <div class="color-small bg-ebony"></div>
                </label>
            </div>
        </div>
        <div class="d-flex">
            <div class="color-skin-box" data-toggle="tooltip" data-original-title="White">
                <label>
                    <input type="radio" name="setting-theme" value="white">
                    <span class="color-check-icon"><i class="fa fa-check"></i></span>
                    <div class="color"></div>
                    <div class="color-small bg-silver-100"></div>
                </label>
            </div>
            <div class="color-skin-box" data-toggle="tooltip" data-original-title="Blue light">
                <label>
                    <input type="radio" name="setting-theme" value="blue-light">
                    <span class="color-check-icon"><i class="fa fa-check"></i></span>
                    <div class="color bg-blue"></div>
                    <div class="color-small bg-silver-100"></div>
                </label>
            </div>
            <div class="color-skin-box" data-toggle="tooltip" data-original-title="Green light">
                <label>
                    <input type="radio" name="setting-theme" value="green-light">
                    <span class="color-check-icon"><i class="fa fa-check"></i></span>
                    <div class="color bg-green"></div>
                    <div class="color-small bg-silver-100"></div>
                </label>
            </div>
            <div class="color-skin-box" data-toggle="tooltip" data-original-title="Purple light">
                <label>
                    <input type="radio" name="setting-theme" value="purple-light">
                    <span class="color-check-icon"><i class="fa fa-check"></i></span>
                    <div class="color bg-purple"></div>
                    <div class="color-small bg-silver-100"></div>
                </label>
            </div>
            <div class="color-skin-box" data-toggle="tooltip" data-original-title="Orange light">
                <label>
                    <input type="radio" name="setting-theme" value="orange-light">
                    <span class="color-check-icon"><i class="fa fa-check"></i></span>
                    <div class="color bg-orange"></div>
                    <div class="color-small bg-silver-100"></div>
                </label>
            </div>
            <div class="color-skin-box" data-toggle="tooltip" data-original-title="Pink light">
                <label>
                    <input type="radio" name="setting-theme" value="pink-light">
                    <span class="color-check-icon"><i class="fa fa-check"></i></span>
                    <div class="color bg-pink"></div>
                    <div class="color-small bg-silver-100"></div>
                </label>
            </div>
        </div>
    </div>
</div>
<!-- END THEME CONFIG PANEL-->
<!-- BEGIN PAGA BACKDROPS-->
<div class="sidenav-backdrop backdrop"></div>
<div class="preloader-backdrop">
    <div class="page-preloader">Loading</div>
</div>
<!-- END PAGA BACKDROPS-->
<!-- CORE PLUGINS-->
</body>


</html>