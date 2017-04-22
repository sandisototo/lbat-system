<!DOCTYPE HTML>
<html>

<head>
    <title>Green Pastures Investment</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css"  crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css" >

<!-- Optional theme -->
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-theme.min.css" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" href='<?php echo base_url();?>js/angular-toastr/dist/angular-toastr.css'></link>
<!-- Latest compiled and minified JavaScript -->

</head>
<body ng-app="starterApp">
  <div class="container-fluid" ng-controller="adminController">
      <!-- Second navbar for categories -->
      <nav class="navbar" style="background: #c7c7ff;" >
        <div class="container" >
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url();?>admin">Green Pastures Investment</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li ng-class="{ active: isActive('/admin') }"><a href="<?php echo base_url();?>admin">All Users ({{all_user_count}})</a></li>
              <li ng-class="{ active: isActive('/admin/view_helpers') }"><a href="<?php echo base_url();?>admin/view_helpers">All Helpers ({{all_helpers_count}})</a></li>
              <li ng-class="{ active: isActive('/admin/view_getters') }"><a href="<?php echo base_url();?>admin/view_getters">All Getters ({{all_getter_count}})</a></li>
              <li ng-class="{ active: isActive('/admin/add_new_getters') }"><a href="<?php echo base_url();?>admin/add_new_getters">Manually Add Getters</a></li>
              <li ng-class="{ active: isActive('/admin/view_overdue_transactions') }"><a href="<?php echo base_url();?>admin/view_overdue_transactions">All Overdue</a></li>
              <li ng-class="{ active: isActive('/admin/notifications') }"><a href="<?php echo base_url();?>admin/notifications">Notification List ({{notification_count}})</a></li>

                          <li>
                          <a   href="<?php echo base_url();?>login" >Logout</a>
                          </li>
                        </ul>

          </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
      </nav><!-- /.navbar -->
