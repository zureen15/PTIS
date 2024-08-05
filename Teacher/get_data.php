<?php include('connection.php');

$output= array();
$sql = "SELECT * FROM acad_track ";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	// 0 => 'id',
	0 => 'stud_name',
	1 => 'gender',
	2 => 'BM',
	3=> 'BI',
	4=> 'SEJ',
	5=> 'PI',
	6=> 'MATH',
	7=> 'PJK',
	8=> 'PSV',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE stud_name like '%".$search_value."%'";
	$sql .= " OR gender like '%".$search_value."%'";
	$sql .= " OR  BM like '%".$search_value."%'";
	$sql .= " OR  BI like '%".$search_value."%'";
	$sql .= " OR  SEJ like '%".$search_value."%'";
	$sql .= " OR  PI like '%".$search_value."%'";
	$sql .= " OR  MATH like '%".$search_value."%'";
	$sql .= " OR  PJK like '%".$search_value."%'";
	$sql .= " OR  PSV like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY id desc";
}

if($_POST['length'] != -1)
{
	$start = $_POST['start'];
	$length = $_POST['length'];
	$sql .= " LIMIT  ".$start.", ".$length;
}	

$query = mysqli_query($con,$sql);
$count_rows = mysqli_num_rows($query);
$data = array();
while($row = mysqli_fetch_assoc($query))
{
	$sub_array = array();
	// $sub_array[] = $row['id'];
	$sub_array[] = $row['stud_name'];
	$sub_array[] = $row['gender'];
	$sub_array[] = $row['BM'];
	$sub_array[] = $row['BI'];
	$sub_array[] = $row['SEJ'];
	$sub_array[] = $row['PI'];
	$sub_array[] = $row['MATH'];
	$sub_array[] = $row['PJK'];
	$sub_array[] = $row['PSV'];
	$sub_array[] = '<a href="javascript:void();" data-id="'.$row['id'].'"  class="btn btn-info btn-sm editbtn" >Edit</a>  <a href="javascript:void();" data-id="'.$row['id'].'"  class="btn btn-danger btn-sm deleteBtn" >Delete</a>';
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);
