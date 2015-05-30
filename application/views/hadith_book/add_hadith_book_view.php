<div class="col-md-9" style="margin-top: 50px;">

  <fieldset class="col-md-7">
  
  <legend>Adding Hadith Book</legend>
  
    <?php echo form_open('admin/hadith-book/add/');?>

    <div class="control-group">
      <label for="hadith_book_id">Hadith Book ID:</label>
      <input class="form-control" type="text" name="hadith_book_id" id="hadith_book_id" value="<?php echo set_value('hadith_book_id'); ?>" size="50"/>
      <div class="help-inline">
        <?php echo form_error('hadith_book_id', '<span class="text-error">', '</span>'); ?>
      </div>
    </div>
    
    <div class="control-group">
      <label for="hadith_book_title_ar">Hadith Book Arabic Title:</label>
      <input class="form-control" type="text" name="hadith_book_title_ar" id="hadith_book_title_ar" value="<?php echo set_value('hadith_book_title_ar'); ?>" size="50"/>
      <div class="help-inline">
        <?php echo form_error('hadith_book_title_ar', '<span class="text-error">', '</span>'); ?>
      </div>
    </div>
    
     
    <div class="control-group">
      <label for="hadith_book_title_en">Hadith Book English Title:</label>
      <input class="form-control" type="text" name="hadith_book_title_en" id="hadith_book_title_en" value="<?php echo set_value('hadith_book_title_en'); ?>" size="50"/>
      <div class="help-inline">
        <?php echo form_error('hadith_book_title_en', '<span class="text-error">', '</span>'); ?>
      </div> 
    </div>
      
      
    <div class="control-group">
      <label  for="hadith_book_title_ur">Hadith Book Urdu Title:</label>
      <input class="form-control" type="text" name="hadith_book_title_ur" id="hadith_book_title_ur" value="<?php echo set_value('hadith_book_title_ur'); ?>" size="50"/>
      <div class="help-inline">
        <?php echo form_error('hadith_book_title_ur', '<span class="text-error">', '</span>'); ?>
      </div>
    </div>
    
    <br/>
    
    <div class="control-group">
      <button type="submit" id="mysubmit" name="mysubmit" value="add" class="btn btn-primary">Save Record</button>
      <a href="<?php echo (base_url().'admin/hadith-book'); ?>" class="btn btn-default">Cancel</a>
    </div>
    <?php echo form_close();?>
  </fieldset>
</div>
</div>
