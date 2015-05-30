<div class="col-md-9" style="margin-top: 50px;">
  
  <fieldset class="col-md-7">
	<legend>Update Tag</legend>
	<?php $attributes = array('class' => 'form-horizontal'); ?>
    <?php echo form_open( 'admin/tag/update/'.$tag_id, $attributes ); ?>  
        
        <div class="control-group">
       
          <label for="txt_title_ar">Arabic Title:</label>     
		  <input class="form-control" type="text" name="txt_title_ar" value="<?php echo set_value('txt_title_ar',(!empty($tag) ? $tag->tag_title_ar : '')); ?>" />
		  <div class="help-inline">
            <?php echo form_error('txt_title_ar', '<span class="text-error">', '</span>'); ?>
		  </div>
        </div>
        
        <div class="control-group">
		  <label for="txt_title_en">English Title:</label>
			<input class="form-control" type="text" name="txt_title_en" value="<?php echo set_value('txt_title_en',(!empty($tag) ? $tag->tag_title_en : '')); ?>" />
			<div class="help-inline">
			  <?php echo form_error('txt_title_en', '<span class="text-error">', '</span>'); ?>
			</div>
        </div>

         <div class="control-group">
         <label for="txt_title_ur">Urdu Title:</label>
		  <input class="form-control" type="text" name="txt_title_ur" value="<?php echo set_value('txt_title_ur',(!empty($tag) ? $tag->tag_title_ur : '')); ?>" />
	  	  <div class="help-inline">
            <?php echo form_error('txt_title_ur', '<span class="text-error">', '</span>'); ?>
		  </div>
		</div>
        
        <div class="control-group">
		  <label for="txt_detail_ar">Arabic Detail:</label>
		  <input class="form-control" type="text" name="txt_detail_ar" value="<?php echo set_value('txt_detail_ar',(!empty($tag) ? $tag->tag_detail_ar : '')); ?>"/>
		  <div class="help-inline">
			  <?php echo form_error('txt_detail_ar', '<span class="text-error">', '</span>'); ?>
		  </div>
       </div>
        
        <div class="control-group">
        <label for="txt_detail_en">English Detail:</label>
		  <input class="form-control" type="text" name="txt_detail_en" value="<?php echo set_value('txt_detail_en',(!empty($tag) ? $tag->tag_detail_en : '')); ?>"/>
		  <div class="help-inline">
            <?php echo form_error('txt_detail_en', '<span class="text-error">', '</span>'); ?>
		  </div>
        </div>
        
        <div class="control-group">
         <label for="txt_detail_ur">Urdu Detail:</label>
		  <input class="form-control" type="text" name="txt_detail_ur" value="<?php echo set_value('txt_detail_ur',(!empty($tag) ? $tag->tag_detail_ur : '')); ?>"/>
		  <div class="help-inline">
            <?php echo form_error('txt_detail_ur', '<span class="text-error">', '</span>'); ?>
		  </div>
        </div>
	
      <br/>
	  <div class="control-group">
		<button type="submit" id="btn_save" name="btn_save" class="btn btn-primary">
            <?php if($tag->approved_by == null OR empty($tag->approved_by) ): ?>
                  <?php echo "Approve Tag"; ?>
            <?php else: ?>
                  <?php echo "Save Record"; ?>
            <?php endif; ?>
            
        </button>
        <a href="<?php echo base_url().'admin/tag/delete/'.$tag_id ?>" class="btn btn-danger">Delete Record</a>
		<a href="<?php echo base_url().'admin/tag' ?>" class="btn btn-default">Cancel</a>
	  </div>
	  
      <?php echo form_close();?>

    </tbody>
  </table>

</fieldset>
</div>
</div>
