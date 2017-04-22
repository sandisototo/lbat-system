<?php
  $this->load->view('includes/header');
?>
<link rel="stylesheet" href="<?php echo base_url();?>css/getter.css" >
<div class="container" ng-controller="getterController">
	<div class="row">
    <center><h2>My Rewards</h2><small>Reward status</small></center>

    		<section class="content">

    			<div class="col-md-8 col-md-offset-2">
    				<div class="panel panel-default" style="overflow: auto;">
    					<div class="panel-body">

    						<div class="pull-right">
    							<div class="btn-group">
                      <button type="button" class="btn btn-default btn-filter" data-target="new">New</button>
                    <button type="button" class="btn btn-warning btn-filter" data-target="pendiente">Pending</button>
    								<button type="button" class="btn btn-success btn-filter" data-target="pagado">Recieved</button>
    								<button type="button" class="btn btn-danger btn-filter" data-target="cancelado">Overdue</button>

    							</div>
    						</div>
    						<div class="table-container">
                  <table class="table table-filter" >
                    <!--If -->
                    <tbody ng-show="new_content.length != 0">
                      <tr data-status="new" class="selected-row" ng-repeat="transaction in new_content" href="#result-modal" data-toggle="modal" ng-click="show_transaction(transaction)">
                        <td>
                          <div class="media">
                            <div class="media-body">
                              <span class="media-meta pull-right">{{transaction.due_date | date : "fullDate"}}</span>
                                <h4 class="title" style="color:black;">
                                  R{{transaction.amount_paid}}
                                  <span class="pull-right pendiente" style="color:black;">(Waiting to be selected by helper)</span>
                              </h4>
                              <p class="summary">No one has selected you as a getter yet. Please wait.
                              </p>
                              <!--a class="btn btn-default btn-xs" href="#"><span class="glyphicon glyphicon-delete"></span> Reverse/Cancel</a-->
                            </div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                    <!--Else -->
                    <tbody ng-show="new_content.length == 0">
                      <tr data-status="new"  >
                        <td>
                            <center>  No <b>NEW</b> transactions yet. </center>
                        </td>
                      </tr>
                    </tbody>

                    <!--if -->
                    <tbody ng-show="pending_content.length !=0">

                      <tr data-status="pendiente" class="selected-row" ng-repeat="transaction in pending_content"   data-toggle="modal" ng-click="show_transaction(transaction)">
                        <td>
                          <div class="media">
                            <div class="media-body">
                              <span class="media-meta pull-right">{{transaction.due_date | date : "fullDate"}}</span>
                              <h4 class="title" style="color:orange;">
                                  R{{transaction.amount_paid}}
                                  <span class="pull-right pendiente">(Waiting for payment)</span>
                              </h4>
                              <p class="summary"><b>{{transaction.name}} {{transaction.surname}}</b> promised to deposit this money. <br>
                                <b>Cell number:</b> {{transaction.cell_number}}
                              </p>
                              <a class="btn btn-success btn-xs" href="#" ng-click="update_transaction(transaction)"><span class="glyphicon glyphicon-ok"></span> Recieved</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                    <!--Else -->
                    <tbody ng-show="pending_content.length == 0">
                      <tr data-status="pendiente" class="selected-row" >
                        <td>
                              <center> No <b>PENDING</b> transactions </center>
                        </td>
                      </tr>
                    </tbody>

                    <!--If -->
                    <tbody ng-show="paid_content.length != 0">
                      <tr data-status="pagado" class="selected-row" ng-repeat="transaction in paid_content"  ng-click="show_transaction(transaction)">
                              <td>
          											<div class="media">
          												<div class="media-body">
          													<span class="media-meta pull-right">{{transaction.due_date | date : "fullDate"}}</span>
          													<h4 class="title" style="color:#5cb85c;">
          														  R{{transaction.amount_paid}}
          																<span class="pull-right pendiente" style="color:#5cb85c;">(This transaction has been completed successfuly)</span>
          													</h4>
          													             <p class="summary"><b>{{transaction.name}} {{transaction.surname}}</b> paid this money into  your account. <br>
                                    </p>

          												</div>
          											</div>
          										</td>
          									</tr>
                    </tbody>
                    <!--Else -->
                    <tbody ng-show="paid_content.length == 0">
                      <tr data-status="pagado"  >
                        <td>
                            <center>  No <b>PAID</b> transactions yet. </center>
                        </td>
                      </tr>
                    </tbody>

                    <!--If -->
                    <tbody ng-show="over_due_content.length != 0">
                      <tr ng-repeat="transaction in over_due_content" data-status="cancelado" class="selected-row"  ng-click="show_transaction(transaction)">
                        <td>
                          <div class="media">
                            <div class="media-body">
                              <span class="media-meta pull-right">{{transaction.due_date | date : "fullDate"}}</span>
                              <h4 class="title" style="color:#c12e2a;">
                                R{{transaction.amount_paid}}
                                    <span class="pull-right pendiente" style="color:#c12e2a;">(This is overdue and waiting for admin to resolve it)</span>
                              </h4>
                                           <p class="summary"><b>{{transaction.name}} {{transaction.surname}}</b> could not deposit this money into your account before the due date. <br>
                              </p>

                            </div>
                          </div>
                        </td>
    									</tr>
                    </tbody>
                    <!--Else -->
                    <tbody ng-show="over_due_content.length == 0">
                      <tr data-status="cancelado"  >
                        <td>
                            <center>  No <b>OVER DUE</b> transactions yet. </center>
                        </td>
                      </tr>
                    </tbody>

                    </table>

    						</div>
    					</div>
    				</div>
    			</div>
    		</section>
</div>
</div>
<?php
  $this->load->view('includes/footer.php');
?>
<script src="<?php echo base_url();?>js/getter.js"></script>
