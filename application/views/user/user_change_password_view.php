<div class="container">
    <header class="row">
            <h2 class="col-sm-3 col-lg-3 hidden-xs">Change Password</h2>
		</header>
    <section class="row">
	
    <div class="search-box">
        <div id="contents">
	    <fieldset id="block_add_book">
		
	<?php if(!empty($string)): ?>
	<?php echo $string; ?>
	<?php endif; ?>
      
              <?php echo validation_errors(); ?>
		<?php $attributes = array('class' => 'form-horizontal'); ?>
		<?php echo form_open( 'user/change-password/' , $attributes ); ?>
                  
		<div class="control-group">
		    <label class="control-label" for="txt_user_email">Old Password:</label>
		    <div class="controls">
		        <input type="password" name="txt_old_password" id="txt_old_password" value="<?php echo set_value('txt_old_password', ( !empty($data)? $data->user_id :'')); ?>" size="50" />                             
		      <div class="help-inline">
			<span style="color: red;"><?php echo $error_user; ?></span>
			<span style="color: green;"><?php echo $success_user; ?></span>
		      </div>
		    </div>
		</div>
	      
		<div class="control-group">
		    <label class="control-label" for="txt_new_password">New Password:</label>
		    <div class="controls">
		      <input type="password" name="txt_new_password" id="txt_new_password" value="<?php echo set_value('txt_new_password', ( !empty($data)? $data->user_id :'')); ?>" size="50" />                             
			<div class="help-inline">
			  <span style="color: red;"><?php echo $error_user1; ?></span>
			  <span style="color: green;"><?php echo $success_user; ?></span>
			</div>
		    </div>
		</div>
	      
		<div class="control-group">
		    <label class="control-label" for="txt_confirm_password">Confirm Password:</label>
		    <div class="controls">
		        <input type="password" name="txt_confirm_password" id="txt_confirm_password" value="<?php echo set_value('txt_confirm_password', ( !empty($data)? $data->user_id :'')); ?>" size="50" />                             
		        <div class="help-inline">
		          <span style="color: red;"><?php echo $error_user2; ?></span>
		          <span style="color: green;"><?php echo $success_user; ?></span>
		        </div>
		    </div>
		</div>
                 
		 <div>&nbsp;</div>
		 
		<div class="control-group">
		    <div class="controls">
		        <input type="submit" id="btn_change_password" name="btn_change_password" value="Change Password" class="btn btn-primary" tabindex="5" />
		    </div>
		</div>
		
		
              <?php echo form_close(); ?>
          </fieldset>
        </div><!--contents-->

</div><!--search box-->
    </section>
        <footer class="row">			
	</footer>
</div>