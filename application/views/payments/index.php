 <?php
  $this->load->view('includes/header');
?>
<link rel="stylesheet" href="<?php echo base_url();?>css/data-tables.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/payments.css">
<div class="container" ng-controller="PaymentsController">
  <div cg-busy="{promise:usersPromise,templateUrl:'<?php echo base_url();?>templates/loading.html', minDuration:700}"></div>
   <div class="row"  style="margin-top:20px;">
     <h2 class="text-center">Payments Management - {{currentMonth}} {{currentYear}}</h2>

          <div class=" well well-sm  bg-white borderZero"  uib-dropdown >
              <div class="btn-group date-block btn-group-justified font-small dropdown" data-toggle="buttons">
                  <label href="#home" data-toggle="tab" ng-click="activateTab('a')" ng-class="{ active_tab: active.a }" class="btn btn-default  next font-small semiBold" title="Proceess" style="font-size:12px; border-radius:0;">
                     Process Payments
                  </label>
                  <label  href="#profile" data-toggle="tab" ng-click="activateTab('b')" ng-class="{ active_tab: active.b }" class="btn btn-default previous text-right font-small semiBold" title="Paid" style="font-size:12px;">
                      Paid Members
                  </label>
                  <label href="#contact" data-toggle="tab" ng-click="activateTab('c')" ng-class="{ active_tab: active.c }" class="btn date-buttons btn-default text-right semiBold" style="font-size:12px;" >
                      Still To Pay
                  </label>
                  <label  href="#education" data-toggle="tab" ng-click="activateTab('d')" ng-class="{ active_tab: active.d }" class="btn date-buttons btn-default text-right semiBold" style="font-size:12px;" >
                     Lapsed
                  </label>
                  <label href="#skills" data-toggle="tab"  ng-click="activateTab('e')" ng-class="{ active_tab: active.e }" class="btn date-buttons btn-default text-right semiBold" style="font-size:12px;">
                      Extras
                  </label>
              </div>

          </div>
            <div id="myTabContent" class="tab-content">
                  <div class="tab-pane fade active in" id="home">

                          <center> <h4>Process Payments</h4></center>
                          <hr/>

                    <div class="row">
                        <div class="dual-list list-left col-md-5">
                          <!--button class="btn btn-default btn-sm pull-left" ng-if="all_members.length == 0">
                              <span class="glyphicon glyphicon-download"></span>
                              Load More
                          </button-->
                            <div class="well">
                                <div class="row">
                                  <div class="col-md-12" >
                                    <p style="text-align:center;">Still To Pay</p>
                                  </div>
                                </div>
                              <div class="row">
                                  <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-addon glyphicon glyphicon-search"></span>
                                        <input ng-model="q" class="form-control pull-right" placeholder="Search"/>

                                    </div>
                                    <center>
                                    <small>"search if you are looking for a specific member."</small> <br/>
                                  </center>
                                </div>
                              </div>
                                <p ng-if="all_members.length == 0" style="text-align:center;"> "No unpaid users found!" </p>
                                <!--pre>{{q}}</pre-->
                                <ul class="list-group" ng-if="all_members.length != 0">
                                    <li
                                    ng-init="member.isSel = false"
                                    ng-repeat="(i, member) in all_members | filter: q| startFrom:currentPage*pageSize | limitTo:pageSize"
                                    ng-class="{sel : member.isSel}"
                                    ng-class-def="'def'"
                                    class="list-group-item"
                                    style="text-align:left; cursor:pointer;font-size: x-small;"
                                    ng-click="togglePaidSelection(member, $index); member.isSel = !member.isSel">
                                    {{member.name}} {{member.surname}} | {{member.id_number}}
                                    <span ng-class="{checkmark : member.isSel}" class="pull-right">
                                        <div ng-class="{checkmark_circle : member.isSel}"></div>
                                        <div ng-class="{checkmark_stem : member.isSel}"></div>
                                        <div ng-class="{checkmark_kick : member.isSel}"></div>
                                    </span>
                                  </li>
                                </ul>
                                <button ng-disabled="currentPage == 0" ng-click="currentPage=currentPage-1; paidMembers = []">
                                    Previous
                                </button>
                                {{currentPage+1}}/{{numberOfPages()}}
                                <button ng-disabled="currentPage >= getData().length/pageSize - 1" ng-click="currentPage=currentPage+1; paidMembers = []">
                                    Next
                                </button>
                            </div>
                        </div>

                        <div class="list-arrows col-md-1 text-center">
                          <span class="glyphicon glyphicon-chevron-left"></span>

                          <span class="glyphicon glyphicon-chevron-right"></span>
                        </div>

                        <div class="dual-list list-right col-md-5">
                            <div class="well">
                              <div class="row">
                                  <div class="col-md-12" >
                                    <p style="text-align:center">Paid</p>
                                  </div>
                              </div>
                              <center>
                              <small ng-if="paidMembers.length == 0" style="text-align:center;">waiting to be loaded...</small>
                                <center>

                                <ul ng-if="paidMembers.length != 0" class="list-group">
                                    <li ng-repeat="(i, paid_member) in paidMembers"  class="list-group-item">{{paid_member.name}} {{paid_member.surname}} | {{paid_member.id_number}}</li>
                                </ul>
                                <button ng-if="paidMembers.length != 0" class="btn btn-default btn-sm pull-right" ng-click="confirmPaid(paidMembers)">
                                    <span class="glyphicon glyphicon-ok"></span>
                                    Confirm
                                </button>
                            </div>
                        </div>

                	</div>
                   </div>
              <div class="tab-pane fade" id="profile">
                <div class="col-md-12">
                    <center> <h4>Paid Members</h4> </center>
                        <div class="row">
                            <div class="col-md-12">
                                  <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%" datatable="ng">
                                    <thead>
                                      <tr>
                                        <th>
                                          No.
                                      </th>
                                        <th>Name</th>
                                        <th>ID Number</th>
                                        <th>Contact No.</th>
                                        <th>Joined</th>
                                        <th>Cover/Plan</th>
                                        <!--th>No. of Dependants</th-->
                                        <th>Plolicy Status</th>
                                        <!--th>Action</th>
                                        <th>Delete </th-->
                                      </tr>
                                    </thead>

                                    <tfoot>
                                      <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>ID Number</th>
                                        <th>Contact No.</th>
                                        <th>Joined</th>
                                        <th>Cover/Plan</th>
                                        <!--th>No. of Dependents</th-->
                                        <th>Plolicy Status</th>
                                        <!--th>Action</th>
                                        <th> X Completely?</th-->
                                      </tr>
                                    </tfoot>
                                    <tbody>
                                      <tr dt-rows ng-repeat="(i, paid_member) in all_paid_members">
                                        <td>
                                          {{i+1}}
                                        </td>
                                        <td>{{paid_member.name}} {{paid_member.surname}}</td>
                                        <td>{{paid_member.id_number}}</td>
                                        <td>{{paid_member.cell_number}}</td>
                                        <td>{{formatDate(paid_member.timestamp) | date:'d MMMM y'}}</td>
                                        <!--td>........</td-->
                                        <td>One Plus Nine</td>
                                        <td style="background-color:#5cb85c; color: white; text-align: center;">Paid</td>
                                      </tr>
                                    </tbody>
                                  </table>
                    </div>
                  </div>
              </div>
              </div>
            <div class="tab-pane fade" id="contact">
              <div class="col-md-12">
                  <center><h4>Still to Pay</h4>
                    <button id="post_message" class="btn btn-default btn-xs" type="button" ng-click="">Send Reminder To All</button>
                  </center>
                  <div class="row">
                      <div class="col-md-12">
                            <table id="datatable2" class="table table-striped table-bordered" cellspacing="0" width="100%" datatable="ng">
                              <thead>
                                <tr>
                                  <th>
                                    No.
                                </th>
                                  <th>Name</th>
                                  <th>ID Number</th>
                                  <th>Contact No.</th>
                                  <th>Joined</th>
                                  <th>Cover/Plan</th>
                                  <!--th>No. of Dependants</th-->
                                  <th>Plolicy Status</th>
                                  <!--th>Action</th>
                                  <th>Delete </th-->
                                </tr>
                              </thead>

                              <tfoot>
                                <tr>
                                  <th>No.</th>
                                  <th>Name</th>
                                  <th>ID Number</th>
                                  <th>Contact No.</th>
                                  <th>Joined</th>
                                  <th>Cover/Plan</th>
                                  <!--th>No. of Dependents</th-->
                                  <th>Plolicy Status</th>
                                  <!--th>Action</th>
                                  <th> X Completely?</th-->
                                </tr>
                              </tfoot>
                              <tbody>
                                <tr dt-rows ng-repeat="(i, still_to_pay_member) in all_members">
                                  <td>
                                    {{i+1}}
                                  </td>
                                  <td>{{still_to_pay_member.name}} {{still_to_pay_member.surname}}</td>
                                  <td>{{still_to_pay_member.id_number}}</td>
                                  <td>{{still_to_pay_member.cell_number}}</td>
                                  <td>{{formatDate(still_to_pay_member.timestamp) | date:'d MMMM y'}}</td>
                                  <!--td>........</td-->
                                  <td>One Plus Nine</td>
                                  <td style="background-color:#f0ad4e; color: white; text-align: center;">Waiting For Payment</td>
                                </tr>
                              </tbody>
                            </table>
              </div>
            </div>
            </div>
            </div>
            <div class="tab-pane fade" id="education">
              <div class="col-md-6 col-md-offset-5">
                  <h4>Lapsed Members</h4>
                  none yet
              </div>
            </div>
             <div class="tab-pane fade" id="skills">
               <div class="col-md-6 col-md-offset-5">
                   <h4>Extras</h4>
                   Whatever you need..
             </div>
            </div>
      </div>
      </div>
  </div>

<?php
  $this->load->view('includes/footer.php');
?>
