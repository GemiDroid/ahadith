<div class="container">
    <header class="row">
            <h2 class="col-sm-3 col-lg-3 hidden-xs">Change Password</h2>
		</header>
    <section class="row">
	
    <div class="search-box">
        <div id="contents">
	    <fieldset id="block_add_book">
		
		
		<div class="col-md-5 change_password"> 
		
		<?php if(!empty($string)): ?>
			<span style="font-size medium; color: red;"><?php echo $string; ?></span>
		<?php endif; ?>
      
              <!--<?php echo validation_errors(); ?>-->
		<?php $attributes = array('class' => 'form-horizontal'); ?>
		<?php echo form_open( 'user/change-password/' , $attributes ); ?>
     
	   <?php if( isset($error_message) ): ?>
            <span class="text-error"><?php echo $error_message; ?></span>
            <?php endif; ?>
	             
		<div class="control-group">
		    <label class="control-label" for="txt_old_password">Old Password:</label>
		    <input class="form-control" type="password" name="txt_old_password" id="txt_old_password" value="<?php echo set_value('txt_old_password', ( !empty($data)? $data->user_id :'')); ?>" size="50" />                             
		    <div class="help-inline">
                <?php echo form_error('txt_old_password', '<span class="text-error">', '</span>'); ?>
		    </div>
		</div>
	      
		<div class="control-group">
		    <label class="control-label" for="txt_new_password">New Password:</label>
		    <input class="form-control" type="password" name="txt_new_password" id="txt_new_password" value="<?php echo set_value('txt_new_password', ( !empty($data)? $data->user_id :'')); ?>" size="50" />                             
			  <div class="help-inline">
                <?php echo form_error('txt_new_password', '<span class="text-error">', '</span>'); ?>
		    </div>
		</div>
	      
		<div class="control-group">
		    <label class="control-label" for="txt_confirm_password">Confirm Password:</label>
		    <input class="form-control" type="password" name="txt_confirm_password" id="txt_confirm_password" value="<?php echo set_value('txt_confirm_password', ( !empty($data)? $data->user_id :'')); ?>" size="50" />                             
		      <div class="help-inline">
                <?php echo form_error('txt_confirm_password', '<span class="text-error">', '</span>'); ?>
		    </div>
		</div>
                 
		 <div>&nbsp;</div>
		 
		<div class="control-group">
		    <input type="submit" id="btn_change_password" name="btn_change_password" value="Change Password" class="btn btn-primary" />
		</div>
		
	
              <?php echo form_close(); ?>
			</div>	
          </fieldset>
        </div><!--contents-->

</div><!--search box-->
    </section>
        <footer class="row">			
	</footer>
</div>


<script type="text/javascript">
	
	 $('#txt_old_password').blur(function() { 
      if($('#txt_old_password').val()== "" ){
        $(this).parent().children('div').text("Please enter old password").addClass("text-error");
      }

    });
	 
	  $('#txt_new_password').blur(function() { 
      if($('#txt_new_password').val()== "" ){
        $(this).parent().children('div').text("Please enter new password").addClass("text-error");
      }

    });
	
	
	 $('#txt_confirm_password').blur(function() { 
      if($('#txt_confirm_password').val()!= $('#txt_new_password').val() ){
        $(this).parent().children('div').text("Confirm password does not match the password").addClass("text-error");
      }

    });
	 
	 
	$('#txt_old_password').keypress(function() {
      $(this).parent().children('div').text("").removeClass("text-error");
          
    });
	 
	 
	$('#txt_new_password').keypress(function() {
      $(this).parent().children('div').text("").removeClass("text-error");
          
    });
	  
	$('#txt_confirm_password').keypress(function() {
      $(this).parent().children('div').text("").removeClass("text-error");
          
    });
	
	
	$(document).ready(function(){
      $('#btn_change_password').click(function(event) {
		
		if($('#txt_old_password').val()== "" ){
			event.preventDefault();
			$('#txt_old_password').parent().children('div').text("Please enter old password").addClass("text-error");
		}
		
		if($('#txt_new_password').val()== "" ){
			event.preventDefault();
			$('#txt_new_password').parent().children('div').text("Please enter new password").addClass("text-error");
		}
      
		
	  });
	});
	 
</script>