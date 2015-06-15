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
                  
                    <div>
                        
                        <div class="ar box" style="display: none;"><span class="arabic"><strong>Display Arabic Keyboard</strong></span></div>
                        <div class="ur box" style="display: none;"><span class="urdu"><strong>Display Urdu Keyboard</strong></a></div>
                        
                    </div>

                        
                </div>
                
                <legend></legend>
                <div class="form-group">
                  <label style="text-align: left;" for="txt_search_text" class="col-sm-3 control-label">Type Search Text:</label>
                  <div class="col-sm-7">
                    <input class="form-control" type="text" class="full-width ltr" name="txt_search_text" id="txt_search_text" value="<?php echo set_value('txt_search_text', ''); ?>" placeholder="Search">
                  </div>
                  
                    <button class="btn btn-primary" type="submit" name="mysubmit">Search</button>
                
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
                        <select class="form-control" name="ddl_hadith_book" id="ddl_hadith_book" class="full-width">
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
 
                    <div>
                        <label>
                            <input type="checkbox" id="chk_hadith_books" name="chk_hadith_books" value="1" <?php echo set_checkbox('chk_hadith_books', '1'); ?> aria-label="">All Books
                        </label>
                    </div>
                   
                   </div>
                
                <div class="form-group">
                  <label style="text-align: left;" for="ddl_book" class="col-sm-3 control-label">Book Selected:</label>
                  <div class="col-sm-7">
                    
                    <?php if(!empty($books)):?>
                        <select class="form-control" name="ddl_book" id="ddl_book" class="full-width">
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
                  
             
                    <div>
                        <label>
                            <input type="checkbox" id="chk_all_books" name="chk_all_books" value="1" <?php echo set_checkbox('chk_all_books', '1'); ?> aria-label="">All Books
                        </label>
              
                    </div>
          
                </div>
 </div><!--saerch box-->   
            <?php echo form_close(); ?>	
        
        <!-- code for searched hadith div  -->
        
<div class="hadith-main" style="overflow: scroll-y;  scrollbar-face-color: #EEEEEE;  padding: 0px 15px 0px 15px; alignment-adjust: central;" tabindex="0">
     <?php if(!empty($ahadith)):?>
        
        <p class="pagination">&nbsp;
            <?php echo $pages; ?>		
        </p>
     <div id="search_result">
        <h4>Search Results</h4>
        
        <?php foreach($ahadith as $row):?>
            <div class="search-results" style="font-size: medium; text-align: justify;">
                <h4><strong><?php echo $row->hadith_book_name; ?>, <?php echo $row->book_name; ?>, Hadith No. <?php echo $row->hadith_id;?></strong></h4>       
                <div class="hadith_lang" lang="<?php echo strtoupper($row->language); ?>">
                    <?php echo search_results($row->hadith_body,$this->input->post('txt_search_text')); ?>
                </div>
                
            </div>
        <?php endforeach; ?>
     <?php elseif( !empty( $this->input->post() ) ): ?>
            <h4>Search Results</h4>
            <div style="padding: 0px 15px 0px 15px; alignment-adjust: central;"> <span class="text-error">No Record Found.</span> </div>
     <?php endif;?> 
    </div>
</div>  
              
</section>
       
