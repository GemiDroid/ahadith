<?php $user_id = $this->session->userdata('user_id'); ?>

Welcome to Home! <?php echo $user_id; ?>
<br>
<?php echo anchor(base_url() . "index.php/user/signout/", "Signout"); ?>
<br>
<br>
    <!--<pre><?php echo  var_dump($ahadith); ?></pre>-->

    <div id="target" style=" height:100px; width:600px; border:solid; alignment-adjust: central; border-width: 2px; overflow-y: auto;">
        <table >
            <tbody>
              <?php foreach((array)$ahadith as $hadith): ?>
                <tr>
                  <td><input type = 'button' id="btn_like" tabindex="<?php echo $hadith->hadith_id ; ?>" value = 'Hadith No. <?php echo $hadith->hadith_id ; ?>' onfocus="updateHistory(this)"/></td>
                  <td><?php echo $hadith->hadith_plain_ar; ?></td>
                  <td><?php echo $hadith->hadith_plain_en; ?></td>
                  <td><?php echo $hadith->hadith_plain_ur; ?></td>
                  <!--<td><button type="button" class="btn btn-success" onclick="window.location='<?php echo site_url("user/user_favorite/.'<?php echo $hadith->hadith_id ; ?>'");?>'">Like</button></td>-->
                  <!--<td><?php echo anchor('user/user_favorite', 'Like', array('onclick'=>'user_favorite(\''. $hadith->hadith_id .'\');')); ?></td>-->
                   <td><?php echo anchor('user/user_favorite/'.$hadith->hadith_id, 'Like'); ?></td>
                 <td style="padding-top: 5em"></td>
                </tr>
               
                <?php endforeach; ?>
              
            </tbody>
        </table>
    </div>
    
    <div id="log"></div>
    
 <script src="https://code.jquery.com/jquery-1.10.2.js"></script>    
<script type="text/javascript">
   var count = 1 ;
  
    function updateHistory(a)
    {
        window.history.pushState(null, null, a.tabIndex);
        count++ ;
  
    };
    
    $( "#target" ).scroll(function() {
         window.history.pushState(null, null, $("#btn_like").attr("tabindex"));
         
    });
  

 </script>
