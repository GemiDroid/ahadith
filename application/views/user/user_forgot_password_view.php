<div class="container">
    <header class="row">
      <h2 class="col-sm-3 col-lg-2 hidden-xs">Forgot Password</h2>
    </header>
    <section class="row">
      
      
      
  <div class="search-box">  
      
<div id="contents">

  <fieldset id="block_add_book">
     
     <div class="col-md-5 change_password">  
      <?php if(!empty($error)): ?>
      <span style="color: red;"><?php echo $error; ?></span>
      <?php endif; ?>
      
      
       <?php if(!empty($info)): ?>
      <?php echo $info; ?>
      <?php endif; ?>
      
      <?php $attributes = array('class' => 'form-horizontal'); ?>
      <?php echo form_open( 'user/forgot-password/' , $attributes ); ?>
          
      <div class="control-group">
          <label class="control-label" for="txt_user_email">User Email:</label>
            <input class="form-control" type="text" name="txt_user_email" id="txt_user_email" value="<?php echo set_value('txt_user_email'); ?>" size="30" />                             
          
            <div class="help-inline">
            <?php echo form_error('txt_user_email', '<span class="text-error">', '</span>'); ?>
          
          </div>
      </div>
          <div>&nbsp;</div>
      <div class="control-group">
              <input type="submit" id="btn_send_pwd" name="btn_send_pwd" value="Send Password" class="btn btn-primary"/>
      </div>
      <?php echo form_close(); ?>
     </div>
  </fieldset>
</div>
        </div>



    </section>
        <footer class="row">			
	</footer>
</div>



<script type="text/javascript">
  

      
    $('#txt_user_email').blur(function() {
     var email_regex = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
      var email = $('#txt_user_email').val();
      
      if($('#txt_user_email').val() == ""){
         $(this).parent().children('div').text("Please enter your email address").addClass("text-error");
     }
       
       else if(!email_regex.test(email) ){
        
          $(this).parent().children('div').text("Email must contain valid email address").addClass("text-error");
      }
      
  });
    
    
    $(document).ready(function(){
      $('#btn_send_pwd').click(function(event) {
      var email_regex = new RegExp(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/);
      var email = $('#txt_user_email').val();
      
      
        if($('#txt_user_email').val() == ""){
             event.preventDefault();
           $('#txt_user_email').parent().children('div').text("Please enter your email address").addClass("text-error");
            
        }
        
        else if(!email_regex.test(email) ){
          event.preventDefault();
          $(this).parent().children('div').text("Email must contain valid email address").addClass("text-error");
      }
      
      
      });
    });
     
    $('#txt_user_email').keypress(function() {
      $(this).parent().children('div').text("").removeClass("text-error");
          
    });
 
</script>