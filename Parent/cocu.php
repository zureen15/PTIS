<?php include '../config.php' ?>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<?php	if(!isset($_SESSION['ds_id'])): ?>
		<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary" href="./index.php?page=new_cocu" style="display:none;"><i class="fa fa-plus"></i> Add New</a>
			</div>
		</div>
	<?php endif; ?>
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
				<colgroup>
					<col width="5%">
					<col width="15%">
					<col width="25%">
					<col width="20%">
					<col width="10%">
					<col width="15%">
				</colgroup>
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Student Code</th>
						<th>Student Name</th>
						<th>Class</th>
						<th>Subjects</th>
						<th>Average</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$where = "";
					if(isset($_SESSION['ds_id'])){
						$where = " where d.student_id = {$_SESSION['ds_id']} ";
					}
					$qry = $conn->query("SELECT d.*,concat(s.firstname,' ',s.lastname) as name,s.student_code,concat(c.level,'-',c.section) as class FROM cocu_results d inner join class c on c.id = d.class_id inner join students s on s.id = d.student_id $where order by unix_timestamp(d.date_created) desc ");
					while($row= $qry->fetch_assoc()):
						$subjects = $conn->query("SELECT * FROM cocu_result_items where cocuresult_id =".$row['id'])->num_rows;
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td><b><?php echo $row['student_code'] ?></b></td>
						<td><b><?php echo ucwords($row['name']) ?></b></td>
						<td><b><?php echo ucwords($row['class']) ?></b></td>
						<td class="text-center"><b><?php echo $subjects ?></b></td>
						<td class="text-center"><b><?php echo $row['marks_percentage'] ?></b></td>
						<td class="text-center">
							<?php if(isset($_SESSION['parent_id'])): ?>
		                    <div class="btn-group">
		                        <a href="./index.php?page=edit_cocu&id=<?php echo $row['id'] ?>" class="btn btn-primary btn-flat" style="display:none;">
		                          <i class="fas fa-edit"></i>
		                        </a>
		                         <button data-id="<?php echo $row['id'] ?>" type="button" class="btn btn-info btn-flat view_cocu">
		                          <i class="fas fa-eye"></i>
		                        </button>
		                        <button type="button" class="btn btn-danger btn-flat delete_cocu" data-id="<?php echo $row['id'] ?>" style="display:none;">
		                          <i class="fas fa-trash"></i>
		                        </button>
	                      </div>
	                      <?php elseif(isset($_SESSION['ds_id'])): ?>
	                      	<button data-id="<?php echo $row['id'] ?>" type="button" class="btn btn-info btn-flat view_cocu">
		                          <i class="fas fa-eye"></i>
		                          View Cocurricular
		                        </button>
	                      <?php endif; ?>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>

	$(document).ready(function(){
		$('#list').dataTable()
	$('.delete_cocu').click(function(){
	_conf("Are you sure to delete this result?","delete_cocu",[$(this).attr('data-id')])
	})

	$('.view_cocu').click(function(){
		uni_modal("Cocurricular","view_cocu.php?id="+$(this).attr('data-id'),'mid-large')
	})
	$('.status_chk').change(function(){
		var status = $(this).prop('checked') == true ? 1 : 2;
		if($(this).attr('data-state-stats') !== undefined && $(this).attr('data-state-stats') == 'error'){
			$(this).removeAttr('data-state-stats')
			return false;
		}
		// return false;
		var id = $(this).attr('data-id');
		start_load()
		$.ajax({
			url:'ajax.php?action=update_cocuresult_stats',
			method:'POST',
			data:{id:id,status:status},
			error:function(err){
				console.log(err)
				alert_toast("Something went wrong while updating the result's status.",'error')
					$('#status_chk').attr('data-state-stats','error').bootstrapToggle('toggle')
					end_load()
			},
			success:function(resp){
				if(resp == 1){
					alert_toast("result status successfully updated.",'success')
					end_load()
				}else{
					alert_toast("Something went wrong while updating the result's status.",'error')
					$('#status_chk').attr('data-state-stats','error').bootstrapToggle('toggle')
					end_load()
				}
			}
		})
	})
	})
	function delete_cocu($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_cocu',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>