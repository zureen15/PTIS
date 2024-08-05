<?php
session_start();
ini_set('display_errors', 1);
Class Action {
	private $db;

	public function __construct() {
		ob_start();
   	include '../config.php';
    
    $this->db = $conn;
	}
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}
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

	function save_cocuresult(){
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
				$this->db->query("DELETE FROM cocu_result_items where cocuresult_id = $id");
				foreach($cocu_id as $k => $v){
					$data= " cocuresult_id = $id ";
					$data.= ", cocu_id = $v ";
					$data.= ", mark = '{$mark[$k]}' ";
					$this->db->query("INSERT INTO cocu_result_items set $data");
				}
				return 1;
		}
	}
	function delete_cocuresult(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM cocu_results where id = $id");
		if($delete){
			return 1;
		}
	}
	
	public function list_student(){
		
        $qry = $this->db->query("SELECT s.*,concat(c.level,'-',c.section) as class,concat(s.firstname,' ',s.lastname) as name FROM students s inner join class c on c.id = s.class_id inner join user_form us on c.id = us.class_id order by concat(firstname,' ',lastname) asc ");
        return $qry->fetch_all(MYSQLI_ASSOC);
    }
	
	public function list_class(){
		
        $qry = $this->db->query("SELECT * FROM class c inner join user_form us on c.id = us.class_id order by level asc,section asc ");
        return $qry->fetch_all(MYSQLI_ASSOC);
    }

	public function attendanceStudents($class_id = "", $class_date = ""){
        if(empty($class_id) || empty($class_date))
            return [];
        $sql = "SELECT `students`.*, COALESCE((SELECT `status` FROM `attendance` where `student_id` = `students`.id and `class_date` = '{$class_date}' ), 0) as `status` FROM `students` where `class_id` = '{$class_id}' order by `level` asc, `section` asc ";
        $qry = $this->db->query($sql);
        $result = $qry->fetch_all(MYSQLI_ASSOC);
        return $result;
    }
    
    public function attendanceStudentsMonthly($class_id = "", $class_month = ""){
        if(empty($class_id) || empty($class_month))
            return [];
        $sql = "SELECT `students`.* FROM `students` where `class_id` = '{$class_id}' ";
        $qry = $this->db->query($sql);
        $result = $qry->fetch_all(MYSQLI_ASSOC);
        foreach($result as $k => $row){
            $att_sql = "SELECT `status`, `class_date` FROM `attendance` where `student_id` = '{$row['id']}' ";
            $att_qry = $this->db->query($att_sql);
            foreach($att_qry as $att_row){
                $result[$k]['attendance'][$att_row['class_date']] = $att_row['status'];
            }
        }
        return $result;
    }
    public function save_attendance(){
        extract($_POST);

        $sql_values = "";
        $errors = "";
        foreach($student_id as $k => $sid){
            $stat = $status[$k] ?? 3;

            $check = $this->db->query("SELECT id FROM `attendance` where `student_id` = '{$sid}' and `class_date` = '{$class_date}'");
            if($check->num_rows > 0){
                
                $result = $check->fetch_assoc();
                $att_id = $result['id'];

                try{
                    $update = $this->db->query("UPDATE `attendance` set `status` = '{$stat}' where `id` = '{$att_id}'");

                }catch(Exception $e){
                    if(!empty($errors)) $errors .= "<br>";
                    $errors .= $e->getMessage();
                }
               
            }else{
                if(!empty($sql_values)) $sql_values .= ", ";
                $sql_values .= "( '{$sid}', '{$class_date}', '{$stat}' )";
            }
        }
        if(!empty($sql_values))
        {
            try{
                $sql =  $this->db->query("INSERT INTO `attendance` ( `student_id`, `class_date`, `status` ) VALUES {$sql_values}");
            }catch(Exception $e){
                if(!empty($errors)) $errors .= "<br>";
                $errors .= $e->getMessage();
            }
        }
        if(empty($errors)){
            $resp['status'] = "success";
            $_SESSION['flashdata'] = [ "type" => "success", "msg" => "Class Attendance Data has been saved successfully." ];
        }else{
            $resp['status'] = "error";
            $resp['msg'] = $errors;
        }

        return $resp;
    }
}