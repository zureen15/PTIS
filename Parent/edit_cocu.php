<?php
include '../config.php';
$qry = $conn->query("SELECT d.*,concat(s.firstname,' ',s.lastname) as name,s.student_code,concat(c.level,'-',c.section) as class FROM cocu_results d inner join class c on c.id = d.class_id inner join students s on s.id = d.student_id where d.id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}
include 'new_cocu.php';
?>