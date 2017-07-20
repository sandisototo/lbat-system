<!DOCTYPE HTML>
<html >

<head>
    <title>LBAT System</title>
    <!-- Force IE to turn off past version compatibility mode and use current version mode -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge;chrome=1">

    <!-- Get the width of the users display-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="Sandiso Toto" />
    <meta name="keywords" content="Sandiso Toto www.stoto.co.za" />
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css"  crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css" >
<!-- Optional theme -->
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-theme.min.css" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">
<link rel="stylesheet" href='<?php echo base_url();?>js/angular-toastr/dist/angular-toastr.css'></link>
<link rel="stylesheet" href='<?php echo base_url();?>js/angular-busy/dist/angular-busy.css'></link>
<!-- Latest compiled and minified JavaScript -->

</head>
<body  ng-app="starterApp" ng-controller="MainController" data-base="<?php echo base_url();?>">

        <?php
            $user_session = $this->session->get_userdata();
            $user_data = $user_session['user'];
            $user_id = $user_data['user_id'];
            $name = $user_data['name'];
            $surname = $user_data['surname'];
        ?>

<center>
<table width="960px" id="TixManagementContent" class="TixManagementContent" >
<tbody>
<tr>
<td align="left">
<div class="boxed-page">


<div class="container">
    <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span
                    class="icon-bar"></span><span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url();?>">LBAT system </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li ng-class="{ active: isActivePath('site') }"><a href="<?php echo base_url();?>site"><span class="glyphicon glyphicon-home"></span>Home</a></li>
                <li ng-class="{ active: isActivePath('payments') }"><a href="<?php echo base_url();?>payments"><span class="glyphicon glyphicon-calendar"></span>Payments</a></li>
                <li ng-class="{ active: isActivePath('members')}" class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="glyphicon glyphicon-list-alt"></span>Member Management <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url();?>members"><span class="glyphicons glyphicons-parents"></span>
                        View All Members </a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url();?>members"><span class="glyphicon glyphicon-plus"></span>
                        Add New Member </a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="glyphicon glyphicon-search"></span>Search <b class="caret"></b></a>
                    <ul class="dropdown-menu" style="min-width: 300px;">
                        <li>
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="navbar-form navbar-left" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search" />
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button">
                                                Go!</button>
                                        </span>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown" ng-class="{ active: isActivePath('messages') || isActivePath('sent') }"><a href="<?php echo base_url();?>messages" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="glyphicon glyphicon-envelope"></span>Messaging
                </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url();?>messages"><span class="glyphicon glyphicon-send"></span> Send New Message</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url();?>messages/sent"><span class="glyphicon glyphicon-eye-open"></span> View Sent Messages</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="glyphicon glyphicon-user"></span><small><b style="color:green">ONLINE:</b> <?php echo $user_data['name'];?> <?php echo $user_data['surname'];?></small> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span>Profile</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-cog"></span>Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url();?>login"><span class="glyphicon glyphicon-off"></span>Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
</div>
      <p style="display:none" ng-init="user_id='<?php echo $user_id; ?>'">
      </p>
      <p style="display:none" ng-init="user_name='<?php echo $name; ?>'">
      </p>
      <p style="display:none" ng-init="user_surname='<?php echo $surname; ?>'">
      </p>
</div>
</td>
</tr>
</tbody>
</table>
</center>
