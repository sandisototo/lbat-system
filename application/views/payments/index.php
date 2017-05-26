 <?php
  $this->load->view('includes/header');
?>
<link rel="stylesheet" href="<?php echo base_url();?>css/data-tables.css">
<div class="container" ng-controller="PaymentsController">
	<div class="row">
		<h2 class="text-center">Payments Management - May 2017</h2>
	</div>
              <div class="row">
                <div class="col-md-6">
                  <div class="well" style="margin-right: -3%;">
                    <div class="row">
                      <h4 class="text-center">Still-To-Pay Members</h4>
                    </div>
                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%" datatable="ng">
                			<thead>
            						<tr>
                          <th>
                            Paid?
                        </th>
            							<th>Name</th>
            							<th>ID Number</th>
            							<th>Contact No.</th>
            							<th>Amount Due</th>
            						</tr>
            					</thead>

            					<tfoot>
            						<tr>
                          <th>Paid?</th>
                          <th>Name</th>
            							<th>ID Number</th>
            							<th>Contact No.</th>
            							<th>Amount Due</th>
            						</tr>
            					</tfoot>

            					<tbody>
            						<tr dt-rows ng-repeat="(i, user) in all_users">
                          <td>
                            <center>
                            <input
                              type="checkbox"
                              name="selectedAsPaidUsers[]"
                              value="user"
                              ng-checked="selectedAsPaidUsers.indexOf({{user}}) > -1"
                              ng-click="togglePaidSelection(user)">
                            </center>
                          </td>
            							<td>{{user.name}} {{user.surname}}</td>
            							<td>{{user.id_number}}</td>
            							<td>{{user.cell_number}}</td>
                          <td>R 0.00</td>
            						</tr>
            					</tbody>
            				</table>
                  </div>
                  <button type="button" class="btn btn-success btn-sm pull-right" style="color: black; background-image: linear-gradient(to bottom,#e8e8e8 0,#419641">
                    (1) Save --></button>
            	     </div>
                   <!--Paid-->
                   <div class="col-md-5">
                     <div class="well" style="background: #009600;">
                       <div class="row">
                         <h4 class="text-center" style="color:#e0e0e0;">Paid Members</h4>
                       </div>
                       <table class="table table-striped table-bordered" cellspacing="0" width="100%" style="background-color: #048604">
                        <thead style="color: #e0e0e0;">
                          <tr>
                             <th>
                               Paid?
                           </th>
                            <th>Name</th>
                            <th>ID Number</th>
                            <th>Contact No.</th>
                            <th>Amount Paid</th>
                          </tr>
                        </thead>

                        <tfoot style="color: #e0e0e0;">
                          <tr>
                             <th>Paid?</th>
                             <th>Name</th>
                            <th>ID Number</th>
                            <th>Contact No.</th>
                            <th>Amount Paid</th>
                          </tr>
                        </tfoot>

                        <tbody>
                          <tr>
                             <td>
                               ....
                             </td>
                            <td>...</td>
                            <td>....</td>
                            <td>....</td>
                             <td>R 0.00</td>
                          </tr>
                        </tbody>
                      </table>
                      </div>
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
