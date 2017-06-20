 <?php
  $this->load->view('includes/header');
?>
<link rel="stylesheet" href="<?php echo base_url();?>css/data-tables.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/messages.css">
<div class="container" ng-controller="MembersController">
  <div cg-busy="{promise:usersPromise,templateUrl:'<?php echo base_url();?>templates/loading.html', minDuration:700}"></div>
	<div class="row">
  <center>
		<div style="display: inline-block;">
      <h2 class="text-center">LBAT Member Management |---|  </h2>
    </div>
    <div style="display: inline-block;">
      <p data-placement="top" data-toggle="tooltip" title="Add"><button class="btn btn-default btn-xs pull-right" data-title="Add" data-toggle="modal" data-target="#add"><span class="glyphicon glyphicon-plus"></span> New Member</button></p>
    </div>
  </center>
</hr>
	</div>
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
                        <th>Action</th>
                        <th>Delete </th>
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
                        <th>Action</th>
                        <th> X Completely?</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <tr dt-rows ng-repeat="(i, member) in all_members" ng-class="{selected: $index===selected_index}">
                        <td>
                          {{i+1}}
                        </td>
                        <td>{{member.name}} {{member.surname}}</td>
                        <td>{{member.id_number}}</td>
                        <td>{{member.cell_number}}</td>
                        <td>{{formatDate(member.timestamp) | date:'d MMMM y'}}</td>
                        <!--td>........</td-->
                        <td>One Plus Nine</td>
                        <td ng-if="member.policy_status == 1" style="background-color:#5cb85c; color: white; text-align: center;">Active</td>
                        <td ng-if="member.policy_status == 0" style="background-color:#777; color: white; text-align: center;">Lapsed</td>
                        <td>
                          <p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ng-click="showEditMember(member, $index)">View/Edit <span class="glyphicon glyphicon-edit"></span></button></p>
                        </td>
                        <td>
                          <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ng-click="confirmRemoveMember(member, $index)">Delete <span class="glyphicon glyphicon-trash"></span></button></p>
                        </td>

                      </tr>
                    </tbody>
                  </table>
	  </div>
	</div>
  <!--Add modal-->
  <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
        <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title custom_align" id="Heading">Add New Member</h4>
        </div>
    <div class="modal-body">
      <form name="newInputForm">
        <div class="form-group">
        <label class="control-label" for="Name (Full name)">Name (Full name) & Surname</label>
        <div class="input-group">
            <div class="input-group-addon">
             <i class="fa fa-user">
             </i>
            </div>
            <input id="name"  name="name" type="text" ng-model="new_member.name" placeholder="Full name" class="form-control input-md" ng-required="true">
                   <div class="input-group-addon">
            </div>
            <input  id="surname" name="surname" type="text" ng-model="new_member.surname" placeholder="Surname" class="form-control input-md" ng-required="true">
           </div>
        </div>

          <!-- Text input-->
          <div class="form-group">
          <label class="control-label" for="Citizenship No.">ID Number.</label>
          <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-sticky-note-o"></i>
              </div>
              <input name="id_number" ng-model="new_member.id_number" value="" type="text" placeholder="ID Number." class="form-control input-md" ng-required="true">
             </div>
          </div>

              <!-- Multiple Radios (inline) -->
            <div class="form-group">
              <label class="control-label" for="Gender">Gender</label>
               <label class="radio-inline" for="gender0">
                 <input type="radio" name="gender" ng-model="new_member.gender"  value="Male">
                 Male
               </label>
               <label class="radio-inline" for="gender1">
                 <input type="radio" ng-model="new_member.gender" name="gender" value="Female">
                 Female
               </label>
              </div>

                <div class="form-group">
                <label class="control-label" for="Permanent Address">Address</label>
                 <textarea class="form-control" ng-model="new_member.address" value="" rows="5" name="addrees" placeholder="e.g 44123 Biko Street, Makhaza, Khayelitsha 7784" ng-required="true"></textarea>
                </div>

                  <!-- Text input-->
                  <div class="form-group">
                  <label class="control-label" for="Phone number ">Phone number </label>
                  <div style="display: flex;">
                    <div class="col-md-6 input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-phone"></i>
                        </div>
                          <input name="cell_number" ng-model="new_member.cell_number" value="" type="text" placeholder="Primary e.g 0731234567" class="form-control input-md" ng-required="true">
                      </div>

                       <div class="col-md-6 input-group othertop">
                        <div class="input-group-addon">
                            <i class="fa fa-mobile fa-1x" style="font-size: 20px;"></i>
                        </div>
                          <input ng-model="new_member.alt_cell_number" value="" name="alt_cell_number" type="text" placeholder="Secondary  e.g 0737654321" class="form-control input-md">
                       </div>
                      </div>
                </div>

                    <!-- Text input-->
                    <div class="form-group">
                    <label class="control-label" for="Email Address">Email Address</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                      <i class="fa fa-envelope-o"></i>
                        </div>
                          <input ng-model="new_member.email" value="" name="Email Address" type="text" placeholder="Email Address e.g membername@gmail.com" class="form-control input-md">
                       </div>
                    </div>

                    <!-- Multiple Radios (inline) -->
                  <!--div class="form-group">
                    <p style="color: red;" ng-if="new_member.plan_id == 0"> Policy type needs to be set. </p>
                    <label class="control-label" for="policy">Policy Type</label>
                     <label class="radio-inline" for="policy0">
                       <input type="radio" ng-model="new_member.plan_id" name="policy"  value="1">
                       Type 1
                     </label>
                     <label class="radio-inline" for="policy1">
                       <input type="radio" ng-model="new_member.plan_id" name="policy" value="2">
                       Type 2
                     </label>
                     <label class="radio-inline" for="policy2">
                       <input type="radio"  ng-model="new_member.plan_id" name="policy" value="3">
                       Type 3
                     </label>
                   </div-->
                    <hr/>
                <!-- Textarea -->
                <div class="form-group">
                <label class="control-label" for="Notes (max 200 words)">Notes (max 200 words) - Optional</label>
                 <textarea ng-model="new_member.notes" value="" class="form-control" rows="10"  name="Overview (max 200 words)" placeholder="e.g ID copy missing OR still need to update his payment"></textarea>
                </div>

            <div class="modal-footer ">
              <div class="row">
              <div class="col-md-5">
                <button type="button" class="btn btn-success btn-medium" data-dismiss="modal" ng-click="addMember(new_member)"><span class="glyphicon glyphicon-ok-sign"></span> Add</button>
              </div>
              <div class="col-md-5">
                <button type="button" class="btn btn-danger btn-medium" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
              </div>
            </div>
          </div>
      <!-- /.modal-content -->
    </div>
  </form>
        <!-- /.modal-dialog -->
      </div>
