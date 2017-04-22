<!DOCTYPE HTML>
<html>

<head>
    <title>Green Pastures</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css"  crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css" >
<!-- Optional theme -->
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-theme.min.css" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<link rel="stylesheet" href='<?php echo base_url();?>js/angular-toastr/dist/angular-toastr.css'></link>
<!-- Latest compiled and minified JavaScript -->

</head>
<body ng-app="starterApp">
<div class="container-fluid" ng-controller="RegisterController">
    <section class="container">
      <center style="    margin-bottom: 5%;"><h1>Welcome to Green Pastures Investment <br>🌲🌳🌴</h1>
           <h3><small> Donate - Then u part of the family with 💶💶💶💶 ZWABHAA💃💃100% IN 5 DAYS </small></h3>
      </center>
		<div class="container-page" >
      <form role="form" method="post" ng-submit="register()">
			<div class="col-md-6">

				<h3 class="dark-grey">Registration</h3>
        <div class="form-group col-lg-12">
          <small>Personal Details</small>
        </div>
        <div class="form-group col-lg-6">
          <label>Name</label>
          <input type="text" name="name" ng-model="user.name"class="form-control" id="name" value="" required>
        </div>

        <div class="form-group col-lg-6">
          <label>Surname</label>
          <input type="text" name="surname" ng-model="user.surname" class="form-control" id="surname" value="" required>
        </div>
        <div class="form-group col-lg-6">
            <label >Gender</label>
            <br>

              <!--<pre>{{user.radioModel || 'null'}}</pre>-->
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-primary" ng-model="radioModel" uib-btn-radio="'Male'" autocomplete="off">Male
                  <span class="glyphicon glyphicon-ok"></span>
                </label>
                <label class="btn btn-primary" ng-model="radioModel" uib-btn-radio="'Female'" autocomplete="off">Female
                  <span class="glyphicon glyphicon-ok"></span>
                </label>

            </div>

          </div>

          <div class="form-group col-lg-6">
            <label>Cellphone</label>
            <input type="number" name="cell_number" ng-model="user.cell_number" class="form-control" id="cell_number" value="" required>
          </div>
          <div class="form-group col-lg-12">
            <small>Banking Details</small>
          </div>
          <div class="form-group col-lg-6">
          <label >
          Bank Name
          </label>
                    <select class="form-control" id="bank_name" name="bank_name"  required ng-model="user.selectedBank"
                     ng-options="bank as bank.name for bank in banks" ng-init="selectedBank = check(selected,banks)"
                      ng-change="setBank(selectedBank)">

                    </select>

          </div>
          <div class="form-group col-lg-6">
            <label>Branch code</label>
            <input type="text" name="branch_code"  class="form-control" id="" ng-model="user.selectedBank.code" value="{{selectedBank.code}}" required>
          </div>

          <div class="form-group col-lg-6">
            <label>Account Number</label>
            <input type="number" name="account_number"  class="form-control" id="account_number" ng-model="user.account_number" value="" required>
          </div>
          <div class="form-group col-lg-6">
            <label>Account Name/Holder</label>
            <input type="text" name="account_holder" ng-model="user.account_holder" class="form-control" id="" value="" required>
          </div>

          <div class="form-group col-lg-12">
          <label >
          Account Type
          </label>

          <br>

            <!--<pre>{{user.radioModelacc || 'null'}}</pre>-->
            <div class="btn-group" data-toggle="buttons">
                <label  ng-model="radioModelacc" uib-btn-radio="'Savings'"   autocomplete="off" class="btn btn-primary">Savings
                  <span class="glyphicon glyphicon-ok"></span>
                </label>
                <label class="btn btn-primary" ng-model="radioModelacc" uib-btn-radio="'Cheque'" autocomplete="off">Cheque
                   <span class="glyphicon glyphicon-ok"></span>
                </label>
                <label class="btn btn-primary" ng-model="radioModelacc" uib-btn-radio="'Credit'" autocomplete="off">Credit
                 <span class="glyphicon glyphicon-ok"></span>
                </label>

            </div>

          </div>


          <div class="form-group col-lg-12">
            <small>Login Details</small>
          </div>
				<div class="form-group col-lg-12">
					<label>Username</label>
					<input type="" name="username"ng-model="user.username" class="form-control" id="username" value="" required/>
				</div>
				<div class="form-group col-lg-6">
					<label>Password</label>
					<input type="password" name="password" ng-model="user.password" class="form-control" id="password" value="" required/>
				</div>

				<div class="form-group col-lg-6">
					<label>Repeat Password</label>
					<input type="password" name="password" class="form-control" id="password" required/>
				</div>

				<div class="form-group col-lg-6">
					<label>Email Address (optional)</label>
					<input type="" name="email" ng-model="user.email"  class="form-control" id="email" value="">
				</div>
        <div class="form-group col-lg-6">
          <label>Referal number (optional)</label>
          <input type="" name="referal_number"  ng-model="user.refferal_number" class="form-control" id="" value="">
        </div>
			</div>


			<div class="col-md-6">
				<h3 class="dark-grey">Terms and Conditions</h3>
				<p>
					By clicking on "Register" you agree to The Company's' Terms and Conditions
				</p>

        <ul>
          <li> <p> Every transaction within the Green Pastures takes up to 5 days of processing. </p></li>
          <li>  <p>You will get blocked if you do not make a payment to a member's bank account within 5 days.</p></li>
          <li>  <p>You will get blocked  if you do not confirm a members payment within 5 days.</p></li>
          <li>  <p>We advise you to call the member you have made a payment to and ask him/her to confirm your payment.</p></li>
  </ul>



        <div class="row">
          <div class="col-sm-4" style="display: flex;">
            <input type="checkbox" class="checkbox"style="margin-right:3%;" required /><p>Accept <b>T</b>s&<b>C</b>s</p>
          </div>

          <div class="col-sm-12" >
          	<button type="submit" class="btn btn-primary" style="margin-bottom: 3%;">Register</button>
            <a href="<?php echo base_url();?>login" type="botton" class="btn btn-success" style="margin-bottom: 3%;"><span></span>Cancel</a>
          </div>

        </div>

			</div>
    </form>
		</div>
	</section>
</div>

<?php
  $this->load->view('includes/footer.php');
?>
