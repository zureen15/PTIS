<?php
session_start();
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

    <!-- index.php -->
    <title>Student Profile</title>
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


        <!-- <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #1980e6">
            Cocuricullar and Extra-Co-Curricular
        </nav> -->
        <div class="row">


            <div class="col-md-12">
                <div class="card" style="margin-top: 120px; margin-left: 130px;"><?php include ('message.php'); ?>
                    <div class="card-header">
                        <h4 class="text-center">Student Profile Details
                            <a href="prof_create.php" class="btn btn-primary float-end">Add Students</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped" class="center">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <!-- <th>ID</th> -->
                                    <th class="text-center">Student Name</th>
                                    <th class="text-center">Date of Birth</th>
                                    <th class="text-center">Emergency Contact</th>
                                    <th class="text-center">Teacher Feedback</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $query = "SELECT * FROM stud_profile";
                                $query_run = mysqli_query($con, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $row) {
                                        ?>
                                        <tr>
                                            <td class="text-center"><?= $i++ ?></td>
                                            <td class="text-center"><?= $row['stud_name']; ?></td>
                                            <td class="text-center"><?= $row['dob']; ?></td>
                                            <td class="text-center"><?= $row['perf']; ?></td>
                                            <td class="text-center"><?= $row['cert']; ?></td>
                                            <td>
                                                <a href="prof_view.php?id=<?= $row['id']; ?>"
                                                    class="btn btn-info btn-sm">View</a>
                                                <a href="prof_edit.php?id=<?= $row['id']; ?>"
                                                    class="btn btn-success btn-sm">Edit</a>
                                                <form action="code.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_prof" value="<?= $row['id']; ?>"
                                                        class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "<h5> No Record Found </h5>";
                                }
                                ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>