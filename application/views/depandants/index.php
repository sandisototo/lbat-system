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
          <p ng-if="dependents_list.length == 0">No dependents</p>
          <table ng-if="dependents_list.length != 0" class="table table-striped table-hover">
            <thead>
               <tr class="bg-info" style="background-color: #ffffff;">
                   <th>Name</th>
                   <th>Surname</th>
                   <th>Id Number</th>
                   <th></th>
               </tr>
            </thead>
          <tbody> <!-- para abrir em outra aba adicionar target="_blank" -->
             <tr ng-repeat="(i, dependent) in dependents_list">
                 <td>{{dependent.name}}</td>
                 <td>{{dependent.surname}}</td>
                 <td>{{dependent.id_number}}</td>
                 <td><a href="#">View</a></td>
             </tr>
         </tbody>
         </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
  $this->load->view('includes/footer.php');
?>
