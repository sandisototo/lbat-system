<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
       <div class="modal-dialog">
     <div class="modal-content">
           <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
         <h4 class="modal-title custom_align" id="Heading">Add New Member</h4>
       </div>
   <div class="modal-body">
     <form name="newInputForm">
       <div class="form-group" ng-class="{'has-error': newInputForm.name.$dirty && newInputForm.name.$error.string || newInputForm.surname.$dirty 
       && newInputForm.surname.$error.string}">
       <label class="control-label" for="Name (Full name)">Name (Full name) & Surname</label>
       <div class="input-group">
           <div class="input-group-addon" >
            <i class="fa fa-user">
            </i>
           </div>
           <input id="name"  name="name" type="text" ng-model="new_member.name" placeholder="Full name" class="form-control input-md" ng-required="true" string>
           <div class="input-group-addon">
           </div>
           <input  id="surname" name="surname" type="text" ng-model="new_member.surname" placeholder="Surname" class="form-control input-md" ng-required="true" string>
          </div>
          <div class="row">
             <div class="col-md-6">
                <p class="help-block" ng-if="newInputForm.name.$error.string">Please enter letters only for Name</p>
             </div>
             <div class="col-md-6">
               <p class="help-block" ng-if="newInputForm.surname.$error.string">Please enter letters only For Surname</p>
             </div>
          </div>
         
          
       </div>

         <!-- Text input-->
         <div class="form-group" ng-class="{'has-error': newInputForm.id_number.$dirty && newInputForm.id_number.$error.number || newInputForm.id_number.$error.idlength}">
         <label class="control-label" for="Citizenship No.">ID Number.</label>
         <div class="input-group">
             <div class="input-group-addon">
               <i class="fa fa-sticky-note-o"></i>
             </div>
             <input name="id_number" ng-model="new_member.id_number" value="" type="text" placeholder="ID Number." class="form-control input-md" ng-required="true" idlength number>
             
            </div>
            <p class="help-block" ng-if="newInputForm.id_number.$error.number">Please enter a number</p>
            <p class="help-block" ng-if="newInputForm.id_number.$error.idlength">Only 13 numbers are allowed</p>
            
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
                <textarea class="form-control" ng-model="new_member.address" value="" rows="5" name="addrees" placeholder="e.g 44123 Biko Street, Makhaza, Khayelitsha 7784" ></textarea>
               </div>

                 <!-- Text input-->
                 <div class="form-group">
                 <label class="control-label" for="Phone number ">Phone number </label>
                 <div style="display: flex;">
                   <div class="col-md-6 input-group">
                       <div class="input-group-addon">
                         <i class="fa fa-phone"></i>
                       </div>
                         <input name="cell_number" ng-model="new_member.cell_number" value="" type="text" placeholder="Primary e.g 0731234567" class="form-control input-md" >
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
                 <label class="control-label" for="file">Attach a form - Optional</label>
                 <div class="input-group input-file" name="file_upload" model-name="new_member.file_upload">
                     <span class="input-group-btn">
                          <i class="fa fa-cloud-upload"></i>
                     </span>
                     <input type="file" name="file_upload" file-model="new_member.file_upload" class="form-control input-md" />
                     <span class="input-group-btn">
                          <button class="btn btn-warning btn-reset" type="button">Reset</button>
                     </span>
                   </div>
               </div>

               <hr/>
               <div class="form-group">
               <label class="control-label" for="Notes (max 200 words)">Notes (max 200 words) - Optional</label>
                <textarea ng-model="new_member.notes" value="" class="form-control" rows="6"  name="Overview (max 200 words)" placeholder="e.g ID copy missing OR still need to update his payment"></textarea>
               </div>

           <div class="modal-footer ">
             <div class="row">
             <div class="col-md-5">
               <button type="button" class="btn btn-success btn-medium" ng-disabled="newInputForm.$invalid"  ng-click="addMember(new_member)"><span class="glyphicon glyphicon-ok-sign"></span> Add</button>
             </div>
             <div class="col-md-5">
               <button type="button" class="btn btn-danger btn-medium" data-dismiss="modal"  ><span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
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