<div class="container"> 
    <header class="row">
      <h2 class="col-sm-3 col-lg-2 hidden-xs">Signin</h2>
    </header>
        
    <section class="row">
 
          <?php $attributes = array('class' => 'form-horizontal'); ?>
          <?php echo form_open( 'user/signin/' , $attributes ); ?>
  
    <div class="search-box">   
  
            <?php if( isset($error_message) ): ?>
            <span class="text-error"><?php echo $error_message; ?></span>
            <?php endif; ?>
        
            <div class="control-group">
              <label class="control-label" for="txt_user_id">User ID:</label>
              <div class="controls">
                <input type="text" name="txt_user_id" id="txt_user_id" value="<?php echo set_value('txt_user_id',''); ?>" size="50" />                             
                <div class="help-inline">
                  <?php echo form_error('txt_user_id', '<span class="text-error">', '</span>'); ?>
                </div>
              </div>
            </div>
        
            <div class="control-group">
              <label class="control-label" for="txt_user_pwd">Password:</label>
              <div class="controls">
                <input type="password" name="txt_user_pwd" id="txt_user_pwd" value="<?php echo set_value('txt_user_pwd', ''); ?>" size="50" />                             
                <div class="help-inline">
                  <?php echo form_error('txt_user_pwd', '<span class="text-error">', '</span>'); ?>
                </div>
              </div>
            </div>
            <div>&nbsp;</div>
            <div class="control-group">
              <div class="controls">
                
                <input type="submit" id="btn_signin" name="btn_signin" value="Signin" class="btn btn-primary" tabindex="5" />
                <br/>
                <?php echo anchor(base_url() . "user/forgot-password/", "Forgot Password"); ?>
                <br/>
                <?php echo anchor('user/forgot-username/',"Forgot Username"); ?>
                <br/>
                <?php echo anchor('user/register/',"Sign Up"); ?>
              </div>
      
            </div>        
          </div><!--search box-->
      
      <?php echo form_close(); ?>
  
    </section>
    <footer class="row">			
    </footer>
</div><!--container-->