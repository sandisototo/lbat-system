<?php
  $this->load->view('includes/header');
?>
<link rel="stylesheet" href="<?php echo base_url();?>css/getter.css" >
<div class="container" ng-controller="helperController">
	<div class="row">
    <center><h2>My Help History</h2><small>Transaction history</small></center>

    		<section class="content">

    			<div class="col-md-8 col-md-offset-2">
    				<div class="panel panel-default" style="overflow: auto;">
    					<div class="panel-body">

    						<div class="pull-right">
    							<div class="btn-group">
                    <button type="button" class="btn btn-warning btn-filter" data-target="pendiente">Pending</button>
    								<button type="button" class="btn btn-success btn-filter" data-target="pagado">Paid</button>
    								<button type="button" class="btn btn-danger btn-filter" data-target="cancelado">Overdue</button>

    							</div>
    						</div>
    						<div class="table-container">
                  <table class="table table-filter">
                    <!--if -->
                    <tbody ng-show="pending_content.length !=0">
                    <tr ng-repeat="transaction in pending_content"  data-status="pendiente" class="selected-row" href="#result-modal" data-toggle="modal" ng-click="show_transaction(transaction)">
                      <td>
                        <div class="media">
                          <div class="media-body">
                            <span class="media-meta pull-right">{{transaction.due_date | date : "fullDate"}}</span>
                            <h4 class="title" style="color:orange;">
                              R{{transaction.amount_paid}}
                                  <span class="pull-right pendiente">(Waiting for {{transaction.name}} to confirm payment)</span>
                            </h4>
                                         <p class="summary">You promised to promised to deposit <i>R{{transaction.amount_paid}}</i> into <b>{{transaction.name}} {{transaction.surname}}'s</b> account. <br>
                            </p>

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

                    <!--if -->
                    <tbody ng-show="paid_content.length !=0">
                      <tr data-status="pagado" class="selected-row" ng-repeat="transaction in paid_content" ng-if="transaction.status == 2" href="#result-modal" data-toggle="modal" ng-click="show_transaction(transaction)">
                        <td>
                          <div class="media">
                            <div class="media-body">
                              <span class="media-meta pull-right">{{transaction.due_date | date : "fullDate"}}</span>
                              <h4 class="title" style="color:#5cb85c;">
                                R{{transaction.amount_paid}}
                                    <span class="pull-right pendiente" style="color:#5cb85c;">(This transaction has been completed successfuly)</span>
                              </h4>
                                           <p class="summary">You paid this money into <b>{{transaction.name}} {{transaction.surname}}'s</b> account. <br>
                              </p>

                            </div>
                          </div>
                        </td>
                        </tr>
                    </tbody>
                    <!--Else -->
                    <tbody ng-show="paid_content.length == 0">
                      <tr data-status="pagado" class="selected-row" >
                        <td>
                              <center> No <b>PAID</b> transactions yet. </center>
                        </td>
                      </tr>
                    </tbody>

                    <!--if -->
                    <tbody ng-show="over_due_content.length !=0">
                      <tr data-status="cancelado" class="selected-row" ng-repeat="transaction in over_due_content" ng-if="transaction.status == 2" href="#result-modal" data-toggle="modal" ng-click="show_transaction(transaction)">
                        <td>
                          <div class="media">
                            <div class="media-body">
                              <span class="media-meta pull-right">{{transaction.due_date | date : "fullDate"}}</span>
                              <h4 class="title" style="color:#5cb85c;">
                                  R{{transaction.amount_paid}}
                                    <span class="pull-right pendiente" style="color:#5cb85c;">(This transaction has been completed successfuly)</span>
                              </h4>
                                           <p class="summary">You paid this money into <b>{{transaction.name}} {{transaction.surname}}'s</b> account. <br>
                              </p>

                            </div>
                          </div>
                        </td>
                        </tr>
                    </tbody>
                    <!--Else -->
                    <tbody ng-show="over_due_content.length == 0">
                      <tr data-status="cancelado" class="selected-row" >
                        <td>
                              <center> No <b>OVER DUE</b> transactions yet. </center>
                        </td>
                      </tr>
                    </tbody>


                </table>
    						</div>
                <small><i>Remember: <br>A getter will only confirm a payment once the money has been deposited into their account. <br>Please make sure to deposit the money before the <b>due date</b>.</i></small>
    					</div>
    				</div>
    			</div>
    		</section>
        <!-- Modal -->
      <div class="modal fade" id="result-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header modal-header-primary">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h1><i class="glyphicon glyphicon-credit-card"></i> Payment Details</h1>
                  </div>
                  <div class="modal-body">
                    <p>Thank you for choosing <b>{{selected_transaction.name}} {{selected_transaction.surname}}</b> below are his/her banking details:</p>
                    <table>
                    <tbody>
                        <tr>
                            <td style="background-color:#f9f9f9">Bank Name</td>
                            <td> {{selected_transaction.bank}}</td>
                        </tr>
                        <tr>
                            <td style="background-color:#f9f9f9">Branc Code</td>
                            <td> {{selected_transaction.branch_code}}</td>
                        </tr>
                        <tr>
                            <td style="background-color:#f9f9f9">Account Number</td>
                            <td> {{selected_transaction.account_number}} </td>
                        </tr>
                        <tr>
                            <td style="background-color:#f9f9f9">Account Holder</td>
                            <td> {{selected_transaction.account_holder}}</td>
                        </tr>
                        <tr>
                            <td style="background-color:#f9f9f9">Account Type</td>
                            <td> {{selected_transaction.account_type}}</td>
                        </tr>
                        <tr>
                            <td style="background-color:#f9f9f9">Deposit Amount </td>
                            <td><b> R{{selected_transaction.amount_paid}} </b></td>
                        </tr>
                    </tbody>
                  </table>
                  <br>
                    <b>Contact Number:</b> {{selected_transaction.cell_number}}  <br>

                    <small>Please make sure you make a payment before <i>{{selected_transaction.due_date}}</i></small>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  </div>
              </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
</div>
</div>
<?php
  $this->load->view('includes/footer.php');
?>
<script src="<?php echo base_url();?>js/helper.js"></script>
