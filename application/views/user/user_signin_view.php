<div class="container"> 
    <header class="row">
      <h2 class="col-sm-3 col-lg-2 hidden-xs">Signin</h2>
    </header>
        
    <section class="row">
      
      <?php $message = $this->session->flashdata('message');  ?>
      <?php if(isset($message) AND !empty($message)): ?>
      <div id="alert_message" class="alert alert-danger" style="width:28%;margin-left: 33%;">
          <a href="#" class="close" data-dismiss="alert">&times;</a>
          <span><?php echo $message; ?></span>
      </div>
      <?php endif; ?>
      
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
          <button type="submit" id="btn_signin" name="btn_signin" value="Sign In" class="btn btn-primary"  >Sign In</button>
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

<script type="text/javascript">
  
  function hide_alert() {
      $('#alert_message').fadeOut('slow');
  } 
  $(document).ready(function(){
    setTimeout("hide_alert()", 10000);
  });

    $('#txt_user_id').blur(function() {
      //alert('blur of user id');
      var user = new RegExp('^[a-zA-Z0-9_]+$');
      var value = $('#txt_user_id').val();
    
      if($('#txt_user_id').val() == ""){
    
        $(this).parent().children('div').text("Please enter your user ID").addClass("text-error");
         // alert('user id is empty');
      }
      
     
      else if(!user.test(value) ){
        $(this).parent().children('div').text("only alphabets, numbers and underscore are allowed").addClass("text-error");
      }

    });
    
    
    $('#txt_user_pwd').blur(function() {
    
    if($('#txt_user_pwd').val() == ""){
         $(this).parent().children('div').text("Please enter your password").addClass("text-error");
     }
     
    });
   
    
    $(document).ready(function(){
      $('#btn_signin').click(function(event) {
      
        if($('#txt_user_id').val() == ""){
             event.preventDefault();
           $('#txt_user_id').parent().children('div').text("Please enter your user ID").addClass("text-error");
            
        }
      if($('#txt_user_pwd').val() == ""){
           event.preventDefault();
           $('#txt_user_pwd').parent().children('div').text("Please enter your password").addClass("text-error");
        }
        
      
          
      });
    });
    
    
     
    $('#txt_user_id').keypress(function() {
          
         $(this).parent().children('div').text("").removeClass("text-error");
           $('#txt_user_pwd').parent().children('div').text("").removeClass("text-error");
         
    });
    
     
    $('#txt_user_pwd').keypress(function() {
         $(this).parent().children('div').text("").removeClass("text-error");
            $('#txt_user_id').parent().children('div').text("").removeClass("text-error");
    });
</script>