<?php include ('connection.php'); ?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="../css/bootstrap5.0.1.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../css/datatables-1.10.25.min.css" />
  <!-- <link rel="stylesheet" href="../css/menu.css"> -->
  <title>Donation Collection</title>
  <style type="text/css">
    .btnAdd {
      text-align: right;
      width: 83%;
      margin-bottom: 20px;
    }

    :root {
            --blue: #3498db;
        }

        *::-webkit-scrollbar {
            width: 10px;
        }

        *::-webkit-scrollbar-track {
            background-color: transparent;
        }

        *::-webkit-scrollbar-thumb {
            background-color: var(--blue);
        }

  </style>
</head>

<body>

  <?php
  include "../sidemenu/sidebar.php";
  ?>

  <!-- <div class="container-fluid"> -->
  <div class="row">
    <!-- <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #1980e6">
      Donation Collection
    </nav> -->
    <div class="container" style="margin-top: 120px; margin-left: 30px;">
      <div class="btnAdd">
        <a href="#!" data-id="" data-bs-toggle="modal" data-bs-target="#addDonateModal"
          class="btn btn-success btn-sm">Add User</a>
      </div>
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <table id="example" class="table">
            <thead>
              <!-- <th>Id</th> -->
              <th>Parent Name</th>
              <th>Email</th>
              <th>Total Donation</th>
              <th>Options</th>
            </thead>
            <tbody>
            </tbody>
            
          </table>
        </div>
        <div class="col-md-2"></div>
      </div>
    </div>
  </div>
  <!-- </div> -->
  <!-- Optional JavaScript; choose one of the two! -->
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="../js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <script src="../js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../js/dt-1.10.25datatables.min.js"></script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  -->
  <script type="text/javascript">
    $(document).ready(function () {
      $('#example').DataTable({
        "fnCreatedRow": function (nRow, aData, iDataIndex) {
          $(nRow).attr('id', aData[0]);
        },
        'serverSide': 'true',
        'processing': 'true',
        'paging': 'true',
        'order': [],
        'ajax': {
          'url': 'fetch_data.php',
          'type': 'post',
        },
        "aoColumnDefs": [{
          "bSortable": false,
          "aTargets": [3],
          "ordering": false
        },

        ]
      });
    });
    $(document).on('submit', '#addDonate', function (e) {
      e.preventDefault();
      var parent_name = $('#addParentNameField').val();
      var total_donate = $('#addTotalField').val();
      var email = $('#addEmailField').val();
      if (parent_name != '' && total_donate != '' && email != '') {
        $.ajax({
          url: "add_user.php",
          type: "post",
          data: {
            parent_name: parent_name,
            total_donate: total_donate,
            email: email
          },
          success: function (data) {
            var json = JSON.parse(data);
            var status = json.status;
            if (status == 'true') {
              mytable = $('#example').DataTable();
              mytable.draw();
              $('#addDonateModal').modal('hide');
            } else {
              alert('failed');
            }
          }
        });
      } else {
        alert('Fill all the required fields');
      }
    });
    $(document).on('submit', '#updateDonate', function (e) {
      e.preventDefault();
      //var tr = $(this).closest('tr');
      var parent_name = $('#parentnameField').val();
      var total_donate = $('#totalField').val();
      var email = $('#emailField').val();
      var trid = $('#trid').val();
      var id = $('#id').val();
      if (parent_name != '' && total_donate != '' && email != '') {
        $.ajax({
          url: "update_donate.php",
          type: "post",
          data: {
            parent_name: parent_name,
            total_donate: total_donate,
            email: email,
            id: id
          },
          success: function (data) {
            var json = JSON.parse(data);
            var status = json.status;
            if (status == 'true') {
              table = $('#example').DataTable();
              // table.cell(parseInt(trid) - 1,0).data(id);
              // table.cell(parseInt(trid) - 1,1).data(username);
              // table.cell(parseInt(trid) - 1,2).data(email);
              // table.cell(parseInt(trid) - 1,3).data(mobile);
              // table.cell(parseInt(trid) - 1,4).data(city);
              var button = '<td><a href="javascript:void(hide);" data-id="' + id + '" class="btn btn-info btn-sm editbtn">Edit</a>  <a href="#!"  data-id="' + id + '"  class="btn btn-danger btn-sm deleteBtn">Delete</a></td>';
              var row = table.row("[id='" + trid + "']");
              row.row("[id='" + trid + "']").data([id, parent_name, email, total_donate, button]);
              $('#exampleModal').modal('hide');
            } else {
              alert('failed');
            }
          }
        });
      } else {
        alert('Fill all the required fields');
      }
    });
    $('#example').on('click', '.editbtn ', function (event) {
      var table = $('#example').DataTable();
      var trid = $(this).closest('tr').attr('id');
      // console.log(selectedRow);
      var id = $(this).data('id');
      $('#exampleModal').modal('show');

      $.ajax({
        url: "get_single_data.php",
        data: {
          id: id
        },
        type: 'post',
        success: function (data) {
          var json = JSON.parse(data);
          $('#parentnameField').val(json.parent_name);
          $('#emailField').val(json.email);
          $('#totalField').val(json.total_donate);
          $('#id').val(id);
          $('#trid').val(trid);
        }
      })
    });

    $(document).on('click', '.deleteBtn', function (event) {
      var table = $('#example').DataTable();
      event.preventDefault();
      var id = $(this).data('id');
      if (confirm("Are you sure want to delete this User ? ")) {
        $.ajax({
          url: "delete_donate.php",
          data: {
            id: id
          },
          type: "post",
          success: function (data) {
            var json = JSON.parse(data);
            status = json.status;
            if (status == 'success') {
              //table.fnDeleteRow( table.$('#' + id)[0] );
              //$("#example tbody").find(id).remove();
              //table.row($(this).closest("tr")) .remove();
              $("#" + id).closest('tr').remove();
            } else {
              alert('Failed');
              return;
            }
          }
        });
      } else {
        return null;
      }



    })
  </script>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="updateDonate">
            <input type="hidden" name="id" id="id" value="">
            <input type="hidden" name="trid" id="trid" value="">
            <div class="mb-3 row">
              <label for="parentnameField" class="col-md-3 form-label">Parent Name</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="parentnameField" name="parent_name">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="emailField" class="col-md-3 form-label">Email</label>
              <div class="col-md-9">
                <input type="email" class="form-control" id="emailField" name="email">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="totalField" class="col-md-3 form-label">Total Donation</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="totalField" name="total_donate">
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Add user Modal -->
  <div class="modal fade" id="addDonateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="addDonate" action="">
            <div class="mb-3 row">
              <label for="addParentNameField" class="col-md-3 form-label">Parent Name</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="addParentNameField" name="parent_name">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="addEmailField" class="col-md-3 form-label">Email</label>
              <div class="col-md-9">
                <input type="email" class="form-control" id="addEmailField" name="email">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="addTotalField" class="col-md-3 form-label">Total Donate</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="addTotalField" name="total_donate">
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
<script type="text/javascript">
  //var table = $('#example').DataTable();
</script>