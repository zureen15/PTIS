<?php

include '../config.php';
session_start();

$teacher_id = $_SESSION['teacher_id'];

if (isset($_POST['update_profile'])) {

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

   mysqli_query($conn, "UPDATE `user_form` SET name = '$update_name', email = '$update_email' WHERE user_code = '$teacher_id'") or die('query failed');

   $empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
   $update_pass = filter_var($update_pass, FILTER_SANITIZE_STRING);
   $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
   $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
   $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));
   $confirm_pass = filter_var($confirm_pass, FILTER_SANITIZE_STRING);

   if ($old_pass != $empty_pass) {
      if ($update_pass != $old_pass) {
         $message[] = 'old password not matched!';
      } elseif ($new_pass != $confirm_pass) {
         $message[] = 'confirm password not matched!';
      } else {
         mysqli_query($conn, "UPDATE `user_form` SET password = '$confirm_pass' WHERE user_code = '$teacher_id'") or die('query failed');
         $message[] = 'password updated successfully!';
      }
   }

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = '../uploaded_img/' . $update_image;

   if (!empty($update_image)) {
      if ($update_image_size > 2000000) {
         $message[] = 'image is too large';
      } else {
         $image_update_query = mysqli_query($conn, "UPDATE `user_form` SET image = '$update_image' WHERE user_code = '$teacher_id'") or die('query failed');
         if ($image_update_query) {
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'image updated successfully!';
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Teacher Profile</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

</head>

<?php
      include "../sidemenu/sidebar.php";
      ?>

<body class="container-fluid">
      <div class="update-profile">

         <?php
         $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE user_code = '$teacher_id'") or die('query failed');
         if (mysqli_num_rows($select) > 0) {
            $fetch_profile = mysqli_fetch_assoc($select);
         }
         ?>

         <form action="" method="post" enctype="multipart/form-data">
            <?php
            if ($fetch_profile['image'] == '') {
               echo '<img src="../images/default-avatar.png">';
            } else {
               echo '<img src="../uploaded_img/' . $fetch_profile['image'] . '">';
            }
            if (isset($message)) {
               foreach ($message as $message) {
                  echo '<div class="message">' . $message . '</div>';
               }
            }
            ?>
            <div class="flex">
               <div class="inputBox">
                  <span>Username :</span>
                  <input type="text" name="update_name" value="<?php echo $fetch_profile['name']; ?>" class="box">
                  <span>Email :</span>
                  <input type="email" name="update_email" value="<?php echo $fetch_profile['email']; ?>" class="box">
                  <span>Update Picture :</span>
                  <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
               </div>
               <div class="inputBox">
                  <input type="hidden" name="old_pass" value="<?php echo $fetch_profile['password']; ?>">
                  <span>Old Password :</span>
                  <input type="password" name="update_pass" placeholder="Enter Previous Password" class="box">
                  <span>New Password :</span>
                  <input type="password" name="new_pass" placeholder="Enter New Password" class="box">
                  <span>Confirm Password :</span>
                  <input type="password" name="confirm_pass" placeholder="Confirm New Password" class="box">
               </div>
            </div>
            <input type="submit" value="Update Profile" name="update_profile" class="btn">
            <a href="../crud/index.php" class="delete-btn">Back</a>
         </form>

      </div>
<!--
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script> -->
    <!-- <script src="../script.js"></script> -->
    <!-- <script src="../sidebar.js"></script> -->


</body>

</html>