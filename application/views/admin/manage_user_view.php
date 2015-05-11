
            <div class="col-md-9">
                <h3>Edit User</h3>
                <?php echo validation_errors(); ?>
  
                <?php $attributes = array('class' => 'form-horizontal'); ?>
                <?php echo form_open( 'admin/user/'.$user[0]->user_id , $attributes ); ?>
      
              
                  <?php if( isset($error_message) ): ?>
                  <span class="text-error"><?php echo $error_message; ?></span>
                  <?php endif; ?>
              
                  <?php if(!empty($user)): ?>
                 
                 <div><hr></div>
                 
                <div>
                    <label for="rad_user_status">User Status:</label>
                     &nbsp; &nbsp;
                    <label for="rad_active"> 
                      <input type="radio" checked="" id="rad_active" value="1" name="rad_user_status" <?php echo set_radio('rad_user_status', '1', FALSE); ?> />
                    Active
                    </label>
                    &nbsp; &nbsp;
                    <label for="rad_block">
                      <input type="radio" id="rad_block" value="0" name="rad_user_status" <?php echo set_radio('rad_user_status', '0', TRUE); ?> />
                     Block
                    </label>
                   
                </div>
                
                <div>&nbsp;</div>
                
                <div>
                    
                    <label for="ddl_user_role">User Role:</label>
                     <?php if(!empty($role)):?>

                        <select name="ddl_user_role" id="ddl_user_role" multiple="multiple" ><!--data-placeholder="Choose a Role" style="width:350px;" multiple class="chosen-select"-->
                           
                          <?php foreach($role as $row):?>
                          <option value="<?php echo $row->role_title;?>" <?php echo set_select('ddl_user_role',$row->role_title, ($row->role_title == '')? TRUE:FALSE ); ?> ><?php echo $row->role_title;?> </option>
                          <?php endforeach; ?>
                      
                        </select>
                        <?php endif;?>
                    
                </div>
                
                  <div>&nbsp;</div>	    
                  <div class="control-group">
                      
                     <a href="<?php echo base_url().'admin/user/'.$user[0]->user_id ?>"> <input type="submit" id="btn_save" name="btn_save" value="save" class="btn btn-success"/></a>
                      <a href="<?php echo base_url().'admin/users' ?>"><input type="button" value="Cancel" class="btn btn-primary"></a>
                  </div>
                
                <?php endif; ?>
                
                 <?php echo form_close();?>
            </div>
        
        </div>


<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.proto.js"></script>
<script>
$(document).ready(function(){
   //$("#ddl_user_role").multiselect();
   $(".chosen-select").chosen()
});

</script>-->