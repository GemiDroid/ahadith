<div class="container">
    <header class="row">
      <h2 class="col-sm-3 col-lg-2 hidden-xs">Forgot Username</h2>
    </header>
    <section class="row">
      
        <div class="search-box">  

<div id="contents">
  
  <fieldset id="block_add_book">
    
      <?php if(!empty($error)): ?>
      <?php echo $error; ?>
      <?php endif; ?>
    
      <?php if(!empty($info)): ?>
      <?php echo $info; ?>
      <?php endif; ?>
       
      <?php $attributes = array('class' => 'form-horizontal'); ?>
      <?php echo form_open( 'user/forgot-username/' , $attributes ); ?>
          
      <div class="control-group">
          <label class="control-label" for="txt_user_email">User Email:</label>
          <div class="controls">
            <input type="text" name="txt_user_email" id="txt_user_email" value="<?php echo set_value('txt_user_email', ( !empty($data)? $data->user_id :'')); ?>" size="50" />                             
            <div class="help-inline">
              <span style="color: red;"><?php echo $error_user; ?></span>
              <span style="color: green;"><?php echo $success_user; ?></span>
            </div>
          </div>
      </div>
      <div>&nbsp;</div>
      <div class="control-group">
          <div class="controls">
            <input type="submit" id="btn_send_username" name="btn_send_username" value="Send Username" class="btn btn-primary" tabindex="5" />
          </div>
      </div>
      <?php echo form_close(); ?>
  </fieldset>
</div>

        </div>

    </section>
        <footer class="row">			
	</footer>
</div>