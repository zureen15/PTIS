<?php
session_start();
ini_set('display_errors', 1);
Class Action {
	private $db;

	public function __construct() {
		ob_start();
   	include '../config.php';
	   //include 'db_connect.php';

    $this->db = $conn;
	}
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}

	// function login(){
	// 	extract($_POST);
	// 		$qry = $this->db->query("SELECT *,concat(firstname,' ',lastname) as name FROM users where username = '".$username."' and password = '".md5($password)."' and type= 1 ");
	// 	if($qry->num_rows > 0){
	// 		foreach ($qry->fetch_array() as $key => $value) {
	// 			if($key != 'password' && !is_numeric($key))
	// 				$_SESSION['login_'.$key] = $value;
	// 		}
	// 			return 1;
	// 	}else{
	// 		return 2;
	// 	}
	// }
	function login2(){
		extract($_POST);
			$qry = $this->db->query("SELECT *,concat(firstname,' ',lastname) as name FROM students where student_code = '".$student_code."' ");
		if($qry->num_rows > 0){
			foreach ($qry->fetch_array() as $key => $value) {
				if($key != 'password' && !is_numeric($key))
					$_SESSION['as_'.$key] = $value;
					$_SESSION['ds_'.$key] = $value;
			}
				return 1;
		}else{
			return 3;
		}
	}

	// function login3(){
	// 	extract($_POST);
	// 		$qry = $this->db->query("SELECT *,concat(firstname,' ',lastname) as name FROM students where student_code = '".$student_code."' ");
	// 	if($qry->num_rows > 0){
	// 		foreach ($qry->fetch_array() as $key => $value) {
	// 			if($key != 'password' && !is_numeric($key))
	// 				$_SESSION['ds_'.$key] = $value;
	// 		}
	// 			return 1;
	// 	}else{
	// 		return 3;
	// 	}
	// }
	
	function save_class(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id')) && !is_numeric($k)){
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		$chk = $this->db->query("SELECT * FROM class where level ='$level' and section = '$section' and id != '$id' ");
		if($chk->num_rows > 0){
			return 2;
			exit;
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO class set $data");
		}else{
			$save = $this->db->query("UPDATE class set $data where id = $id");
		}
		if($save){
			return 1;
		}
	}
	function delete_class(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM class where id = $id");
		if($delete){
			return 1;
		}
	}
	function save_subject(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id')) && !is_numeric($k)){
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		$chk = $this->db->query("SELECT * FROM subjects where subject_code ='$subject_code' and id != '$id' ");
		if($chk->num_rows > 0){
			return 2;
			exit;
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO subjects set $data");
		}else{
			$save = $this->db->query("UPDATE subjects set $data where id = $id");
		}
		if($save){
			return 1;
		}
	}
	function delete_subject(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM subjects where id = $id");
		if($delete){
			return 1;
		}
	}
	function save_teacher(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id','areas_id')) && !is_numeric($k)){
				if($k == 'description')
					$v = htmlentities(str_replace("'","&#x2019;",$v));
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		$chk = $this->db->query("SELECT * FROM teacher where teacher_code ='$teacher_code' and id != '$id' ")->num_rows;
		if($chk > 0){
			return 2;
			exit;
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO teacher set $data");
		}else{
			$save = $this->db->query("UPDATE teacher set $data where id = $id");
		}
		if($save){
			return 1;
		}
	}
	function delete_teacher(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM teacher where id = $id");
		if($delete){
			return 1;
		}
	}

	function save_student(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id','stud_id')) && !is_numeric($k)){
				if($k == 'description')
					$v = htmlentities(str_replace("'","&#x2019;",$v));
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		$chk = $this->db->query("SELECT * FROM students where student_code ='$student_code' and id != '$id' ")->num_rows;
		if($chk > 0){
			return 2;
			exit;
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO students set $data");
		}else{
			$save = $this->db->query("UPDATE students set $data where id = $id");
		}
		if($save){
			return 1;
		}
	}
	function delete_student(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM students where id = $id");
		if($delete){
			return 1;
		}
	}

	function save_parent(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id','parent_id')) && !is_numeric($k)){
				if($k == 'description')
					$v = htmlentities(str_replace("'","&#x2019;",$v));
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		$chk = $this->db->query("SELECT * FROM parent where parent_code ='$parent_code' and id != '$id' ")->num_rows;
		if($chk > 0){
			return 2;
			exit;
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO parent set $data");
		}else{
			$save = $this->db->query("UPDATE parent set $data where id = $id");
		}
		if($save){
			return 1;
		}
	}
	function delete_parent(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM parent where id = $id");
		if($delete){
			return 1;
		}
	}


	function save_result(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id','mark','subject_id')) && !is_numeric($k)){
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		$chk = $this->db->query("SELECT * FROM results where student_id ='$student_id' and class_id='$class_id' and id != '$id' ");
		if($chk->num_rows > 0){
			return 2;
			exit;
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO results set $data");
		}else{
			$save = $this->db->query("UPDATE results set $data where id = $id");
		}
		if($save){
				$id = empty($id) ? $this->db->insert_id : $id;
				$this->db->query("DELETE FROM result_items where result_id = $id");
				foreach($subject_id as $k => $v){
					$data= " result_id = $id ";
					$data.= ", subject_id = $v ";
					$data.= ", mark = '{$mark[$k]}' ";
					$this->db->query("INSERT INTO result_items set $data");
				}
				return 1;
		}
	}
	function delete_result(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM results where id = $id");
		if($delete){
			return 1;
		}
	}

	function save_cocu(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id','mark','cocu_id')) && !is_numeric($k)){
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		$chk = $this->db->query("SELECT * FROM cocu_results where student_id ='$student_id' and class_id='$class_id' and id != '$id' ");
		if($chk->num_rows > 0){
			return 2;
			exit;
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO cocu_results set $data");
		}else{
			$save = $this->db->query("UPDATE cocu_results set $data where id = $id");
		}
		if($save){
				$id = empty($id) ? $this->db->insert_id : $id;
				$this->db->query("DELETE FROM cocu_result_items where result_id = $id");
				foreach($cocu_id as $k => $v){
					$data= " result_id = $id ";
					$data.= ", cocu_id = $v ";
					$data.= ", mark = '{$mark[$k]}' ";
					$this->db->query("INSERT INTO cocu_result_items set $data");
				}
				return 1;
		}
	}
	function delete_cocu(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM cocu_results where id = $id");
		if($delete){
			return 1;
		}
	}
	
}