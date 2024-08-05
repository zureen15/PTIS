<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include ('../config.php');
ob_start();
if(!isset($_SESSION['system'])){

$system = $conn->query("SELECT * FROM system_settings")->fetch_array();
foreach ($system as $k => $v) {
  $_SESSION['system'][$k] = $v;
}
 }
ob_end_flush();
?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="stylesheet" href="css/style.css">

  <title>Academic | <?php echo $_SESSION['system']['name'] ?></title>


  <!-- <?php include ('./header.php'); ?> -->
  <?php
  // if (isset($_SESSION['login_id']))
  //   header("location:index.php?page=home");
  
  ?>

</head>
<style>
  body {
    width: 100%;
    height: calc(100%);
    position: fixed;
    top: 0;
    left: 0;
    align-items: center !important;
    /*background: #007bff;*/
  }

  main#main {
    width: 100%;
    height: calc(100%);
    display: flex;
  }

  :root {
    --blue: #3498db;
  }

  *::-webkit-scrollbar {
    width: 10px;
  }

  *::-webkit-scrollbar-track {
    background-color: transparent;
  }

  *::-webkit-scrollbar-thumb {
    background-color: var(--blue);
  }
</style>




<body>

  <?php include '../sidemenu/sideparent.php' ?>


  <div class="form-container" style="margin-top: 100px;">
  <div class="row justify-content-center" id="view_student_results" role='dialog'>
    <div class="card col-md-4" role="document">
      <div class="card-content">
        <div class="card-header">
          <h5 class="card-title"></h5>
        </div>
        <div class="card-body">
          <div class="container-fluid">
            <form id="vsr-frm">
              <div class="form-group">
                <label for="student_code" class="control-label text-dark">Student ID:</label>
                <input type="text" id="student_code" name="student_code" class="form-control form-control-sm">
              </div>
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id='submit'
            onclick="$('#view_student_results form').submit()">View</button>
          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> -->
        </div>
      </div>
    </div>
  </div>
  </div>

</body>
<?php include 'footer.php' ?>
<script>
  // $('#view_result').click(function () {
  $('#view_student_results').click(function () {

  })
  // })
  // $('#login-form').submit(function (e) {
  //   e.preventDefault()
  //   $('#login-form button[type="button"]').attr('disabled', true).html('Logging in...');
  //   if ($(this).find('.alert-danger').length > 0)
  //     $(this).find('.alert-danger').remove();
  //   $.ajax({
  //     url: 'ajax.php?action=login',
  //     method: 'POST',
  //     data: $(this).serialize(),
  //     error: err => {
  //       console.log(err)
  //       $('#login-form button[type="button"]').removeAttr('disabled').html('Login');

  //     },
  //     success: function (resp) {
  //       if (resp == 1) {
  //         location.href = 'index.php?page=home';
  //       } else {
  //         $('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
  //         $('#login-form button[type="button"]').removeAttr('disabled').html('Login');
  //       }
  //     }
  //   })
  // })
  $('#vsr-frm').submit(function (e) {
    e.preventDefault()
    start_load()
    if ($(this).find('.alert-danger').length > 0)
      $(this).find('.alert-danger').remove();
    $.ajax({
      url: 'ajax.php?action=login2',
      method: 'POST',
      data: $(this).serialize(),
      error: err => {
        console.log(err)
        end_load()
      },
      success: function (resp) {
        if (resp == 1) {
          location.href = 'student_results.php';
        } else {
          ('<div class="alert alert-danger">Student ID # is incorrect.</div>')
          end_load()
        }
      }
    })
  })
  $('.number').on('input keyup keypress', function () {
    var val = $(this).val()
    val = val.replace(/[^0-9 \,]/, '');
    val = val.toLocaleString('en-US')
    $(this).val(val)
  })
</script>

</html>