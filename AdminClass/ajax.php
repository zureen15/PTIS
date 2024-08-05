<?php
ob_start();
date_default_timezone_set("Asia/Manila");

$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();

if($action == 'save_class'){
	$save = $crud->save_class();
	if($save)
		echo $save;
}
if($action == 'delete_class'){
	$save = $crud->delete_class();
	if($save)
		echo $save;
}
if($action == 'save_subject'){
	$save = $crud->save_subject();
	if($save)
		echo $save;
}
if($action == 'delete_subject'){
	$save = $crud->delete_subject();
	if($save)
		echo $save;
}
if($action == 'save_cocu'){
	$save = $crud->save_cocu();
	if($save)
		echo $save;
}
if($action == 'delete_cocu'){
	$save = $crud->delete_cocu();
	if($save)
		echo $save;
}
if($action == 'save_teacher'){
	$save = $crud->save_teacher();
	if($save)
		echo $save;
}
if($action == 'delete_teacher'){
	$save = $crud->delete_teacher();
	if($save)
		echo $save;
}
if($action == 'save_student'){
	$save = $crud->save_student();
	if($save)
		echo $save;
}
if($action == 'delete_student'){
	$save = $crud->delete_student();
	if($save)
		echo $save;
}
if($action == 'save_parent'){
	$save = $crud->save_parent();
	if($save)
		echo $save;
}
if($action == 'delete_parent'){
	$save = $crud->delete_parent();
	if($save)
		echo $save;
}
if($action == 'save_result'){
	$save = $crud->save_result();
	if($save)
		echo $save;
}
if($action == 'delete_result'){
	$save = $crud->delete_result();
	if($save)
		echo $save;
}
if($action == 'save_cocuresult'){
	$save = $crud->save_cocuresult();
	if($save)
		echo $save;
}
if($action == 'delete_cocuresult'){
	$save = $crud->delete_cocuresult();
	if($save)
		echo $save;
}
ob_end_flush();
?>