<div id="bm_Modal" class="modal fade">
    
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Arabic Keyboard</h4>
         </div>
    <div class="modal-body" style="text-align: center;">
        <table style="width: 550px; height:100px;" >
            <tbody>
                <tr>
                    <td colspan="11">
                        <input type="text" id="txtTextAR" readonly="" class="full-width arabic" style="text-align: right;"/>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="button" value="ذ" class="buttons arabic-buttons" onclick="putAR(this.value);"/></td>
                    <td><input type="button" value="د" class="buttons arabic-buttons" onclick="putAR(this.value);"/></td>
                    <td><input type="button" value="خ" class="buttons arabic-buttons" onclick="putAR(this.value);"/></td>
                    <td><input type="button" value="ح" class="buttons arabic-buttons" onclick="putAR(this.value);"/></td>
                    <td><input type="button" value="ج" class="buttons arabic-buttons" onclick="putAR(this.value);"/></td>
                    <td><input type="button" value="ث" class="buttons arabic-buttons" onclick="putAR(this.value);"/></td>
                    <td><input type="button" value="ت" class="buttons arabic-buttons" onclick="putAR(this.value);"/></td>
                    <td><input type="button" value="ب" class="buttons arabic-buttons" onclick="putAR(this.value);"/></td>
                    <td><input type="button" value="إ" class="buttons arabic-buttons" onclick="putAR(this.value);"/></td>
                    <td><input type="button" value="أ" class="buttons arabic-buttons" onclick="putAR(this.value);"/></td>
                    <td><input type="button" value="ا" class="buttons arabic-buttons" onclick="putAR(this.value);"/></td>
                </tr>
                <tr>
                    <td><input type="button" value="ف" class="buttons arabic-buttons" onclick="putAR(this.value);"/></td>
                    <td><input type="button" value="غ" class="buttons arabic-buttons" onclick="putAR(this.value);"/></td>
                    <td><input type="button" value="ع" class="buttons arabic-buttons" onclick="putAR(this.value);"/></td>
                    <td><input type="button" value="ظ" class="buttons arabic-buttons" onclick="putAR(this.value);"/></td>
                    <td><input type="button" value="ط" class="buttons arabic-buttons" onclick="putAR(this.value);"/></td>
                    <td><input type="button" value="ض" class="buttons arabic-buttons" onclick="putAR(this.value);"/></td>
                    <td><input type="button" value="ص" class="buttons arabic-buttons" onclick="putAR(this.value);"/></td>
                    <td><input type="button" value="ش" class="buttons arabic-buttons" onclick="putAR(this.value);"/></td>
                    <td><input type="button" value="س" class="buttons arabic-buttons" onclick="putAR(this.value);"/></td>
                    <td><input type="button" value="ز" class="buttons arabic-buttons" onclick="putAR(this.value);"/></td>
                    <td><input type="button" value="ر" class="buttons arabic-buttons" onclick="putAR(this.value);"/></td>
                </tr>
                <tr>
                    <td><input type="button" value="ي" class="buttons arabic-buttons" onclick="putAR(this.value);"/></td>
                    <td><input type="button" value="ء" class="buttons arabic-buttons" onclick="putAR(this.value);"/></td>
                    <td><input type="button" value="ة" class="buttons arabic-buttons" onclick="putAR(this.value);"/></td>
                    <td><input type="button" value="ه" class="buttons arabic-buttons" onclick="putAR(this.value);"/></td>
                    <td><input type="button" value="ؤ" class="buttons arabic-buttons" onclick="putAR(this.value);"/></td>
                    <td><input type="button" value="و" class="buttons arabic-buttons" onclick="putAR(this.value);"/></td>
                    <td><input type="button" value="ن" class="buttons arabic-buttons" onclick="putAR(this.value);"/></td>
                    <td><input type="button" value="م" class="buttons arabic-buttons" onclick="putAR(this.value);"/></td>
                    <td><input type="button" value="ل" class="buttons arabic-buttons" onclick="putAR(this.value);"/></td>
                    <td><input type="button" value="ك" class="buttons arabic-buttons" onclick="putAR(this.value);"/></td>
                    <td><input type="button" value="ق" class="buttons arabic-buttons" onclick="putAR(this.value);"/></td>
                </tr>
                <tr>
                    <td><input type="button" value="ئ" class="buttons arabic-buttons" onclick="putAR(this.value);"/></td>
                </tr>
             </tbody>
        </table>
                <div>
                    <input type="button" value="Backspace" class="buttons" id="backspaceAR" onclick="backspace(this.id);"/>
                    <input type="button" value="Space" class="buttons" id="spaceAR" onclick="space(this.id);"/>
                    <input type="button" value="Done" class="buttons" id="doneAR" onclick="done(this.id);"/>
                </div>
                   
    </div><!--modal body-->
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div> <!--modal--> 
    
<div id="bm_Modalurdu" class="modal fade">
    
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Urdu Keyboard</h4>
    </div>
    <div class="modal-body" style="text-align: center;">
        <table style="width: 550px; height:100px;" >
            <tbody>
                <tr>
                    <td colspan="11">
                    <input type="text" id="txtTextUR" readonly="" class="full-width urdu" style="text-align: right;"/>
                    </td>
                </tr>
                <tr>
                    <td><input type="button" value="د" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                    <td><input type="button" value="خ" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                    <td><input type="button" value="ح" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                    <td><input type="button" value="چ" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                    <td><input type="button" value="ج" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                    <td><input type="button" value="ث" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                    <td><input type="button" value="ٹ" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                    <td><input type="button" value="ت" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                    <td><input type="button" value="پ" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                    <td><input type="button" value="ب" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                    <td><input type="button" value="ا" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                </tr>
                <tr>
                    <td><input type="button" value="ط" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                    <td><input type="button" value="ض" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                    <td><input type="button" value="ص" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                    <td><input type="button" value="ش" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                    <td><input type="button" value="س" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                    <td><input type="button" value="ژ" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                    <td><input type="button" value="ز" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                    <td><input type="button" value="ڑ" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                    <td><input type="button" value="ر" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                    <td><input type="button" value="ذ" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                    <td><input type="button" value="ڈ" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                </tr>
                <tr>
                    <td><input type="button" value="و" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                    <td><input type="button" value="ن" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                    <td><input type="button" value="م" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                    <td><input type="button" value="ل" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                    <td><input type="button" value="گ" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                    <td><input type="button" value="ک" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                    <td><input type="button" value="ق" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                    <td><input type="button" value="ف" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                    <td><input type="button" value="غ" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                    <td><input type="button" value="ع" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                    <td><input type="button" value="ظ" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                </tr>
                <tr>
                    <td><input type="button" value="ے" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                    <td><input type="button" value="ی" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                    <td><input type="button" value="ئ" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                    <td><input type="button" value="ء" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                    <td><input type="button" value="ہ" class="buttons urdu-buttons" onclick="putUR(this.value);"/></td>
                </tr>
            </tbody>
        </table>
                <div>
                    <input type="button" value="Backspace" class="buttons" id="backspaceUR" onclick="backspace(this.id);"/>
                    <input type="button" value="Space" class="buttons" onclick="space(this.id);"/>
                    <input type="button" value="Done" class="buttons" id="doneUR" onclick="done(this.id)"/>
                </div>
               
        
    </div><!--modal body-->
 </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div> <!--modal--> 

 
    <footer class="row">			
	</footer>
