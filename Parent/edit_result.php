<?php
include '../config.php';
$qry = $conn->query("SELECT a.*,concat(s.firstname,' ',s.lastname) as name,s.student_code,concat(c.level,'-',c.section) as class FROM results a inner join class c on c.id = a.class_id inner join students s on s.id = a.student_id where a.id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}
include 'new_result.php';
?>