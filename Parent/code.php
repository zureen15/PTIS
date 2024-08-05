<?php
session_start();
require 'connection.php';

if(isset($_POST['delete_prof']))
{
    $id = mysqli_real_escape_string($con, $_POST['delete_prof']);

    $query = "DELETE FROM stud_profile WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: prof_table.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: prof_table.php");
        exit(0);
    }
}

if(isset($_POST['update_prof']))
{
    $id = mysqli_real_escape_string($con, $_POST['id']);

    $stud_name = mysqli_real_escape_string($con, $_POST['stud_name']);
    $disc = mysqli_real_escape_string($con, $_POST['disc']);
    $perf = mysqli_real_escape_string($con, $_POST['perf']);
    $cert = mysqli_real_escape_string($con, $_POST['cert']);

    $query = "UPDATE stud_profile SET `stud_name`='$stud_name',`disc`='$disc',`perf`='$perf',`cert`='$cert' WHERE id = $id";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: prof_table.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: prof_table.php");
        exit(0);
    }

}


if(isset($_POST['save_prof']))
{
    $stud_name = mysqli_real_escape_string($con, $_POST['stud_name']);
    $disc = mysqli_real_escape_string($con, $_POST['disc']);
    $perf = mysqli_real_escape_string($con, $_POST['perf']);
    $cert = mysqli_real_escape_string($con, $_POST['cert']);

    $query = "INSERT INTO stud_profile (stud_name,disc,perf,cert) VALUES ('$stud_name','$disc','$perf','$cert')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Student Created Successfully";
        header("Location: prof_create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Created";
        header("Location: prof_create.php");
        exit(0);
    }
}

?>