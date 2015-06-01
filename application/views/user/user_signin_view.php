<div class="container"> 
    <header class="row">
      <h2 class="col-sm-3 col-lg-2 hidden-xs">Signin</h2>
    </header>
        
    <section class="row">
      
      <div class="search-box"> 

        <div class="col-md-6 change_password"> 
          <?php $attributes = array('class' => 'form-horizontal'); ?>
          <?php echo form_open( 'user/signin/' , $attributes ); ?>
  
        
  
        <?php if( isset($error_message) ): ?>
        <span class="text-error"><?php echo $error_message; ?></span>
        <?php endif; ?>
    
        <div class="control-group">
          <label class="control-label" for="txt_user_id">User ID:</label>
          <input class="form-control" type="text" name="txt_user_id" id="txt_user_id" value="<?php echo set_value('txt_user_id',''); ?>" size="50" />                             
          <div class="help-inline">
            <?php echo form_error('txt_user_id', '<span class="text-error">', '</span>'); ?>
          </div>
        </div>
    
        <div class="control-group">
          <label class="control-label" for="txt_user_pwd">Password:</label>
          <input class="form-control" type="password" name="txt_user_pwd" id="txt_user_pwd" value="<?php echo set_value('txt_user_pwd', ''); ?>" size="50" />                             
          <div class="help-inline">
            <?php echo form_error('txt_user_pwd', '<span class="text-error">', '</span>'); ?>
          </div>
        </div>
        <div>&nbsp;</div>
        
        <div class="control-group">
          <input type="submit" id="btn_signin" name="btn_signin" value="Sign In" class="btn btn-primary" tabindex="5" />
          <br/>
          <br/>
          <a href="<?php echo base_url() . 'user/forgot-password/';?>" class="links">Forgot Password?</a>&nbsp;&nbsp;
          <a href="<?php echo base_url() . 'user/forgot-username/';?>" class="links">Forgot Username?</a>&nbsp;&nbsp;
          <a href="<?php echo base_url() . 'user/register/';?>" class="links">Register</a>

        <br/><br/>
        </div>
      </div>
    </div><!--search box-->
      
      <?php echo form_close(); ?>
  
    </section>
  <footer class="row">			
  </footer>
</div><!--container-->