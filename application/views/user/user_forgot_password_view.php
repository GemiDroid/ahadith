<div id="contents">
  <h2 style="margin-bottom: 0px;">Forgot Password</h2>
  
  <fieldset id="block_add_book">
      <legend>Fill the form:</legend>
      
      <?php $attributes = array('class' => 'form-horizontal'); ?>
      <?php echo form_open( 'user/forgot-password/' , $attributes ); ?>
          
      <div class="control-group">
          <label class="control-label" for="txt_user_id">User ID:</label>
          <div class="controls">
            <input type="text" name="txt_user_id" id="txt_user_id" value="<?php echo set_value('txt_user_id', ( !empty($data)? $data->user_id :'')); ?>" size="50" />                             
            <div class="help-inline">
              <span style="color: red;"><?php echo $error_user; ?></span>
              <span style="color: green;"><?php echo $success_user; ?></span>
            </div>
          </div>
      </div>
          
      <div class="control-group">
          <div class="controls">
              <input type="submit" id="btn_send_pwd" name="btn_send_pwd" value="Send Password" class="btn btn-primary" tabindex="5" />
          </div>
      </div>
      <?php echo form_close(); ?>
  </fieldset>
</div>