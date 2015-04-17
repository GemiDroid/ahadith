<!DOCTYPE html>

<body>
  <h3>Adding All Ahadith</h3>
  <table>

    <tbody>

    <?php echo form_open('editor/hadith/add');?>

      <tr>
        <td><?php echo form_label('Plain Arabic','txt_plain_ar');?></td>
        <td><?php echo form_textarea('txt_plain_ar'); ?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Plain English','txt_plain_en');?></td>
        <td><?php echo form_textarea('txt_plain_en'); ?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Plain Urdu','txt_plain_ur');?></td>
        <td><?php echo form_textarea('txt_plain_ur');?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Marked Arabic','txt_marked_ar');?></td>
        <td><?php echo form_textarea('txt_marked_ar');?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Marked English','txt_marked_en');?></td>
        <td><?php echo form_textarea('txt_marked_en');?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Marked Urdu','txt_marked_ur');?></td>
        <td><?php echo form_textarea('txt_marked_ur');?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Raw Arabic','txt_raw_ar');?></td>
        <td><?php echo form_textarea('txt_raw_ar');?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Authenticity','ddl_authenticity_id');?></td>
        <td>
            

            <select name="ddl_authenticity_id">
              <?php if(!empty($authenticity)):?>
              <?php foreach($authenticity as $row):?>
                <option value="<?php echo $row->authenticity_id;?>" <?php echo  set_select('ddl_authenticity_id',$row->authenticity_id, TRUE); ?> ><?php echo $row->authenticity_id;?> </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
			
	  
        </td>
      </tr>
      <tr>
        <td><?php echo form_submit('mysubmit','Submit Hadith');?></td>
      </tr>
      <?php echo form_close();?>



    </tbody>
  </table>

</body>
</html>