</div>
	
<script type="text/javascript">
    
    function putAR(num){
        //alert('arabic');
    
        var txt = document.getElementById('txtTextAR').value;
        txt=txt + num;
        document.getElementById('txtTextAR').value = txt;
    }
    
    function backspace(num){
        
        if(num== 'backspaceAR'){
            var txt = document.getElementById('txtTextAR').value;
           // txtbox = txtbox.length - 1;
            txt = txt.substring(0, txt.length - 1);
            document.getElementById('txtTextAR').value = txt;
        }
        
        else{
            var txt = document.getElementById('txtTextUR').value;
           // txtbox = txtbox.length - 1;
            txt = txt.substring(0, txt.length - 1);
            document.getElementById('txtTextUR').value = txt;
        }
        
    }
    
     function putUR(num){
        //alert('arabic');
    
        var txt = document.getElementById('txtTextUR').value;
        txt=txt + num;
        document.getElementById('txtTextUR').value = txt;
            
    }
    
    function space(num){
        if(num == 'spaceAR'){
        
            var txt = document.getElementById('txtTextAR').value;
            txt=txt + ' ';
            document.getElementById('txtTextAR').value = txt;
        }
        else{
            var txt = document.getElementById('txtTextUR').value;
            txt=txt + ' ';
            document.getElementById('txtTextUR').value = txt;
        }
       
    }
    
    function done(num){
        
        if(num== 'doneAR'){
            var txt = document.getElementById('txtTextAR').value;
            $(".box").hide();
            $(".ar").hide();
            $('#bm_Modal').modal('hide');
            document.getElementById('txt_search_text').value = txt;
            document.getElementById('txt_search_text').style.textAlign = 'right';
        }
        else{
            var txt = document.getElementById('txtTextUR').value;
            $(".box").hide();
            $(".ur").hide();
            $('#bm_Modalurdu').modal('hide');
            document.getElementById('txt_search_text').value = txt;
            document.getElementById('txt_search_text').style.textAlign = 'right';
        }
    }
    
    
    $(document).ready(function(){
    
    <?php if( !empty($ahadith) ): ?>
        $('.hadith-main').attr('id','hadith');
        $('.hadith-main').css('border-top','2px solid #386553');
    <?php elseif(!empty($this->input->post())): ?>
        $('.hadith-main').css('border-top','2px solid #386553');
        $('.hadith-main').attr('id','');
    <?php endif; ?>

        
    $("#ddl_hadith_book" ).change(function() {
        
        //prepare the data to be passed
        var result = {};
        result['task'] = 'load-books';
        result['hadith_book_id'] = $(this).val();
        
        var timer;
        
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>search',
            data: { data: result },
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
            }
        });
        });
        
    
        $('input[type="radio"]').click(function(){
            if($(this).attr("value")=="ar"){
                $(".box").hide();
                $(".ar").show();
            }
          
            if($(this).attr("value")=="ur"){
                $(".box").hide();
                $(".ur").show();
            }
            
             if($(this).attr("value")=="en"){
                $(".box").hide();
                
            }
        });

        $('span').click(function(){
            if($(this).attr("class")=="arabic"){
                //$(".box").hide();
                $('#bm_Modal').modal('show');
            }
          
            if($(this).attr("class")=="urdu"){
                //$(".box").hide();
                $('#bm_Modalurdu').modal('show');
            }
            
            
        });
        
        $(".pagination a" ).click(function(e) {
        var a = $(this);
        var text =$(this).text();
        var url = $(this).attr('href');
        //Prevent this link from following the URL
        e.preventDefault();
        
        //prepare the data to be passed
        var result = {};
        result['task'] = 'search-results';
        
        result['search_language'] = $('input[name="rad_search_language"]:checked').val();
        result['type_search_text'] = $('#txt_search_text').val();
        result['search_text_option'] = $('input[name="rad_word"]:checked').val();
        result['display_per_page'] = $('#ddl_display_per_page').val();
        result['hadith_book'] = $('#ddl_hadith_book').val();
        result['book_id'] = $('#ddl_book').val();
        result['all_hadith_books'] = $('#chk_hadith_books').is(":checked") == true? 'true':'';
        result['all_books'] = $('#chk_all_books').is(":checked") == true? 'true':'';
        result['limit'] = url.substr(url.lastIndexOf("/")+1);
        
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>search',
            data: { data: result },
            success: function(data) {

                data = $.parseJSON( data );
                //alert(a.html());
                //a.html( '<strong>'+a.html()+'</strong>' );
                //$('.pagination').html(data.pages);
                $('#search_result').html( data.search_result );
            }
        });
        });
    });
</script>