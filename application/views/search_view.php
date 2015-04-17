<div class="container">
		<header class="row">
            <h2 class="col-sm-3 col-lg-2 hidden-xs">Search Ahadith</h2>
		</header>
        <section class="row">
                
            <?php $attributes = array('class' => 'form-horizontal', 'id' => 'form_search');?>
            <?php echo form_open('search', $attributes);?>
                
               <div class="search-box">
                <div class="form-group">
                  <label for="rad_search_language" class="col-sm-3 control-label">Search language: </label>
                  <div class="col-sm-">
                    <label class="radio-inline">
                        <input type="radio" name="rad_search_language" id="rad_search_language_ar" value="ar" <?php echo set_radio('rad_search_language', 'ar'); ?> > Arabic (عربی)
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="rad_search_language" id="rad_search_language_en" value="en" <?php echo set_radio('rad_search_language', 'en',TRUE); ?> > English
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="rad_search_language" id="rad_search_language_ur" value="ur" <?php echo set_radio('rad_search_language', 'ur'); ?> > Urdu (اردو)
                    </label>
                  </div>
                </div>
                <hr>
                <div class="form-group">
                  <label for="txt_search_text" class="col-sm-3 control-label">Type Search Text:</label>
                  <div class="col-sm-7">
                    <input type="text" class="full-width ltr" name="txt_search_text" id="txt_search_text" value="<?php echo set_value('txt_search_text', ''); ?>" placeholder="Search">
                  </div>
                  <div class="col-sm-2">
                    <input type="submit" name="mysubmit" class="button" value="Click to Search" />
                  </div>
                </div>
                
                <div class="form-group">
                    <label for="rad_word" class="col-sm-3 control-label"> </label>
                        <div class="col-sm-7">
                          <label class="radio-inline">
                              <input type="radio" name="rad_word" id="rad_word_any" value="Any Word" <?php echo set_radio('rad_word', 'Any Word'); ?> > Any Word
                          </label>
                          <label class="radio-inline">
                              <input type="radio" name="rad_word" id="rad_word_all" value="All Words" <?php echo set_radio('rad_word', 'All Words'); ?> > All Words
                          </label>
                          <label class="radio-inline">
                              <input type="radio" name="rad_word" id="rad_word_exact" value="Exact Phrase" <?php echo set_radio('rad_word', 'Exact Phrase',TRUE); ?> > Exact Phrase
                          </label>
                        </div>
                        
                        <div class="col-sm-2">
                          <label for="ddl_display_per_page" class="control-label">Display per page</label>
                            <select id="ddl_display_per_page" name="ddl_display_per_page">
                                <option>10</option>
                                <option>20</option>
                                <option>30</option>
                            </select>
                        </div>
                </div>
                
                <div class="form-group">
                  <label for="ddl_hadith_book" class="col-sm-3 control-label">Hadith Book Selected:</label>
                  <div class="col-sm-7">
                    
                    <?php if(!empty($hadith_books)):?>
                        <select name="ddl_hadith_book" id="ddl_hadith" class="full-width">
                            <?php foreach($hadith_books as $row):?>
                                <option  value="<?php echo $row->hadith_book_id; ?>" <?php echo  set_select('ddl_hadith_book',$row->hadith_book_id, FALSE); ?> ><?php echo $row->hadith_book_title_en;?> </option>
                              <?php endforeach; ?>
                        </select>
                    <?php else: ?>
                        <select>
                            <option>None</option>
                        </select>
                    <?php endif; ?>
                    
                  </div>
                  
                  <div class="col-sm-3">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="chk_hadith_books" name="chk_hadith_books" value="1" <?php echo set_checkbox('chk_hadith_books', '1'); ?> aria-label="">All Books
                        </label>
                    </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="ddl_book" class="col-sm-3 control-label">Book Selected:</label>
                  <div class="col-sm-7">
                    
                    <?php if(!empty($books)):?>
                        <select name="ddl_book" id="ddl_book" class="full-width">
                            <?php foreach($books as $row):?>
                                <option value="<?php echo $row->book_id; ?>"  <?php echo  set_select('ddl_book',$row->book_id, FALSE); ?> ><?php echo $row->book_title_en;?> </option>
                            <?php endforeach; ?>
                        </select>
                    <?php else: ?>
                        <select>
                            <option>None</option>
                        </select>
                    <?php endif; ?>
                    
                  </div>
                  
                  <div class="col-sm-3">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="chk_all_books" name="chk_all_books" value="1" <?php echo set_checkbox('chk_all_books', '1'); ?> aria-label="">All Books
                        </label>
                    </div>
                  </div>
                </div>
               </div>   
            <?php echo form_close(); ?>
            
        <?php if(!empty($ahadith)):?>
        
            <div style="height: 300px; width: 800px; border:1px solid; overflow-y: auto">
                <?php foreach($ahadith as $row):?>
                    
                        <h3><?php echo $row->hadith_book_name; ?>, <?php echo $row->book_name; ?>, Hadith No. <?php echo $row->hadith_id;?></h3>
                        <?php echo $row->hadith_body;?>
                <?php endforeach; ?>
                
            </div>
        <?php elseif( !empty($this->input->post()) ): ?>
            <span class="text-error">No Record Found.</span>
        <?php endif;?>
            
		</section>
        <footer class="row">			
		</footer>
</div>
	
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
    
    //
    $("#ddl_hadith" ).change(function() {
        
        //prepare the data to be passed
        var result = {};
        result['task'] = 'load-books';
        result['hadith_book_id'] = $(this).val();
        
        var timer;
        
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>search',
            data: { data: result },
            beforeSend: function() {
                //$('#alert_message span').text('Deleting Record ...');
                //$('#alert_message').removeClass('alert-success alert-error').show();
            },
            success: function(data) {
                try {
                    data = $.parseJSON( data );
                    
                    if( data.books != '' ) {
                        $('#ddl_book').html( data.books );
                    }   
                }
                catch(e) {
                    //$('#alert_message span').text('An error occured ... Server responded with an error');
                    //$('#alert_message').addClass('alert-error').show();
                }
            },
            error: function() {
                //$('#alert_message span').text('An error occured ... Try again!');
                //$('#alert_message').addClass('alert-error').show();
            }
        });
        
    });
</script>