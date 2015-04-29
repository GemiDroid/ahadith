<div class="container">
    <header class="row">
      <h2 class="col-sm-3 col-lg-2 hidden-xs">Edit Profile</h2>
    </header>
    <section class="row">
    
    <div class="search-box">             
        <div id="contents">
          
          <?php echo validation_errors(); ?>
  
          <?php $attributes = array('class' => 'form-horizontal'); ?>
          <?php echo form_open( 'user/edit-profile/' , $attributes ); ?>
  
          <fieldset id="block_add_book">
        
            <?php if( isset($error_message) ): ?>
            <span class="text-error"><?php echo $error_message; ?></span>
            <?php endif; ?>
        
            <?php if(!empty($user)): ?>
	   
	    
            <div class="control-group">
              <label class="control-label" for="txt_email">Email:</label>
              <div class="controls">
                <input type="text" name="txt_email" id="txt_email" value="<?php echo set_value('txt_email', (!empty($user) ? $user->email_address : '')); ?>" size="50"/>
                <div class="help-inline">
                  <?php echo form_error('txt_email', '<span class="text-error">', '</span>'); ?>
                </div>
              </div>
            </div>
            
         
            <div class="control-group">
              <label class="control-label" for="txt_full_name">Full Name:</label>
              <div class="controls">
                <input type="text" name="txt_full_name" id="txt_full_name" value="<?php echo set_value('txt_full_name',(!empty($user) ? $user->full_name : '')); ?>" size="50" />
                <div class="help-inline">
                  <?php echo form_error('txt_full_name', '<span class="text-error">', '</span>'); ?>
                </div>
              </div>
            </div>
    
    
            <div class="control-group">
              <label class="control-label" for="txt_date_of_birth">Date of Birth:</label>
              <div class="controls">
                
                <select name="day">
                  <?php for($i=1;$i<32;$i++):?>
                  <option value="<?php echo $i;?>" <?php echo set_select('day',$i, TRUE ); ?> ><?php echo $i;?></option>
                  <?php endfor; ?>
                </select>
                
                 <select name="month">
                  <option value="1" <?php echo set_select('month',1, TRUE ); ?>>January</option>
                  <option value="2" <?php echo set_select('month',2, FALSE ); ?>>Febuary</option>
                  <option value="3" <?php echo set_select('month',3, FALSE ); ?>>March</option>
                  <option value="4" <?php echo set_select('month',4, FALSE ); ?>>April</option>
                  <option value="5" <?php echo set_select('month',5, FALSE ); ?>>May</option>
                  <option value="6" <?php echo set_select('month',6, FALSE ); ?>>June</option>
                  <option value="7" <?php echo set_select('month',7, FALSE ); ?>>July</option>
                  <option value="8" <?php echo set_select('month',8, FALSE); ?>>August</option>
                  <option value="9" <?php echo set_select('month',9, FALSE ); ?>>September</option>
                  <option value="10" <?php echo set_select('month',10, FALSE ); ?>>October</option>
                  <option value="11" <?php echo set_select('month',11, FALSE ); ?>>November</option>
                  <option value="12" <?php echo set_select('month',12, FALSE ); ?>>December</option>
                </select>
      
                <select name="year">
                  <?php for($i=1947;$i<date("Y");$i++):?>
                    <option value="<?php echo $i;?>" <?php echo set_select('year',$i, TRUE ); ?>><?php echo $i;?></option>
                  <?php endfor; ?>
                </select>
          
                <div class="help-inline">
                  <?php echo form_error('day', '<span class="text-error">', '</span>'); ?>
                  <?php echo form_error('month', '<span class="text-error">', '</span>'); ?>
                  <?php echo form_error('year', '<span class="text-error">', '</span>'); ?>
                </div>
              </div>
            </div>
            
            
            <div class="control-group">
              <label class="control-label" for="rad_gender">Gender:</label>
              <div class="controls">
                <!--<input type="text" name="rad_gender" id="rad_gender" value="<?php echo set_value('rad_gender', (!empty($user) ? $user->gender : '')); ?>" size="50" />-->
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
            <div class="controls">
              <?php if(!empty($country)):?>

              <select name="ddl_country_list">
                <?php foreach($country as $row):?>
                <option value="<?php echo $row->country_code;?>" <?php echo set_select('ddl_country_list',$row->country_code, ($row->country_code == 'PAK')? TRUE:FALSE ); ?> ><?php echo $row->country_name;?> </option>
                <?php endforeach; ?>
              </select>
	        <?php endif;?>
	        <div class="help-inline">
	          <?php echo form_error('ddl_country_list', '<span class="text-error">', '</span>'); ?>
	        </div>
	      </div>
	    </div>  
	    
	    <div>&nbsp;</div>	    
	    <div class="control-group">
              <div class="controls">
                
                <input type="submit" id="btn_save" name="btn_save" value="Save" class="btn btn-primary"/>
                
              </div>
            </div>
          
	  <?php endif; ?>
	    
          </fieldset>
           <?php echo form_close();?>
            
        </div><!--search box-->
    </div><!--contents-->

    </section>
        <footer class="row">			
	</footer>
</div>