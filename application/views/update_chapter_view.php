 <div class="col-md-9" style="margin-top: 50px;">

  <h4>Updating Chapter!</h4>
  <hr>

  <?php
  if(!empty($chapter)){

  ?>
 
      <?php echo form_open('admin/chapter/update/'.$chapter_id);?>
      
        <div class="control-group">
            <label class="control-label" for="txt_title_ar">Arabic Title:</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" name="txt_title_ar" id="txt_title_ar" value="<?php echo set_value('txt_title_ar', (!empty($chapter) ? $chapter->chapter_title_ar : '')); ?>" size="50"/>
          <div class="help-inline">
            <?php echo form_error('txt_title_ar', '<span class="text-error">', '</span>'); ?>
          </div>
        </div>
      <div>&nbsp;</div>
      
      <div class="control-group">
            <label class="control-label" for="txt_title_en">English Title:</label>&nbsp;&nbsp;
            <input type="text" name="txt_title_en" id="txt_title_en" value="<?php echo set_value('txt_title_en', (!empty($chapter) ? $chapter->chapter_title_en : '')); ?>" size="50"/>
          <div class="help-inline">
            <?php echo form_error('txt_title_en', '<span class="text-error">', '</span>'); ?>
          </div>
      </div>
      <div>&nbsp;</div>
      <div class="control-group">
            <label class="control-label" for="txt_title_ur">Urdu Title:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" name="txt_title_ur" id="txt_title_ur" value="<?php echo set_value('txt_title_ur', (!empty($chapter) ? $chapter->chapter_title_ur : '')); ?>" size="50"/>
          <div class="help-inline">
            <?php echo form_error('txt_title_ur', '<span class="text-error">', '</span>'); ?>
          </div>
      </div>
      <div>&nbsp;</div>
      <div class="control-group">
            <label class="control-label" for="txt_detail_ar">Arabic Detail:</label>&nbsp;&nbsp;
            <input type="text" name="txt_detail_ar" id="txt_detail_ar" value="<?php echo set_value('txt_detail_ar', (!empty($chapter) ? $chapter->chapter_detail_ar : '')); ?>" size="50"/>
          <div class="help-inline">
            <?php echo form_error('txt_detail_ar', '<span class="text-error">', '</span>'); ?>
          </div>
      </div>
      <div>&nbsp;</div>
    
     <div class="control-group">
            <label class="control-label" for="txt_detail_en">English Detail:</label>
            <input type="text" name="txt_detail_en" id="txt_detail_en" value="<?php echo set_value('txt_detail_en', (!empty($chapter) ? $chapter->chapter_detail_en : '')); ?>" size="50"/>
        <div class="help-inline">
            <?php echo form_error('txt_detail_en', '<span class="text-error">', '</span>'); ?>
          </div> 
     </div>
      <div>&nbsp;</div>
       <div class="control-group">
           <label class="control-label" for="txt_detail_ur">Urdu Detail:</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" name="txt_detail_ur" id="txt_detail_ur" value="<?php echo set_value('txt_detail_ur', (!empty($chapter) ? $chapter->chapter_detail_ur : '')); ?>" size="50"/>
          <div class="help-inline">
            <?php echo form_error('txt_detail_ur', '<span class="text-error">', '</span>'); ?>
          </div>
       </div>
      <div>&nbsp;</div>
      
      <div class="control-group">
            <label class="control-label" for="txt_book_id">Book ID:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      
        <select name="ddl_book_id">
        <?php if(!empty($books)):?>
          <?php foreach($books as $row):?>
            
              <option value="<?php echo $row->book_id;?>" <?php echo  set_select('ddl_book_id',$row->book_id, TRUE); ?> ><?php echo $row->hadith_book_id;?> </option>
           
          <?php endforeach; ?>
          <?php endif;?>
         </select>  
      </div>
    <div>&nbsp;</div>
    
    <div class="control-group">
            <label class="control-label" for="txt_hadith_book_id_ar">Hadith Book ID:</label>
    
      <select name="ddl_hadith_book_id">        
        <?php if(!empty($hadith_books)):?>
          <?php foreach($hadith_books as $row):?>
            
              <option value="<?php echo $row->hadith_book_id;?>" <?php echo  set_select('ddl_hadith_book_id',$row->hadith_book_id, TRUE); ?> ><?php echo $row->hadith_book_id;?> </option>
            
          <?php endforeach; ?>
          <?php endif;?>
        </select>  
    </div>
    
    <div>&nbsp;</div>
    <div class="control-group">
            
    
        <input type="submit" id="mysubmit" name="mysubmit" value="Update" class="btn btn-success">
          <a href="<?php echo (base_url().'chapter'); ?>"><input type="button" value="Cancel" class="btn btn-primary">
        <a href="<?php echo (base_url().'chapter/delete/'.$chapter->chapter_id); ?>"><input type="button" value="Delete" class="btn btn-danger"></a>
    </div>
      <?php echo form_close();?>
 
<?php
}
else
  echo 'Does not exist';

  ?>
            </div>
 </div>
