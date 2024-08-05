<?php 
include('connection.php');
$parent_name = $_POST['parent_name'];
$email = $_POST['email'];
$total_donate = $_POST['total_donate'];
$id = $_POST['id'];

$sql = "UPDATE `donation_db` SET  `parent_name`='$parent_name' , `email`= '$email', `total_donate`='$total_donate' WHERE id='$id' ";
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