<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
       <div class="modal-dialog">
     <div class="modal-content">
           <div class="modal-header">
             <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">×</button>
             <div style="display: flex;">
         <h4 class="modal-title custom_align" id="Heading">Edit {{selected_member.name}}'s Details</h4>
         <a href="payments/history/{{selected_member.id}}" style="font-size: x-small; margin-left: auto; margin-right: 4%;margin-top: 1%;">View/Add Payments History?</a>
       </div>

       </div>
   <div class="modal-body">
     <form name="inputForm">
       <div class="form-group" ng-class="{'has-error': inputForm.name.$dirty && inputForm.name.$error.string || inputForm.surname.$dirty 
       && inputForm.surname.$error.string}">
       <label class="control-label" for="Name (Full name)">Name (Full name) & Surname</label>
       <div class="input-group">
           <div class="input-group-addon">
            <i class="fa fa-user">
            </i>
           </div>
           <input  name="name" type="text" ng-model="selected_member.name" placeholder="{{selected_member.name}}" class="form-control input-md" ng-required="true" string>
                  <div class="input-group-addon" >
           </div>
           <input  name="surname" type="text" ng-model="selected_member.surname" placeholder="{{selected_member.surname}}" class="form-control input-md" ng-required="true" string>
          </div>
          <div class="row">
             <div class="col-md-6">
                <p class="help-block" ng-if="inputForm.name.$error.string">Please enter letters only for Name</p>
             </div>
             <div class="col-md-6">
               <p class="help-block" ng-if="inputForm.surname.$error.string">Please enter letters only For Surname</p>
             </div>
          </div>
       </div>

         <!-- Text input-->
         <div class="form-group" ng-class="{'has-error': inputForm.id_number.$dirty && inputForm.id_number.$error.number || inputForm.id_number.$error.idlength}">
         <label class="control-label" for="Citizenship No.">ID Number.</label>
         <div class="input-group">
             <div class="input-group-addon">
               <i class="fa fa-sticky-note-o"></i>
             </div>
             <input name="id_number" ng-model="selected_member.id_number" value="{{selected_member.id_number}}" type="text" placeholder="ID Number." class="form-control input-md" ng-required="true" idlength number>
            </div>
             <p class="help-block" ng-if="inputForm.id_number.$error.number">Please enter a number</p>
             <p class="help-block" ng-if="inputForm.id_number.$error.idlength">Only 13 numbers are allowed</p>
             
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
                   <hr/>

                 <center class="well" ng-if="selected_member.filename != NULL " style="display: flex;">
                   <div class="col-m-4">
                     <label class="control-label" for="file">Uploaded Form: </label>
                    </div>
                     <div class="col-md-4">
                       <p>{{ selected_member.filename }}</p>
                      </div>
                      <div class="col-md-4">
                         <a ng-if="selected_member.filename != NULL " href="<?php echo base_url(); ?>uploads/{{selected_member.filename}}" download="{{selected_member.filename}}" class="btn btn-default btn-xs" > Download </a>
                       </div>
                 </center>

               <hr ng-if="selected_member.filename != NULL "/>

               <div class="form-group">
                 <label class="control-label" for="file"> <span ng-if="selected_member.filename != NULL ">Attach a new form</span> <span ng-if="selected_member.filename == NULL ">Attach a form</span>- Optional</label>
                 <div class="input-group input-file" name="file_upload" model-name="selected_member.file_upload">
                     <span class="input-group-btn">
                          <i class="fa fa-cloud-upload"></i>
                     </span>
                     <input type="file" name="file_upload" file-model="selected_member.file_upload" class="form-control input-md" />
                     <span class="input-group-btn">
                          <button class="btn btn-warning btn-reset" type="button">Reset</button>
                     </span>
                   </div>
               </div>
                <hr/>

               <!-- Textarea -->
               <div class="form-group">
               <label class="control-label" for="Notes (max 200 words)">Notes (max 200 words) - Optional</label>
                <textarea ng-model="selected_member.notes" value="{{selected_member.notes}}" class="form-control" rows="6"   id="Notes (max 200 words)" name="Overview (max 200 words)" placeholder="e.g ID copy missing OR still need to update his payment"></textarea>
               </div>

           <div class="modal-footer">
             <div class="row">
             <div class="col-md-5">
               <button type="button" class="btn btn-success btn-medium" ng-disabled="inputForm.$invalid" ng-click="editMember(selected_member)"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
             </div>
             <div class="col-md-5">
               <button type="button" class="btn btn-danger btn-medium" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
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
              <button type="button" class="btn btn-info btn-sm pull-right" ng-click="redirect('members/depandants/'+selected_member.id)" data-dismiss="modal"><span class="glyphicon glyphicon-plus-sign"></span> Add </button>
           </div>
         </div>
     <!-- /.modal-content -->
   </div>
 </form>
       <!-- /.modal-dialog -->
     </div>
</div>
</div>