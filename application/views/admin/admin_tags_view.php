
            
<div class="col-md-9" style="margin-top: 50px;">
    
    <h4>View All Tags</h4>
    <hr>
    <table class="table table-bordered">
        <tbody>
            <thead style="background-color: #AABB78;">
                <th>ID</th>
                <th>Arabic Title</th>
                <th>English Title</th>
                <th>Urdu Title</th>
                <th>Arabic Detail</th>
                <th>English Detail</th>
                <th>Urdu Detail</th>
                <th>Suggested By</th>
                <th>Action</th>
            
            </thead>
            
             <?php foreach($tags as $tag): ?>
            <tr>
                <td><?php echo $tag->tag_id; ?></td>
                <td><?php echo (!empty($tag->tag_title_ar) ? $tag->tag_title_ar : "N/A"); ?></td>
                <td><?php echo (!empty($tag->tag_title_en) ? $tag->tag_title_en : "N/A"); ?></td>
                <td><?php echo (!empty($tag->tag_title_ur) ? $tag->tag_title_ur : "N/A");; ?></td>
                <td><?php echo (!empty($tag->tag_detail_ar) ? $tag->tag_detail_ar : "N/A"); ?></td>
                <td><?php echo (!empty($tag->tag_detail_en) ? $tag->tag_detail_en : "N/A"); ?></td>
                <td><?php echo (!empty($tag->tag_detail_ur) ? $tag->tag_detail_ur : "N/A"); ?></td>
                <td><?php echo (!empty($tag->suggested_by) ? $tag->suggested_by : "N/A"); ?></td>
                
                <td><a href='<?php echo (base_url().'admin/tag/'.$tag->tag_id); ?>' >Edit</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
                
     <div style="float: left;">
     
        <a href="<?php echo (base_url().'admin/add'); ?>"><input type="submit" id="btn_add_new_tag" name="btn_add_new_tag" value="Add New Tag" class="btn btn-primary"/></a>
    </div>
    </div>

</div>
 