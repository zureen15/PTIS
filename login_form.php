<?php

@include 'config.php';

session_start();

if (isset($_POST['submit'])) {

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = md5($_POST['password']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   // $user_code = mysqli_real_escape_string($conn, $_POST['user_code']);
   // $user_code = filter_var($user_code, FILTER_SANITIZE_STRING);

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
   //$qry = $conn->query("SELECT s.*,concat(c.level,'-',c.section) as class,concat(s.firstname,' ',s.lastname) as name,concat(t.firstname,' ',t.lastname) as teachername FROM students s inner join class c on c.id = s.class_id inner join teacher t on c.id = t.class_id order by concat(firstname,' ',lastname) asc ");


   //$select = ("SELECT * FROM parent p inner join user_form us on p.parent_code = us.user_code inner join teacher t on us.user_code = t.teacher_code");


   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {

      $row = mysqli_fetch_array($result);

      if ($row['user_type'] == 'teacher') {

         $_SESSION['teacher_id'] = $row['user_code'];
         header('Location:crud/index.php');

      } else if ($row['user_type'] == 'parent') {

         $_SESSION['parent_id'] = $row['user_code'];
         header('Location:crud1/index.php');

      } else if ($row['user_type'] == 'admin') {

         $_SESSION['admin_id'] = $row['id'];
         header('Location:AdminClass/.');
      }

   } else {
      $message[] = 'Incorrect email or password!';
   }

}
;
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/pay.css">

</head>

<body style="background-image: url(logoimg/back.png); height: 70%; background-position: center; background-size: cover;">


   <div class="body-container">
      <!-- <marquee style="margin-bottom: 50px;"> -->
         <!-- <div class="loading" style="margin-top: 30px;">
            <span><b>Parent-Teacher Interaction System</b></span>
         </div> -->
      <!-- </marquee> -->
      <!-- style="background-image: url(educa.jpg);" -->
      <div class="form-container" style="margin-top: 120px;">

         <form action="" method="post" enctype="multipart/form-data">
            <div class="brand_logo_container">
               <img src="logoimg/PTIS.png" class="brand_logo" alt="" >
            </div>
            <br>
            <br>
            <br>
            <h3>Login</h3>

            <?php
            if (isset($message)) {
               foreach ($message as $message) {
                  echo '<div class="message">' . $message . '</div>';
               }
            }
            ?>

            <input type="email" name="email" placeholder="Enter Email" class="box" required>
            <input type="password" name="password" placeholder="Enter Password" class="box" required>
            <input type="submit" name="submit" value="LOGIN" class="btn">
            <p>Don't have an account? <a href="register.php">Register here</a></p>
            <br>

            <footer>
               <address>&copy;Management & Science University</address>
            </footer>
         </form>
      </div>
      <br>
      <div class="shadow" style="margin-left: -300px; ">
         <a href="https://jpwpp.moe.gov.my/">
            <div class="brand_logo_container1">
               <img src="jpwpp.png" class="brand_logo1" alt="">
            </div>
         </a>
      </div>
      <div class="shadow" style="margin-left: -300px; ">
         <a href="https://www.moe.gov.my/#">
            <div class="brand_logo_container">
               <img src="kpm.jpg" class="brand_logo" alt="">
            </div>
         </a>
      </div>
      <div class="shadow" style="margin-left: -300px; ">
         <a href="https://jpnselangor.moe.gov.my/">
            <div class="brand_logo_container2">
               <img src="jps.jpg" class="brand_logo2" alt="">
            </div>
         </a>
      </div>
   </div>



</body>

</html>