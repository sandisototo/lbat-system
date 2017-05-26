<?php
 $this->load->view('includes/header');
?>
<link rel="stylesheet" href="<?php echo base_url();?>css/messages.css">
<div class="container" ng-controller="MessagesController">
	<div class="row">
		<h2 class="text-center">Message Broadcust</h2>
    <div class="row">
  		<div class="col-md-12">
        <div class="[ form-group ]">
          <input type="checkbox" ng-model="send_to_all" name="fancy-checkbox-default" id="fancy-checkbox-default" autocomplete="off" checked/>
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-default" class="[ btn btn-default ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="fancy-checkbox-default" class="[ btn btn-default active ]">
                        Send to all
              </label>
           </div>
      </div>
              <div class="panel panel-default">
                <div class="panel-body">
                    <form accept-charset="UTF-8" action="" method="POST">
                        <textarea ng-model="message" required class="form-control counted" name="message" placeholder="Type in your message" rows="5" style="margin-bottom:10px;"></textarea>
                        <h6 class="pull-right" id="counter">{{char_counter}} characters remaining</h6>
                        <button id="post_message" class="btn btn-default" type="button" ng-click="sendBroadCustMassage(message, send_to_all)">Post New Message</button>
                    </form>
                </div>
            </div>
        </div>
	</div>
	</div>
</div>
<?php
  $this->load->view('includes/footer.php');
?>
<script src="<?php echo base_url();?>js/messages.js"></script>
