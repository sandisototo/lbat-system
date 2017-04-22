 <?php
  $this->load->view('includes/header');
?>
<div class="container" ng-controller="helperController">
	<div class="row">
    <center><h2>Choose Amount </h2></center>

    <br>
    <center>
    <b class="btn-group" data-toggle="buttons">

  <label class="btn btn-default  " ng-click="show_range(1, 1000)">R1000
    <input type="radio" name="options" id="option2" autocomplete="off">
    <span class="glyphicon glyphicon-ok"></span>
  </label>
  <label class="btn btn-default "  ng-click="show_range(2,2000)">R2000
    <input type="radio" name="options" id="option2" autocomplete="off">
    <span class="glyphicon glyphicon-ok"></span>
  </label>
  <label class="btn btn-default" ng-click="show_range(3,3000)">R3000
    <input type="radio" name="options" id="option2" autocomplete="off">
    <span class="glyphicon glyphicon-ok"></span>
  </label>

  <label class="btn btn-default" ng-click="show_range(4, 4000)">R4000
    <input type="radio" name="options" id="option2" autocomplete="off" checked="" ng-click="test()">
    <span class="glyphicon glyphicon-ok"></span>
  </label>
  <label class="btn btn-default" ng-click="show_range(5, 5000)">R5000
    <input type="radio" name="options" id="option2" autocomplete="off" checked="" ng-click="test()">
    <span class="glyphicon glyphicon-ok"></span>
  </label>
  <label class="btn btn-default" ng-click="show_range(6, 6000)">R6000
    <input type="radio" name="options" id="option2" autocomplete="off" checked="" ng-click="test()">
    <span class="glyphicon glyphicon-ok"></span>
  </label>
  <label class="btn btn-default" ng-click="show_range(7, 7000)">R7000
    <input type="radio" name="options" id="option2" autocomplete="off" checked="" ng-click="test()">
    <span class="glyphicon glyphicon-ok"></span>
  </label>
  <label class="btn btn-default" ng-click="show_range(8, 8000)">R8000
    <input type="radio" name="options" id="option2" autocomplete="off" checked="" ng-click="test()">
    <span class="glyphicon glyphicon-ok"></span>
  </label>
  <label class="btn btn-default" ng-click="show_range(9, 9000)">R9000
    <input type="radio" name="options" id="option2" autocomplete="off" checked="" ng-click="test()">
    <span class="glyphicon glyphicon-ok"></span>
  </label>
  <label class="btn btn-default" ng-click="show_range(10, 10000)">R10000
    <input type="radio" name="options" id="option2" autocomplete="off" checked="" ng-click="test()">
    <span class="glyphicon glyphicon-ok"></span>
  </label>
  <label class="btn btn-default" ng-click="show_range(11, 10000)">R10000 or more
    <input type="radio" name="options" id="option2" autocomplete="off" checked="" ng-click="test()">
    <span class="glyphicon glyphicon-ok"></span>
  </label>

</b>
</center>

<center><h3 ng-show="range_content.length != 0">People to help</h3></center>
  <center ng-show="range_content.length == 0 && range_content_load" >
<h3 >No Getters for the chosen amount</h2>
  <small>We can assign a person to you within 48 hours</small>
  <a href="#"class="btn btn-primary" ng-click="add_to_notification_list()">Ok</a>
  </center>
	</div>
  <div class="col-md-3" >

        <div class="input-group" ng-show="range_content.length != 0">
            <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
            <input class="form-control" id="system-search" name="q" placeholder="Enter Name or Surname" required>
            <span class="input-group-btn">
                <button type="button" id="find_amount" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
            </span>
        </div>

</div>
<div class="col-md-9">
<table class="table table-list-search" ng-show="range_content.length != 0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Contact Number</th>
                    <th style="background-color:#f4f4f4">Bank Name</th>
                    <th style="background-color:#f4f4f4">Branc Code</th>
                    <th style="background-color:#f4f4f4">Account Number</th>
                    <th style="background-color:#f4f4f4">Account Holder</th>
                    <th style="background-color:#f4f4f4">Account Type</th>
                    <th style="background-color:#fff">Amount Expected</th>
                    <th style="background-color:#fff">Due Date </th>
                    <th style="background-color:#f4f4f4">Action</th>

                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="(i, getter) in range_content" ng-if="getter.id != user_id">
                    <td>{{getter.name}}</td>
                    <td>{{getter.surname}}</td>
                    <td>{{getter.cell_number}}</td>
                    <td style="background-color:#f9f9f9">{{getter.bank}}</td>
                    <td style="background-color:#f9f9f9">{{getter.branch_code}}</td>
                    <td style="background-color:#f9f9f9">{{getter.account_number}}</td>
                    <td style="background-color:#f9f9f9">{{getter.account_holder}}</td>
                    <td style="background-color:#f9f9f9">{{getter.account_type}}</td>
                    <td style="background-color:#fff">R{{getter.amount_expected}}</td>
                    <td style="background-color:#fff">{{ due_dates[i] | date:'d MMM yyyy'}}</td>
                    <td style="background-color:#f4f4f4"><button type="submit" href="#result-modal" data-toggle="modal" ng-click="show_getter_details(getter)" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-log-in"></i> Pay</button></td>

                </tr>

            </tbody>
        </table>
</div>
  <!-- Modal -->
<div class="modal fade" id="result-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h1><i class="glyphicon glyphicon-credit-card"></i> Payment Details</h1>
            </div>
            <div class="modal-body">
              <p>Thank you for choosing <b>{{selected_getter.name}} {{selected_getter.surname}}.</b> Below are his/her banking details:</p>
              <table>
              <tbody>
                  <tr>
                      <td style="background-color:#f9f9f9">Bank Name</td>
                      <td> {{selected_getter.bank}}</td>
                  </tr>
                  <tr>
                      <td style="background-color:#f9f9f9">Branc Code</td>
                      <td> {{selected_getter.branch_code}}</td>
                  </tr>
                  <tr>
                      <td style="background-color:#f9f9f9">Account Number</td>
                      <td> {{selected_getter.account_number}} </td>
                  </tr>
                  <tr>
                      <td style="background-color:#f9f9f9">Account Holder</td>
                      <td> {{selected_getter.account_holder}}</td>
                  </tr>
                  <tr>
                      <td style="background-color:#f9f9f9">Account Type</td>
                      <td> {{selected_getter.account_type}}</td>
                  </tr>
                  <tr>
                      <td style="background-color:#f9f9f9">Deposit Amount </td>
                      <td><b> R{{selected_getter.amount_expected}}</b></td>
                  </tr>
              </tbody>
            </table>
            <br>
              <b>Contact Number:</b> {{selected_getter.cell_number}}<br>

              <small>Please make sure you make a payment before<i><b style="color:red;"> {{ modal_due_date }} </b></i></small>
              <hr>
              <h4>Your Reward</h4>
              <p>Expect to be repayed on  <b style="color:green">{{ modal_reward_date }}</b></p>
              <!--button type="button" class="btn btn-outline-primary" ng-click="calculate_reward(selected_getter.amount_expected, 60)">48 hours</button>
              <button type="button" class="btn btn-outline-primary" ng-click="calculate_reward(selected_getter.amount_expected, 100)">30 days</button-->
                        <p>Your reward amount: <b>R{{reward_amount}}</b></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary pull-left" data-dismiss="modal" ng-click="add_to_my_getters(selected_getter,reward_amount,due_date,reward_date)">Confirm</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<?php
  $this->load->view('includes/footer.php');
?>
