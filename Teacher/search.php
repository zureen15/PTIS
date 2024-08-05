<?php 
  include("connection.php");
  
  if( isset($_POST['stud_name']) ){ $stud_name=$_POST['stud_name']; } 
    else { $stud_name = ""; } // stud_name is empty
  
   $query = "SELECT * FROM acad_track WHERE stud_name LIKE '$stud_name%'";  
   $query_run = mysqli_query($con, $query);
   $data = '';
   while($row = mysqli_num_rows($query_run))
   {
       $data .=  "<tr>
       <td>".$row['stud_name']."</td>
       <td>".$row['gender']."</td>
       <td>".$row['BM']."</td>
       <td>".$row['BI']."</td>
       <td>".$row['SEJ']."</td>
       <td>".$row['PI']."</td>
       <td>".$row['MATH']."</td>
       <td>".$row['PJK']."</td>
       <td>".$row['PSV']."</td>"."
      </tr>";

   }
    echo $data;
 ?>