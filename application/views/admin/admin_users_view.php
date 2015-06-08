
         <style type="text/css">
            .blue{
                background-color: lightblue;
            }
            
            .red{
                background-color: red;
            }
            
            .white{
                background-color: none;
            }
         </style>   
            <div class="col-md-9" style="margin-top: 50px;">
               <fieldset>
                <legend>Displaying All Users</legend>
                
                <?php $attributes = array('class' => 'form-horizontal'); ?>
                <?php echo form_open( 'admin/user/' , $attributes ); ?>
                <table class="table table-bordered table-hover">
                    
                        <thead style="background-color: #AABB78;">
                           <tr>
                        <th>User ID</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Full Name</th>
                        <th>DOB</th>
                        <th>Gender</th>
                        <th>Country Code</th>
                        <th>Active</th>
                        <th>User Since</th>
                        <th>Last Activity</th>
                        <th>Active</th>
                        
                        </thead>
                        </tr>
                        <tbody>        
                         <?php foreach($users as $user): ?>           
                    
                        <tr class='<?php if($user->admin_role == TRUE): echo "info"; elseif($user->is_active=='1'): echo ""; else: echo "danger"; endif; ?>'>
                      
                            <td><?php echo $user->user_id; ?></td>
                            <td><?php echo $user->password; ?></td>
                            <td><?php echo $user->email_address; ?></td>
                            <td><?php echo $user->full_name; ?></td>
                            <td><?php echo $user->date_of_birth; ?></td>
                            <td><?php echo $user->gender; ?></td>
                            <td><?php echo $user->country_code; ?></td>
                            <td><?php echo $user->is_active; ?></td>
                            <td><?php echo $user->user_since; ?></td>
                            <td><?php echo $user->last_activity; ?></td>
                            <td><input type="checkbox"  name="chk_user_status" class="chk_user_status" id="chk_user_status" <?php echo set_checkbox('chk_user_status', '1', $user->is_active=='0'? FALSE : TRUE); ?>/> </td>
                         
                        </tr>
                          
                            <?php endforeach; ?>
                    </tbody>
                </table>
              
               <!-- <input type="submit" id="btn_save" name="btn_save" value="Save Changes" class="btn btn-success" onclick="save_status();"/>-->
               
                 <?php echo form_close();?>
                </fieldset>
            </div>
            
        </div>


<script type="text/javascript">
    
$(document).ready(function(){
    $('.chk_user_status').on("change",function(){
       
        var status = $(this).is(":checked") ? 1 : 0; 
        var user_id = $(this).parent().parent().children('td:first').text();
        var chk_box= $(this).parent().parent();
       
        $.ajax({
            type:'POST',
            url:'<?php echo base_url(); ?>admin/user_status',
            data:{'user_id': user_id , 'status':status},
            success: function(){
             
              //if user's is_active is 1
              if(status==1){
                chk_box.removeClass("danger");
             chk_box.children().eq(7).text("1");
              }
               else{
                chk_box.addClass("danger");
                chk_box.children().eq(7).text("0")
               }
            }

        });
    });
    

 });
 </script>