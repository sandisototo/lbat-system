<?php
  $this->load->view('includes/admin_header');
?>
<div class="container" >
	<div class="row">
    <center><h2>All Helpers</h2>
      <p ng-if="all_helpers.length==0"> No Helpers Yet.</p>
    </center>
    <br>
        <div class="col-md-3">
            <form action="#" method="get" ng-if="all_helpers.length!=0">
                <div class="input-group">
                    <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
                    <input class="form-control" id="system-search" name="q" placeholder="Search for" required>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                    </span>
                </div>
            </form>
        </div>
		<div class="col-md-12">
    	 <table class="table table-list-search"ng-if="all_helpers.length != 0" >
                    <thead>
                        <tr style="background-color: #7b7bc5;">
                            <th class="col-md-2">Helper Details</th>
                            <th class="col-md-2"> </th><th></th><th> </th>
                            <th class="col-md-2" style="background-color:#c7c7ff">Getter Details</th>
                            <th style="background-color:#c7c7ff"></th>
                            <th style="background-color:#c7c7ff"></th>
                            <th style="background-color:#c7c7ff"></th>

                        </tr>
                        <tr style="background-color: #7b7bc5;">
                            <th>Name</th>
                            <th>Surname</th>
                            <th class="col-md-2">Reward Amount</th>
                            <th class="col-md-2">Date Reward</th>
                            <th style="background-color:#c7c7ff">Name</th>
                            <th style="background-color:#c7c7ff">Surname</th>
                            <th style="background-color:#c7c7ff">Paid</th>
                            <th class="col-md-2"style="background-color:#c7c7ff">Date Paid</th>


                        </tr>
                    </thead>
                    <tbody >
                        <tr ng-repeat="user in all_helpers">
                            <td>{{user.name}}</td>
                            <td>{{user.surname}}</td>
                            <td>R{{user.amount_expected}}</td>
                            <td>{{user.reward_date}}</td>
                            <td style="background-color:#f9f9f9">{{user.getter_name}}</td>
                            <td style="background-color:#f9f9f9">{{user.getter_surname}}</td>
                            <td style="background-color:#f9f9f9">R{{user.amount_paid}}</td>
                            <td style="background-color:#f9f9f9">{{user.due_date}}</td>

                        </tr>

                    </tbody>
                    
                </table>
		</div>
	</div>
  <!-- Modal -->
<div class="modal fade" id="result-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h1><i class="glyphicon glyphicon-credit-card"></i>Payment Details</h1>
            </div>
            <div class="modal-body">
              <p>Thank you for choosing <b>{{selected_user.name}}  {{selected_user.surname}}</b> below are his/her banking details:</p>
              <table>
              <tbody>
                  <tr>
                      <td style="background-color:#f9f9f9">Bank Name</td>
                      <td> {{selected_user.bank}}</td>
                  </tr>
                  <tr>
                      <td style="background-color:#f9f9f9">Branc Code</td>
                      <td> {{selected_user.branch_code}}</td>
                  </tr>
                  <tr>
                      <td style="background-color:#f9f9f9">Account Number</td>
                      <td> {{selected_user.account_number}} </td>
                  </tr>
                  <tr>
                      <td style="background-color:#f9f9f9">Account Holder</td>
                      <td> {{selected_user.account_holder}}</td>
                  </tr>
                  <tr>
                      <td style="background-color:#f9f9f9">Account Type</td>
                      <td> {{selected_user.account_type}}</td>
                  </tr>
                  <tr>
                      <td style="background-color:#f9f9f9">Deposit Amount </td>
                      <td><b> R{{selected_user.amount_expected}}</b></td>
                  </tr>
              </tbody>
            </table>
            <br>
              <b>Contact Number:</b> {{selected_user.cell_number}}<br>

              <small>Please make sure you make a payment before<i> Wednesday 12th of September 2016 </i></small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary pull-left" data-dismiss="modal" ng-click="add_to_my_getters()">Confirm</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<?php
  $this->load->view('includes/footer.php');
?>