</div>
</div>
<!--End Add modal-->
<!---------------------------------------------------------------------------------------------------------------->
  <!--Edit Modal -->
  <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title custom_align" id="Heading">Edit {{selected_member.name}}'s Details</h4>
        </div>
    <div class="modal-body">
      <form name="inputForm">
        <div class="form-group">
        <label class="control-label" for="Name (Full name)">Name (Full name) & Surname</label>
        <div class="input-group">
            <div class="input-group-addon">
             <i class="fa fa-user">
             </i>
            </div>
            <input  name="name" type="text" ng-model="selected_member.name" placeholder="{{selected_member.name}}" class="form-control input-md" ng-required="true">
                   <div class="input-group-addon">
            </div>
            <input  name="surname" type="text" ng-model="selected_member.surname" placeholder="{{selected_member.surname}}" class="form-control input-md" ng-required="true">
           </div>
        </div>

          <!-- Text input-->
          <div class="form-group">
          <label class="control-label" for="Citizenship No.">ID Number.</label>
          <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-sticky-note-o"></i>
              </div>
              <input name="id_number" ng-model="selected_member.id_number" value="{{selected_member.id_number}}" type="text" placeholder="ID Number." class="form-control input-md" ng-required="true">
             </div>
          </div>

            <!-- Text input-->
            <div class="form-group">
            <label class="control-label" for="dob">Date Of Birth</label>
            <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-birthday-cake"></i>
                </div>
                <input id="dob" name="Date Of Birth" type="text" placeholder="Date Of Birth" class="form-control input-md" value="{{dob}}" disabled>
               </div>
            </div>

              <!-- Multiple Radios (inline) -->
            <div class="form-group">
              <p style="color: red;" ng-if="!selected_member.gender || (selected_member.gender) === 'male' || (selected_member.gender) === 'female'"> Gender needs to be set. </p>
              <label class="control-label" for="Gender">Gender</label>
               <label class="radio-inline" for="gender0">
                 <input type="radio" name="gender" ng-model="selected_member.gender"  id="gender0" value="Male">
                 Male
               </label>
               <label class="radio-inline" for="gender1">
                 <input type="radio" ng-model="selected_member.gender" name="gender" id="gender1" value="Female">
                 Female
               </label>
              </div>

                <div class="form-group">
                <label class="control-label" for="Permanent Address">Address</label>
                 <textarea class="form-control" ng-model="selected_member.address" value="{{selected_member.address}}" rows="5"  id="address" name="addrees" placeholder="e.g 44123 Biko Street, Makhaza, Khayelitsha 7784"></textarea>
                </div>

                  <!-- Text input-->
                  <div class="form-group">
                  <label class="control-label" for="Phone number ">Phone number </label>
                  <div style="display: flex;">
                    <div class="col-md-6 input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-phone"></i>
                        </div>
                          <input id="cell_number" name="cell_number" ng-model="selected_member.cell_number" value="{{selected_member.cell_number}}" type="text" placeholder="Primary Phone number " class="form-control input-md">
                      </div>

                       <div class="col-md-6 input-group othertop">
                        <div class="input-group-addon">
                            <i class="fa fa-mobile fa-1x" style="font-size: 20px;"></i>
                        </div>
                          <input id="alt_cell_number" ng-model="selected_member.alt_cell_number" value="{{selected_member.alt_cell_number}}" name="alt_cell_number" type="text" placeholder="Secondary Phone number " class="form-control input-md">
                       </div>
                      </div>
                </div>

                    <!-- Text input-->
                    <div class="form-group">
                    <label class="control-label" for="Email Address">Email Address</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                      <i class="fa fa-envelope-o"></i>
                        </div>
                          <input id="email" ng-model="selected_member.email" value="{{selected_member.email}}" name="Email Address" type="text" placeholder="Email Address" class="form-control input-md">
                       </div>
                    </div>

                    <!-- Multiple Radios (inline) -->
                  <!--div class="form-group">
                    <p style="color: red;" ng-if="selected_member.plan_id == 0"> Policy type needs to be set. </p>
                    <label class="control-label" for="policy">Policy Type</label>
                     <label class="radio-inline" for="policy0">
                       <input type="radio" ng-model="selected_member.plan_id" name="policy" id="policy0" value="1">
                       Type 1
                     </label>
                     <label class="radio-inline" for="policy1">
                       <input type="radio" ng-model="selected_member.plan_id" name="policy" id="policy1" value="2">
                       Type 2
                     </label>
                     <label class="radio-inline" for="policy2">
                       <input type="radio"  ng-model="selected_member.plan_id" name="policy" id="policy2" value="3">
                       Type 3
                     </label>
                   </div-->
                    <hr/>
                <!-- Textarea -->
                <div class="form-group">
                <label class="control-label" for="Notes (max 200 words)">Notes (max 200 words) - Optional</label>
                 <textarea ng-model="selected_member.notes" value="{{selected_member.notes}}" class="form-control" rows="10"  id="Notes (max 200 words)" name="Overview (max 200 words)" placeholder="e.g ID copy missing OR still need to update his payment"></textarea>
                </div>

            <div class="modal-footer">
              <div class="row">
              <div class="col-md-5">
                <button type="button" class="btn btn-success btn-medium" data-dismiss="modal" ng-click="editMember(selected_member)"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
              </div>
              <div class="col-md-5">
                <button type="button" class="btn btn-danger btn-medium" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
              </div>
              <!--Depandants table -->
              <center>
                <h4 style="margin-top: 10%;">Dependents</h4>
                <p ng-if="depandants_list.length == 0">You have no depandants</p>
              </center>
                <table ng-if="depandants_list.length != 0" class="table table-striped table-hover">
                  <thead>
                     <tr class="bg-info">
                         <th style="text-align: right;"> Name</th>
                         <th style="text-align: right;">Surname</th>
                         <th style="text-align: right;">Id Number</th>
                         <!--th></th-->
                     </tr>
                  </thead>
                <tbody> <!-- para abrir em outra aba adicionar target="_blank" -->
                   <tr ng-repeat="(i, dependent) in depandants_list">
                       <td>{{dependent.name}}</td>
                       <td>{{dependent.surname}}</td>
                       <td>{{dependent.id_number}}</td>
                       <!--td><a href="#">View</a></td-->
                   </tr>
                   <tr>
                     <td colspan="3">
                       <a href="#" class="pull-right" ng-click="redirect('members/depandants/'+selected_member.id)">View All</a>
                     </td>
                     </tr>
               </tbody>

               </table>
               <button type="button" class="btn btn-info btn-sm pull-right" ng-click="redirect('members/depandants/'+selected_member.id)" data-dismiss="modal"><span class="glyphicon glyphicon-plus-sign"></span> Add </button>
            </div>
          </div>
      <!-- /.modal-content -->
    </div>
  </form>
        <!-- /.modal-dialog -->
      </div>
</div>
</div>
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
  <div class="modal-dialog">
<div class="modal-content">
      <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title custom_align" id="Heading">Delete {{selected_member.name}}</h4>
  </div>
      <div class="modal-body">

   <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete <b>{{selected_member.name}} {{selected_member.surname}}</b> from members?</div>

  </div>
    <div class="modal-footer ">
    <button type="button" class="btn btn-success" data-dismiss="modal" ng-click="removeMember(selected_member.id, $index)"><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
  </div>
    </div>
<!-- /.modal-content -->
</div>
  <!-- /.modal-dialog -->
</div>


<?php
  $this->load->view('includes/footer.php');
?>
