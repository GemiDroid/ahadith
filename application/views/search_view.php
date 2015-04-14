<!DOCTYPE html>
    <body>
        <div>
            <h2>Search Hadith</h2>
            <?php $attributes = array('class' => 'search', 'id' => 'myform');?>
             <?php echo form_open('search', $attributes);?>
            <table>
                <tbody>
                    <tr>
                        <td><?php echo form_label('Search Language','search_language');?></td>
                        <td>
                            <?php echo form_radio('search_language', 'Arabic', FALSE).form_label('Arabic', 'search_language'); ?>
                            <?php echo form_radio('search_language', 'English', TRUE).form_label('English', 'search_language'); ?>
                            <?php echo form_radio('search_language', 'Urdu', FALSE).form_label('Urdu', 'search_language'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo form_label('Type Search Text','type_search_text');?></td>
                        <td><?php echo form_input('type_search_text'); ?></td>
                        <td><?php echo form_submit('mysubmit','Click To Search');?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <?php echo form_radio('txt_word', 'Any Word', FALSE).form_label('Any Word', 'txt_word'); ?>
                            <?php echo form_radio('txt_word', 'All Words', FALSE).form_label('All Words', 'txt_word'); ?>
                            <?php echo form_radio('txt_word', 'Exact Phrase', TRUE).form_label('Exact Phrase', 'txt_word'); ?>
                        </td>
                        <td><?php echo form_label('Display per page','ddl_display_per_page');?></td>
                        <td>
                            <select id="ddl_display_per_page">
                                <option>10</option>
                                <option>20</option>
                                <option>30</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo form_label('Hadith Book Selected','ddl_hadith_book');?></td>
                        <td>
                           <?php if(!empty($hadith_books)):?>

                            <select name="ddl_hadith_book" id="ddl_hadith">
                              <?php foreach($hadith_books as $row):?>
                                <option  value="<?php echo $row->hadith_book_id; ?>" <?php echo  set_select('ddl_hadith_book',$row->hadith_book_id, FALSE); ?> ><?php echo $row->hadith_book_title_en;?> </option>
                              <?php endforeach; ?>
                            </select>
                                        
                          <?php endif; ?>
                        </td>
                        <td><?php echo form_checkbox('all_hadith_books', 'accept', FALSE);?>All Books</td>
                    </tr>
                    <tr>
                        <td><?php echo form_label('Book Selected','ddl_book');?></td>
                        <td>
                            <?php if(!empty($books)):?>

                            <select name="ddl_book">
                              <?php foreach($books as $row):?>
                                <option value="<?php echo $row->book_id; ?>"  <?php echo  set_select('ddl_book',$row->book_id, FALSE); ?> ><?php echo $row->book_title_en;?> </option>
                              <?php endforeach; ?>
                            </select>
                                        
                          <?php endif; ?>
                        </td>
                        <td><?php echo form_checkbox('all_books', 'accept', FALSE);?>All Books</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
            <br>
        <?php if(!empty($ahadith)):?>
        <?php var_dump($ahadith); ?>
        <div style="height: 300px; width: 800px; border:1px solid; overflow-y: auto">
            
            <?php foreach($ahadith as $row):?>
           
            <h3> Hadith No. <?php echo $row->hadith_id;?></h3>
           
            <?php echo $row->hadith_body;?>
          
            
            <?php endforeach; ?>
        </div>
        <?php endif;?>
    </body>        
</html>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>
    
    $("#ddl_hadith" ).change(function() {
       $( "#myform" ).submit();
        //alert('ho gaya');
   });
</script>