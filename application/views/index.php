<?php
  $this->load->view('includes/header');
?>

<div class="container" ng-controller="LoginController">


    <div class="row">
      <h3 class="text-left" style="color: #777777;">Member statistics</h3>
    <div class="panel panel-default" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 3px 10px 0 rgba(0, 0, 0, 0.1); margin-bottom:21%;">
		<div class="col-md-6" style="margin-top:2%;">
		<!-- Stat-->
		 <div class="circle-tile">
        <a href="members"><div class="circle-tile-heading purple"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
        <div class="circle-tile-content purple">
          <div class="circle-tile-description text-faded"> Total Members </div>
          <div class="circle-tile-number text-faded ">{{total_member_count}}</div>
          <a class="circle-tile-footer" href="members">More Info <i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>

		</div>
		<div class="col-md-6" style="margin-top:2%;">
		<!-- Stat-->
		      <div class="circle-tile">
	        <a href="members"><div class="circle-tile-heading green-semi"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
	        <div class="circle-tile-content green-semi">
	          <div class="circle-tile-description text-faded"> Active Members</div>
	          <div class="circle-tile-number text-faded ">{{total_active_member_count}}</div>
	          <a class="circle-tile-footer" href="members">More Info <i class="fa fa-chevron-circle-right"></i></a>
	        </div>
	      </div>
		</div>
  </div>

    <h3 class="text-left" style="color: #777777;">Payments statistics</h3>
    <div class="panel panel-default" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 3px 10px 0 rgba(0, 0, 0, 0.1);">
		<div class="col-md-6 " style="margin-top:2%;">
		<!-- Stat-->
		      <div class="circle-tile ">
		        <a href="payments"><div class="circle-tile-heading green"><i class="fa fa-check fa-fw fa-3x"></i></div></a>
		        <div class="circle-tile-content green">
		          <div class="circle-tile-description text-faded"> Successful Payments for <b>{{currentMonth}} {{currentYear}}</b></div>
		          <div class="circle-tile-number text-faded ">{{total_paid_count}}</div>
		          <a class="circle-tile-footer" href="payments">More Info <i class="fa fa-chevron-circle-right"></i></a>
		        </div>
		      </div>
		</div>
    <div class="col-md-6" style="margin-top:2%;">
    <!-- Stat-->
      <div class="circle-tile ">
        <a href="payments"><div class="circle-tile-heading orange"><i class="fa fa-spinner fa-fw fa-3x"></i></div></a>
        <div class="circle-tile-content orange">
          <div class="circle-tile-description text-faded"> Due Payments for <b> {{currentMonth}} {{currentYear}}</b> </div>
          <div class="circle-tile-number text-faded ">{{total_due_count}}</div>
          <a class="circle-tile-footer" href="payments">More Info <i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
</div>
</div>

<div class="col-md-6 getter">
<!-- Stat-->
      <div class="circle-tile ">
        <a href="payments"><div class="circle-tile-heading red"><i class="fa fa-times fa-fw fa-3x"></i></div></a>
        <div class="circle-tile-content red">
          <div class="circle-tile-description text-faded"> Missed Payments for <b>{{previousMonth}} {{currentYear}}</b></div>
          <div class="circle-tile-number text-faded ">{{missed_last_month_count}}</div>
          <a class="circle-tile-footer" href="payments">More Info <i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
</div>
	     <div class="col-xs-12 col-sm-9">
	                       <div class="panel panel-default">
	                           <div class="panel-heading">
	                               Notifications
	                           </div>
	                           <div class="panel-body">
	                               No new notifications for now.
	                               <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
	                           </div>
	                       </div>
	      </div>
	      	                   <div class="col-xs-12 col-sm-3">
	                       <div class="panel panel-default">
	                           <div class="panel-heading">
	                               Lapsed Accounts *
	                           </div>
	                           <div class="panel-body">

											<!-- Stat-->
											      <div class="circle-tile ">

											        <div class="circle-tile-content gray">
											          <div class="circle-tile-description text-faded"> Lapsed Member</div>
											          <div class="circle-tile-number text-faded ">{{lapsed_member_count}}</div>
											          <a class="circle-tile-footer" href="payments">More Info <i class="fa fa-chevron-circle-right"></i></a>
											        </div>
											      </div>

	                           </div>
	                       </div>
	                       	                       <div class="panel panel-default">
	                           <div class="panel-heading">
	                               Luvuyo Burial Society
	                           </div>
	                           <div class="panel-body">
	                               Payed for by <a href="http://luvuyoburial.co.za" target="_blank">Luvuyo Burial Society</a></a>
	                           </div>
	                       </div>
	              </div>

     </div>
</div>

<?php
  $this->load->view('includes/footer.php');
?>
