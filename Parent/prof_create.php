<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Student Create</title>
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

    <div class="container mt-4" style="position: center;">
        <div class="row">
            <div class="col-md-10">
                <div class="card" style="margin-top: 120px; margin-left: 220px;">
                    <?php include ('message.php'); ?>
                    <div class="card-header">
                        <h4 class="text-center">Student Add
                            <a href="prof_table.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label>Student Name</label>
                                    <input type="text" name="stud_name" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Discipline Performance Marks</label>
                                    <input type="text" name="disc" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Overall Performance</label>
                                    <input type="text" name="perf" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label>Teacher Feedback</label>
                                    <input type="text" name="cert" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <button type="submit" name="save_prof" class="btn btn-primary">Save Student</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>