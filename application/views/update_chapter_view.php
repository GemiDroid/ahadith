
            
            <div class="col-md-9">

  <h3>Updating Chapter!</h3>

  <?php
  if(!empty($chapter)){

  ?>
  <table>

    <tbody>
      <?php echo form_open('admin/chapter/update/'.$chapter_id);?>
      <tr>
        <td><?php echo form_label('Arabic Title','txt_title_ar');?></td>
        <td><?php echo form_input('txt_title_ar',(!empty($chapter) ? $chapter->chapter_title_ar : '')); ?></td>
      </tr>
      <tr>
        <td><?php echo form_label('English Title','txt_title_en');?></td>
        <td><?php echo form_input('txt_title_en',(!empty($chapter) ? $chapter->chapter_title_en : '')); ?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Urdu Title','txt_title_ur');?></td>
        <td><?php echo form_input('txt_title_ur',(!empty($chapter) ? $chapter->chapter_title_ur : ''));?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Arabic Detail','txt_detail_ar');?></td>
        <td><?php echo form_input('txt_detail_ar',(!empty($chapter) ? $chapter->chapter_detail_ar : ''));?></td>
      </tr>
      <tr>
        <td><?php echo form_label('English Detail','txt_detail_en');?></td>
        <td><?php echo form_input('txt_detail_en',(!empty($chapter) ? $chapter->chapter_detail_en : ''));?></td>
      </tr>
      <tr>
        <td><?php echo form_label('urdu Detail','txt_detail_ur');?></td>
        <td><?php echo form_input('txt_detail_ur',(!empty($chapter) ? $chapter->chapter_detail_ur : ''));?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Book Id','txt_book_id');?></td>
        <td>
        <select name="ddl_book_id">
        <?php if(!empty($books)):?>
          <?php foreach($books as $row):?>
            
              <option value="<?php echo $row->book_id;?>" <?php echo  set_select('ddl_book_id',$row->book_id, TRUE); ?> ><?php echo $row->hadith_book_id;?> </option>
           
          <?php endforeach; ?>
          <?php endif;?>
         </select>  
        </td>
      </tr>
      <tr>
        <td><?php echo form_label('Hadith_Book_Id','txt_hadith_book_id_ar');?></td>
        <td>
      <select name="ddl_hadith_book_id">        
        <?php if(!empty($hadith_books)):?>
          <?php foreach($hadith_books as $row):?>
            
              <option value="<?php echo $row->hadith_book_id;?>" <?php echo  set_select('ddl_hadith_book_id',$row->hadith_book_id, TRUE); ?> ><?php echo $row->hadith_book_id;?> </option>
            
          <?php endforeach; ?>
          <?php endif;?>
        </select>  
        </td>
      </tr>
      <tr>
        <td><input type="submit" id="mysubmit" name="mysubmit" value="Update" class="btn btn-success">
        <a href="<?php echo (base_url().'chapter/delete/'.$chapter->chapter_id); ?>"><input type="button" value="Delete" class="btn btn-danger"></a></td>
      </tr>
      <?php echo form_close();?>
    </tbody>
  </table>
<?php
}
else
  echo 'Does not exist';

  ?>
            </div>
 </div>
