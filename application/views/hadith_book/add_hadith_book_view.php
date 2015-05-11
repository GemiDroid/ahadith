
<div class="col-md-9">
	
	<h3>Add hadith book</h3>
	<?php echo form_open('editor/hadith_book/add');?>
	<div class="col-md-2"><label for="hadith_book_id">Hadith Book ID:</label></div>
	<input type="text" name="hadith_book_id">
	<br><br>
	<div class="col-md-2"><label for="hadith_book_title_ar">Arabic Title:</label></div>
	<input type="text" name="hadith_book_title_ar" />
	<br><br>
	<div class="col-md-2"><label for="hadith_book_title_en">English Title:</label></div>
	<input type="text" name="hadith_book_title_en" />
	<br><br>
	<div class="col-md-2"><label for="hadith_book_title_ur">Urdu Title:</label></div>
	<input type="text" name="hadith_book_title_ur" />
	<br><br>
	<input type="submit" id="mysubmit"  name="mysubmit" class="btn btn-success"/>
	<a href="<?php echo ('http://localhost/ahadith/hadith-book'); ?>"><input type="submit" id="mysubmit" name="mysubmit" value="Cancel" class="btn btn-primary">
	<?php echo form_close();?>
</div>
</div>