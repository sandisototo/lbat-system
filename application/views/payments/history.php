<?php
 $this->load->view('includes/header');
?>
<div class="container" ng-controller="PaymentsHistoryController" ng-init="new_payment.user_id = <? echo $member['id']?>">
  <div class="row" ng-init="getPaymentsHistory(<? echo $member['id']?>)">
    <center>
      <div style="display: inline-block;">
        <h2 class="text-center">LBAT Payments Management - {{currentYear}}</h2>
        <h4 style="color: #3073ad;"><? echo $member['name'].' '.$member['surname']?>'s Payments History</h4>
      </div>
    </center>
    <hr/>
    <div cg-busy="{promise:paymentPromise,templateUrl:'<?php echo base_url();?>templates/loading.html'}"></div>
    <div class="col-md-6">
      <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Load previous payment for <small><? echo $member['name'].' '.$member['surname']?></small></h3>
      </div>
      <div class="panel-body">
        <form name="paymentForm">
          <div class="row" style="margin-bottom: 2%;">
            <div class="col-xs-12">
          <label class="control-label" for="ship_time">Select Date: <small style="color: #d9534f;">when was the payment made?</small></label>
          <div class="input-group registration-date-time">
            <span class="input-group-addon" >Year</span>
              <select type="text" class="form-control" id="year" name="year" ng-model="new_payment.date_year" ng-required="true">
                  <option value="2015" >2015</option>
                  <option value="2016">2016</option>
                  <option value="2017">2017</option>
                </select>
            <span class="input-group-addon" >Month</span>
              <select type="text" class="form-control" id="month" name="month" ng-model="new_payment.date_month" ng-required="true">
                  <option value="01">Jan</option>
                  <option value="02">Feb</option>
                  <option value="03">Mar</option>
                  <option value="04">Apr</option>
                  <option value="05">May</option>
                  <option value="06">Jun</option>
                  <option value="07">July</option>
                  <option value="08">Aug</option>
                  <option value="09">Sep</option>
                  <option value="10">Oct</option>
                  <option value="11">Nov</option>
                  <option value="12">Dec</option>
                </select>
                <span class="input-group-addon" >Day</span>
                  <select type="text" class="form-control" id="day" name="day" ng-model="new_payment.date_day" ng-required="true">
                    <option value="01">1</option>
                    	<option value="02">2</option>
                    	<option value="03">3</option>
                    	<option value="04">4</option>
                    	<option value="05">5</option>
                    	<option value="06">6</option>
                    	<option value="07">7</option>
                    	<option value="08">8</option>
                    	<option value="09">9</option>
                    	<option value="10">10</option>
                    	<option value="11">11</option>
                    	<option value="12">12</option>
                    	<option value="13">13</option>
                    	<option value="14">14</option>
                    	<option value="15">15</option>
                    	<option value="16">16</option>
                    	<option value="17">17</option>
                    	<option value="18">18</option>
                    	<option value="19">19</option>
                    	<option value="20">20</option>
                    	<option value="21">21</option>
                    	<option value="22">22</option>
                    	<option value="23">23</option>
                    	<option value="24">24</option>
                    	<option value="25">25</option>
                    	<option value="26">26</option>
                    	<option value="27">27</option>
                    	<option value="28">28</option>
                    	<option value="29">29</option>
                    	<option value="30">30</option>
	                    <option value="31">31</option>
                    </select>
            </div>
          </div>
          <div class="col-xs-12 col-xs-4">
            <!-- Text input-->
            <br/>
            <div class="form-group">
            <label class="control-label">Amount:</label>
            <div class="input-group">
                <div class="input-group-addon">
                  R
                </div>
                <input type="text" class="form-control input-md" value="200" disabled>
               </div>
            </div>
          </div>
          </div>
          <button type="button" class="btn btn-primary btn-sm" ng-click="loadPayment(new_payment)"><span class="glyphicon glyphicon-plus-sign"></span> Load Payment</button>
          <button type="button" class="btn btn-danger btn-sm" ng-click="redirect('members')"><span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
        </form>
      </div>
    </div>

    </div>
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Payment History of <small><? echo $member['name'].' '.$member['surname']?></small> </h3>
        </div>
        <div class="panel-body">
          <p ng-if="payment_histroy.length == 0">No payment has been made</p>
          <table ng-if="payment_histroy.length != 0" class="table table-striped table-hover">
            <thead>
               <tr class="bg-info" style="background-color: #ffffff;">
                 <th>#</th>
                   <th>Date</th>
                   <th>Amount</th>
                   <th>Status</th>
                   <th></th>
               </tr>
            </thead>
          <tbody> <!-- para abrir em outra aba adicionar target="_blank" -->
             <tr ng-repeat="(i, payment) in payment_histroy">
                <td>{{i+1}}</td>
                 <td>{{formatDate(payment.timestamp) | date:'d MMMM y'}}</td>
                 <td>{{payment.user_plan_amount}}</td>
                 <td ng-if="payment.status == 1" style="color: #5cb85c;">Paid</td>
                 <td ng-if="payment.status == 0" style="color: #f0ad4e;">Reverted/Cancelled</td>
                 <!--td><a href="#">View</a></td-->
                 <!--td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ng-click="showEditDepandant(dependent, $index)">View/Edit <span class="glyphicon glyphicon-edit"></span></button></p></td-->
                 <td>
                   <p data-placement="top" data-toggle="tooltip" title="Delete"><button ng-if="payment.status == 1" class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ng-click="confirmRevertPayment(payment, $index)">Revert <span class="glyphicon glyphicon-remove"></span></button></p>
                 </td>
             </tr>
         </tbody>
         </table>
        </div>
      </div>
    </div>
  </div>
<!-- Delete Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
  <div class="modal-dialog">
<div class="modal-content">
      <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title custom_align" id="Heading">Revert payment dated: {{formatDate(selected_payment.timestamp) | date:'d MMMM y'}}</h4>
  </div>
      <div class="modal-body">

   <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to revert this payment that was made on: <b>{{formatDate(selected_payment.timestamp) | date:'d MMMM y'}}</b> from payment history?</div>

  </div>
    <div class="modal-footer ">
    <button type="button" class="btn btn-success" data-dismiss="modal" ng-click="revertPayment(selected_payment.user_id, selected_payment.id, selected_payment.timestamp, $index)"><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
  </div>
    </div>
<!-- /.modal-content -->
</div>
  <!-- /.modal-dialog -->
</div>
</div>
<?php
  $this->load->view('includes/footer.php');
?>
