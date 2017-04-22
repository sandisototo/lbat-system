<?php
  $this->load->view('includes/admin_header');
?>
<div class="container" >
	<div class="row">
    <center><h2>All Users</h2></center>
    <br>
        <div class="col-md-3">
            <form action="#" method="get">
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
    	 <table class="table table-list-search">
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
                            <th style="background-color:#c7c7ff">Admin</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="user in all_users">
                            <td>{{user.name}}</td>
                            <td>{{user.surname}}</td>
                            <td>{{user.cell_number}}</td>
                            <td style="background-color:#f9f9f9">{{user.bank}}</td>
                            <td style="background-color:#f9f9f9">{{user.branch_code}}</td>
                            <td style="background-color:#f9f9f9">{{user.account_number}}</td>
                            <td style="background-color:#f9f9f9">{{user.account_holder}}</td>
                            <td style="background-color:#f9f9f9">{{user.account_type}}</td>
                            <td style="background-color:#c7c7ff"><button  ng-click="view_transactions(user)" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-zoom-in"></i> View Transactions </button></td>
                            <td style="background-color:#c7c7ff"><button type="submit" href="#result-modal" data-toggle="modal" ng-click="show_user_details(user)" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-zoom-in"></i>Add</button></td>

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
                <h1><i class="glyphicon glyphicon-user"></i> Add {{selected_user.name}}  {{selected_user.surname}} as admin </h1>
            </div>
            <div class="modal-body">

              <label>Username</label>
               <br>

              <div class="btn-group" data-toggle="buttons">

                  <input type="text" name="username" placeholder="username"ng-model="selected_user.username" class="form-control" id="" value="" required>
                  <!--span ng-show="errorName">{{errorAmount_expected}}</span>-->
              </div>
              <br>
              <label>Password</label>
               <br>

              <div class="btn-group" data-toggle="buttons">

                  <input type="password" name="password" placeholder="password"ng-model="selected_user.password" class="form-control" id="" value="" required>
                  <!--span ng-show="errorName">{{errorAmount_expected}}</span>-->
              </div>
              <br>

              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary pull-left" data-dismiss="modal" ng-click="create_admin(selected_user)">Add</button>

              </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




  </div>
<?php
  $this->load->view('includes/footer.php');
?>
