 <?php
  $this->load->view('includes/header');
?>
<link rel="stylesheet" href="<?php echo base_url();?>css/data-tables.css">

<div class="container" ng-controller="MembersController">
	<div class="row">
		<h2 class="text-center">LBAT Member Management</h2>
	</div>

        <div class="row">
            <div class="col-md-12">
                  <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%" datatable="ng" style="background-color: darkgray;">
                    <thead>
                      <tr>
                        <th>
                          No.
                      </th>
                        <th>Name</th>
                        <th>ID Number</th>
                        <th>Contact No.</th>
                        <th>Joined</th>
                        <th>Cover/Plan</th>
                        <th>No. of Dependants</th>
                        <th>Plolicy Status</th>
                        <th>Action</th>
                        <th>Delete </th>
                      </tr>
                    </thead>

                    <tfoot>
                      <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>ID Number</th>
                        <th>Contact No.</th>
                        <th>Joined</th>
                        <th>Cover/Plan</th>
                        <th>No. of Dependants</th>
                        <th>Plolicy Status</th>
                        <th>Action</th>
                        <th> X Completely?</th>
                      </tr>
                    </tfoot>

                    <tbody>
                      <tr dt-rows ng-repeat="(i, user) in all_users">
                        <td>
                          {{i+1}}
                        </td>
                        <td>{{user.name}} {{user.surname}}</td>
                        <td>{{user.id_number}}</td>
                        <td>{{user.cell_number}}</td>
                        <td>{{user.timestamp}}</td>
                        <td>........</td>
                        <td>........</td>
                        <td>Active</td>
                        <td>
                          <p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" >View/Edit <span class="glyphicon glyphicon-edit"></span></button></p>
                        </td>
                        <td>
                          <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" >Delete <span class="glyphicon glyphicon-trash"></span></button></p>
                        </td>

                      </tr>
                    </tbody>
                  </table>
	  </div>
	</div>
</div>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
      </div>
          <div class="modal-body">
          <div class="form-group">
        <input class="form-control " type="text" placeholder="Tiger Nixon">
        </div>
        <div class="form-group">

        <input class="form-control " type="text" placeholder="System Architect">
        </div>
        <div class="form-group">


      <input class="form-control " type="text" placeholder="Edinburgh">

        </div>
      </div>
          <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
      </div>
        </div>
    <!-- /.modal-content -->
  </div>
      <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">

       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

      </div>
        <div class="modal-footer ">
        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content -->
  </div>
      <!-- /.modal-dialog -->
    </div>

<?php
  $this->load->view('includes/footer.php');
?>
