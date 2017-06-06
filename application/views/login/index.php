<!DOCTYPE HTML>
<html>

<head>
    <title>LBAT System</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="Sandiso Toto" />
    <meta name="keywords" content="Sandiso Toto www.stoto.co.za" />
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css"  crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo base_url();?>css/login.css" >
<!-- Optional theme -->
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-theme.min.css" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" href='<?php echo base_url();?>js/angular-toastr/dist/angular-toastr.css'></link>
<!-- Latest compiled and minified JavaScript -->

</head>
<body ng-app="starterApp">

<div class="section-content" style="color: #d2adad">
    <h1 class="section-header"> Luvuyo Burial <span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s"> Administration Tool</span></h1>
        <h3>Member Managent, Reporting, Schecduling and Notification System</h3>
    </div>
<div class="login-body" style="margin-top: 10%;" ng-controller="LoginController">
    <article class="container-login center-block">
      <section>
      <ul id="top-bar" class="nav nav-tabs nav-justified">
        <li class="active"><a href="#login-access">Login</a></li>
        <li><a href="#">Admin Management</a></li>
      </ul>
      <div class="tab-content tabs-login col-lg-12 col-md-12 col-sm-12 cols-xs-12">
        <div id="login-access" class="tab-pane fade active in">
          <h2><i class="glyphicon glyphicon-log-in"></i> LBAT system </h2>
          <form method="post" accept-charset="utf-8" autocomplete="off" role="form" class="form-horizontal"
          ng-submit="login()">
            <div class="form-group ">
              <label for="login" class="sr-only">Username</label>
                <input type="text" class="form-control" name="username" id="login_value"
                  placeholder="Username" tabindex="1" value=""  ng-model="user.username" required/>
            </div>
            <div class="form-group ">
              <label for="password" class="sr-only">Password</label>
                <input type="password" class="form-control" name="password" id="password"
                  placeholder="Password" value="" tabindex="2" ng-model="user.password" required/>
            </div>
            <div class="checkbox">
                <label class="control-label" for="remember_me">
                  <input type="checkbox" name="remember_me" id="remember_me" value="1" class="" tabindex="3" /> Remember me
                </label>
            </div>
            <br/>
            <pre style="background-color: #ff8d8d;" ng-show="errorMessage">{{errorMessage}}</pre>

            <div class="form-group ">
                <button type="submit" name="log-me-in" id="submit" tabindex="5" class="btn btn-lg">Enter</button>
            </div>
          </form>
        </div>
      </div>
    </section>
  </article>
</div>
<script data-require="angular.js@*" data-semver="1.3.4" src="<?php echo base_url();?>js/angular/angular.js"></script>
<script data-require="ui-bootstrap@*" data-semver="0.12.0" src="<?php echo base_url();?>js/angular-bootstrap/ui-bootstrap.js"></script>
<script data-require="ui-bootstrap@*" data-semver="0.12.0" src="<?php echo base_url();?>js/moment/moment.js"></script>
<script>
    moment().format();
</script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url();?>js/data-tables.js"></script>
<script src="<?php echo base_url();?>js/angular/angular-datatables.min.js"></script>
<script src="<?php echo base_url();?>js/angular-toastr/dist/angular-toastr.tpls.js"></script>
<script src="<?php echo base_url();?>js/angular-busy/dist/angular-busy.js"></script>
<script src="<?php echo base_url();?>js/core/register.js"></script>
<script src="<?php echo base_url();?>js/core/login.js"></script>
<script src="<?php echo base_url();?>js/core/admin.js"></script>
<script src="<?php echo base_url();?>js/core/members.js"></script>
<script src="<?php echo base_url();?>js/core/payments.js"></script>
<script src="<?php echo base_url();?>js/core/messages.js"></script>
<script src="<?php echo base_url();?>js/core/main.js"></script>
<script src="<?php echo base_url();?>js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url();?>js/main.js"></script>
</body>
</html>
