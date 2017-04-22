<?php
  $this->load->view('includes/admin_header');
?>
<div class="container" >
	<div class="row">
    <center><h2>All Requested Helpers</h2>
      <p ng-if="all_notifications.length==0"> No helper requested allocation yet.</p>
  </center>
    <br>
        <div class="col-md-3">
            <form action="#" method="get" ng-if="all_notifications.length!=0">
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



    	 <table class="table table-list-search" ng-if="all_notifications.length!=0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Contact Number</th>
                            <th style="background-color:#c7c7ff">Requested Amount</th>
                            <th style="background-color:#c7c7ff">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="user in all_notifications">
                            <td>{{user.user_name}}</td>
                            <td>{{user.user_surname}}</td>
                            <td>{{user.cell_number}}</td>
                            <td style="background-color:#f9f9f9">{{user.request_amount}}</td>
                            <td style="background-color:#c7c7ff"><button  ng-click="notify_user_amout_available(user)" class="btn btn-primary "><i class="glyphicon glyphicon-send"></i> Notify </button></td>

                        </tr>

                    </tbody>
                </table>
		</div>
	</div>

</div>
<?php
  $this->load->view('includes/footer.php');
?>
