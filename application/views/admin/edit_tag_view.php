
             
            
            <div class="col-md-9">
                
                <?php echo validation_errors(); ?>
  
          <?php $attributes = array('class' => 'form-horizontal'); ?>
          <?php echo form_open( '/admin/approve_tag/'.$tag[0]->tag_id , $attributes ); ?>
                <h3>Edit/Delete Tags </h3>
                <?php if(!empty($tag)): ?>
              <div class="control-group">
                    <div class="col-md-3"><label class="control-label" for="txt_tag_title_ar">Tag Title Arabic:</label></div>
                    <input type="text" name="txt_tag_title_ar" id="txt_tag_title_ar" value="<?php echo set_value('txt_tag_title_ar', (!empty($tag) ? $tag[0]->tag_title_ar : '')); ?>" size="50"/>
              </div>
              <div>&nbsp;</div>
              <div class="control-group">
                    <div class="col-md-3"><label class="control-label" for="txt_tag_title_en">Tag Title English:</label></div>
                    <input type="text" name="txt_tag_title_en" id="txt_tag_title_en" value="<?php echo set_value('txt_tag_title_en', (!empty($tag) ? $tag[0]->tag_title_en : '')); ?>" size="50"/>
              </div>
              <div>&nbsp;</div>
               <div class="control-group">
                    <div class="col-md-3"><label class="control-label" for="txt_tag_title_ur">Tag Title Urdu:</label></div>
                    <input type="text" name="txt_tag_title_ur" id="txt_tag_title_ur" value="<?php echo set_value('txt_tag_title_ur', (!empty($tag) ? $tag[0]->tag_title_ur : '')); ?>" size="50"/>
              </div>
              <div>&nbsp;</div>
              
            <div class="control-group">
                    <div class="col-md-3"><label class="control-label" for="txt_tag_detail_ar">Tag Detail Arabic:</label></div>
                    <input type="text" name="txt_tag_detail_ar" id="txt_tag_detail_ar" value="<?php echo set_value('txt_tag_detail_ar', (!empty($tag) ? $tag[0]->tag_detail_ar : '')); ?>" size="50"/>
              </div>
              <div>&nbsp;</div>
                <div class="control-group">
                   <div class="col-md-3"> <label class="control-label" for="txt_tag_detail_en">Tag Detail English:</label></div>
                    <input type="text" name="txt_tag_detail_en" id="txt_tag_detail_en" value="<?php echo set_value('txt_tag_detail_en', (!empty($tag) ? $tag[0]->tag_detail_en : '')); ?>" size="50"/>
              </div>
              <div>&nbsp;</div>
                <div class="control-group">
                    <div class="col-md-3"><label class="control-label" for="txt_tag_detail_ur">Tag Detail Urdu:</label></div>
                    <input type="text" name="txt_tag_detail_ur" id="txt_tag_detail_ur" value="<?php echo set_value('txt_tag_detail_ur', (!empty($tag) ? $tag[0]->tag_detail_ur : '')); ?>" size="50"/>
              </div>
              <div>&nbsp;</div>
              
              <div class="control-group">
                    <a href="<?php echo base_url().'admin/approve_tag/'.$tag[0]->tag_id ?>"><input type="submit" id="btn_approve_tag" name="btn_approve_tag" value="Approve Tag" class="btn btn-success"></a>
                    <a href="<?php echo base_url().'admin/tags' ?>"><input type="button" value="Cancel" class="btn btn-primary"></a>
                    <a href="<?php echo base_url().'admin/delete_tag/'.$tag[0]->tag_id; ?>" ><input type="button" value="Delete Tag" class="btn btn-danger"></a>
              </div>
                <?php endif; ?>
            </div>
            
            
            <?php echo form_close();?>
        </div>
 