<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);
   $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);
   $user_type = filter_var($user_type, FILTER_SANITIZE_STRING);
   $user_code = mysqli_real_escape_string($conn, $_POST['user_code']);
   $user_code = filter_var($user_code, FILTER_SANITIZE_STRING);

   
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist'; 
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }elseif($image_size > 2000000){
         $message[] = 'image size is too large!';
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `user_form`(name, email, password, image, user_code, user_type) VALUES('$name', '$email', '$pass', '$image', '$user_code', '$user_type')") or die('query failed');

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'Register succesfully!';
            header('location:login_form.php');
         }else{
            $message[] = 'Register failed!';
         }
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
   <title>Register Page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container" style="background-image: url(logoimg/back2.png); height: 70%; background-position: center; background-size: cover; min-height: 100vh;">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Sign Up</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="text" name="name" placeholder="Enter Full Name" class="box" required>
      <input type="email" name="email" placeholder="Enter Email" class="box" required>
      <input type="password" name="password" placeholder="Enter Password" class="box" required>
      <input type="password" name="cpassword" placeholder="Confirm Password" class="box" required>
      <select name="user_type" class="box" required>
            <option value="parent">Parent</option>
            <option value="teacher">Teacher</option>
            <!-- <option value="admin" type="hidden">Admin</option> -->
         </select>
      <input type="text" name="user_code" placeholder="Enter Your Code" class="box" 
      value="<?php $qry = ("SELECT * FROM parent p inner join user_form us on p.parent_code = us.user_code inner join teacher t on us.user_code = t.teacher_code");?>" required>

      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
      <input type="submit" name="submit" value="REGISTER" class="btn">
      <p>Already have an account? <a href="login_form.php">Login here</a></p>
   </form>

</div>

</body>
</html>