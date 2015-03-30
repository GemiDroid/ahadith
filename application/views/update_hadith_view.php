<!DOCTYPE html>

<body>

  <?php
  if(!empty($hadith)):
   ?>
  <h2>Updating Hadith!</h2>
  <table>

    <tbody>
      <?php echo form_open('hadith/update/'.$hadith_id);?>
      <tr>
        <td><?php echo form_label('Plain Arabic','txt_plain_ar');?></td>
        <td><?php echo form_textarea('txt_plain_ar',(!empty($hadith) ? $hadith->hadith_plain_ar : '')); ?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Plain English','txt_plain_en');?></td>
        <td><?php echo form_textarea('txt_plain_en',(!empty($hadith) ? $hadith->hadith_plain_en : '')); ?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Plain Urdu','txt_plain_ur');?></td>
        <td><?php echo form_textarea('txt_plain_ur',(!empty($hadith) ? $hadith->hadith_plain_ur : ''));?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Marked Arabic','txt_marked_ar');?></td>
        <td><?php echo form_textarea('txt_marked_ar',(!empty($hadith) ? $hadith->hadith_marked_ar : ''));?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Marked English','txt_marked_en');?></td>
        <td><?php echo form_textarea('txt_marked_en',(!empty($hadith) ? $hadith->hadith_marked_en : ''));?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Marked Urdu');?></td>
        <td><?php echo form_textarea('txt_marked_ur',(!empty($hadith) ? $hadith->hadith_marked_ur : ''));?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Raw Arabic','txt_raw_ar');?></td>
        <td><?php echo form_textarea('txt_raw_ar',(!empty($hadith) ? $hadith->hadith_raw_ar : ''));?></td>
      </tr>
      <tr>
       <td><?php echo form_label('Authenticity','authenticity_id');?></td>
        <td>
          <?php if(!empty($authenticity)):?>

            <select name="authenticity_id">
              <?php foreach($authenticity as $row):?>
                <option value="<?php echo $row->authenticity_id;?>" <?php echo  set_select('authenticity_id',$row->authenticity_id, TRUE); ?> ><?php echo $row->authenticity_id;?> </option>
              <?php endforeach; ?>
            </select>
			
	  <?php endif; ?>
        </td>
      </tr>
      <tr>
        <td><?php echo form_submit('mysubmit','Submit Hadith');?></td>
        <td><a href="<?php echo ('http://localhost/ahadith/editor/hadith/delete/'.$hadith_id); ?>">Delete Hadith</a></td>
      </tr>
      <?php echo form_close();?>
    </tbody>
  </table>
  <?php
    else:
     echo 'Hadith doesnot exist';
     endif;
 ?>
</body>
</html>
