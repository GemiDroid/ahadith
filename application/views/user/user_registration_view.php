<html>
<head>
<title>My Form</title>
<style type="text/css">
  .text-error{
    color: red;
  }
</style>
</head>
<body>

  <h2>Register an account</h2>
  <table>
    <tbody>


      <?php echo validation_errors(); ?>

      <?php echo form_open('user/registration'); ?>

      <tr>
        <td><?php echo form_label('Username','txt_username');?></td>
        <td>
          <input type="text" name="txt_username" value="<?php echo set_value('txt_username'); ?>" />
        </td>
        <td><?php echo form_error('txt_username', '<span class="text-error">', '</span>'); ?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Email','txt_email');?></td>
        <td>
          <input type="text" name="txt_email" value="<?php echo set_value('txt_email'); ?>" />

        </td>
        <td><?php echo form_error('txt_email', '<span class="text-error">', '</span>'); ?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Password','txt_password');?></td>
        <td>
          <input type="password" name="txt_password" value="<?php echo set_value('txt_password'); ?>" />
        </td>
        <td><?php echo form_error('txt_password', '<span class="text-error">', '</span>'); ?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Confirm Password','txt_confirm_password');?></td>
        <td>
          <input type="password" name="txt_confirm_password" value="<?php echo set_value('txt_confirm_password'); ?>" />
        </td>
        <td><?php echo form_error('txt_confirm_password', '<span class="text-error">', '</span>'); ?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Full Name','txt_full_name');?></td>
        <td>
          <input type="text" name="txt_full_name" value="<?php echo set_value('txt_full_name'); ?>" />
        </td>
        <td><?php echo form_error('txt_full_name', '<span class="text-error">', '</span>'); ?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Date of Birth','txt_date_of_birth');?></td>
        <td>
          <select name="day">
            <?php for($i=1;$i<32;$i++):?>
              <option value="<?php echo $i;?>" <?php echo set_select('day',$i, TRUE ); ?> ><?php echo $i;?></option>
            <?php endfor; ?>
          </select>

          <select name="month">
            <option value="1" <?php echo set_select('month',1, TRUE ); ?>>January</option>
            <option value="2" <?php echo set_select('month',2, FALSE ); ?>>Febuary</option>
            <option value="3" <?php echo set_select('month',3, FALSE ); ?>>March</option>
            <option value="4" <?php echo set_select('month',4, FALSE ); ?>>April</option>
            <option value="5" <?php echo set_select('month',5, FALSE ); ?>>May</option>
            <option value="6" <?php echo set_select('month',6, FALSE ); ?>>June</option>
            <option value="7" <?php echo set_select('month',7, FALSE ); ?>>July</option>
            <option value="8" <?php echo set_select('month',8, FALSE); ?>>August</option>
            <option value="9" <?php echo set_select('month',9, FALSE ); ?>>September</option>
            <option value="10" <?php echo set_select('month',10, FALSE ); ?>>October</option>
            <option value="11" <?php echo set_select('month',11, FALSE ); ?>>November</option>
            <option value="12" <?php echo set_select('month',12, FALSE ); ?>>December</option>
          </select>

          <select name="year">
            <?php for($i=1947;$i<date("Y");$i++):?>
              <option value="<?php echo $i;?>" <?php echo set_select('year',$i, TRUE ); ?>><?php echo $i;?></option>
            <?php endfor; ?>
          </select>
        </td>
        <td>
          <?php echo form_error('day', '<span class="text-error">', '</span>'); ?>
          <?php echo form_error('month', '<span class="text-error">', '</span>'); ?>
          <?php echo form_error('year', '<span class="text-error">', '</span>'); ?>
        </td>
      </tr>
      <tr>
        <td><?php echo form_label('Gender','rad_gender');?></td>
        
        <td>
          <label class="radio inline" for="rad_gender_male">
		  <input type="radio" checked="" id="rad_gender_male" value="M" name="rad_gender" <?php echo set_radio('rad_gender', 'M', TRUE); ?> tabindex="14" />
		  Male
		  </label>
		  <label class="radio inline" for="rad_gender_female">
		  <input type="radio" id="rad_gender_female" value="F" name="rad_gender" <?php echo set_radio('rad_gender', 'F', FALSE); ?> tabindex="15" />
		  Female
		  </label>
        </td>
        
        <td>
          <?php echo form_error('rad_gender', '<span class="text-error">', '</span>'); ?>
        </td>
        
      </tr>
      <tr>
        <td><?php echo form_label('Country','ddl_country_list');?></td>
        <td>
          <?php if(!empty($country)):?>

            <select name="ddl_country_list">
              <?php foreach($country as $row):?>
                <option value="<?php echo $row->country_code;?>" <?php echo set_select('ddl_country_list',$row->country_code, ($row->country_code == 'PAK')? TRUE:FALSE ); ?> ><?php echo $row->country_name;?> </option>
              <?php endforeach; ?>
            </select>
          <?php endif;?>
        </td>
        <td>
          <?php echo form_error('ddl_country_list', '<span class="text-error">', '</span>'); ?>
        </td>
      </tr>
      <tr>
        <td><?php echo form_submit('mysubmit','Register');?></td>
      </tr>
      <?php echo form_close();?>

    </tbody>
  </table>

</body>
</html>
