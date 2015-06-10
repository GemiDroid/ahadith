<fieldset id="block_display_books">
    <legend>Pending Tasks</legend>
    
    <table class="table table-bordered table-hover table-condensed">
        <thead>
            <tr>
                <th style="text-align: center;"><span id="">Name</span></th>
                <th style="text-align: center;"><span id="">Total Number</span></th>
                
            </tr>
        </thead>
    
        <tbody> 
            <tr>
                <td style="text-align: center;"><a href="<?php echo (base_url().'admin/users'); ?>">Total Users</a></td>
                <td style="text-align: center;">
                    <?php  $count=0; ?>
                    <?php foreach($users as $user): ?>
                    <?php $count++; ?>
                    <?php endforeach; ?>
                    <?php echo $count; ?>
                </td>
            </tr>
            <tr class="<?php  if(!empty($blocks) ): echo 'danger'; endif;  ?>" style="text-align: center;">
                <td style="text-align: center;"><a href="<?php echo (base_url().'admin/users'); ?>">Pending User Requests</a></td>
                <td>
                    <?php if(!empty($blocks)): ?>
                        <?php  $count=0; ?>
                        <?php foreach($blocks as $block): ?> 
                        <?php $count++; ?>
                        <?php endforeach; ?>
                        <?php echo $count; ?>
                    <?php else: echo '0'; ?>
                    <?php endif; ?>
                </td>
            </tr>
            <tr class="<?php  if(!empty($pending_tags) ): echo 'danger'; endif;  ?>" style="text-align: center;">
                <td style="text-align: center;"><a href="<?php echo (base_url().'admin/tag'); ?>">Pending Tags</a></td>
                <td>
                    <?php if(!empty($pending_tags)): ?>
                        <?php  $count=0; ?>
                        <?php foreach($pending_tags as $tags): ?> 
                        <?php $count++; ?>
                        <?php endforeach; ?>
                        <?php echo $count; ?>
                    <?php else: echo '0'; ?>
                    <?php endif; ?>
                </td>
            </tr>
            <tr class="<?php  if(!empty($pending_reports) ): echo 'danger'; endif;  ?>" style="text-align: center;">
                <td style="text-align: center;"><a href="<?php echo (base_url().'admin/report'); ?>">Pending Reports</a></td>
                <td>
                    <?php if(!empty($pending_reports)): ?>
                        <?php  $count=0; ?>
                        <?php foreach($pending_reports as $reports): ?> 
                        <?php $count++; ?>
                        <?php endforeach; ?>
                        <?php echo $count; ?>
                    <?php else: echo '0'; ?>
                    <?php endif; ?>
                </td>
                
            </tr>
        </tbody>
    
    </table>

</fieldset>

    
    
    