<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>


<body>

    <?php
    include "../sidemenu/sideparent.php";
    ?>

    <br>
    <br>
    <br>
    <br>
    <div class="form-container" style="background-color: #c1d0f0; background-image: #c1d0f0;">
        <form target="_blank" action="https://formsubmit.co/adrinazureenzakaria@gmail.com" method="POST"
            enctype="multipart/form-data">

            <div class="form-box">
                <h1>Contact Email Form</h1>
                <br>
                <div class="inputBox">
                    <span>Fullname :</span>
                    <!-- <div class="form-row">
        <div class="col"> -->
                    <input type="text" name="name" class="box" placeholder="Full Name" required>
                    <!-- </div>
        <div class="col"> -->
                    <span>Sender Email :</span>
                    <input type="email" name="email" class="box" placeholder="Email Address" required>
                    <!-- </div>
      </div> -->
                    <!-- </div>
            <div class="form-group"> -->
                    <span>Message :</span>
                    <textarea placeholder="Your Message" class="box" name="message" rows="5" required></textarea>
                    <!-- </div> -->
                    <button type="submit" class="btn">Submit Form</button>

                </div>
        </form>

        <div class="box-container">
            <div class="box">
                <i class="fas fa-phone"></i>
                <h3>phone number</h3>
                <a href="https://api.whatsapp.com/send?phone=60124223464">012-4223464</a>
            </div>

            <div class="box">
                <i class="fas fa-envelope"></i>
                <h3>email address</h3>
                <a href="mailto:adrinazureenzakaria@gmail.com">adrinazureenzakaria@gmail.com</a>
            </div>

        </div>
    </div>

</body>

</html>