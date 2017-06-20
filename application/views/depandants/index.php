<?php
 $this->load->view('includes/header');
?>
<div class="container" ng-controller="MembersController" ng-init="new_dependent.member_id = <? echo $member['id']?>">
  <div class="row" ng-init="getDepandants(<? echo $member['id']?>)">
    <center>
      <div style="display: inline-block;">
        <h2 class="text-center">LBAT Member Management |---| Dependents</h2>
        <h4 style="color: #71a1bc;"><? echo $member['name'].' '.$member['surname']?>'s Dependants</h4>
      </div>
    </center>
    <hr/>
    <div class="col-md-6">
      <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">New Dependent Details</h3>
      </div>
      <div class="panel-body">
        <form name="depForm">
          <div class="form-group">
          <p class="" for="Name (Full name)">Name (Full name) & Surname</p>
          <div class="input-group">
              <div class="input-group-addon">
               <i class="fa fa-user">
               </i>
              </div>
              <input  name="name" type="text" ng-model="new_dependent.name" placeholder="Name" class="form-control input-md" ng-required="true">
                     <div class="input-group-addon">
              </div>
              <input  name="surname" type="text" ng-model="new_dependent.surname" placeholder="Surname" class="form-control input-md" ng-required="true">
             </div>
          </div>

            <!-- Text input-->
            <div class="form-group">
            <p for="Citizenship No.">ID Number.</p>
            <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-sticky-note-o"></i>
                </div>
                <input name="id_number" ng-model="new_dependent.id_number" value="{{selected_member.id_number}}" type="text" placeholder="ID Number." class="form-control input-md" ng-required="true">
               </div>
            </div>

              <!-- Text input-->
              <!--div class="form-group">
              <p for="dob">Date Of Birth</p>
              <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-birthday-cake"></i>
                  </div>
                  <input id="dob" name="Date Of Birth" type="text" placeholder="Date Of Birth" class="form-control input-md" value="{{dob}}" disabled>
                 </div>
              </div-->

                <!-- Multiple Radios (inline) -->
              <div class="form-group">
                <p for="Gender">Gender</p>
                 <label class="radio-inline" for="gender0">
                   <input type="radio" name="gender" ng-model="new_dependent.gender"  id="gender0" value="Male" ng-required="true">
                   Male
                 </label>
                 <label class="radio-inline" for="gender1">
                   <input type="radio" ng-model="new_dependent.gender" name="gender" id="gender1" value="Female"  ng-required="true">
                   Female
                 </label>
                </div>
                <button type="button" class="btn btn-info btn-sm" ng-click="addDepandant(new_dependent)"><span class="glyphicon glyphicon-plus-sign"></span> Add</button>
                <button type="button" class="btn btn-danger btn-sm" ng-click="redirect('members')"><span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
        </form>
      </div>
    </div>

    </div>
    <div class="col-md-6">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Dependents list</h3>
        </div>
        <div class="panel-body">
          <p ng-if="depandants_list.length == 0">No dependents</p>
          <table ng-if="depandants_list.length != 0" class="table table-striped table-hover">
            <thead>
               <tr class="bg-info" style="background-color: #ffffff;">
                 <th>#</th>
                   <th>Name</th>
                   <th>Surname</th>
                   <th>Id Number</th>
                   <th></th>
               </tr>
            </thead>
          <tbody> <!-- para abrir em outra aba adicionar target="_blank" -->
             <tr ng-repeat="(i, dependent) in depandants_list">
                <td>{{i+1}}</td>
                 <td>{{dependent.name}}</td>
                 <td>{{dependent.surname}}</td>
                 <td>{{dependent.id_number}}</td>
                 <!--td><a href="#">View</a></td-->
                 <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ng-click="showEditDepandant(dependent, $index)">View/Edit <span class="glyphicon glyphicon-edit"></span></button></p></td>
                 <td>
                   <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ng-click="confirmRemoveDepandant(dependent, $index)">Delete <span class="glyphicon glyphicon-trash"></span></button></p>
                 </td>
             </tr>
         </tbody>
         </table>
        </div>
      </div>
    </div>
  </div>

  <!--Edit Modal -->
  <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title custom_align" id="Heading">Edit Depandant Details</h4>
        </div>
    <div class="modal-body">
      <form name="editDepInputForm">
        <div class="form-group">
        <label class="control-label" for="Name (Full name)">Name (Full name) & Surname</label>
        <div class="input-group">
            <div class="input-group-addon">
             <i class="fa fa-user">
             </i>
            </div>
            <input  name="name" type="text" ng-model="selected_depandant.name" placeholder="{{selected_depandant.name}}" class="form-control input-md" ng-required="true">
                   <div class="input-group-addon">
            </div>
            <input  name="surname" type="text" ng-model="selected_depandant.surname" placeholder="{{selected_depandant.surname}}" class="form-control input-md" ng-required="true">
           </div>
        </div>

          <!-- Text input-->
          <div class="form-group">
          <label class="control-label" for="Citizenship No.">ID Number.</label>
          <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-sticky-note-o"></i>
              </div>
              <input name="id_number" ng-model="selected_depandant.id_number" value="{{selected_depandant.id_number}}" type="text" placeholder="ID Number." class="form-control input-md" ng-required="true">
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
              <p style="color: red;" ng-if="!selected_depandant.gender || (selected_depandant.gender) === 'male' || (selected_depandant.gender) === 'female'"> Gender needs to be set. </p>
              <label class="control-label" for="Gender">Gender</label>
               <label class="radio-inline" for="gender0">
                 <input type="radio" name="gender" ng-model="selected_depandant.gender"  id="gender0" value="Male">
                 Male
               </label>
               <label class="radio-inline" for="gender1">
                 <input type="radio" ng-model="selected_depandant.gender" name="gender" id="gender1" value="Female">
                 Female
               </label>
              </div>
            <div class="modal-footer">
              <div class="row">
              <div class="col-md-5">
                <button type="button" class="btn btn-success btn-sm" data-dismiss="modal" ng-click="editDepandant(selected_depandant)"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
              </div>
              <div class="col-md-5">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
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

<!-- Delete Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
  <div class="modal-dialog">
<div class="modal-content">
      <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title custom_align" id="Heading">Delete {{selected_depandant.name}}</h4>
  </div>
      <div class="modal-body">

   <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete <b>{{selected_depandant.name}} {{selected_depandant.surname}}</b> from depandants?</div>

  </div>
    <div class="modal-footer ">
    <button type="button" class="btn btn-success" data-dismiss="modal" ng-click="removeDepandant(selected_depandant.member_id, selected_depandant.id, $index)"><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
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
