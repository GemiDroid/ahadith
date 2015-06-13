<div class="container">
    <header class="row">
      <h2 class="col-sm-3 col-lg-2 hidden-xs">Edit Profile</h2>
    </header>
    <section class="row">
    
    <div class="search-box">             
        <div id="contents">
          
          <!--<?php echo validation_errors(); ?>-->
		<div class="col-md-7 edit_profile">   
		<?php if(!empty($info)): ?>
		<span style="font-size: larger;  margin-left: 110px;"><?php echo $info; ?></span>
		<?php endif; ?>
		  
  
          <?php $attributes = array('class' => 'form-horizontal'); ?>
          <?php echo form_open( 'user/edit-profile/' , $attributes ); ?>
  
          <fieldset id="block_add_book">
        
            <?php if( isset($error_message) ): ?>
            <span class="text-error"><?php echo $error_message; ?></span>
            <?php endif; ?>
        
            <?php if(!empty($user)): ?>
	   
	    
            <div class="control-group">
              <label class="control-label" for="txt_email">Email:</label>
                <input class="form-control" type="text" name="txt_email" id="txt_email" value="<?php echo set_value('txt_email', (!empty($user) ? $user->email_address : '')); ?>" size="50"/>
                <div class="help-inline">
                  <?php echo form_error('txt_email', '<span class="text-error">', '</span>'); ?>
                </div>
            </div>
            
         
            <div class="control-group">
              <label class="control-label" for="txt_full_name">Full Name:</label>
                <input class="form-control" type="text" name="txt_full_name" id="txt_full_name" value="<?php echo set_value('txt_full_name',(!empty($user) ? $user->full_name : '')); ?>" size="50" />
                <div class="help-inline">
                  <?php echo form_error('txt_full_name', '<span class="text-error">', '</span>'); ?>
                </div>
            </div>
    	
			<div class="control-group">
				<label class="control-label" for="txt_date_of_birth">Date of Birth:</label>
                <input type='text' class="form-control" name="txt_date_of_birth"  id="datepicker" value="<?php echo set_value('txt_date_of_birth',(!empty($user) ? $user->date_of_birth : '')); ?>" readonly/>    
				<div class="help-inline">
                  <?php echo form_error('txt_date_of_birth', '<span class="text-error">', '</span>'); ?>
                </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="rad_gender">Gender:</label>
			  <div class="form-inline">
                <label class="radio inline" for="rad_gender_male">
				<input type="radio" checked="" id="rad_gender_male" value="M" name="rad_gender" <?php echo set_radio('rad_gender', 'F' ,($user->gender == "M") ? TRUE : FALSE); ?>  />
				Male
				</label>
				<label class="radio inline" for="rad_gender_female">
				  <input type="radio" id="rad_gender_female" value="F" name="rad_gender" <?php echo set_radio('rad_gender', 'F' ,($user->gender == "F") ? TRUE : FALSE); ?> />
				  Female
				</label>
		
                <div class="help-inline">
                  <?php echo form_error('rad_gender', '<span class="text-error">', '</span>'); ?>
                </div>
			  </div>
          </div>
            
           <div class="control-group">
            <label class="control-label" for="ddl_country_list">Country List:</label>
              <?php if(!empty($country)):?>

              <select  class="form-control" name="ddl_country_list">
                <?php foreach($country as $row):?>
                <option value="<?php echo $row->country_code;?>" <?php echo set_select('ddl_country_list',$row->country_code, ($row->country_code == 'PAK')? TRUE:FALSE ); ?> ><?php echo $row->country_name;?> </option>
                <?php endforeach; ?>
              </select>
	        <?php endif;?>
	        <div class="help-inline">
	          <?php echo form_error('ddl_country_list', '<span class="text-error">', '</span>'); ?>
	        </div>
	    </div>  
	    
	    <br/>  
	    <div class="control-group">
                <input type="submit" id="btn_save" name="btn_save" value="Save" class="btn btn-primary"/>
            </div>
          <br/>
	  <?php endif; ?>
	    
          </fieldset>
           <?php echo form_close();?>
        
			</div>    
        </div><!--contents-->
    </div><!--search box-->

    </section>
    <footer class="row">			
	</footer>
</div>


 
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
 
<script type="text/javascript">
	 $(function () {
		$('#datepicker').datepicker({
			format: 'yyyy-mm-dd',
			todayHighlight: true
		});
	});
	 
	 
	$('#txt_email').blur(function() {
		var email_regex = new RegExp(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/);
		var email = $('#txt_email').val();
		
		if( $('#txt_email').val()== ""){
			$(this).parent().children('div').text("Please enter email address").addClass("text-error");
		}
		else if(!email_regex.test(email) ){
			$(this).parent().children('div').text("Email must contain valid email address").addClass("text-error");
		}
	 
	});
	
	
	
	$('#txt_full_name').blur(function() {
      var fullname_regex = new RegExp(/^[a-zA-Z\s]+$/);
      var name = $('#txt_full_name').val();
      if($('#txt_full_name').val() == "" ){
        $(this).parent().children('div').text("Please enter your full name").addClass("text-error");
      }
      
      else if(!fullname_regex.test(name) ){
          $(this).parent().children('div').text("Full name must contain characters").addClass("text-error");
      }

    });
	
	
	
	 $('#txt_email').keypress(function() {
      $(this).parent().children('div').text("").removeClass("text-error");
          
    });
        
    $('#txt_full_name').keypress(function() {
      $(this).parent().children('div').text("").removeClass("text-error");
          
    });
	
	
	
	
	
	 $(document).ready(function(){
      $('#btn_save').click(function(event) {
    
      
      // regex for email validation
      var email_regex = new RegExp(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/);
      var email = $('#txt_email').val();
      
      // regex for full name validation
      var fullname_regex = new RegExp(/^[a-zA-Z\s]+$/);
      var name = $('#txt_full_name').val();
      //
	  
	  
	  if($('#txt_email').val() == ""){
        event.preventDefault();
        $('#txt_email').parent().children('div').text("Please enter your email address").addClass("text-error");
            
      }
        
      else if(!email_regex.test(email) ){
          event.preventDefault();
          $('#txt_email').parent().children('div').text("Email must contain valid email address").addClass("text-error");
      }
	  
	  
	  
	   if($('#txt_full_name').val() == "" ){
         event.preventDefault();
        $('#txt_full_name').parent().children('div').text("Please enter your full name").addClass("text-error");
      }
      
      else if(!fullname_regex.test(name) ){
         event.preventDefault();
          $('#txt_full_name').parent().children('div').text("Full name must contain characters").addClass("text-error");
      }
	  
	  });
	 });
      
</script>