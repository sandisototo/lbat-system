<?php
  $this->load->view('includes/admin_header');
?>
<div class="container" >
	<div class="row">
    <center><h2>All Non Getters</h2>
      <p ng-if="all_none_get.length==0"> No Manually Getters To Add Yet.</p>
    </center>
    <br>
        <div class="col-md-3">
            <form action="#" method="get" ng-if="all_none_get.length !=0">
                <div class="input-group">
                    <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
                    <input class="form-control" id="system-search" name="q" placeholder="Search for" required>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                    </span>
                </div>
            </form>
        </div>
		<div class="col-md-9">
    	 <table class="table table-list-search" ng-if="all_none_get.length !=0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Contact Number</th>
                            <th style="background-color:#c7c7ff">Bank Name</th>
                            <th style="background-color:#c7c7ff">Branc Code</th>
                            <th style="background-color:#c7c7ff">Account Number</th>
                            <th style="background-color:#c7c7ff">Account Holder</th>
                            <th style="background-color:#c7c7ff">Account Type</th>

                            <th style="background-color:#c7c7ff">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="user in all_none_get">
                            <td>{{user.name}}</td>
                            <td>{{user.surname}}</td>
                            <td>{{user.cell_number}}</td>
                            <td style="background-color:#f9f9f9">{{user.bank}}</td>
                            <td style="background-color:#f9f9f9">{{user.branch_code}}</td>
                            <td style="background-color:#f9f9f9">{{user.account_number}}</td>
                            <td style="background-color:#f9f9f9">{{user.account_holder}}</td>
                            <td style="background-color:#f9f9f9">{{user.account_type}}</td>
                            <td style="background-color:#c7c7ff"><button type="submit" href="#result-modal" data-toggle="modal" ng-click="show_user_details(user)" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-zoom-in"></i> Add </button></td>

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
                <h1><i class="glyphicon glyphicon-user"></i> {{selected_user.name}}  {{selected_user.surname}}</h1>
            </div>
            <div class="modal-body">
<small>Please specify an amount you want this user to get.</small>
<br>
              <label>Amount Expected</label>
               <br>

              <div class="btn-group" data-toggle="buttons">

                  <input type="text" name="amount_expected" placeholder="R"ng-model="selected_user.amount_expected" class="form-control" id="" value="" required>
                  <!--span ng-show="errorName">{{errorAmount_expected}}</span>-->
              </div>
              <br>

              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary pull-left" data-dismiss="modal" ng-click="create_getter(selected_user)">Add</button>

              </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<?php
  $this->load->view('includes/footer.php');
?>
