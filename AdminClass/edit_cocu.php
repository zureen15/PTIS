<?php
include '../config.php';
$qry = $conn->query("SELECT b.*,concat(s.firstname,' ',s.lastname) as name,s.student_code,concat(c.level,'-',c.section) as class FROM cocu_results b inner join class c on c.id = b.class_id inner join students s on s.id = b.class_id where b.id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}
include 'new_cocuresult.php';
?>