<!DOCTYPE html>
<html>

<!-- <script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            includedLanguages: 'en,ms',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
            autoTranslate: true
        }, 'google_translate_element');
    }
</script>
<script type="text/javascript"
    src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parent Page</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/menu.css">
</head>

<body>

    <?php
    include "../sidemenu/sideparent.php";
    ?>
    <!-- <div id="google_translate_element"></div> -->

    <div class="row">
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content" type="button" id="view_result">
                <span class="info-box-text">View Academic</span>
                <!-- <span class="info-box-number">
                  
                </span> -->
              </div>
            </div>
          </div>
           <!-- <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-th-list"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Classes</span>
                <span class="info-box-number">
                  <?php echo $conn->query("SELECT * FROM classes")->num_rows; ?>
                </span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Subject</span>
                <span class="info-box-number">
                  <?php echo $conn->query("SELECT * FROM subjects")->num_rows; ?>
                </span>
              </div>
            </div>
          </div> -->
      </div>


      <!-- view modal button -->
      <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
<div class="modal fade" id="view_student_results" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <form id="vsr-frm">
            <div class="form-group">
                <label for="student_code" class="control-label text-dark">Student ID #:</label>
                <input type="text" id="student_code" name="student_code" class="form-control form-control-sm">
              </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#view_student_results form').submit()">View</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>


  <!-- script for view result -->
  <script>
  $('#view_result').click(function(){
    $('#view_student_results').modal('show')
  })
	// $('#login-form').submit(function(e){
	// 	e.preventDefault()
	// 	$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
	// 	if($(this).find('.alert-danger').length > 0 )
	// 		$(this).find('.alert-danger').remove();
	// 	$.ajax({
	// 		url:'ajax.php?action=login',
	// 		method:'POST',
	// 		data:$(this).serialize(),
	// 		error:err=>{
	// 			console.log(err)
	// 	$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

	// 		},
	// 		success:function(resp){
	// 			if(resp == 1){
	// 				location.href ='index.php?page=home';
	// 			}else{
	// 				$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
	// 				$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
	// 			}
	// 		}
	// 	})
	// })
  $('#vsr-frm').submit(function(e){
    e.preventDefault()
   start_load()
    if($(this).find('.alert-danger').length > 0 )
      $(this).find('.alert-danger').remove();
    $.ajax({
      url:'',
      method:'POST',
      data:$(this).serialize(),
      error:err=>{
        console.log(err)
        end_load()
      },
      success:function(resp){
        if(resp == 1){
          location.href ='student_results.php';
        }else{
          $('#login-form').prepend('<div class="alert alert-danger">Student ID # is incorrect.</div>')
           end_load()
        }
      }
    })
  })
	$('.number').on('input keyup keypress',function(){
        var val = $(this).val()
        val = val.replace(/[^0-9 \,]/, '');
        val = val.toLocaleString('en-US')
        $(this).val(val)
    })
</script>


        <!-- <div class="main p-3">
            <div class="text-center">
                <h1>
                    Welcome to Parent-Teacher Interaction System (PTIS)
                </h1>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="../script.js"></script> -->
</body>

</html>