<html>
<head>
<title>My Form</title>
</head>
<body>

  <h2> Register an account </h2>
  <table>
    <tbody>

      <?php echo validation_errors(); ?>
      <?php echo form_open('user/register'); ?>

      <tr>
        <td><?php echo form_label('Username','txt_username');?></td>
        <td><?php echo form_input('txt_username'); ?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Email','txt_email');?></td>
        <td><?php echo form_input('txt_email'); ?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Password','txt_password');?></td>
        <td><?php echo form_password('txt_password'); ?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Confirm Password','txt_confirm_password');?></td>
        <td><?php echo form_password('txt_confirm_password'); ?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Full Name','txt_full_name');?></td>
        <td><?php echo form_input('txt_full_name'); ?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Date of Birth','txt_date_of_birth');?></td>
        <td>
          <select name="day">
            <?php for($i=1;$i<32;$i++):?>
              <option value="<?php echo $i;?>" ><?php echo $i;?></option>

            <?php endfor; ?>
          </select>

          <select name="month">
            <option value="<?php echo 1;?>" ><?php echo 'January';?></option>
            <option value="<?php echo 2;?>" ><?php echo 'Febuary';?></option>
            <option value="<?php echo 3;?>" ><?php echo 'March';?></option>
            <option value="<?php echo 4;?>" ><?php echo 'April';?></option>
            <option value="<?php echo 5;?>" ><?php echo 'May';?></option>
            <option value="<?php echo 6;?>" ><?php echo 'June';?></option>
            <option value="<?php echo 7;?>" ><?php echo 'July';?></option>
            <option value="<?php echo 8;?>" ><?php echo 'August';?></option>
            <option value="<?php echo 9;?>" ><?php echo 'September';?></option>
            <option value="<?php echo 10;?>" ><?php echo 'October';?></option>
            <option value="<?php echo 11;?>" ><?php echo 'November';?></option>
            <option value="<?php echo 12;?>" ><?php echo 'December';?></option>
          </select>

          <select name="year">
            <?php for($i=1947;$i<2031;$i++):?>
              <option value="<?php echo $i;?>" ><?php echo $i;?></option>
            <?php endfor; ?>
          </select>
        </td>
      </tr>
      <tr>
        <td><?php echo form_label('Gender','txt_gender');?></td>
        <td><?php echo form_radio('txt_gender', 'Male', TRUE).form_label('Male', 'txt_gender'); ?>
      <?php echo form_radio('txt_gender', 'Female', FALSE).form_label('Female', 'txt_gender');?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Country','ddl_country_list');?></td>
        <td>
          <?php if(!empty($country)):?>

            <select name="ddl_country_list">
              <?php foreach($country as $row):?>
                <option value="<?php echo $row->country_code;?>" <?php echo  set_select('ddl_country_list',$row->country_code, TRUE); ?> ><?php echo $row->country_name;?> </option>
              <?php endforeach; ?>
            </select>


          <?php endif;?>
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
