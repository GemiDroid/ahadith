<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
	<title>Sayings of the Messenger (s.a.w) - www.Ahadith.net</title>
	
	<style type="text/css">
		/*.container{*/
		/*	margin-top:50px;*/
		/*}*/
		.container h1{
			/*font-weight: bold;
			text-shadow: -1px -1px 2px #386553, 1px 1px 2px #386553;
			font-weight: bold;*/
			/*margin-left: -60px;*/
			text-align: center;
			color: #f4f1c4;
			font-family: "Ceviche One",cursive;
			font-size: 3.07em;
			font-weight: normal;
			text-shadow: -2px -2px 0 #386553, -1px -2px 0 #386553, 0 -2px 0 #386553, 1px -2px 0 #386553, 2px -2px 0 #386553, -2px -1px 0 #386553, -1px -1px 0 #386553, 0 -1px 0 #386553, 1px -1px 0 #386553, 2px -1px 0 #386553, -2px 0 0 #386553, -1px 0 0 #386553, 1px 0 0 #386553, 2px 0 0 #386553, -2px 1px 0 #386553, -1px 1px 0 #386553, 0 1px 0 #386553, 1px 1px 0 #386553, 2px 1px 0 #386553, -2px 2px 0 #386553, -1px 2px 0 #386553, 0 2px 0 #386553, 1px 2px 0 #386553, 2px 2px 0 #386553, -3px 3px 3px #666;
		}
		
		
		#dashboard_items li {
			/*margin-top: 2px;
			margin-left: 10px;*/
			/*padding-top: 5px;*/
			/*padding-right: 15px;*/
		}
		/*#dashboard_items li {
			padding: 5px;
			background-color: #F4F1C4;
			box-shadow: 1px 1px 4px 1px #386553 inset;
			-moz-border-radius: 3px 3px 3px 3px;
			border-radius: 3px 3px 3px 3px;
		}*/
		#dashboard_items a:link {
			/*padding-left: 5px;*/
			display: block;
			color:Black;
			/*font-size: 12pt;*/
			font-weight:bold;
			text-decoration:none;
		}
				
		#dashboard_items a:hover {
			text-shadow: -1px -1px 2px #386553, 1px 1px 2px #386553;
		}
		
		#dashboard_items a:link.selected {
			/*text-shadow: -1px -1px 4px #386553, 1px 1px 4px #386553;*/
		}
		.my_contents{
			height: inherit;
		}
	</style>
	
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
		<h1>Dashboard</h1>
		<section class="row">
			<aside class="col-sm-3 col-lg-2 hidden-xs">
				<div id="items">
					<ul id="dashboard_items" style="list-style-type: none;">
						
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
			