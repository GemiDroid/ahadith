<div class="col-md-9" style="margin-top: 50px;">

  <?php if(!empty($hadith)): ?>
  <h4>Updating Hadith!</h4>
  <hr/>

  
      <?php echo form_open('admin/hadith/update/'.$hadith_id);?>
      
      <div class="control-group form-inline">
        <label class="control-label" for="txt_plain_ar">Plain Arabic:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <textarea class="form-control" name="txt_plain_ar" id="txt_plain_ar" style="width: 800px; height: 100px;" ><?php echo set_value('txt_plain_ar', (!empty($hadith) ? $hadith[0]->hadith_plain_ar : '')); ?>  </textarea>
        <div class="help-inline">
          <?php echo form_error('txt_plain_ar', '<span class="text-error">', '</span>'); ?>
        </div>
    </div>
      <br/>
    <div class="control-group form-inline">
        <label class="control-label" for="txt_plain_en">Plain English:</label>&nbsp;&nbsp;&nbsp;
        <textarea class="form-control" name="txt_plain_en" id="txt_plain_en" style="width: 800px; height: 100px;"><?php echo set_value('txt_plain_en', (!empty($hadith) ? $hadith[0]->hadith_plain_en : '')); ?></textarea>
        <div class="help-inline">
          <?php echo form_error('txt_plain_en', '<span class="text-error">', '</span>'); ?>
        </div>
    </div>
    <br/>
     <div class="control-group form-inline">
        <label class="control-label" for="txt_plain_ur">Plain Urdu:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <textarea class="form-control" name="txt_plain_ur" id="txt_plain_ur" style="width: 800px; height: 100px;" ><?php echo set_value('txt_plain_ur', (!empty($hadith) ? $hadith[0]->hadith_plain_ur : '')); ?></textarea>
        <div class="help-inline">
          <?php echo form_error('txt_plain_ur', '<span class="text-error">', '</span>'); ?>
        </div>
    </div>
     <br/>
    <div class="control-group form-inline">
        <label class="control-label" for="txt_marked_ar">Marked Arabic:</label>&nbsp;&nbsp
        <textarea class="form-control" name="txt_marked_ar" id="txt_marked_ar"  style="width: 800px; height: 100px;"><?php echo set_value('txt_marked_ar', (!empty($hadith) ? $hadith[0]->hadith_marked_ar : '')); ?></textarea>
        <div class="help-inline">
          <?php echo form_error('txt_marked_ar', '<span class="text-error">', '</span>'); ?>
        </div>
    </div>
    <br/>
    <div class="control-group form-inline">
        <label class="control-label" for="txt_marked_en">Marked English:</label>
        <textarea class="form-control" name="txt_marked_en" id="txt_marked_en" style="width: 800px; height: 100px;"><?php echo set_value('txt_marked_en', (!empty($hadith) ? $hadith[0]->hadith_marked_en : '')); ?></textarea>
        <div class="help-inline">
          <?php echo form_error('txt_marked_en', '<span class="text-error">', '</span>'); ?>
        </div>
    </div>
    <br/>
    <div class="control-group form-inline">
        <label class="control-label" for="txt_marked_ur">Marked Urdu:</label>&nbsp;&nbsp;&nbsp;&nbsp;
        <textarea class="form-control" name="txt_marked_ur" id="txt_marked_ur" style="width: 800px; height: 100px;"><?php echo set_value('txt_marked_ur', (!empty($hadith) ? $hadith[0]->hadith_marked_ur : '')); ?></textarea>
        <div class="help-inline">
          <?php echo form_error('txt_marked_ur', '<span class="text-error">', '</span>'); ?>
        </div>
    </div>
    <br/>
    <div class="control-group form-inline">
        <label class="control-label" for="txt_raw_ar">Raw Arabic:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <textarea class="form-control" name="txt_raw_ar" id="txt_raw_ar" style="width: 800px; height: 100px;" ><?php echo set_value('txt_raw_ar', (!empty($hadith) ? $hadith[0]->hadith_raw_ar : '')); ?></textarea>
        <div class="help-inline">
          <?php echo form_error('txt_raw_ar', '<span class="text-error">', '</span>'); ?>
        </div>
    </div>
     <br/>
    <div class="control-group form-inline">
        <label class="control-label" for="authenticity_id">Authenticity:</label>&nbsp;&nbsp;&nbsp;&nbsp;
       
          <?php if(!empty($authenticity)):?>

            <select class="form-control" style="width: 200px; height: 37px;" name="authenticity_id">
              <?php foreach($authenticity as $row):?>
                <option value="<?php echo $row->authenticity_id;?>" <?php echo  set_select('authenticity_id',$row->authenticity_id, TRUE); ?> ><?php echo $row->authenticity_id;?> </option>
              <?php endforeach; ?>
            </select>
			
	  <?php endif; ?>
    </div>
    <br/>
    <div class="control-group form-inline">
     <input  type="submit" id="mysubmit" name="mysubmit" value="Update" class="btn btn-success"/>
        <a href="<?php echo base_url().'admin/hadith' ?>"><input type="button" value="Cancel" class="btn btn-primary"></a>
        <a href="<?php echo (base_url().'editor/hadith/delete/'.$hadith_id); ?>"><input type="button"  value="Delete" class="btn btn-danger"/></a>
    </div>
      <?php echo form_close();?>
  
  <?php
    else:
     echo 'Hadith doesnot exist';
     endif;
 ?>
</div>
</div>
