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
   <button type="button" class="btn btn-success" data-dismiss="modal" ng-click="removeMember(selected_member.id, $index)"><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
   <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
 </div>
   </div>
<!-- /.modal-content -->
</div>
 <!-- /.modal-dialog -->
</div>