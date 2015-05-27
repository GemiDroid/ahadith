<div class="col-md-9" style="margin-top:50px;">
    
    <fieldset class="col-md-7" id="block_add_book">
        <legend>Add/Edit Book:</legend>
        
        <?php $attributes = array('class' => 'form-horizontal'); ?>
        <?php echo form_open( 'book/view/' . $book_id, $attributes ); ?>
            
        <div class="control-group">
            <label class="control-label" for="ddl_hadith_book_id">Hadith Book ID:</label>
            
            <select class="form-control"id="ddl_hadith_book_id" name="ddl_hadith_book_id" tabindex="2">
                <?php if(!empty($hadith_books)): ?>
                    <?php foreach($hadith_books as $hadith_book ): ?>
                        <option value="<?php echo $hadith_book->hadith_book_id;  ?>" <?php echo set_select('ddl_hadith_book_id', $hadith_book->hadith_book_title_en , ( !empty($data) && $data->hadith_book_id == $hadith_book->hadith_book_id ? TRUE : FALSE )); ?>><?php echo $hadith_book->hadith_book_id; ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
            <div class="help-inline">
                <?php echo form_error('ddl_hadith_book_id', '<span class="text-error">', '</span>'); ?>
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label" for="txt_book_id">Book ID:</label>
            <input class="form-control" type="text" name="txt_book_id" id="txt_book_id" value="<?php echo set_value('txt_book_id', ( !empty($data)? $data->book_id :'')); ?>" size="50" />
            <div class="help-inline">
                <?php echo form_error('txt_book_id', '<span class="text-error">', '</span>'); ?>
            </div>
            
        </div>
        
        <div class="control-group">
            <label class="control-label" for="txt_book_number">Book Number:</label>
           
            <input class="form-control" type="text" name="txt_book_number" id="txt_book_number" value="<?php echo set_value('txt_book_number', ( !empty($data)? $data->book_number :'')); ?>" size="50" />
            <div class="help-inline">
                <?php echo form_error('txt_book_number', '<span class="text-error">', '</span>'); ?>
            </div>
           
        </div>
        
        <div class="control-group">
            <label class="control-label" for="txt_book_title_ar">Arabic Title:</label>
          
            <input class="form-control" type="text" name="txt_book_title_ar" id="txt_book_title_ar" value="<?php echo set_value('txt_book_title_ar', ( !empty($data)? $data->book_title_ar :'')); ?>" size="50" />
            <div class="help-inline">
                <?php echo form_error('txt_book_title_ar', '<span class="text-error">', '</span>'); ?>
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label" for="txt_book_title_en">English Title:</label>
            <input class="form-control" type="text" name="txt_book_title_en" id="txt_book_title_en" value="<?php echo set_value('txt_book_title_en', ( !empty($data)? $data->book_title_en :'')); ?>" size="50" />
            <div class="help-inline">
                <?php echo form_error('txt_book_title_en', '<span class="text-error">', '</span>'); ?>
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label" for="txt_book_title_ur">Urdu Title:</label>
            <input class="form-control" name="txt_book_title_ur" id="txt_book_title_ur" value="<?php echo set_value('txt_book_title_ur', ( !empty($data)? $data->book_title_ur :'')); ?>" size="50" />
            <div class="help-inline">
                <?php echo form_error('txt_book_title_ur', '<span class="text-error">', '</span>'); ?>
            </div>
        </div>
            <div>&nbsp;</div>
        <div class="control-group">
            <button type="submit" id="btn_save" name="btn_save" class="btn btn-primary" >Save Record</button>
            <?php if( $book_id != '' ): ?>
                <button type="submit" id="btn_delete" value="delete" name="btn_delete" class="btn btn-danger">Delete Record</button>
            <?php endif; ?>					
            <?php echo anchor(base_url().'admin/book', 'Cancel', 'class="btn btn-default"'); ?>					
        </div>
        <?php echo form_close(); ?>
    </fieldset>
    
    <div>&nbsp;</div>
    
    
    <fieldset id="block_display_books">
        <legend>Displaying All Books</legend>
        
        <?php if( !empty( $books ) ): ?>
            <div class="row-fluid">
                <div>
                    
                    <table id="tbl_book" class="table table-bordered table-hover table-condensed">
                        
                        <thead style="background-color: #AABB78;">
                            <tr>
                                <th style="text-align: center;"><span id="col_book_id">Book ID</span></th>
                                <th style="text-align: center;"><span id="col_book_number">Book Number</span></th>
                                <th style="text-align: center;"><span id="col_book_title_ar">Book Title in Arabic</span></th>
                                <th style="text-align: center;"><span id="col_book_title_en">Book Title in English</span></th>
                                <th style="text-align: center;"><span id="col_book_title_ur">Book Title in Urdu</span></th>
                                <th style="text-align: center;"><span id="col_hadith_book_id">Hadith Book ID</span></th>
                                <th style="text-align: center;"><span id="col_view">Action</span></th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                            <?php foreach( $books as $book ): ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $book->book_id; ?></td>
                                    <td style="text-align: center;"><?php echo $book->book_number; ?></td>
                                    <td style="text-align: center;"><?php echo $book->book_title_ar; ?></td>
                                    <td style="text-align: center;"><?php echo $book->book_title_en; ?></td>
                                    <td style="text-align: center;"><?php echo $book->book_title_ur; ?></td>
                                    <td style="text-align: center;"><?php echo $book->hadith_book_id; ?></td>
                                    <td style="text-align: center;"><?php echo anchor(base_url() . "admin/book/update/". $book->book_id, '<li class="glyphicon glyphicon-pencil"></li>'); ?></td>
                                </tr>
                            <?php endforeach; ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
            
        <?php else: ?>
            <div class="text-error">No record found</div>
            
        <?php endif; ?>
        
        <button id="btn_add_book" class="btn btn-primary">Add Book</button>
        
    </fieldset>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        //display the form first if either validation errors exist, or book id is provided
        <?php if( validation_errors() OR $book_id != ''): ?>
            $('#block_display_books').hide();
        <?php else: ?>
            $('#block_add_book').hide();
        <?php endif; ?>
        
        $('#btn_add_book').click(function () {
            $('#block_display_books').hide('fast');
            $('#block_add_book').show('slow');
        });
    });
</script>

</div>
