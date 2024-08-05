<?php include '../config.php' ?>
<div class="col-lg-12">
	<br>
	<div style="font-size: 20px; text-align: center;"><b>Teacher List</b></div>
	<br>
	<div class="card card-outline card-primary">
		<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary "
					href="./index.php?page=new_teacher"><i class="fa fa-plus"></i> Add New</a>
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
						<th>Teacher ID</th>
						<th>Teacher Name</th>
						<th>Class</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT t.*,concat(c.level,'-',c.section) as class,concat(firstname,' ',lastname) as name FROM teacher t inner join class c on c.id = t.class_id order by concat(firstname,' ',lastname) asc  ");
					while ($row = $qry->fetch_assoc()):
						?>
						<tr>
							<td class="text-center"><?php echo $i++ ?></td>
							<td><b><?php echo $row['teacher_code'] ?></b></td>
							<td><b><?php echo ucwords($row['name']) ?></b></td>
							<td><b><?php echo ucwords($row['class']) ?></b></td>
							<td class="text-center">
								<div class="btn-group">
									<a href="index.php?page=edit_teacher&id=<?php echo $row['id'] ?>"
										class="btn btn-primary btn-flat ">
										<i class="fas fa-edit"></i>
									</a>
									<button type="button" class="btn btn-danger btn-flat delete_teacher"
										data-id="<?php echo $row['id'] ?>">
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
	table td {
		vertical-align: middle !important;
	}
</style>
<script>
	$(document).ready(function () {
		$('#list').dataTable()
		$('.view_teacher').click(function () {
			uni_modal("Teacher's Details", "view_teacher.php?id=" + $(this).attr('data-id'), "large")
		})
		$('.delete_teacher').click(function () {
			_conf("Are you sure to delete this Teacher?", "delete_teacher", [$(this).attr('data-id')])
		})
	})
	function delete_teacher($id) {
		start_load()
		$.ajax({
			url: 'ajax.php?action=delete_teacher',
			method: 'POST',
			data: { id: $id },
			success: function (resp) {
				if (resp == 1) {
					alert_toast("Data successfully deleted", 'success')
					setTimeout(function () {
						location.reload()
					}, 1500)

				}
			}
		})
	}
</script>