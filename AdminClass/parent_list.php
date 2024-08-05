<?php include '../config.php' ?>
<div class="col-lg-12">
<br>
	<div style="font-size: 20px; text-align: center;"><b>Parent List</b></div>
	<br>
	<div class="card card-outline card-primary">
		<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary " href="./index.php?page=new_parent"><i class="fa fa-plus"></i> Add New</a>
			</div>
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
				<colgroup>
					<col width="5%">
					<col width="15%">
					<col width="25%">
					<col width="25%">
					<col width="15%">
				</colgroup>
				<thead>
					<tr>
						<th class="text-center">No</th>
						<th>Parent ID</th>
						<th>Parent Name</th>
						<!-- <th>Teacher Name</th> -->
						<th>Student Name</th>
						<th>Class</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT p.*,concat(c.level,'-',c.section) as class,concat(p.firstname,' ',p.lastname) as name,concat(s.firstname,' ',s.lastname) as studentname FROM parent p inner join students s on s.id = p.student_id inner join class c on c.id = s.class_id order by concat(firstname,' ',lastname) asc  ");
					while($row= $qry->fetch_assoc()):
					?>
					<tr>
						<td class="text-center"><?php echo $i++ ?></td>
						<td><b><?php echo $row['parent_code'] ?></b></td>
						<td><b><?php echo ucwords($row['name']) ?></b></td>
						<td><b><?php echo ucwords($row['studentname']) ?></b></td>
						<td><b><?php echo ucwords($row['class']) ?></b></td>
						<td class="text-center">
		                    <div class="btn-group">
		                        <a href="index.php?page=edit_parent&id=<?php echo $row['id'] ?>" class="btn btn-primary btn-flat ">
		                          <i class="fas fa-edit"></i>
		                        </a>
		                        <button type="button" class="btn btn-danger btn-flat delete_parent" data-id="<?php echo $row['id'] ?>">
		                          <i class="fas fa-trash"></i>
		                        </button>
	                      </div>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<style>
	table td{
		vertical-align: middle !important;
	}
</style>
<script>
	$(document).ready(function(){
		$('#list').dataTable()
		$('.view_parent').click(function(){
			uni_modal("Parent's Details","view_parent.php?id="+$(this).attr('data-id'),"large")
		})
	$('.delete_parent').click(function(){
	_conf("Are you sure to delete this Parent?","delete_parent",[$(this).attr('data-id')])
	})
	})
	function delete_parent($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_parent',
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