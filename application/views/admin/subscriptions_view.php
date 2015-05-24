
<div class="col-md-9" style="margin-top: 50px;">
  

  <h4>Send Email Alerts</h4>
  <hr>
  
<?php if(!empty($error_message)): ?>
  <span style="text-align: center;"><strong><?php echo $error_message; ?></strong></span>
<?php endif; ?>
  
  
    <?php $attributes = array('class' => 'form-horizontal'); ?>
    <?php echo form_open( 'admin/subscriptions' , $attributes ); ?>
<div class="control-group">
   <div class="col-md-2"> <label for="ddl_user_list">User ID: </label></div> 
  <select name="ddl_user_list">
    <?php if(!empty($users)): ?>
    
    <?php foreach($users as $row):?>
    <option value="<?php echo $row->user_id;?>" <?php echo set_select('ddl_user_list',$row->user_id, ($row->user_id == '')? TRUE:FALSE ); ?> ><?php echo $row->user_id;?> </option>
    <?php endforeach; ?>
    
    
    <?php else: ?>
            <option>None</option>
    <?php endif; ?>
    
  </select>
  
</div>
 <div>&nbsp;</div>
<div class="control-group">
<div class="col-md-2"><label for="ddl_hadith_list">Hadith ID: </label></div>

  <select name="ddl_hadith_list">
    <?php foreach($ahadith as $row):?>
    <option value="<?php echo $row->hadith_id;?>" <?php echo set_select('ddl_hadith_list',$row->hadith_id, ($row->hadith_id == '')? TRUE:FALSE ); ?> ><?php echo $row->hadith_id;?> </option>
    <?php endforeach; ?>
  </select>
 </div>
 <div>&nbsp;</div>
<div class="control-group">
<input type="submit" id="mysubmit" name="mysubmit" value="Send" class="btn btn-success"/>
<a href="<?php echo base_url().'admin' ?>"><input type="button" value="Cancel" class="btn btn-primary"></a>
</div>
<?php echo form_close(); ?>

</div>
      </div>      
        
    
          