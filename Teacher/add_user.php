<?php 
include('connection.php');
$parent_name = $_POST['parent_name'];
$email = $_POST['email'];
$total_donate = $_POST['total_donate'];

$sql = "INSERT INTO `donation_db` (`parent_name`,`email`,`total_donate`) values ('$parent_name', '$email', '$total_donate' )";
$query= mysqli_query($con,$sql);
$lastId = mysqli_insert_id($con);
if($query ==true)
{
   
    $data = array(
        'status'=>'true',
       
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'false',
      
    );

    echo json_encode($data);
} 

?>