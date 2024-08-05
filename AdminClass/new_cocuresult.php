<?php if(!isset($conn)){ include '../config.php'; } ?>

<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<form action="" id="manage-cocuresult">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div id="msg" class=""></div>
            <div class="form-group">
                <label for="" class="control-label">Student</label>
                <select name="student_id" id="student_id" class="form-control select2 select2-sm" required>
                  <option></option> 
                  <?php 
                        $classes = $conn->query("SELECT s.*,concat(c.level,'-',c.section) as class,concat(firstname,' ',lastname) as name FROM students s inner join class c on c.id = s.class_id order by concat(firstname,' ',lastname) asc ");
                        while($row = $classes->fetch_array()):
                  ?>
                        <option value="<?php echo $row['id'] ?>" data-class_id='<?php echo $row['class_id'] ?>'  data-class='<?php echo $row['class'] ?>' <?php echo isset($student_id) && $student_id == $row['id'] ? "selected" : '' ?>><?php echo $row['student_code'].' | '.ucwords($row['name']) ?></option>
                  <?php endwhile; ?>
                </select>
                <small id="class"><?php echo isset($class) ? "Current Class: ".$class : "" ?></small>
                <input type="hidden" name="class_id" value="<?php echo isset($class_id) ? $class_id: '' ?>">
            </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-12">
            <div class="d-flex justify-content-center align-items-center">
            	<div class="form-group col-sm-4">
	                <label for="" class="control-label">Cocurricular Subject</label>
	                <select name="" id="cocu_id" class="form-control select2 select2-sm input-sm">
	                  <option></option> 
	                  <?php 
	                        $clas = $conn->query("SELECT * FROM cocu_track order by cocu asc ");
	                        while($row = $clas->fetch_array()):
	                  ?>
	                        <option value="<?php echo $row['id'] ?>" data-json='<?php echo json_encode($row) ?>'><?php echo $row['cocu_code'].' | '.ucwords($row['cocu']) ?></option>
	                  <?php endwhile; ?>
	                </select>
	            </div>
	            <div class="form-group col-sm-3">
	                <label for="" class="control-label">Mark</label>
	                <input type="text" class="form-control form-control-sm text-right number" id="mark" maxlength="6">
	            </div>
	            <button class="btn btn-sm btn-primary bg-gradient-primary" type="button" id="add_mark">Add</button>
            </div>
        </div>
    	<hr>
    	<div class="col-md-8 offset-md-2">
            <table class="table table-bordered" id="mark-list">
            	<thead>
            		<tr>
            			<th>Cocurricular Code</th>
            			<th>Cocurricular</th>
            			<th>Mark</th>
            			<th></th>
            		</tr>
            	</thead>
            	<tbody>
            		<?php if(isset($id)): ?>
            		<?php 
            			$items=$conn->query("SELECT b.*,e.cocu_code,e.cocu,e.id as eid FROM cocu_result_items b inner join cocu_track e on e.id = b.cocu_id where cocuresult_id = $id order by e.cocu_code asc");
            			while($row = $items->fetch_assoc()):
            		?>
            		<tr data-id="<?php echo $row['eid'] ?>">
            			<td><input type="hidden" name="cocu_id[]" value="<?php echo $row['cocu_id'] ?>"><?php echo $row['cocu_code'] ?></td>
            			<td><?php echo ucwords($row['cocu']) ?></td>
            			<td><input type="hidden" name="mark[]" value="<?php echo $row['mark'] ?>"><?php echo $row['mark'] ?></td>
            			<td class="text-center"><button class="btn btn-sm btn-danger" type="button" onclick="$(this).closest('tr').remove() && calc_ave()"><i class="fa fa-times"></i></button></td>
            		</tr>
            		<?php endwhile; ?>
            		<script>
            			$(document).ready(function(){
            				calc_ave()
            			})
            		</script>
            		<?php endif; ?>

            	</tbody>
            	<tfoot>
            		<tr>
            			<th colspan="2">Average</th>
            			<th id="average" class="text-center"></th>
            			<th></th>
            		</tr>
            	</tfoot>
            </table>
            <input type="hidden" name="marks_percentage" value="<?php echo isset($marks_percentage) ? $marks_percentage : '' ?>">
          </div>
        </div>
      </form>
  	</div>
  	<div class="card-footer border-top border-info">
  		<div class="d-flex w-100 justify-content-center align-items-center">
  			<button class="btn btn-flat  bg-gradient-primary mx-2" form="manage-cocuresult">Save</button>
  			<a class="btn btn-flat bg-gradient-secondary mx-2" href="./index.php?page=cocuresult">Cancel</a>
  		</div>
  	</div>
	</div>
</div>
<script>
	$('#student_id').change(function(){
		var class_id = $('#student_id option[value="'+$(this).val()+'"]').attr('data-class_id');
		var _class = $('#student_id option[value="'+$(this).val()+'"]').attr('data-class');
		$('[name="class_id"]').val(class_id)
		$('#class').text("Current Class: "+_class);
	})
	$('#add_mark').click(function(){
		var cocu_id = $('#cocu_id').val()
		var mark = $('#mark').val()
		if(cocu_id == '' && mark == ''){
			alert_toast("Please select cocurricular & enter a mark before adding to list.","error");
			return false;
		}
		var sData = $('#cocu_id option[value="'+cocu_id+'"]').attr('data-json')
			sData = JSON.parse(sData)
		if($('#mark-list tr[data-id="'+cocu_id+'"]').length > 0){
			alert_toast("Cocurricular already on the list.","error");
			return false;
		}
		var tr = $('<tr data-id="'+cocu_id+'"></tr>')
		tr.append('<td><input type="hidden" name="cocu_id[]" value="'+cocu_id+'">'+sData.cocu_code+'</td>')
		tr.append('<td>'+sData.cocu+'</td>')
		tr.append('<td class="text-center"><input type="hidden" name="mark[]" value="'+mark+'">'+mark+'</td>')
		tr.append('<td class="text-center"><button class="btn btn-sm btn-danger" type="button" onclick="$(this).closest(\'tr\').remove() && calc_ave()"><i class="fa fa-times"></i></button></td>')
		$('#mark-list tbody').append(tr)
		$('#cocu_id').val('').trigger('change')
		$('#mark').val('')
		calc_ave()

	})
	function calc_ave(){
		var total = 0;
		var i = 0;
		$('#mark-list [name="mark[]"]').each(function(){
			i++;
			total = total + parseFloat($(this).val())
		})
		$('#average').text(parseFloat(total/i).toLocaleString('en-US',{style:'decimal',maximumFractionDigits:2}))
		$('[name="marks_percentage"]').val(parseFloat(total/i).toLocaleString('en-US',{style:'decimal',maximumFractionDigits:2}))
	}
	$('#manage-cocuresult').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_cocuresult',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Data successfully saved',"success");
					setTimeout(function(){
              location.href = 'index.php?page=cocuresult'
					},2000)
				}else if(resp == 2){
          $('#msg').html('<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Student Code already exist.</div>')
          end_load()
        }
			}
		})
	})
  function displayImgCover(input,_this) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
            $('#cover').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
      }
  }
</script>