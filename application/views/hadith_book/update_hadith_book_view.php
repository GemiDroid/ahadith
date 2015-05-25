
<div class="col-md-9" style="margin-top: 50px;">

  <h4>Updating Hadith Book!</h4>
  <hr>

  <?php if(!empty($hadith_books)): ?>
  
      <?php echo form_open('admin/hadith-book/update/'.$hadith_book_id);?>

      <div class="control-group form-inline">
            <label class="control-label" for="hadith_book_title_ar">Arabic Title:</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <input class="form-control" style="width: 500px; height: 30px;" type="text" name="hadith_book_title_ar" id="hadith_book_title_ar" value="<?php echo set_value('hadith_book_title_ar', (!empty($hadith_books) ? $hadith_books->hadith_book_title_ar : '')); ?>" size="50"/>
          <div class="help-inline">
            <?php echo form_error('hadith_book_title_ar', '<span class="text-error">', '</span>'); ?>
          </div>
      </div>
      <div>&nbsp;</div>
     
     <div class="control-group form-inline">
            <label class="control-label" for="hadith_book_title_en">English Title:</label>&nbsp;&nbsp;&nbsp;
            <input class="form-control" style="width: 500px; height: 30px;" type="text" name="hadith_book_title_en" id="hadith_book_title_en" value="<?php echo set_value('hadith_book_title_en', (!empty($hadith_books) ? $hadith_books->hadith_book_title_en : '')); ?>" size="50"/>
            <div class="help-inline">
              <?php echo form_error('hadith_book_title_en', '<span class="text-error">', '</span>'); ?>
            </div> 
     </div>
      <div>&nbsp;</div>
      
      <div class="control-group form-inline">
            <label class="control-label" for="hadith_book_title_ur">Urdu Title:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input class="form-control" style="width: 500px; height: 30px;" type="text" name="hadith_book_title_ur" id="hadith_book_title_ur" value="<?php echo set_value('hadith_book_title_ur', (!empty($hadith_books) ? $hadith_books->hadith_book_title_ur : '')); ?>" size="50"/>
          <div class="help-inline">
            <?php echo form_error('hadith_book_title_ur', '<span class="text-error">', '</span>'); ?>
          </div>
      </div>
      <div>&nbsp;</div>
    <div class="control-group form-inline">
     <input type="submit" id="mysubmit" name="mysubmit" value="Update" class="btn btn-success">
        <a href="<?php echo (base_url().'admin/hadith-book'); ?>"><input type="button" value="Cancel" class="btn btn-primary">
        <a href="<?php echo (base_url().'admin/hadith-book/delete/'.$hadith_books->hadith_book_id); ?>"><input type="button" value="Delete" class="btn btn-danger"></a>
    </div>
      <?php echo form_close();?>
   
<?php else: echo 'Does not exist'; endif; ?>
      </div>
 </div>
