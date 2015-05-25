
<div class="col-md-9" style="margin-top: 50px;">
	
	<h4>Add hadith book</h4>
	<hr>
	<?php echo form_open('editor/hadith_book/add');?>
	
	<div class="control-group form-inline">
	<label for="hadith_book_id">Hadith Book ID:</label>
	<input class="form-control" style="width: 500px; height: 30px;" type="text" name="hadith_book_id">
	<div class="help-inline">
            <?php echo form_error('hadith_book_id', '<span class="text-error">', '</span>'); ?>
      
        </div>
	</div>
	<br/>
	<div class="control-group form-inline">
	<label for="hadith_book_title_ar">Arabic Title:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input class="form-control" style="width: 500px; height: 30px;" type="text" name="hadith_book_title_ar" />
	<div class="help-inline">
            <?php echo form_error('hadith_book_title_ar', '<span class="text-error">', '</span>'); ?>
      
        </div>
	</div>
	<br/>
	<div class="control-group form-inline">
	<label for="hadith_book_title_en">English Title:</label>&nbsp;&nbsp;&nbsp;&nbsp;
	<input class="form-control" style="width: 500px; height: 30px;" type="text" name="hadith_book_title_en" />
	<div class="help-inline">
            <?php echo form_error('hadith_book_title_en', '<span class="text-error">', '</span>'); ?>
      
        </div>
	</div>
	<br/>
	<div class="control-group form-inline">
	<label for="hadith_book_title_ur">Urdu Title:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input class="form-control" style="width: 500px; height: 30px;" type="text" name="hadith_book_title_ur" />
	<div class="help-inline">
            <?php echo form_error('hadith_book_title_ur', '<span class="text-error">', '</span>'); ?>
      
        </div>
	</div>
	<br/>
	<div class="control-group">
	<input type="submit" id="mysubmit"  name="mysubmit" class="btn btn-success"/>
	<a href="<?php echo (base_url().'admin/hadith-book'); ?>"><input type="button" value="Cancel" class="btn btn-primary">
	</div>
	<?php echo form_close();?>
</div>
</div>