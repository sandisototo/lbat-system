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
 <?php
 $this->load->view('members/add_member_modal');
 //End Add modal-->
 //Edit Modal -->
 $this->load->view('members/edit_member_modal');
 //delete modal
 $this->load->view('members/delete_member_modal');
  //footer
 $this->load->view('includes/footer.php');
?>
<script type="text/javascript">
$(function() {
  $("button.btn-reset").click(function(){
       $('input[type=file]').val('');
   });
});
</script>
