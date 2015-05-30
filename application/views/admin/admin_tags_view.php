<div class="col-md-9" style="margin-top: 50px;">
    
    <fieldset>
    
    <legend>Displaying All Tags</legend>

    <div class="row-fluid">
    <div>
    
    <table class="table table-bordered table-hover table-condensed">
        
        <thead>
            <tr>
                <th style="text-align: center;">ID</th>
                <th style="text-align: center;">Arabic Title</th>
                <th style="text-align: center;">English Title</th>
                <th style="text-align: center;">Urdu Title</th>
                <th style="text-align: center;">Arabic Detail</th>
                <th style="text-align: center;">English Detail</th>
                <th style="text-align: center;">Urdu Detail</th>
                <th style="text-align: center;">Suggested By</th>
                <th style="text-align: center;">Action</th>
            </tr>
        </thead>
            <?php if(!empty($tags)): ?>
            <tbody>
            <?php foreach($tags as $tag): ?>
            <tr class="<?php  if($tag->approved_by == null OR empty($tag->approved_by) ): echo 'danger'; endif;  ?>">
                <td style="text-align: center;"><?php echo $tag->tag_id; ?></td>
                <td style="text-align: center;"><?php echo (!empty($tag->tag_title_ar) ? $tag->tag_title_ar : "N/A"); ?></td>
                <td style="text-align: center;"><?php echo (!empty($tag->tag_title_en) ? $tag->tag_title_en : "N/A"); ?></td>
                <td style="text-align: center;"><?php echo (!empty($tag->tag_title_ur) ? $tag->tag_title_ur : "N/A");; ?></td>
                <td style="text-align: center;"><?php echo (!empty($tag->tag_detail_ar) ? $tag->tag_detail_ar : "N/A"); ?></td>
                <td style="text-align: center;"><?php echo (!empty($tag->tag_detail_en) ? $tag->tag_detail_en : "N/A"); ?></td>
                <td style="text-align: center;"><?php echo (!empty($tag->tag_detail_ur) ? $tag->tag_detail_ur : "N/A"); ?></td>
                <td style="text-align: center;"><?php echo (!empty($tag->suggested_by) ? $tag->suggested_by : "N/A"); ?></td>
                
                <td style="text-align: center;"><a href='<?php echo (base_url().'admin/tag/update/'.$tag->tag_id); ?>' ><li class="glyphicon glyphicon-pencil"></li></a></td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    </div>
    </div>
    <a href="<?php echo (base_url().'admin/tag/add'); ?>" class="btn btn-primary"/>Add New Tag</a>

    </fieldset>

</div>
 </div>