<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
	<title>Sayings of the Messenger (s.a.w) - www.Ahadith.net</title>
	
	<link href='http://fonts.googleapis.com/css?family=PT+Sans:regular,italic,bold,bolditalic' rel='stylesheet' type='text/css' />
        <link href='http://fonts.googleapis.com/css?family=Merienda+One|Ceviche+One|MedievalSharp' rel='stylesheet' type='text/css' />
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/fonts.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap_custom.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/extra_style.css" />
	<!--<link rel="stylesheet/less" type="text/css" href="assets/less/bootstrap.less" />
	<script src="assets/js/less.js" type="text/javascript"></script>-->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.js"></script>

</head>
    <body>
	
	<header class="container-fluid">
		<nav class="navbar navbar-default navbar-static-top" role="navigation">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand visible-xs" href="#">
                                <span>Sayings of the Messenger</span>
                                <span lang="ar">ﷺ</span>
                            </a>
                        </div>
                        
                        <div class="collapse navbar-collapse" id="main-navbar">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        Hadith Books <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?php echo base_url()."bukhari"; ?>">Sahih Bukhari</a></li>
                                        <li><a href="<?php echo base_url()."muslim"; ?>">Sahih Muslim</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Narrators</a></li>
                                <li><a href="<?php echo base_url()."search"; ?>">Search</a></li>
                                <li><a href="#" id="optn_setting">Settings</span></a></li>
                                <li><a href="#">Support Us</a></li>
                                <!--if user is login-->
                                <?php $user_id = $this->session->userdata('user_id'); ?>
                                <?php if( !empty($user_id) ): ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        Welcome <?php echo $user_id; ?> <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?php echo base_url()."user/edit-profile"; ?>">Edit Profile</a></li>
                                        <li><a href="<?php echo base_url()."user/change-password"; ?>">Change Password</a></li>
                                        <li><a href="<?php echo base_url()."user/signout"; ?>">Signout</a></li>
                                    </ul>
                                </li>
                               <!-- <li><a href="<?php echo base_url()."user/signout"; ?>">Signout</a></li>-->
                                <?php else: ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        Signin/Register <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?php echo base_url()."user/signin"; ?>">Signin</a></li>
                                        <li><a href="<?php echo base_url()."user/register"; ?>">Register</a></li>
                                    </ul>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
		</nav>
		
		<div class="container">
		    <h1 class="main-heading hidden-xs">
                        <span>Sayings of the Messenger</span>
                        <span lang="ar" class="hidden-sm hidden-xs">احادیثِ رسول اللہ </span>
                        <span lang="ar">ﷺ</span>
		    </h1>
		</div>
	</header>
	
    <div class="visible-xs">&nbsp;</div>