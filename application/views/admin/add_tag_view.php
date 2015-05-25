

<div class="col-md-9" style="margin-top: 50px;">
  <h4>Adding Tag</h4>
  <hr>

    <?php echo form_open('admin/add');?>   
        
         <div class="control-group  form-inline">
       
          <label for="txt_title_ar">Arabic Title:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         
	<input class="form-control" style="width: 500px; height: 30px;" type="text" name="txt_title_ar" value="<?php echo set_value('txt_title_ar',''); ?>" />
	<div class="help-inline">
            <?php echo form_error('txt_title_ar', '<span class="text-error">', '</span>'); ?>
      
        </div>
         </div>
     
     <br/>
        
         <div class="control-group  form-inline">
       <label for="txt_title_en">English Title:</label>&nbsp;&nbsp;&nbsp;
	<input class="form-control" style="width: 500px; height: 30px;" type="text" name="txt_title_en" value="<?php echo set_value('txt_title_en',''); ?>" />
	<div class="help-inline">
            <?php echo form_error('txt_title_en', '<span class="text-error">', '</span>'); ?>
        </div>
         </div>

        <br/>
         <div class="control-group  form-inline">
         <label for="txt_title_ur">Urdu Title:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input class="form-control" style="width: 500px; height: 30px;" type="text" name="txt_title_ur" value="<?php echo set_value('txt_title_ur',''); ?>" />
      <div class="help-inline">
            <?php echo form_error('txt_title_ur', '<span class="text-error">', '</span>'); ?>
        </div>
       </div>
	
        <br/>
        
         <div class="control-group  form-inline">
        <label for="txt_detail_ar">Arabic Detail:</label>&nbsp;&nbsp;&nbsp;
	<input class="form-control" style="width: 500px; height: 30px;" type="text" name="txt_detail_ar" value="<?php echo set_value('txt_detail_ar',''); ?>"/>
	<div class="help-inline">
            <?php echo form_error('txt_detail_ar', '<span class="text-error">', '</span>'); ?>
        </div>
         </div>
        
        <br/>
        
         <div class="control-group  form-inline">
        <label for="txt_detail_en">English Detail:</label>&nbsp;
	<input class="form-control" style="width: 500px; height: 30px;" type="text" name="txt_detail_en" value="<?php echo set_value('txt_detail_en',''); ?>"/>
        <div class="help-inline">
            <?php echo form_error('txt_detail_en', '<span class="text-error">', '</span>'); ?>
        </div>
         </div>
        
        <br/>
        
         <div class="control-group  form-inline">
         <label for="txt_detail_ur">Urdu Detail:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input class="form-control" style="width: 500px; height: 30px;" type="text" name="txt_detail_ur" value="<?php echo set_value('txt_detail_ur',''); ?>"/>
	<div class="help-inline">
            <?php echo form_error('txt_detail_ur', '<span class="text-error">', '</span>'); ?>
        </div>
         </div>
	
      <br/>
      
       <input type="submit" id="mysubmit" name="mysubmit" value="Add Tag" class="btn btn-success"/>
       <a href="<?php echo base_url().'admin/tags' ?>"><input type="button" value="Cancel" class="btn btn-primary"></a>
      <?php echo form_close();?>

    </tbody>
  </table>

      </div>
 </div>
