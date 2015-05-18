
<div class="col-md-9" style="margin-top: 50px;">
    <?php $user_id = $this->session->userdata('user_id'); ?>
    <?php if(!empty($user_id)): ?>
    <h4>Welcome <?php echo $user_id; ?></h4>
    <hr>
    <?php endif;?>
    
    <div style="margin-left: 50px; ">
    
    <div class="jumbotron" style="width: 200px; height: 200px; text-align: center; display: inline-block;">
        
       <img src="<?php echo base_url(); ?>assets/images/user.png"/>
       <br><br>
       Total Users:
        <?php  $count=0; ?>
         <?php foreach($users as $user): ?>
         
         <?php $count++; ?>
        
        <?php endforeach; ?>
        <?php echo $count; ?>
    
    </div>
    
    <div style="display: inline-block; width: 80px;"></div>
     <div class="jumbotron" style="width: 200px; height: 200px; text-align: center; display: inline-block;">
        
       <img src="<?php echo base_url(); ?>assets/images/block_user_pic.png"/>
       <br><br>
        Block Users:
        <?php  $count=0; ?>
         <?php foreach($blocks as $block): ?>
         
         <?php $count++; ?>
        
        <?php endforeach; ?>
        <?php echo $count; ?>
    
    </div>
    
    </div>
</div>
</div>
    