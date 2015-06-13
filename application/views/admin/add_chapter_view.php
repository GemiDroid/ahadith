<fieldset>
  
   <legend>Adding Chapter</legend>
 
      <?php echo form_open('admin/chapter/add/');?>
      
        <div class="control-group">
            <label class="control-label" for="txt_title_ar">Arabic Title:</label>
            <textarea class="form-control" type="text" name="txt_title_ar" id="txt_title_ar" lang='AR' rows=5>
             <?php echo set_value('txt_title_ar'); ?>
            </textarea>
          <div class="help-inline">
            <?php echo form_error('txt_title_ar', '<span class="text-error">', '</span>'); ?>
          </div>
        </div>
      
      <div class="control-group">
          <label class="control-label" for="txt_title_en">English Title:</label>
          <textarea class="form-control" lang='EN' type="text" name="txt_title_en" id="txt_title_en" rows=5>
           <?php echo set_value('txt_title_en'); ?>
          </textarea>
            
          <div class="help-inline">
            <?php echo form_error('txt_title_en', '<span class="text-error">', '</span>'); ?>
          </div>
      </div>
      
      <div class="control-group">
            <label class="control-label" for="txt_title_ur">Urdu Title:</label>
            <textarea class="form-control" lang='UR' type="text" name="txt_title_ur" id="txt_title_ur" rows=5>
             <?php echo set_value('txt_title_ur'); ?>
            </textarea>
          <div class="help-inline">
            <?php echo form_error('txt_title_ur', '<span class="text-error">', '</span>'); ?>
          </div>
      </div>
      
      <div class="control-group">
            <label class="control-label" for="txt_detail_ar">Arabic Detail:</label>
            <textarea class="form-control" lang='AR' type="text" name="txt_detail_ar" id="txt_detail_ar" rows=5>
             <?php echo set_value('txt_detail_ar'); ?>
            </textarea>
          <div class="help-inline">
            <?php echo form_error('txt_detail_ar', '<span class="text-error">', '</span>'); ?>
          </div>
      </div>
      
     <div class="control-group">
            <label class="control-label" for="txt_detail_en">English Detail:</label>
            <textarea class="form-control" type="text" name="txt_detail_en" id="txt_detail_en"  rows=5>
             <?php echo set_value('txt_detail_en'); ?>
            </textarea>
            <div class="help-inline">
            <?php echo form_error('txt_detail_en', '<span class="text-error">', '</span>'); ?>
          </div> 
     </div>
      
       <div class="control-group">
           <label class="control-label" for="txt_detail_ur">Urdu Detail:</label>
            <textarea class="form-control" lang="UR" type="text" name="txt_detail_ur" id="txt_detail_ur" rows=5>
             <?php echo set_value('txt_detail_ur'); ?>
            </textarea>
          <div class="help-inline">
            <?php echo form_error('txt_detail_ur', '<span class="text-error">', '</span>'); ?>
          </div>
       </div>
       
      <div class="control-group">
        <label class="control-label" for="ddl_hadith_book_id">Hadith Book ID:</label>
        <select class="form-control" id="ddl_hadith_book_id" name="ddl_hadith_book_id">        
        <?php if(!empty($hadith_books)):?>
          <?php foreach($hadith_books as $row):?>
            <option value="<?php echo $row->hadith_book_id;?>" <?php echo  set_select('ddl_hadith_book_id',$row->hadith_book_id); ?> ><?php echo $row->hadith_book_id;?> </option>
          <?php endforeach; ?>
        <?php endif;?>
        </select> 
      </div>
     
     <div class="control-group">
         <label class="control-label" for="ddl_book_id">Book ID:</label>
         <select class="form-control" id="ddl_book_id" name="ddl_book_id">
         <?php if(!empty($books)):?>
           <?php foreach($books as $row):?>
             <option value="<?php echo $row->book_id;?>" <?php echo  set_select('ddl_book_id',$row->book_id ); ?> ><?php echo $row->book_title_en;?> </option>
           <?php endforeach; ?>
           <?php endif;?>
          </select>
      </div>
    
    <br/>
    <div class="control-group">
        <button type="submit" id="mysubmit" name="mysubmit" class="btn btn-primary">Save Record</button>
        <a href="<?php echo (base_url().'admin/chapter'); ?>" class="btn btn-default">Cancel</a>
    </div>
    <?php echo form_close();?>
 </fieldset>
<script type="text/javascript">
  
 $(document).ready(function(){

  $('#ddl_hadith_book_id').on("change", function() {
    //prepare the data to be passed
    var result ={};
    result['task'] = 'hadith-book';
    result['hadith_book_id'] = $('#ddl_hadith_book_id').val();
 
    $.ajax({
        type: "POST",
        url: '<?php echo base_url(); ?>admin/chapter',
        data: { data: result },
        success: function(data) {
          data = $.parseJSON( data );
          $('#ddl_book_id').html(data.book_list);
          //$('#ddl_chapter_id').html(data.chapter_list);
          //$('#ddl_hadith_list').html(data.ahadith_list);
      }
    });
  });
 });
</script>