<div class="col-md-9">

  <h3>Updating Error Reports!</h3>
  <?php if(!empty($report)): ?>
  <table>
    <tbody>
      <?php echo form_open('admin/report/update/'.$error_id);?>

      <tr>
        <td><?php echo form_label('Error Text:','txt_error_text');?></td>
        <td><?php echo form_input('txt_error_text',(!empty($report) ? $report[0]->error_text : '')); ?></td>
      </tr>
      <tr>
        <td><?php echo form_label('User ID:','txt_user_id');?></td>
        <td><?php echo form_input('txt_user_id',(!empty($report) ? $report[0]->user_id : '')); ?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Hadith ID:','txt_hadith_id');?></td>
        <td><?php echo form_input('txt_hadith_id',(!empty($report) ? $report[0]->hadith_id : '')); ?></td>
      </tr>
    
      <tr>
        <td><input type="submit" id="mysubmit" name="mysubmit" value="Update" class="btn btn-success">
        <a href="<?php echo ('http://localhost/ahadith/admin/report/delete/'.$report[0]->error_id); ?>"><input type="button" value="Delete" class="btn btn-danger"></a></td>
      </tr>
      <?php echo form_close();?>
    </tbody>
  </table>
<?php  else:
  echo 'Does not exist';
  endif;
  ?>
            </div>
 </div>
