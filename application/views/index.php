<?php
  $this->load->view('includes/header');
?>

<div class="container" ng-controller="LoginController">


    <div class="row">

		<div class="col-md-6 helper" ng-click="helper_redirect();">
		<!-- Stat-->
		      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading purple"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
        <div class="circle-tile-content purple">
          <div class="circle-tile-description text-faded"> Total Members </div>
          <div class="circle-tile-number text-faded ">2740</div>
          <a class="circle-tile-footer" href="#">More Info <i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>

		</div>
		<div class="col-md-6 getter" ng-click="getter_redirect();">
		<!-- Stat-->
		      <div class="circle-tile ">
	        <a href="#"><div class="circle-tile-heading green"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
	        <div class="circle-tile-content green">
	          <div class="circle-tile-description text-faded"> Active Members</div>
	          <div class="circle-tile-number text-faded ">2665</div>
	          <a class="circle-tile-footer" href="#">More Info <i class="fa fa-chevron-circle-right"></i></a>
	        </div>
	      </div>
		</div>
				<div class="col-md-6 helper" ng-click="helper_redirect();">
				<!-- Stat-->
		      <div class="circle-tile ">
		        <a href="#"><div class="circle-tile-heading orange"><i class="fa fa-spinner fa-fw fa-3x"></i></div></a>
		        <div class="circle-tile-content orange">
		          <div class="circle-tile-description text-faded"> May Due Payments </div>
		          <div class="circle-tile-number text-faded ">2740</div>
		          <a class="circle-tile-footer" href="#">More Info <i class="fa fa-chevron-circle-right"></i></a>
		        </div>
		      </div>
		</div>
		<div class="col-md-6 getter" ng-click="getter_redirect();">
		<!-- Stat-->
		      <div class="circle-tile ">
		        <a href="#"><div class="circle-tile-heading red"><i class="fa fa-times fa-fw fa-3x"></i></div></a>
		        <div class="circle-tile-content red">
		          <div class="circle-tile-description text-faded">April Missed Payements</div>
		          <div class="circle-tile-number text-faded ">25</div>
		          <a class="circle-tile-footer" href="#">More Info <i class="fa fa-chevron-circle-right"></i></a>
		        </div>
		      </div>
		</div>

	     <div class="col-xs-12 col-sm-9">
	                       <div class="panel panel-default">
	                           <div class="panel-heading">
	                               Something
	                           </div>
	                           <div class="panel-body">
	                               This layout uses tabs to demonstrate what you could do with it. It probably makes more sense to use individual pages/templates in a production app.
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
											          <div class="circle-tile-number text-faded ">5</div>
											          <a class="circle-tile-footer" href="#">More Info <i class="fa fa-chevron-circle-right"></i></a>
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
