<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
	<title>Sayings of the Messenger (s.a.w) - www.Ahadith.net</title>
	
	<link href='http://fonts.googleapis.com/css?family=PT+Sans:regular,italic,bold,bolditalic' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Merienda+One|Ceviche+One|MedievalSharp' rel='stylesheet' type='text/css' />
	
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/fonts.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap_custom.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/extra_style.css" />
</head>

<body>
	<div class="container">
			
			<header class="row">
			<!--<h1 id="main_heading" class="hidden-xs">Dashboard</h1>-->
			<h1 class="main-heading hidden-xs"><span>Dashboard</span></h1>
			<div class="navbar navbar-default visible-xs" role="navigation" style="margin: -10px; background: none;">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#books-navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand visible-xs" style="height: auto;" href="#">
						<h1 class="col-xs-12">Dashboard</h1>
					</a>
				</div>
				
				<div class="collapse navbar-collapse" id="books-navbar">
					<ul class="nav navbar-nav">
						
						
						
						<li><a href="<?php echo base_url().'admin' ?>" class="selected">Home</a></li>
						
						<li><a href="<?php echo base_url().'admin/tag' ?>">Tags</li></a>
						<li><a href="<?php echo base_url().'admin/users' ?>">Users</li></a>
						<li><a href="<?php echo base_url().'admin/user-activities' ?>">User Activities</li></a>
						<li><a href="<?php echo base_url().'admin/report' ?>">Reports</li></a>
						<li><a href="<?php echo base_url().'admin/role' ?>">Roles</li></a>
						<li><a href="<?php echo base_url().'admin/user-role' ?>">User Roles</li></a>
						<li><a href="<?php echo base_url().'admin/subscriptions' ?>">Subscriptions</li></a>
						<li><a href="<?php echo base_url().'admin/hadith' ?>">Hadith</li></a>
						<li><a href="<?php echo base_url().'admin/hadith-book' ?>">Hadith Book</li></a>
						<li><a href="<?php echo base_url().'admin/chapter' ?>">Chapter</li></a>
						<li><a href="<?php echo base_url().'admin/authenticity' ?>">Authenticity</li></a>
						<li><a href="<?php echo base_url().'admin/book' ?>">Book</li></a>
						<li><a href="<?php echo base_url().'user/signout' ?>">Logout</li></a>
					</ul>
				</div>
				
			</div>
		</header>
		<section class="row">
			
			<aside class="col-sm-3 col-lg-2 hidden-xs">
				<div id="books">
					<ul id="body_books" style="list-style-type: none;">
						
						
						<li><a href="<?php echo base_url().'admin' ?>" class="selected">Home</a></li>
						
						<?php if( $this->user_roles->is_authorized( array('admin_tags_view') ) ): ?>
								<li><a href="<?php echo base_url().'admin/tag' ?>">Tags</li></a>
						<?php endif; ?>
						
						<?php if( $this->user_roles->is_authorized( array('admin_users_view') ) ): ?>
								<li><a href="<?php echo base_url().'admin/users' ?>">Users</li></a>
						<?php endif; ?>
						
						<?php if( $this->user_roles->is_authorized( array('admin_user_activities_view') ) ): ?>
								<li><a href="<?php echo base_url().'admin/user-activities' ?>">User Activities</li></a>
						<?php endif; ?>
						
						<?php if( $this->user_roles->is_authorized( array('admin_reports_view') ) ): ?>
								<li><a href="<?php echo base_url().'admin/report' ?>">Reports</li></a>
						<?php endif; ?>
						
						<?php if( $this->user_roles->is_authorized( array('admin_role_view') ) ): ?>
								<li><a href="<?php echo base_url().'admin/role' ?>">Roles</li></a>
						<?php endif; ?>		
						
						<?php if( $this->user_roles->is_authorized( array('admin_user_role_view') ) ): ?>
								<li><a href="<?php echo base_url().'admin/user-role' ?>">User Roles</li></a>
						<?php endif; ?>
						
						<?php if( $this->user_roles->is_authorized( array('admin_subscriptions_view') ) ): ?>
								<li><a href="<?php echo base_url().'admin/subscriptions' ?>">Subscriptions</li></a>
						<?php endif; ?>
						
						<?php if( $this->user_roles->is_authorized( array('admin_hadith_view') ) ): ?>
								<li><a href="<?php echo base_url().'admin/hadith' ?>">Hadith</li></a>
						<?php endif; ?>						
						
						<?php if( $this->user_roles->is_authorized( array('admin_hadith_book_view') ) ): ?>
								<li><a href="<?php echo base_url().'admin/hadith-book' ?>">Hadith Book</li></a>
						<?php endif; ?>
						
						<?php if( $this->user_roles->is_authorized( array('admin_chapter_view') ) ): ?>
								<li><a href="<?php echo base_url().'admin/chapter' ?>">Chapter</li></a>
						<?php endif; ?>
						
						<?php if( $this->user_roles->is_authorized( array('admin_authenticity_view') ) ): ?>
								<li><a href="<?php echo base_url().'admin/authenticity' ?>">Authenticity</li></a>
						<?php endif; ?>
						
						<?php if( $this->user_roles->is_authorized( array('admin_book_view') ) ): ?>
								<li><a href="<?php echo base_url().'admin/book' ?>">Book</li></a>
						<?php endif; ?>
						
						<li><a href="<?php echo base_url().'user/signout' ?>">Logout</li></a>
					</ul>
				</div>
			</aside>
			
			<section  class="col-sm-9 col-lg-10">
			
			<script type="text/javascript">
		
				function adjust_heights() {
					$('body > div.container > section.row > aside').height('auto');
					$('body > div.container > section.row > section').height('auto');
					
					if( $('body > div.container > section.row > aside').height() < $('body > div.container > section.row > section').height() ) {
						$('body > div.container > section.row > aside').height( $('body > div.container > section.row > section').height() );
					}
					else if( $('body > div.container > section.row > aside').height() > $('body > div.container > section.row > section').height() ) {
						$('body > div.container > section.row > section').height( $('body > div.container > section.row > aside').height() );
					}
				}
		
				$(document).ready(function(){	
					$(window).resize(function() {
						adjust_heights();
					});
				});
			</script>
			