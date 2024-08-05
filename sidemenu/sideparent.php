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
            <img src="../logoimg/PTIS.png" alt="" style="width: 65px; height: 65px; margin-top: 10px;"></i>Parent-Teacher Interaction System
        </div>

        <!-- <div class="search_bar">
        <input type="text" placeholder="Search" />
      </div> -->

        <div class="navbar_content">
            <i class="bi bi-grid"></i>
            <i class='bx bx-sun' id="darkLight" style="display: none;"></i>
            <i id="google_translate_element"></i>
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
                    <a href="../crud1/index.php" class="nav_link">
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
                    <a href="../Parent/parent_profile.php" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bxs-user"></i>
                        </span>
                        <span class="navlink">Parent Profile</span>
                    </a>
                </li>
                <li class="item">
                    <a href="../Parent/prof_table.php" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bxs-user-badge"></i>
                        </span>
                        <span class="navlink">Student Profile</span>
                    </a>
                </li>
                <!-- end -->
            </ul>

            <ul class="menu_items">
                <div class="menu_title"></div>
                <!-- duplicate these li tag if you want to add or remove navlink only -->
                <!-- Start -->
                <li class="item">
                    <a href="../parentattendance/?page=attendance_report"
                        class="nav_link sublink<?= (isset($page)) && $page == 'attendance_report' ? 'active' : '' ?>">
                        <span class="navlink_icon">
                            <i class="bx bxs-layout"></i>
                        </span>
                        <span class="navlink">Attendance Report</span>
                    </a>
                </li>
                <!-- End -->

                <li class="item">
                    <a href="#" class="nav_link submenu_item">
                        <span class="navlink_icon">
                            <i class="bx bxs-book-content"></i>
                        </span>
                        <span class="navlink">Children Tracking</span>
                        <i class="bx bx-chevron-right arrow-left"></i>
                    </a>

                    <ul class="menu_items submenu">
                        <a href="../Parent/acadre.php" class="nav_link sublink">Academic
                            Results</a>
                        <a href="../Parent/cocure.php" class="nav_link sublink"> Co-Curricular Results</a>
                    </ul>
                </li>

                <li class="item">
                    <a href="../Parent/view_calendar.php" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bxs-calendar-event"></i>
                        </span>
                        <span class="navlink">Calendar</span>
                    </a>
                </li>
                <li class="item">
                    <a href="../Parent/contact.php" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bxs-comment-dots"></i>
                        </span>
                        <span class="navlink">Contact</span>
                    </a>
                </li>
                <li class="item">
                    <a href="../Parent/feedback.php" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bxs-message-square-edit"></i>
                        </span>
                        <span class="navlink">Feedback</span>
                    </a>
                </li>
                <li class="item">
                    <a href="../Parent/donate.php" class="nav_link">
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
                <!-- <li class="item">
                    <a href="../Parent/pay.php" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-log-out"></i>
                        </span>
                        <span class="navlink">Pay</span>
                    </a>
                </li> -->
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
    </nav>
    <!-- JavaScript -->
    <script src="../js/sidebar.js"></script>

    <script>
        $(document).ready(function () {
            var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : '../crud1/index.php' ?>';
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