<?php
include '../config.php';
$qry = $conn->query("SELECT * FROM parent where id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}
include 'new_parent.php';
?>