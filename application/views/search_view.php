<style type="text/css">
 .highlight
{
background: #CEDAEB;
font-style: italic;
font-weight: bold;
}
 
.highlight_important
{
background: #F8DCB8;
font-style: italic;
font-weight: bold;
}   
    
#tail {
  background:-webkit-gradient(linear, 0 0%, 0 100%, from(#469877), to(#386553));
  border-radius:0 0 10px 10px;
  clear:both;
  color:#EEEEEE;
  font-weight:bold;
  text-shadow:#666666 1px 1px;
}
</style>

<div class="container">
		<header class="row">
            <h2 class="col-sm-3 col-lg-2 hidden-xs">Search Ahadith</h2>
		</header>
        <section class="row">
               
            <?php $attributes = array('class' => 'form-horizontal', 'id' => 'form_search');?>
            <?php echo form_open('search', $attributes);?>
    
                    
        <div class="search-box">
                <div class="form-group">
                  <label style="text-align: left;" for="rad_search_language" class="col-sm-3 control-label">Search language: </label>
                  <div class="col-sm-7">
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
                  
                  
                  <span id="ar-keyboard" class="hide inline-block" style="display: none;">
                        <a id="ar-keyboard" href="#">Display Arabic Keyboard</a>
                        </span>
                        <span id="ur-keyboard" class="hide inline-block" style="display: none;">
                        <a id="arK" href="#">Display Urdu Keyboard</a>
                        </span>
                </div>
                <hr>
                <div class="form-group">
                  <label style="text-align: left;" for="txt_search_text" class="col-sm-3 control-label">Type Search Text:</label>
                  <div class="col-sm-7">
                    <input type="text" class="full-width ltr" name="txt_search_text" id="txt_search_text" value="<?php echo set_value('txt_search_text', ''); ?>" placeholder="Search">
                  </div>
                 
                    <input type="submit" name="mysubmit" class="button" value="Click to Search" />
                
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

                                    
                        <div >
                          <label for="ddl_display_per_page" class="control-label">Display per page</label>
                            <select id="ddl_display_per_page" name="ddl_display_per_page">
                                <option>10</option>
                                <option>20</option>
                                <option>30</option>
                            </select>
                        </div>
                </div>
                
                <div class="form-group">
                  <label style="text-align: left;" for="ddl_hadith_book" class="col-sm-3 control-label">Hadith Book Selected:</label>
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
                  
                 
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="chk_hadith_books" name="chk_hadith_books" value="1" <?php echo set_checkbox('chk_hadith_books', '1'); ?> aria-label="">All Books
                        </label>
                    </div>
               
                </div>
                
                <div class="form-group">
                  <label style="text-align: left;" for="ddl_book" class="col-sm-3 control-label">Book Selected:</label>
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
                  
               
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="chk_all_books" name="chk_all_books" value="1" <?php echo set_checkbox('chk_all_books', '1'); ?> aria-label="">All Books
                        </label>
              
                  </div>
                </div>
 </div><!--saerch box-->   
            <?php echo form_close(); ?>

            
     
            
	
        
        <!-- code for searched hadith div  -->
        
<div id="hadith-main" style="width: 1255px;" >
<div id="hadith" style="height: 215px; overflow: scroll-y;  scrollbar-face-color: #EEEEEE;  padding: 0px 15px 0px 15px;  width: 1165px; alignment-adjust: central;" tabindex="0">

  
  
     <?php if(!empty($ahadith)):?>
        
        
          <?php
                        function hightlight($str, $keywords = '')
                        {
                        $keywords = preg_replace('/\s\s+/', ' ', strip_tags(trim($keywords))); // filter
                         
                        $style = 'highlight';
                        $style_i = 'highlight_important';
                         
                        /* Apply Style */
                         
                        $var = '';
                         
                        foreach(explode(' ', $keywords) as $keyword)
                        {
                        $replacement = "<span class='".$style."'>".$keyword."</span>";
                        $var .= $replacement." ";
                         
                        $str = str_ireplace($keyword, $replacement, $str);
                        }
                         
                        /* Apply Important Style */
                         
                        $str = str_ireplace(rtrim($var), "<span class='".$style_i."'>".$keywords."</span>", $str);
                         
                        return $str;
                        }
                    ?>
        
        
           <!-- <div style="height: 300px; width: 1200px; border:1px solid; overflow-y: auto; alignment-adjust: central;">-->
                <?php foreach($ahadith as $row):?>
                    <div class="search-results" style="font-size: medium; text-align: justify;">
                        <h4><strong><?php echo $row->hadith_book_name; ?>, <?php echo $row->book_name; ?>, Hadith No. <?php echo $row->hadith_id;?></strong></h4>
                        
                        
                      <?php 
                    
                        
                         //$keywords = 'Messenger';
                         $keywords = $this->input->post('txt_search_text');
                        $string = hightlight($row->hadith_body, $keywords); 
                        
                        echo $string; 
                        
                        ?>
                        
                        <?php echo $row->hadith_body;?>
                    </div>
                <?php endforeach; ?>
<!--</div>-->     
            
        <?php elseif( !empty($this->input->post()) ): ?>
           <div style="text-align: center;"> <span class="text-error">No Record Found.</span> </div>
        <?php endif;?> 

</div>
        
</div>     
        
    <div id="tail"/>   
        
</section>
       
       
     <!--  
       
       <div id="arabic-keyboard" class="hide">
<h3>Arabic Keyboard</h3>
<table>
<tbody>
<tr>
<td colspan="11">
<input type="text" id="txtTextAR" readonly="" class="full-width arabic"/>
</td>
</tr>
<tr>
<td>
<input type="button" value="ا" class="buttons arabic-buttons"/>
</td>
<td>
<input type="button" value="أ" class="buttons arabic-buttons"/>
</td>
<td>
<input type="button" value="إ" class="buttons arabic-buttons"/>
</td>
<td>
<input type="button" value="ب" class="buttons arabic-buttons"/>
</td>
<td>
<input type="button" value="ت" class="buttons arabic-buttons"/>
</td>
<td>
<input type="button" value="ث" class="buttons arabic-buttons"/>
</td>
<td>
<input type="button" value="ج" class="buttons arabic-buttons"/>
</td>
<td>
<input type="button" value="ح" class="buttons arabic-buttons"/>
</td>
<td>
<input type="button" value="خ" class="buttons arabic-buttons"/>
</td>
<td>
<input type="button" value="د" class="buttons arabic-buttons"/>
</td>
<td>
<input type="button" value="ذ" class="buttons arabic-buttons"/>
</td>
</tr>
<tr>
<td>
<input type="button" value="ر" class="buttons arabic-buttons"/>
</td>
<td>
<input type="button" value="ز" class="buttons arabic-buttons"/>
</td>
<td>
<input type="button" value="س" class="buttons arabic-buttons"/>
</td>
<td>
<input type="button" value="ش" class="buttons arabic-buttons"/>
</td>
<td>
<input type="button" value="ص" class="buttons arabic-buttons"/>
</td>
<td>
<input type="button" value="ض" class="buttons arabic-buttons"/>
</td>
<td>
<input type="button" value="ط" class="buttons arabic-buttons"/>
</td>
<td>
<input type="button" value="ظ" class="buttons arabic-buttons"/>
</td>
<td>
<input type="button" value="ع" class="buttons arabic-buttons"/>
</td>
<td>
<input type="button" value="غ" class="buttons arabic-buttons"/>
</td>
<td>
<input type="button" value="ف" class="buttons arabic-buttons"/>
</td>
</tr>
<tr>
<td>
<input type="button" value="ق" class="buttons arabic-buttons"/>
</td>
<td>
<input type="button" value="ك" class="buttons arabic-buttons"/>
</td>
<td>
<input type="button" value="ل" class="buttons arabic-buttons"/>
</td>
<td>
<input type="button" value="م" class="buttons arabic-buttons"/>
</td>
<td>
<input type="button" value="ن" class="buttons arabic-buttons"/>
</td>
<td>
<input type="button" value="و" class="buttons arabic-buttons"/>
</td>
<td>
<input type="button" value="ؤ" class="buttons arabic-buttons"/>
</td>
<td>
<input type="button" value="ه" class="buttons arabic-buttons"/>
</td>
<td>
<input type="button" value="ة" class="buttons arabic-buttons"/>
</td>
<td>
<input type="button" value="ء" class="buttons arabic-buttons"/>
</td>
<td>
<input type="button" value="ي" class="buttons arabic-buttons"/>
</td>
</tr>
<tr>
<td>
<input type="button" value="ئ" class="buttons arabic-buttons"/>
</td>
<td colspan="4"/>
<td colspan="3">
<input type="button" value="Backspace" class="buttons"/>
</td>
<td colspan="3">
<input type="button" value="Space" class="buttons"/>
</td>
</tr>
<tr>
<td colspan="9"/>
<td colspan="2">
<input type="button" value="Done" class="buttons"/>
</td>
</tr>
</tbody>
</table>
</div>
 -->
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

