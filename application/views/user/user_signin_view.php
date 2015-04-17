<style>
  .text-error{
    color:red;
  }
</style>
<div id="contents">
  <h2 style="margin-bottom: 0px;">Signin to Ahadith</h2>
  
  <fieldset id="block_add_book">
      <legend>Fill the form:</legend>
      
      <?php $attributes = array('class' => 'form-horizontal'); ?>
      <?php echo form_open( 'user/signin/' , $attributes ); ?>
      
      <!--<span style="color: red;"><?php echo $error_message; ?></span>
      -->
      <div class="control-group">
          <label class="control-label" for="txt_user_id">User ID:</label>
          <div class="controls">
            <input type="text" name="txt_user_id" id="txt_user_id" value="<?php echo set_value('txt_user_id', ( !empty($data)? $data->user_id :'')); ?>" size="50" />                             
            <div class="help-inline">
              <?php echo form_error('txt_user_id', '<span class="text-error">', '</span>'); ?>
            </div>
          </div>
      </div>
      
      <div class="control-group">
          <label class="control-label" for="txt_user_pwd">Password:</label>
          <div class="controls">
            <input type="password" name="txt_user_pwd" id="txt_user_pwd" value="<?php echo set_value('txt_user_pwd', ( !empty($data)? $data->password :'')); ?>" size="50" />                             
            <div class="help-inline">
              <?php echo form_error('txt_user_pwd', '<span class="text-error">', '</span>'); ?>
            </div>
          </div>
      </div>
          
      <div class="control-group">
          <div class="controls">
              
              <input type="submit" id="btn_signin" name="btn_signin" value="Signin" class="btn btn-primary" tabindex="5" />
              <br/>
              <?php echo anchor(base_url() . "user/forgot_password/", "Forgot Password"); ?>
              <br/>
              <?php echo anchor('user/forgot_username/',"Forgot Username"); ?>
              <br/>
              <?php echo anchor('user/registration/',"Sign Up"); ?>
          </div>
      </div>
      <?php echo form_close(); ?>
  </fieldset>
</div>