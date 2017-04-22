<?php
  $this->load->view('includes/admin_header');
?>
<div class="container" >
	<div class="row">
    <center><h2>All Overdue Transactions </h2>
        <p ng-if="all_trans_overdue.length==0"> No Overdue Transactions Yet.</p>
    </center>
    <br>
        <div class="col-md-3">
            <form action="#" method="get" ng-if="all_trans_overdue.length != 0">
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
    	 <table class="table table-list-search" ng-if="all_trans_overdue.length != 0">
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
                            <th style="background-color:#c7c7ff">Amount Expected</th>

                            <th style="background-color:#c7c7ff">Action</th>

                        </tr>
                    </thead>
                    <tbody >
                        <tr ng-repeat="user in all_trans_overdue">
                            <td>{{user.name}}</td>
                            <td>{{user.surname}}</td>
                            <td>{{user.cell_number}}</td>
                            <td style="background-color:#f9f9f9">{{user.bank}}</td>
                            <td style="background-color:#f9f9f9">{{user.branch_code}}</td>
                            <td style="background-color:#f9f9f9">{{user.account_number}}</td>
                            <td style="background-color:#f9f9f9">{{user.account_holder}}</td>
                            <td style="background-color:#f9f9f9">{{user.account_type}}</td>
                            <td style="background-color:#f9f9f9">{{user.amount_paid}}</td>
                            <td style="background-color:#c7c7ff"><button  ng-click="paid_transaction_byadmin(user.id,user.getter_user_id,user.helper_user_id)" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-zoom-in"></i> Pay Transaction </button></td>

                        </tr>
                       
                    </tbody>
                    
                </table>
		</div>
	</div>
  </div>
<?php
  $this->load->view('includes/footer.php');
?>
