<?php
require 'connection.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Student View</title>
</head>

<style>
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

<?php
include "../sidemenu/sidebar.php";
?>

<body>

    <div class="container mt-4">

        <div class="row">
            <div class="col-md-10">
                <div class="card" style="margin-top: 120px; margin-left: 220px;">
                    <div class="card-header">
                        <h4 class="text-center">Student View Details
                            <a href="prof_table.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if (isset($_GET['id'])) {
                            $id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM stud_profile WHERE id='$id' ";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $row = mysqli_fetch_array($query_run);
                                ?>

                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label>Student Name</label>
                                        <p class="form-control">
                                            <?= $row['stud_name']; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Address</label>
                                        <p class="form-control">
                                            <?= $row['disc']; ?>
                                        </p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Date of Birth</label>
                                        <p class="form-control">
                                            <?= $row['dob']; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Any allergies or illness</label>
                                        <p class="form-control">
                                            <?= $row['allergy']; ?>
                                        </p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Emergency Contact</label>
                                        <p class="form-control">
                                            <?= $row['perf']; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label>Teacher Feedback</label>
                                        <p class="form-control">
                                            <?= $row['cert']; ?>
                                        </p>
                                    </div>
                                </div>

                                <?php
                            } else {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>