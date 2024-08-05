<!DOCTYPE html>
<html lang="en">

<?php include ('../config.php') ?>
<!-- Info boxes -->


<body>


  <div class="row">
    <div class="col-12 col-sm-6 col-md-4">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="far fa-clipboard"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Academic Subject</span>
          <span class="info-box-number">
            <?php echo $conn->query("SELECT * FROM subjects")->num_rows; ?>
          </span>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4">
      <div class="info-box">
        <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-th-list"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Cocurricular Subject</span>
          <span class="info-box-number">
            <?php echo $conn->query("SELECT * FROM cocu_track")->num_rows; ?>
          </span>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4">
      <div class="info-box">
        <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-book"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Classes</span>
          <span class="info-box-number">
            <?php echo $conn->query("SELECT * FROM class")->num_rows; ?>
          </span>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12 col-sm-6 col-md-4">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Students</span>
          <span class="info-box-number">
            <?php echo $conn->query("SELECT * FROM students")->num_rows; ?>
          </span>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4">
      <div class="info-box">
        <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-chalkboard-teacher"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Teachers</span>
          <span class="info-box-number">
            <?php echo $conn->query("SELECT * FROM teacher")->num_rows; ?>
          </span>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4">
      <div class="info-box">
        <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-house-user"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Parents</span>
          <span class="info-box-number">
            <?php echo $conn->query("SELECT * FROM parent")->num_rows; ?>
          </span>
        </div>
      </div>
    </div>
</div>
  <!-- </div>
  </div> -->

</body>

</html>