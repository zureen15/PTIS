<?php
include '../config.php';
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM cocu_track where id={$_GET['id']}")->fetch_array();
	foreach($qry as $k => $v){
		$$k = $v;
	}
}
?>
<div class="container-fluid">
	<form action="" id="manage-cocu">
		<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
		<div id="msg" class="form-group"></div>
		<div class="form-group">
			<label for="code" class="control-label">Cocurricullar Code</label>
			<input type="text" class="form-control form-control-sm" name="cocu_code" id="cocu_code" value="<?php echo isset($cocu_code) ? $cocu_code : '' ?>">
		</div>
		<div class="form-group">
			<label for="subject" class="control-label">Cocurricular Subject</label>
			<input type="text" class="form-control form-control-sm" name="cocu" id="cocu" value="<?php echo isset($cocu) ? $cocu : '' ?>">
		</div>
		<div class="form-group">
			<label for="description" class="control-label">Description</label>
			<textarea name="description" id="description" cols="30" rows="4" class="form-control"><?php echo isset($description) ? $description : '' ?></textarea>
		</div>
	</form>
</div>
<script>
	$(document).ready(function(){
		$('#manage-cocu').submit(function(e){
			e.preventDefault();
			start_load()
			$.ajax({
				url:'ajax.php?action=save_cocu',
				method:'POST',
				data:$(this).serialize(),
				success:function(resp){
					if(resp == 1){
						alert_toast("Data successfully saved.","success");
						setTimeout(function(){
							location.reload()	
						},1750)
					}else if(resp == 2){
						$('#msg').html('<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Cocurricular Code already exist.</div>')
						end_load()
					}
				}
			})
		})
	})

</script>