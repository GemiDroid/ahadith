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
                 <?php if( $this->user_roles->is_authorized( array('admin_users_view') )   ): ?>
                <td style="text-align: center;"><a href="<?php echo (base_url().'admin/users'); ?>">Total Users</a></td>
                <?php else: ?>
                 <td style="text-align: center;">Total Users</td>
                <?php endif; ?>
                <td style="text-align: center;">
                    <?php  $count=0; ?>
                    <?php foreach($users as $user): ?>
                    <?php $count++; ?>
                    <?php endforeach; ?>
                    <?php echo $count; ?>
                </td>
            </tr>
            <tr class="<?php  if(!empty($blocks) ): echo 'danger'; endif;  ?>" style="text-align: center;">
            <?php if( $this->user_roles->is_authorized( array('admin_users_view') )   ): ?>
                <td style="text-align: center;"><a href="<?php echo (base_url().'admin/users'); ?>">Pending User Requests</a></td>
               <?php else: ?>
               <td style="text-align: center;">Pending User Requests</td>
               <?php endif; ?>
               
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
            <?php if( $this->user_roles->is_authorized( array('admin_tags_view') )   ): ?>
                <td style="text-align: center;"><a href="<?php echo (base_url().'admin/tag'); ?>">Pending Tags</a></td>
                 <?php else: ?>
               <td style="text-align: center;">Pending Tags</td>
               <?php endif; ?>
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
             <?php if( $this->user_roles->is_authorized( array('admin_reports_view') )   ): ?>
                <td style="text-align: center;"><a href="<?php echo (base_url().'admin/report'); ?>">Pending Reports</a></td>
                <?php else: ?>
                <td style="text-align: center;">Pending Reports</td>
                <?php endif; ?>
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

    
    
    