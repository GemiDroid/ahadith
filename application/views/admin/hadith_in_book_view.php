<fieldset id="block_add_hadith_in_book">
    <legend><?php echo ucfirst($mode); ?> Hadith in book:</legend>
    
    <?php $attributes = array('class' => 'form-horizontal col-md-7'); ?>
    <?php echo form_open('admin/hadith-in-book/' . $hadith_id . '/' . $hadith_in_book_id, $attributes); ?>
        
        
        <div class="control-group">
            <label class="control-label" for="ddl_hadith_book_id">Hadith Book:</label>
              <?php if(!empty($hadith_books)):?>
                <select class="form-control" name="ddl_hadith_book_id" id="ddl_hadith_book_id">
                  <?php foreach($hadith_books as $row):?>
                    <option value="<?php echo $row->hadith_book_id;?>" <?php echo set_select('ddl_hadith_book_id',$row->hadith_book_id, ( !empty($data) AND $data->hadith_book_id == $row->hadith_book_id? TRUE:FALSE ) ); ?> ><?php echo $row->hadith_book_title_en;?></option>
                  <?php endforeach; ?>
                </select>
              <?php endif; ?>
        </div>
        
        <div class="control-group">
            <label class="control-label" for="ddl_book_id">Book:</label>
            <?php if(!empty($books)):?>
                <select class="form-control" name="ddl_book_id" id="ddl_book_id">
                    <?php foreach($books as $book):?>
                        <option value="<?php echo $book->book_id;?>" <?php echo set_select('ddl_book_id',$book->book_id, ( !empty($data) AND $data->book_id == $book->book_id? TRUE:FALSE ) ); ?> ><?php echo $book->book_title_en;?></option>
                    <?php endforeach; ?>
                </select>
            <?php endif; ?>
        </div>
        
        <div class="control-group">
            <label class="control-label" for="ddl_chapter_id">Chapter:</label>
            <?php if(!empty($chapters)):?>
                <select class="form-control" name="ddl_chapter_id" id="ddl_chapter_id">
                    <?php foreach($chapters as $chapter):?>
                        <option value="<?php echo $chapter->chapter_id;?>" <?php echo set_select('ddl_chapter_id',$chapter->chapter_id, ( !empty($data) AND $data->chapter_id == $chapter->chapter_id? TRUE:FALSE ) ); ?> ><?php echo substr( $chapter->chapter_title_en,0,50);?>&hellip;</option>
                    <?php endforeach; ?>
                </select>
            <?php endif; ?>
        </div>
        
       <br/>
        <div class="control-group form-inline">
            <button type="submit" id="btn_save" name="btn_save" class="btn btn-primary">Save Record</button>
            <?php if( $hadith_in_book_id ): ?>
                <button type="submit" id="btn_delete" name="btn_delete" value="delete" class="btn btn-danger">Delete Record</button>
            <?php endif; ?>
            <a href="<?php echo base_url().'admin/hadith-in-book/'.$hadith_id ?>" class="btn btn-default">Cancel</a>
        </div>
    <?php echo form_close(); ?>
</fieldset>
    

<fieldset id="block_display_hadith_in_books" >
    <legend>Displaying Hadith in books</legend>
    
    <?php if( $hadith_in_books !== '' ): ?>
        <div class="row-fluid">
            <div>
                
                <table id="tbl_contact" class="table table-bordered table-hover table-condensed">
                    
                    <thead>
                        <tr>
                            <th style="text-align: center;">Hadith in Book</th>
                            <th style="text-align: center;">Chapter</th>
                            <th style="text-align: center;">Book</th>
                            <th style="text-align: center;">Hadith Book</th>
                            <th style="text-align: center;">Action</th>
                            
                        </tr>
                    </thead>        
                    
                    <tbody>
                        
                        <?php foreach($hadith_in_books as $row): ?>
                            <tr>
                                <td style="text-align: center;"><?php echo $row->hadith_in_book_id; ?></td>
                                <td style="text-align: center;"><?php echo $row->chapter_id; ?></td>
                                <td style="text-align: center;"><?php echo $row->book_id; ?></td>
                                <td style="text-align: center;"><?php echo $row->hadith_book_id; ?></td>
                                <td style="text-align: center;"><?php echo anchor("admin/hadith-in-book/" . $hadith_id . "/" . $row->hadith_in_book_id, "Edit"); ?> </td>
                            </tr>
                        <?php endforeach; ?>
                
                    </tbody>
                </table>
            </div>
        </div>
        
    <?php else: ?>
        <div class="text-error">No record found</div>
        
    <?php endif; ?>
    
    <button  type="submit" id="btn_add_hadith_in_book" name="btn_add_hadith_in_book" class="btn btn-primary">Add Hadith in Book</button>
    <a href="<?php echo base_url().'admin/hadith' ?>" class="btn btn-default">Cancel</a>
    
</fieldset>
    
<script type="text/javascript">
    $(document).ready(function () {
        
        <?php if( validation_errors() OR $hadith_in_book_id ): ?>
            $('#block_display_hadith_in_books').hide();
        <?php else: ?>
            $('#block_add_hadith_in_book').hide();
        <?php endif; ?>
        
        $('#btn_add_hadith_in_book').click(function () {
            $('#block_display_hadith_in_books').hide('fast');
            $('#block_add_hadith_in_book').show('slow');
        });
        
        //show a confirmation box when the user clicks on the delete button
        $('#btn_delete').click(function () {
            if( !confirm('This will delete the record. Are you sure you want to continue?')) {
                return false;
            }
        });
        
        $('#ddl_hadith_book_id').on("change", function() {
            //prepare the data to be passed
            var result ={};
            result['task'] = 'hadith-book';
            result['hadith_book_id'] = $(this).val();
            
            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>admin/hadith-in-book/<?php echo $hadith_id; ?>',
                data: { data: result },
                success: function(data) {
                  data = $.parseJSON( data );
                  $('#ddl_book_id').html(data.book_list);
                  $('#ddl_chapter_id').html(data.chapter_list);
              }
            });
        });
        
        $('#ddl_book_id').on("change", function() {
            //prepare the data to be passed
            var result ={};
            result['task'] = 'book';
            result['hadith_book_id'] = $('#ddl_hadith_book_id').val();
            result['book_id'] = $('#ddl_book_id').val();
            
            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>admin/hadith-in-book/<?php echo $hadith_id; ?>',
                data: { data: result },
                success: function(data) {
                  data = $.parseJSON( data );
                  $('#ddl_chapter_id').html(data.chapter_list);
              }
            });
        });
        
    });
</script>