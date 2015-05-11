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
   
       <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>-->
	

	


</head>
    <body>

<header>
    <?php $user_id = $this->session->userdata('user_id'); ?>
     <?php if( !empty($user_id) ): ?>
                                    
            <a href="<?php echo base_url()."user/signout"; ?>" style="float: right; font-size: medium;">Signout <?php echo $user_id; ?> </a>
   
   <?php endif; ?>

    
</header>




        <div class="row">
            
            <div class="col-md-2" style="margin-left: 20px;">
                <h3>Dashboard</h3>
                <table class="table table-bordered">
                    <tbody>
                       
			<tr><td><a href="<?php echo base_url().'bukhari' ?>">Home</a></td></tr
                        <tr><td><a href="<?php echo base_url().'admin/tags' ?>">Tags</a></td></tr>
                        <tr><td><a href="<?php echo base_url().'admin/users' ?>">Users</a></td></tr>
                        <tr><td><a href="<?php echo base_url().'admin/user-activities' ?>">User Activities</a></td></tr>
                        <tr><td><a href="<?php echo base_url().'admin/report' ?>">Reports</a></td></tr>
			<tr><td><a href="<?php echo base_url().'admin/role' ?>">Roles</a></td></tr>
                        <tr><td><a href="<?php echo base_url().'admin/user-role' ?>">User Roles</a></td></tr>
                        <tr><td><a href="<?php echo base_url().'admin/hadith' ?>">Hadith</a></td></tr>
                        <tr><td><a href="<?php echo base_url().'admin/hadith-book' ?>">Hadith Book</a></td></tr>
                        <tr><td><a href="<?php echo base_url().'admin/chapter' ?>">Chapter</a></td></tr>
                        <tr><td><a href="<?php echo base_url().'admin/authenticity' ?>">Authenticity</a></td></tr>
                        <tr><td><a href="<?php echo base_url().'admin/book' ?>">Book</a></td></tr>
                        
                    </tbody>
                </table>
            </div>