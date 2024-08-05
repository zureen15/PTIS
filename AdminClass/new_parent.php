<?php if (!isset($conn)) {
  include '../config.php';
} ?>

<div class="col-lg-12">
  <div class="card card-outline card-primary">
    <div class="card-body">
      <form action="" id="manage-parent">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        <div class="row">
          <div class="col-md-6">
            <div id="msg" class=""></div>
            <div class="form-group text-dark">
              <div class="form-group">
                <label for="" class="control-label">Parent ID</label>
                <input type="text" class="form-control form-control-sm" name="parent_code"
                  value="<?php echo isset($parent_code) ? $parent_code : '' ?>" required>
              </div>
            </div>
            <div class="form-group text-dark">
              <div class="form-group">
                <label for="" class="control-label">First Name</label>
                <input type="text" class="form-control form-control-sm" name="firstname"
                  value="<?php echo isset($firstname) ? $firstname : '' ?>" required>
              </div>
            </div>
            <div class="form-group text-dark">
              <div class="form-group">
                <label for="" class="control-label">Last Name</label>
                <input type="text" class="form-control form-control-sm" name="lastname"
                  value="<?php echo isset($lastname) ? $lastname : '' ?>" required>
              </div>
            </div>

          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="" class="control-label">Gender</label>
              <select name="gender" id="" class="custom-select custom-select-sm" required>
                <option>Female</option>
                <option>Male</option>
              </select>
            </div>
            <div class="form-group text-dark">
              <div class="form-group">
                <label for="" class="control-label">Address</label>
                <textarea name="address" id="address" cols="30" rows="4"
                  class="form-control"><?php echo isset($address) ? $address : '' ?></textarea>
              </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label">Student</label>
                <select name="student_id" id="student_id" class="form-control select2 select2-sm" required>
                  <option></option> 
                  <?php 
                        $classes = $conn->query("SELECT s.*,concat(c.level,'-',c.section) as class,concat(firstname,' ',lastname) as name FROM students s inner join class c on c.id = s.class_id order by concat(firstname,' ',lastname) asc ");
                        while($row = $classes->fetch_array()):
                  ?>
                        <option value="<?php echo $row['id'] ?>" data-class_id='<?php echo $row['class_id'] ?>'  data-class='<?php echo $row['class'] ?>' <?php echo isset($student_id) && $student_id == $row['id'] ? "selected" : '' ?>><?php echo $row['student_code'].' | '.ucwords($row['name']) ?></option>
                  <?php endwhile; ?>
                </select>
                
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="card-footer border-top border-info">
      <div class="d-flex w-100 justify-content-center align-items-center">
        <button class="btn btn-flat  bg-gradient-primary mx-2" form="manage-parent">Save</button>
        <a class="btn btn-flat bg-gradient-secondary mx-2" href="./index.php?page=parent_list">Cancel</a>
      </div>
    </div>
  </div>
</div>
<script>
  $('#manage-parent').submit(function (e) {
    e.preventDefault()
    start_load()
    $.ajax({
      url: 'ajax.php?action=save_parent',
      data: new FormData($(this)[0]),
      cache: false,
      contentType: false,
      processData: false,
      method: 'POST',
      type: 'POST',
      success: function (resp) {
        if (resp == 1) {
          alert_toast('Data successfully saved', "success");
          setTimeout(function () {
            location.href = 'index.php?page=parent_list'
          }, 2000)
        } else if (resp == 2) {
          $('#msg').html('<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Parent Code already exist.</div>')
          end_load()
        }
      }
    })
  })
  function displayImgCover(input, _this) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#cover').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }
</script>