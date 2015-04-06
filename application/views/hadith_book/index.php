<style type="text/css">
	
	.table-bordered {
		-moz-border-bottom-colors: none;
		-moz-border-left-colors: none;
		-moz-border-right-colors: none;
		-moz-border-top-colors: none;
		border-color: #8f6d06 #8f6d06 #8f6d06 -moz-use-text-color;
		border-image: none;
		border-style: solid solid solid none;
		border-width: 1px 1px 1px 0;
	}
	.table {
		margin-bottom: 20px;
		width: 100%;
	}
	.table-bordered {
		-moz-border-bottom-colors: none;
		-moz-border-left-colors: none;
		-moz-border-right-colors: none;
		-moz-border-top-colors: none;
		border-collapse: separate;
		border-color: #dddddd #dddddd #dddddd -moz-use-text-color;
		border-image: none;
		border-radius: 4px;
		border-style: solid solid solid none;
		border-width: 1px 1px 1px 0;
	}
	.table {
		margin-bottom: 20px;
		width: 100%;
	}
	table {
		background-color: transparent;
		border-collapse: collapse;
		border-spacing: 0;
		max-width: 100%;
	}
	table {
		background-color: transparent;
		border-collapse: collapse;
		border-spacing: 0;
		max-width: 100%;
	}
	
	#books_container{
		width: 25%;
		float:left;
	}
	#container{
		width: 75%;
		float:right;
	}
</style>
<script type="text/javascript" src="/assets/js/jquery-1.9.1.js"></script>
<div id="books_container">
	<fieldset>
	<legend>Books</legend>
	
		<?php if( !empty( $ahadith_books ) ): ?>
			<table id="tbl_ahadith_book" class="table table-bordered">
				<thead>
					<tr>
						<th>Hadith in Book ID</th>
					</tr>
				</thead>
				
				<tbody>
					
					<?php foreach ($ahadith_books as $hadith_book):  ?>
						
						<tr>
							<td style="text-align: center;"><?php echo $hadith_book->hadith_book_title_en.' ('.  $hadith_book->hadith_book_title_ar .')'; ?></td>
						</tr>
					<?php endforeach; ?>
					
				</tbody>
			</table>
		
		<?php else: ?>
			<div class="text-error">No record found</div>
			
		<?php endif; ?>
	
	</fieldset>
</div>

<div id="container">
	
	<fieldset id="block_display_ahadith">
	<legend>Displaying Ahadith</legend>
	
	<?php if( !empty( $ahadith ) ): ?>
				<table id="tbl_ahadith" class="table">
					<thead>
						<tr>
							<th>Tags</th>
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
							
							<tr style="border: 5px solid red;">
								
								<td style="text-align: center;">
									<ul>
										<?php
											if( !empty($hadith->hadith_tags) ):
												foreach( $hadith->hadith_tags as $hadith_tag ):
													echo "<li>".$hadith_tag->tag_title_en."</li>";
												endforeach;
											endif;
										?>
									</ul>
								</td>
								
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
							<tr>
								<td>
									<select class="ddl_tags" size="<?php echo count($tags); ?>">
										<?php if(!empty($tags)): ?>
											<?php foreach($tags as $tag): ?>
												<option value="<?php echo $tag->tag_id; ?>"><?php echo $tag->tag_title_en; ?></option>
											<?php endforeach; ?>
										<?php endif; ?>
									</select>
								</td>
								
								<td>
									<button class="btn_add">>> <<</button>
								</td>
								
								<td>
									<select class="ddl_hadith_tags" size="<?php echo count($tags); ?>">
										<?php if( !empty($hadith->hadith_tags) ): ?>
											<?php foreach( $hadith->hadith_tags as $hadith_tag ): ?>
												<option value="<?php echo $hadith_tag->tag_id; ?>"><?php echo $hadith_tag->tag_title_en; ?></option>
											<?php endforeach; ?>
										<?php endif; ?>
									</select>
								</td>
								
								<td>
									<button class="btn_submit">Tag Hadith</button>
								</td>
								
							</tr>
						<?php endforeach; ?>
						
					</tbody>
				</table>
		
		<?php else: ?>
			<div class="text-error">No record found</div>
			
		<?php endif; ?>
	
	</fieldset>
	
</div>

<script type="text/javascript">

$(document).ready(function () {
	
	$('.btn_add').on( "click", function() {
		
		var tag_id = $(this).parent().parent().find('.ddl_tags').val();
		var tag_text = $(this).parent().parent().find('.ddl_tags option:selected').text();
		
		if( tag_id != null ){
			
			if ( $(this).parent().parent().find('.ddl_hadith_tags').find('option[value="'+tag_id+'"]').length == '0' ) {
				$(this).parent().parent().find('.ddl_hadith_tags').append('<option value="'+tag_id+'">'+tag_text+'</option>');	
			}else{
				$(this).parent().parent().find('.ddl_hadith_tags').find('option[value="'+tag_id+'"]').remove();
			}
		}
		
		//alert($(this).parent().parent().find('.ddl_hadith_tags').find('option').map(function() {return $(this).val();}).get().toString());
		
	});
	
	$('.btn_submit').on( "click", function() {

		//prepare the data to be passed
		var result = {};
		result['task'] = 'hadith-tag';
		result['tags_id'] = $(this).parent().parent().find('.ddl_hadith_tags').find('option').map(function() {return $(this).val();}).get().toString()
		result['hadith_id'] = $(this).parent().parent().parent().find('tr:first').find('td:last').text();
		
		//if ( result['tags_id'] != '' ) {
			
			$.ajax({
				type: "POST",
				url: '<?php echo base_url(); ?>hadith_book/view',
				data: { data: result },
				beforeSend: function() {
					$('#alert_message span').text('Deleting Record ...');
					$('#alert_message').removeClass('alert-success alert-error').show();
				},
				success: function(data) {
					try {
						data = $.parseJSON( data );
						if (data.message.type == 'success') {
							$('#tbl_ahadith tbody').find('tr:first').find('td:first').html( data.hadith_tags_html );
						}
						$('#alert_message span').text(data.message.body);
						$('#alert_message').addClass('alert-' + data.message.type).show();
					}
					catch(e) {
						$('#alert_message span').text('An error occured ... Server responded with an error');
						$('#alert_message').addClass('alert-error').show();
					}
				},
				error: function() {
					$('#alert_message span').text('An error occured ... Try again!');
					$('#alert_message').addClass('alert-error').show();
				}
			});
		//}
	});
});
</script>