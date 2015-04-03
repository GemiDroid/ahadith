<!doctype html>
<?php $user_id = $this->session->userdata('user_id'); ?>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>jQuery Load While Scroll</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>  
	<script type="text/javascript" src="<?php echo base_url();?>assests/js/jquery-scrollspy.js"></script>

</head>

Welcome to Home! <?php echo $user_id; ?>
<br>
<?php echo anchor(base_url() . "index.php/user/signout/", "Signout"); ?>
<br>
<br>
    <!--<pre><?php echo  var_dump($ahadith); ?></pre>-->
<body>
    <div class="container">
        <div id="scroll" style="height:200px; width:800px; border:solid; alignment-adjust: central; border-width: 2px; overflow-y: auto;">
            <div class="content">
                <div class="row">
                  <div class="span16">

                    <?php foreach((array)$ahadith as $hadith): ?>

                    <div class="color" id="hadith#<?php echo $hadith->hadith_id;?>" class="color"><h2>Hadith#<?php echo $hadith->hadith_id;?></h2></div>
			                 
                        <p>
                            <?php echo $hadith->hadith_plain_ar; ?>
                            <?php echo $hadith->hadith_plain_en; ?>
                            <?php echo $hadith->hadith_plain_ur; ?>
                            <?php echo anchor('user/user_favorite/'.$hadith->hadith_id, 'Like'); ?>
                        </p>
                
                
                <?php endforeach; ?>
    	  
		</div>
          </div>
        </div>
      </div>

    </div> <!-- /container -->
</body>
</html>
    
  
<script type="text/javascript">
   
   var site_url="http://localhost/ahadith/user/home";
	  
	  $(document).ready(function() {
		$('.color').each(function(i) {
		  var position = $(this).position();
		  console.log(position);
		  console.log('min: ' + position.top + ' / max: ' + parseInt(position.top + $(this).height()));
		  $(this).scrollspy({
			  min: position.top,
			  max: position.top + $(this).height(),
			  onEnter: function(element, position) {
				  if(console) console.log('entering ' +  element.id);
				  //$("body").css('background-color', element.id);
				  //window.location.hash = "#/";
				  window.history.pushState(null,null,site_url+'/'+element.id);
				  return false;
			  },
			  onLeave: function(element, position) {
				  if(console) console.log('leaving ' +  element.id);
			  }
		  });
		});
	  });
 </script>
