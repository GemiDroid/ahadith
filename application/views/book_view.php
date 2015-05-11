<!--<style type="text/css">
#block_add_book {
  display: none;
}

</style>-->
<div class="col-md-9">


<div id="contents">
    <h3 style="margin-bottom: 0px;">Book View</h3>
    
    <div id="block_add_book">
        <legend>Add/Edit Book:</legend>
        
        <?php $attributes = array('class' => 'form-horizontal'); ?>
        <?php echo form_open( 'book/view/' . $book_id, $attributes ); ?>
            
        <div class="control-group">
            <label class="control-label" for="ddl_hadith_book_id">Hadith Book ID:</label>
            <div class="controls">
                <select id="ddl_hadith_book_id" name="ddl_hadith_book_id" tabindex="2">
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
        </div>
        
        <div class="control-group">
            <label class="control-label" for="txt_book_id">Book ID:</label>
            <div class="controls">
                <input type="text" name="txt_book_id" id="txt_book_id" value="<?php echo set_value('txt_book_id', ( !empty($data)? $data->book_id :'')); ?>" size="50" />
                <div class="help-inline">
                    <?php echo form_error('txt_book_id', '<span class="text-error">', '</span>'); ?>
                </div>
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label" for="txt_book_number">Book Number:</label>
            <div class="controls">
                <input type="text" name="txt_book_number" id="txt_book_number" value="<?php echo set_value('txt_book_number', ( !empty($data)? $data->book_number :'')); ?>" size="50" />
                <div class="help-inline">
                    <?php echo form_error('txt_book_number', '<span class="text-error">', '</span>'); ?>
                </div>
            </div>
        </div>
              
        <div class="control-group">
            <label class="control-label" for="txt_book_title_ar">Book Title in Arabic:</label>
            <div class="controls">
                <input type="text" name="txt_book_title_ar" id="txt_book_title_ar" value="<?php echo set_value('txt_book_title_ar', ( !empty($data)? $data->book_title_ar :'')); ?>" size="50" />
                <div class="help-inline">
                    <?php echo form_error('txt_book_title_ar', '<span class="text-error">', '</span>'); ?>
                </div>
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label" for="txt_book_title_en">Book Title in English:</label>
            <div class="controls">
                <input type="text" name="txt_book_title_en" id="txt_book_title_en" value="<?php echo set_value('txt_book_title_en', ( !empty($data)? $data->book_title_en :'')); ?>" size="50" />
                <div class="help-inline">
                    <?php echo form_error('txt_book_title_en', '<span class="text-error">', '</span>'); ?>
                </div>
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label" for="txt_book_title_ur">Book Title in Urdu:</label>
            <div class="controls">
                <input type="text" name="txt_book_title_ur" id="txt_book_title_ur" value="<?php echo set_value('txt_book_title_ur', ( !empty($data)? $data->book_title_ur :'')); ?>" size="50" />
                <div class="help-inline">
                    <?php echo form_error('txt_book_title_ur', '<span class="text-error">', '</span>'); ?>
                </div>
            </div>
        </div>
            <div>&nbsp;</div>
        <div class="control-group">
            <div class="controls">
                
                <input type="submit" id="btn_save" name="btn_save" value="Save Record" class="btn btn-success" tabindex="5" />

                <a href="<?php echo base_url().'admin' ?>"><input type="button"  value="Cancel" class="btn btn-primary" tabindex="5" /></a>
                &nbsp;&nbsp;
                <?php
                    //display the delete button only if in the edit mode. for edit mode, the book_id will be available
                    if( $book_id ): ?>
                        <a href="<?php echo base_url().'admin/book/view' ?>"><input type="submit" id="btn_delete" name="btn_delete" value="Delete Record" class="btn btn-danger" tabindex="7" /></a>
                <?php endif; ?>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
    <div>&nbsp;</div>
    <div id="block_books">
        <legend>Books</legend>
        
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
                                <th style="text-align: center;"><span id="col_view">View</span></th>
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
                                    <td style="text-align: center;"><?php echo anchor(base_url() . "book/view/". $book->book_id, "View"); ?></td>
                                </tr>
                            <?php endforeach; ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
            
        <?php else: ?>
            <div class="text-error">No record found</div>
            
        <?php endif; ?>
        
        
    </div>
</div>

<!--<div style="float: left;">
     
    <a href=""><input type="submit" id="btn_add_new_book" name="btn_add_new_book" value="Add New Book" class="btn btn-primary" onclick="load_edit();"/></a>

 </div>-->
            </div>
        </div>
  
  
   
<!--<script type="text/javascript">
    

function load_edit() {
           
                    document.getElementById("block_books").style.display = 'none';
                    document.getElementById("block_add_book").style.display = 'block';
};
</script>-->