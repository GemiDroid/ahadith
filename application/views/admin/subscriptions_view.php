<div class="col-md-9" style="margin-top: 50px;">
  
  <fieldset>
  
  <legend>Send Email Alerts</legend>
  
<?php if(!empty($error_message)): ?>
  <span style="text-align: center;"><strong><?php echo $error_message; ?></strong></span>
<?php endif; ?>
  
  
    <?php $attributes = array('class' => 'form-horizontal'); ?>
    <?php echo form_open( 'admin/subscriptions' , $attributes ); ?>
    
    <div class="control-group">
      <label for="ddl_user_list">User ID: </label>
        <select class="form-control" multiple  name="ddl_user_list">
          <?php if(!empty($users)): ?>
            <?php foreach($users as $row):?>
              <option value="<?php echo $row->user_id;?>" <?php echo set_select('ddl_user_list',$row->user_id, ($row->user_id == '')? TRUE:FALSE ); ?> ><?php echo $row->user_id;?> </option>
            <?php endforeach; ?>
          <?php else: ?>
              <option>None</option>
          <?php endif; ?>
        </select>
      </div>

  
    <div class="control-group">
      <label for="ddl_hadith_list">Hadith ID: </label>
      <select class="form-control" multiple name="ddl_hadith_list">
        <?php foreach($ahadith as $row):?>
          <option value="<?php echo $row->hadith_id;?>" <?php echo set_select('ddl_hadith_list',$row->hadith_id, ($row->hadith_id == '')? TRUE:FALSE ); ?> ><?php echo $row->hadith_id;?> </option>
        <?php endforeach; ?>
      </select>
    </div>
    
    <br/>
    <div class="control-group">
      <button type="submit" id="mysubmit" name="mysubmit" class="btn btn-primary">Send</button>
      <a href="<?php echo base_url().'admin' ?>" class="btn btn-default">Cancel</a>
    </div>
  <?php echo form_close(); ?>

</fieldset>
  
</div>
</div>      
        
    
          