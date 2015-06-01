<div class="container">
    <header class="row">
      <h2 class="col-sm-3 col-lg-2 hidden-xs">Register</h2>
    </header>
    <section class="row">
    
    <div class="search-box">             
        <div id="contents">
          
        <div class="col-md-8 register"> 
          <?php if(!empty($info)): ?>
          <span style="font-size: medium; font-style: italic;"><?php echo $info; ?></span>
          <?php endif; ?>
    
          <?php $attributes = array('class' => 'form-horizontal'); ?>
          <?php echo form_open( 'user/register' , $attributes ); ?>
    
          <fieldset id="block_add_book">
          
          <?php if( isset($error_message) ): ?>
          <span class="text-error"><?php echo $error_message; ?></span>
          <?php endif; ?>
          
          <div class="control-group">
            <label class="control-label" for="txt_username">Username:</label>
            <input class="form-control" type="text" name="txt_username" id="txt_username" value="<?php echo set_value('txt_username',''); ?>" size="50" />
            <div class="help-inline">
              <?php echo form_error('txt_username', '<span class="text-error">', '</span>'); ?>
            </div>
          </div>
              
              
          <div class="control-group">
            <label class="control-label" for="txt_email">Email:</label>
            <input class="form-control" type="text" name="txt_email" id="txt_email" value="<?php echo set_value('txt_email', ''); ?>" size="50" />
            <div class="help-inline">
              <?php echo form_error('txt_email', '<span class="text-error">', '</span>'); ?>
            </div>
          </div>
              
              
          <div class="control-group">
            <label class="control-label" for="txt_password">Password:</label>
            <input class="form-control" type="password" name="txt_password" id="txt_password" value="<?php echo set_value('txt_password', ''); ?>" size="50" />
            <div class="help-inline">
              <?php echo form_error('txt_password', '<span class="text-error">', '</span>'); ?>
            </div>
          </div>
              
              
          <div class="control-group">
            <label class="control-label" for="txt_confirm_password">Confirm Password:</label>
            <input class="form-control" type="password" name="txt_confirm_password" id="txt_confirm_password" value="<?php echo set_value('txt_confirm_password', ''); ?>" size="50" />
            <div class="help-inline">
              <?php echo form_error('txt_confirm_password', '<span class="text-error">', '</span>'); ?>
            </div>
          </div>
          
          
          <div class="control-group">
            <label class="control-label" for="txt_full_name">Full Name:</label>
            <input class="form-control" type="text" name="txt_full_name" id="txt_full_name" value="<?php echo set_value('txt_full_name', ''); ?>" size="50" />
            <div class="help-inline">
              <?php echo form_error('txt_full_name', '<span class="text-error">', '</span>'); ?>
            </div>
          </div>
      
          <div class="control-group">
              <label class="control-label" for="txt_date_of_birth">Date of Birth:</label>
              <input type='text' class="form-control" name="txt_date_of_birth"  id="datepicker" value="<?php echo set_value('txt_date_of_birth',''); ?>" readonly/>    
              <div class="help-inline">
                <?php echo form_error('txt_date_of_birth', '<span class="text-error">', '</span>'); ?>
              </div>
          </div>

              
              
          <div class="control-group">
            <label class="control-label" for="rad_gender">Gender:</label>
            <div class="form-inline">
              <label class="radio inline" for="rad_gender_male">
            <input type="radio" checked="" id="rad_gender_male" value="M" name="rad_gender" <?php echo set_radio('rad_gender', 'M', TRUE); ?> />
            Male
            </label>
            <label class="radio inline" for="rad_gender_female">
              <input type="radio" id="rad_gender_female" value="F" name="rad_gender" <?php echo set_radio('rad_gender', 'F', FALSE); ?> />
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

            <select class="form-control" name="ddl_country_list">
              <?php foreach($country as $row):?>
              <option value="<?php echo $row->country_code;?>" <?php echo set_select('ddl_country_list',$row->country_code, ($row->country_code == 'PAK')? TRUE:FALSE ); ?> ><?php echo $row->country_name;?> </option>
              <?php endforeach; ?>
            </select>
            <?php endif;?>
            <div class="help-inline">
              <?php echo form_error('ddl_country_list', '<span class="text-error">', '</span>'); ?>
            </div>
          </div>  
          <div>&nbsp;</div>
          <div class="control-group">
            <input type="submit" id="btn_register" name="btn_register" value="Register" class="btn btn-primary"/>
          </div>
            
          </fieldset>
          <br/>
          <?php echo form_close();?>
        </div>     
        </div><!--conntents-->
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
</script>