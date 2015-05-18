
            <div class="col-md-9" style="margin-top: 50px;">
  <h4>Adding Chapter</h4>
  <hr>


    <?php echo form_open('editor/chapter/add');?>

    <div class="control-group">
    <label for="txt_title_ar">Arabic Title:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="text" name="txt_title_ar" />
      <div class="help-inline">
            <?php echo form_error('txt_title_ar', '<span class="text-error">', '</span>'); ?>
      
        </div>
    </div>
    <div class="control-group">
        <label for="txt_title_en">English Title:</label>&nbsp;&nbsp;&nbsp;
	<input type="text" name="txt_title_en" />
      <div class="help-inline">
            <?php echo form_error('txt_title_en', '<span class="text-error">', '</span>'); ?>
      
        </div>
    </div>
    <div class="control-group">
        <label for="txt_title_ur">Urdu Title:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="text" name="txt_title_ur" />
        <div class="help-inline">
            <?php echo form_error('txt_title_ur', '<span class="text-error">', '</span>'); ?>
      
        </div>
    </div>
    
    <div class="control-group">
      
         <label for="txt_detail_ar">Arabic Detail:</label>&nbsp;&nbsp;
	<input type="text" name="txt_detail_ar" />
      <div class="help-inline">
            <?php echo form_error('txt_detail_ar', '<span class="text-error">', '</span>'); ?>
      
        </div>
    </div>
    <div class="control-group">
        <label for="txt_detail_en">English Detail:</label>
	<input type="text" name="txt_detail_en" />
        <div class="help-inline">
            <?php echo form_error('txt_detail_en', '<span class="text-error">', '</span>'); ?>
      
        </div>
    </div>
    
    <div class="control-group">
       <label for="txt_detail_ur">Urdu Detail:</label>&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="text" name="txt_detail_ur" />
        <div class="help-inline">
            <?php echo form_error('txt_detail_ur', '<span class="text-error">', '</span>'); ?>
      
        </div>
    </div>
  
  <div class="control-group">
   <label for="txt_book_id">Book ID:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  
          <select name="ddl_book_id">
          <?php if(!empty($books)):?>
          <?php foreach($books as $row):?>
            
              <option value="<?php echo $row->book_id;?>" <?php echo  set_select('ddl_book_id',$row->book_id, TRUE); ?> ><?php echo $row->book_title_en;?> </option>
           
          <?php endforeach; ?>
        <?php else:
            echo 'No book has been added ' . anchor('book/view','Add Book');?>
          <?php endif;?>
           </select>
          
  </div>
  
  
  <div class="control-group">
     <label for="txt_hadith_book_id"> Hadith Book ID:</label>
  
          <select name="ddl_hadith_book_id">
          <?php if(!empty($hadith_books)):?>
            <?php foreach($hadith_books as $row):?>
              
                <option value="<?php echo $row->hadith_book_id;?>" <?php echo  set_select('ddl_hadith_book_id',$row->hadith_book_id, TRUE); ?> ><?php echo $row->hadith_book_id;?> </option>
              
            <?php endforeach; ?>
          <?php endif;?>
          </select>
  </div>
  <br>
      <div class="control-group">
        <input type="submit" id="mysubmit" name="mysubmit" value="Add" class="btn btn-success"/>
      <a href="<?php echo (base_url().'chapter'); ?>"><input type="button" value="Cancel" class="btn btn-primary">
      <?php echo form_close();?>

        </div>
 
        
            </div>
 </div>
