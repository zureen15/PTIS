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

    <div class="navbar_content">
      <i class="bi bi-grid"></i>
      <i class='bx bx-sun' id="darkLight"></i>
      <!-- <i>
        <iframe src="../Teacher/bot.php" style="position: fixed; bottom: 0; right: 0; border: none; margin: 0; padding: 0; "></iframe>
      </i> -->
      <i id="google_translate_element"></i>

      <!-- <div id='google_translate_element'>
  </div> -->
      <!-- <i class='bx bx-bell'> -->
      <!-- <i>
      <div >
        </div>
        </i> -->

    </div>
  </nav>
  <!-- </i> -->
  <!-- <i class="bottom expand_sidebar" class='bx bx-log-in'></i>
          <i class="bottom collapse_sidebar" class='bx bx-log-out'></i> -->


  <!-- <img src="#" alt="" class="profile" /> -->


  <!-- sidebar -->
  <nav class="sidebar">
    <div class="menu_content">
      <ul class="menu_items">
        <div class="menu_title"></div>
        <!-- duplicate or remove this li tag if you want to add or remove navlink with submenu -->
        <!-- start -->
        <li class="item">
          <a href="../crud/index.php" class="nav_link">
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
          <a href="../Teacher/teacher_profile.php" class="nav_link">
            <span class="navlink_icon">
              <i class="bx bxs-user"></i>
            </span>
            <span class="navlink">Teacher Profile</span>
          </a>
        </li>

        <li class="item">
          <a href="../Teacher/prof_table.php" class="nav_link">
            <span class="navlink_icon">
              <i class="bx bxs-user-badge"></i>
            </span>
            <span class="navlink">Student Profile</span>
          </a>
        </li>
      </ul>

      <ul class="menu_items">
        <div class="menu_title"></div>
        <li class="item">
          <div href="#" class="nav_link submenu_item">
            <span class="navlink_icon">
              <i class="bx bxs-layout"></i>
            </span>
            <span class="navlink">Class Attendance</span>
            <i class="bx bxs-chevron-right arrow-left"></i>
          </div>

          <ul class="menu_items submenu">
            <a href="../php-attendance/?page=attendance"
              class="nav_link sublink<?= (isset($page)) && $page == 'attendance' ? 'active' : '' ?>"> Daily
              Attendance</a>
            <a href="../php-attendance/?page=attendance_report"
              class="nav_link sublink<?= (isset($page)) && $page == 'attendance_report' ? 'active' : '' ?>">
              Attendance
              Report </a>
          </ul>
        </li>

        <li class="item">
          <div href="#" class="nav_link submenu_item">
            <span class="navlink_icon">
              <i class="bx bxs-book-content"></i>
            </span>
            <span class="navlink">Students</span>
            <i class="bx bxs-chevron-right arrow-left"></i>
          </div>

          <ul class="menu_items submenu">
            <a href="../Teacher/index.php?page=student_list"
              class="nav_link nav-student_list nav-edit_student nav-new_student tree-item sublink">Students List</a>
            <a href="../Teacher/index.php?page=results"
              class="nav_link nav-results nav-new_result nav-edit_result tree-item sublink">Academic</a>
            <a href="../Teacher/index.php?page=cocuresult"
              class="nav_link nav-cocu nav-new_cocuresult nav-edit_cocu tree-item sublink">Co-Curricular</a>
            <!-- <a href="#" class="nav_link sublink">Extra-Co-Curricular</a> -->
          </ul>
        </li>

        <li class="item">
          <a href="../Teacher/calendar_page.php" class="nav_link">
            <span class="navlink_icon">
              <i class="bx bxs-calendar"></i>
            </span>
            <span class="navlink">Calendar</span>
          </a>
        </li>
        <!-- <li class="item">
            <a href="#" class="nav_link">
              <span class="navlink_icon">
                <i class="bx bxs-comment-dots"></i>
              </span>
              <span class="navlink">Messaging</span>
            </a>
          </li> -->
        <li class="item">
          <a href="../Teacher/donate.php" class="nav_link">
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
  </nav>
  <!-- JavaScript -->
  <script src="../js/sidebar.js"></script>

  <script>
    $(document).ready(function () {
      var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : '../crud/index.php' ?>';
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