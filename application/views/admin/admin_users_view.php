<fieldset>
   <legend>Displaying All Users</legend>
       <div class="row-fluid">
         <div>
            <table class="table table-bordered table-hover table-condensed">
               <thead>
                  <tr>
                     <th style="text-align: center;">User ID</th>
                     <th style="text-align: center;">Email</th>
                     <th style="text-align: center;">Full Name</th>
                     <th style="text-align: center;">DOB</th>
                     <th style="text-align: center;">Gender</th>
                     <th style="text-align: center;">Country Code</th>
                     <th style="text-align: center;">Active</th>
                     <th style="text-align: center;">User Since</th>
                     <th style="text-align: center;">Last Activity</th>
                     <th style="text-align: center;">Active</th>
                  </tr>
               </thead>
               <tbody>        
                  <?php foreach($users as $user): ?>           
              
                     <tr class='<?php if($user->admin_role == TRUE): echo "info"; elseif($user->is_active=='1'): echo ""; else: echo "danger"; endif; ?>'>
                        <td style="text-align: center;"><?php echo $user->user_id; ?></td>
                        <td style="text-align: center;"><?php echo $user->email_address; ?></td>
                        <td style="text-align: center;"><?php echo $user->full_name; ?></td>
                        <td style="text-align: center;"><?php echo $user->date_of_birth; ?></td>
                        <td style="text-align: center;"><?php echo $user->gender; ?></td>
                        <td style="text-align: center;"><?php echo $user->country_code; ?></td>
                        <td style="text-align: center;"><?php echo $user->is_active; ?></td>
                        <td style="text-align: center;"><?php echo $user->user_since; ?></td>
                        <td style="text-align: center;"><?php echo $user->last_activity; ?></td>
                        <td style="text-align: center;"><input type="checkbox"  name="chk_user_status" class="chk_user_status" id="chk_user_status" <?php echo set_checkbox('chk_user_status', '1', $user->is_active=='0'? FALSE : TRUE); ?>/> </td>
                     </tr>
                    
                  <?php endforeach; ?>
              </tbody>
            </table>
         </div>
     </div>
</fieldset>
      
<script type="text/javascript">
    
$(document).ready(function(){
    $('.chk_user_status').on("change",function(){
       
        var status = $(this).is(":checked") ? 1 : 0; 
        var user_id = $(this).parent().parent().children('td:first').text();
        var chk_box= $(this).parent().parent();
       
        $.ajax({
            type:'POST',
            url:'<?php echo base_url(); ?>admin/users',
            data:{'user_id': user_id , 'status':status},
            success: function(){
             
              //if user's is_active is 1
              if(status==1){
                chk_box.removeClass("danger");
             chk_box.children().eq(6).text("1");
              }
               else{
                chk_box.addClass("danger");
                chk_box.children().eq(6).text("0")
               }
            }

        });
    });
 });
 </script>