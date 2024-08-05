<?php
include '../config.php';
$qry = $conn->query("SELECT r.*,concat(s.firstname,' ',s.lastname) as name,s.student_code,concat(c.level,'-',c.section) as class FROM results r inner join class c on c.id = r.class_id inner join students s on s.id = r.class_id where r.id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}
include 'new_result.php';
?>