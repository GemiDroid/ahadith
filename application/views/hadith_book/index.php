<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sayings of the Messenger (SAW) - www.Ahadith.net</title>
	<style type="text/css">
		.table{
			border-style: solid;
			border-width: 1px 1px 1px 1px;
		}
	</style>
</head>
<body>
	<div id="container">
		
		<fieldset id="block_display_ahadith">
        <legend>Displaying Ahadith</legend>
        
        <?php if( !empty( $ahadith ) ): ?>
                    <table id="tbl_ahadith" class="table">
                        <thead>
                            <tr>
                                <th>Hadith in Book ID</th>
								<th>Hadith AR</th>
								<th>Hadith EN</th>
								<th>Hadith UR</th>
								<th>Marked AR</th>
								<th>Marked EN</th>
								<th>Marked UR</th>
								<th>Raw AR</th>
								<th>Plain AR</th>
								<th>Authenticity ID</th>
								<th>Hadith ID</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                            <?php foreach ($ahadith as $hadith):  ?>
                                
                                <tr>
                                    <td style="text-align: center;"><?php echo $hadith->hadith_in_book_id; ?></td>
                                    <td style="text-align: center;"><?php echo $hadith->hadith_plain_ar; ?></td>
									<td style="text-align: center;"><?php echo $hadith->hadith_plain_en; ?></td>
									<td style="text-align: center;"><?php echo $hadith->hadith_plain_ur; ?></td>
									<td style="text-align: center;"><?php echo $hadith->hadith_marked_ar; ?></td>
									<td style="text-align: center;"><?php echo $hadith->hadith_marked_en; ?></td>
									<td style="text-align: center;"><?php echo $hadith->hadith_marked_ur; ?></td>
									<td style="text-align: center;"><?php echo $hadith->hadith_raw_ar; ?></td>
									<td style="text-align: center;"><?php echo $hadith->hadith_plain_ar; ?></td>
									<td style="text-align: center;"><?php echo $hadith->authenticity_id; ?></td>
									<td style="text-align: center;"><?php echo $hadith->hadith_id; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            
                        </tbody>
                    </table>
            
			<?php else: ?>
				<div class="text-error">No record found</div>
				
			<?php endif; ?>
        
		</fieldset>
		
	</div>
</body>
</html>