<!DOCTYPE html>
<!-- Coding by CodingNepal || www.codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <!-- <title>Side Navigation Bar in HTML CSS JavaScript</title> -->
    <link rel="stylesheet" href="../css/style1.css" />
</head>

<body>
    <!-- navbar -->
    <nav class="navbar">
        <div class="logo_item">
            <i class="bx bx-menu" id="sidebarOpen"></i>
            <img src="../logoimg/PTIS.png" alt="" style="width: 65px; height: 65px; margin-top: 10px;"></i>PARENT-TEACHER INTERACTION SYSTEM
        </div>

        <!-- <div class="search_bar">
        <input type="text" placeholder="Search" />
      </div> -->

        <div class="navbar_content">
            <i class="bi bi-grid"></i>
            <i class='bx bx-sun' id="darkLight"></i>
            <i id="google_translate_element"></i>
            <!-- <img src="#" alt="" class="profile" /> -->
        </div>
    </nav>

    <!-- sidebar -->
    <nav class="sidebar">
        <div class="menu_content" data-widget="treeview" role="menu" data-accordion="false">
            <ul class="menu_items">
                <div class="menu_title"></div>
                <!-- duplicate or remove this li tag if you want to add or remove navlink with submenu -->
                <!-- start -->
                <li class="item">
                    <a href="./" class="nav_link nav home">
                        <span class="navlink_icon">
                            <i class="bx bx-home-alt"></i>
                        </span>
                        <span class="navlink">Home</span>
                    </a>
                </li>
                <!-- end -->

                <!-- duplicate this li tag if you want to add or remove  navlink with submenu -->
                <!-- start -->
                <li class="item">
                    <a href="../AdminClass/admin_profile.php" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bxs-user"></i>
                        </span>
                        <span class="navlink">Admin Profile</span>
                    </a>
                </li>
                <!-- end -->
            </ul>

            <ul class="menu_items">
                <div class="menu_title"></div>
                <!-- duplicate these li tag if you want to add or remove navlink only -->
                <!-- Start -->
                <li class="item">
                    <a href="./index.php?page=class" class="nav_link nav class">
                        <span class="navlink_icon">
                            <i class="bx bxs-book-content"></i>
                        </span>
                        <span class="navlink">Class</span>
                    </a>
                </li>

                <li class="item">
                    <a href="./index.php?page=subjects" class="nav_link nav subjects">
                        <span class="navlink_icon">
                            <i class="bx bxs-graduation"></i>
                        </span>
                        <span class="navlink">Academic Sub</span>
                    </a>
                </li>
                <li class="item">
                    <a href="./index.php?page=cocu" class="nav_link nav cocu">
                        <span class="navlink_icon">
                            <i class="bx bxs-window-alt"></i>
                        </span>
                        <span class="navlink">Co-curricular</span>
                    </a>
                </li>
                <!-- End -->

                <li class="item">
                    <a href="#" class="nav_link submenu_item">
                        <span class="navlink_icon">
                            <i class="bx bxs-user-detail"></i>
                        </span>
                        <span class="navlink">List</span>
                        <i class="bx bx-chevron-right arrow-left"></i>
                    </a>

                    <ul class="menu_items submenu">
                        <a href="./index.php?page=parent_list"
                            class="nav_link nav-link nav-parent_list nav-edit_parent nav-new_parent tree-item sublink">Parent
                            List</a>
                        <a href="./index.php?page=teacher_list"
                            class="nav_link nav-link nav-teacher_list nav-edit_teacher nav-new_teacher tree-item sublink">Teacher
                            List</a>
                        <a href="./index.php?page=student_list"
                            class="nav_link nav-link nav-student_list nav-edit_student nav-new_student tree-item sublink">Student
                            List</a>
                    </ul>
                </li>

                <li class="item">
                    <div href="#" class="nav_link submenu_item">
                        <span class="navlink_icon">
                            <i class="bx bxs-book-content"></i>
                        </span>
                        <span class="navlink">Student Result</span>
                        <i class="bx bxs-chevron-right arrow-left"></i>
                    </div>
                    <ul class="menu_items submenu">
                        <a href="../AdminClass/index.php?page=results"
                            class="nav_link nav-results nav-new_result nav-edit_result tree-item sublink">Academic</a>
                        <a href="../AdminClass/index.php?page=cocuresult"
                            class="nav_link nav-cocuresult nav-new_cocuresult nav-edit_cocu tree-item sublink">Co-Curricular</a>
                        <!-- <a href="#" class="nav_link sublink">Extra-Co-Curricular</a> -->
                    </ul>
                </li>

                <li class="item">
                    <a href="../admin-attendance/?page=attendance_report"
                        class="nav_link sublink<?= (isset($page)) && $page == 'attendance_report' ? 'active' : '' ?>">
                        <span class="navlink_icon">
                            <i class="bx bxs-layout"></i>
                        </span>
                        <span class="navlink">Attendance Report</span>
                    </a>
                </li>

                <!-- <li class="item">
                    <a href="../AdminClass/calendar_page.php" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-filter"></i>
                        </span>
                        <span class="navlink">Calendar</span>
                    </a>
                </li> -->
                <!-- <li class="item">
                    <a href="./index.php?page=cocu" class="nav_link nav cocu">
                        <span class="navlink_icon">
                            <i class="bx bxs-window-alt"></i>
                        </span>
                        <span class="navlink">Co-curricular</span>
                    </a>
                </li> -->
                <li class="item">
                    <a href="../AdminClass/donate.php" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bxs-dollar-circle"></i>
                        </span>
                        <span class="navlink">Donation Collection</span>
                    </a>
                </li>
                <li class="item">
                    <a href="../logout.php" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-log-out"></i>
                        </span>
                        <span class="navlink">Logout</span>
                    </a>
                </li>
            </ul>

            <!-- Sidebar Open / Close -->
            <div class="bottom_content">
                <div class="bottom expand_sidebar">
                    <span> Open</span>
                    <i class='bx bxs-caret-right-circle'></i>
                </div>
                <div class="bottom collapse_sidebar">
                    <span> Close</span>
                    <i class='bx bxs-caret-left-circle'></i>
                </div>
            </div>
        </div>
        </div>
    </nav>
    <!-- JavaScript -->
    <script src="../js/sidebar.js"></script>

    <script>
        $(document).ready(function () {
            var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
            if ($('.nav_link.nav-' + page).length > 0) {
                $('.nav_link.nav-' + page).addClass('active')
                console.log($('.nav_link.nav-' + page).hasClass('tree-item'))
                if ($('.nav_link.nav-' + page).hasClass('tree-item') == true) {
                    $('.nav_link.nav-' + page).closest('.nav-treeview').siblings('a').addClass('active')
                    $('.nav_link.nav-' + page).closest('.nav-treeview').parent().addClass('menu-open')
                }
                if ($('.nav_link.nav-' + page).hasClass('nav-is-tree') == true) {
                    $('.nav_link.nav-' + page).parent().addClass('menu-open')
                }

            }

        })
    </script>

<script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({ pageLanguage: 'en' }, 'google_translate_element');
    }
  </script>

  <script type="text/javascript"
    src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>

</html>