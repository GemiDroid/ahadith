<style type="text/css">
	a {
		color: #000;
		text-decoration: none;
	}
	.clearfix:before, .clearfix:after {
		content: " ";
		display: table;
	}
	.clearfix:after {
		clear: both;
		content: ".";
		display: block;
		height: 0;
		visibility: hidden;
	}
	.hs-menu {
			
		padding: 1px;
		position: absolute;
		-webkit-animation-delay: 2s; /* Safari and Chrome */
		animation-delay: 2s;
	}
	.hs-button {						
		background-image: url("<?php echo base_url();?>assets/icons/icon-highlight.png");
		background-repeat: no-repeat;
		display: block;
		float: left;
		height: 43px;
		width: 43px;
	}
	.hs-twitter {
		background-position: 0 0;
	}
	.hs-facebook {
		background-position: -43px 0;
	}
	.hs-googleplus {
		background-image: url("<?php echo base_url();?>assets/icons/google_plus.png");
		background-size: 21px 21px;
		background-repeat: no-repeat;
		margin-left:5px;
		margin-top:13px;
		display: block;
		float: left;
		height: 23px;
		width: 23px;
	}
	hr{
		display: inline-block;
	}
</style>
<div class="container">
		<header class="row">
            <h2 class="col-sm-3 col-lg-2 hidden-xs"><?php echo $hadith_book->hadith_book_title_en; ?></h2>
            <h2 class="col-sm-9 col-lg-10 hidden-xs">
                Book: <?php echo $book->book_title_en; ?> (<?php echo $book->book_id; ?>) &nbsp;&nbsp;&nbsp;<span lang="ar" class=""><?php echo $book->book_title_ar; ?></span>
			</h2>
			
			<div class="navbar navbar-default visible-xs" role="navigation" style="margin: -10px; background: none;">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#books-navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand visible-xs" style="height: auto;" href="#">
						<h2 class="col-xs-12"><?php echo $hadith_book->hadith_book_title_en; ?></h2>
						<h2 class="col-xs-12">
							Book: <?php echo $book->book_title_en; ?>
						</h2>
					</a>
				</div>
				<div class="collapse navbar-collapse" id="books-navbar">
					<ul class="nav navbar-nav">
						
						<?php foreach ($ahadith_books as $hadith_book):  ?>
							<li><a name="book-<?php echo $hadith_book->book_id; ?>" href="<?php echo base_url(). $hadith_book->hadith_book_id .'/book/'. $hadith_book->book_id; ?>"><?php echo $hadith_book->book_title_en; ?><div lang="ar"><?php echo $hadith_book->book_title_ar; ?></div></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</header>
		
		<section class="row">
			<aside class="col-sm-3 col-lg-2 hidden-xs">
				<div id="books">
                    <ol id="body_books" style="list-style-type: decimal; font-weight: bold;">
						<?php foreach ($ahadith_books as $hadith_book):  ?>
							<li><a name="book-<?php echo $hadith_book->book_id; ?>" href="<?php echo base_url(). $hadith_book->hadith_book_id .'/book/'. $hadith_book->book_id; ?>"><?php echo $hadith_book->book_title_en; ?><div lang="ar"><?php echo $hadith_book->book_title_ar; ?></div></a></li>
						<?php endforeach; ?>
					</ol>
				</div>
			</aside>
			
			<section id="hadith-contents" class="col-sm-9 col-lg-10">
				
				<p class="pagination">&nbsp;
					<?php echo $pages; ?>		
				</p>
				
				<?php $chapter_title_en = ''; $i=1; ?>
				<?php if(!empty($ahadith)): ?>				
					<?php foreach( $ahadith as $hadith ): ?>
					
					<div class="hadith" id="<?php echo $hadith->hadith_in_book_id; ?>">
					
						<?php if( isset( $hadith->chapter_title_en ) OR  isset( $hadith->chapter_title_ur ) OR isset( $hadith->chapter_title_ar ) ): ?>
							<h3 class="chapters" >
								<p lang="EN"><?php echo $hadith->chapter_id.'. '. $hadith->chapter_title_en; ?></p>
								<p lang="UR" style="display: none"><?php echo $i.'. '. $hadith->chapter_title_ur; ?></p>
								<p lang="AR" style="display: none"><?php echo $i++.'. '. $hadith->chapter_title_ar; ?></p>
							</h3>
						<?php endif; ?>
						
						<article id="<?php echo $hadith->hadith_book_id; ?>/book/<?php echo $hadith->book_id; ?>/chapter/<?php echo $hadith->chapter_id; ?>/hadith/<?php echo $hadith->hadith_in_book_id;?>">
							<div style="padding-top: 3px; padding-bottom: 3px;">
								<!--Hadith ID and Bookmark-->
								<a id="<?php echo $hadith->hadith_book_id; ?>/book/<?php echo $hadith->book_id; ?>/chapter/<?php echo $hadith->chapter_id; ?>/hadith/<?php echo $hadith->hadith_in_book_id;?>">Hadith No: <?php echo $hadith->hadith_in_book_id;?></a>
								<span style="padding-left: 30px;">
									<a name="b93" href="javascript:void(0)" class="bookmark_link" title="Click here to favorite this hadith">Bookmark &nbsp;|&nbsp;&nbsp;
										<!--if hadith is favorited then it will have filled star, otherwise empty-->
										<span class="glyphicon <?php echo !empty($hadith->book_mark)? 'glyphicon-star':'glyphicon-star-empty' ?>" aria-hidden="true" style="position: relative; top: 3px;"></span>
									</a>
								</span>
								
								<!--add flag for this hadith-->
								<span style="padding-left: 30px;">
									<a name="b93" href="javascript:void(0)" class="flag_link" title="Click here to report this hadith">Flag &nbsp;|&nbsp;&nbsp;
										<span class="glyphicon glyphicon-flag" aria-hidden="true" style="position: relative; top: 3px;"></span>
									</a>
									<span style="display: none;"><?php echo $hadith->hadith_id; ?></span>
								</span>

								
								<span class="hadith_tags">
									<?php if( !empty($hadith->hadith_tags) ): ?>
										<?php foreach( $hadith->hadith_tags as $hadith_tag ): ?>
											<span lang="EN" class="label label-default pull-right" style="margin-left: 5px;"><?php echo $hadith_tag->tag_title_en; ?></span>
											<span lang="UR" style="display: none;" class="label label-default pull-right" style="margin-left: 5px;"><?php echo $hadith_tag->tag_title_ur; ?></span>
											<span lang="AR" style="display: none;" class="label label-default pull-right" style="margin-left: 5px;"><?php echo $hadith_tag->tag_title_ar; ?></span>
										<?php endforeach; ?>
									<?php endif; ?>
								</span>
								<!--if user is login-->
								<?php if( !empty($user_id) ): ?>
									<a name="b93" href="javascript:void(0)" title="Click here to add tag for this hadith">
										<span class="add_tag glyphicon glyphicon-plus pull-right" aria-hidden="true" style="position: relative; top: 3px; margin-left: 5px;"></span>
									</a>
								<?php endif; ?>
							</div>
							<p lang="AR"><?php echo $hadith->hadith_plain_ar; ?></p>
							<p lang="EN"><?php echo $hadith->hadith_plain_en; ?></p>
							<p lang="UR"><?php echo $hadith->hadith_plain_ur; ?></p>
							
							<div class="hs-menu clearfix">
								<a class="hs-button hs-twitter" href="" ></a>
								<a class="hs-button hs-facebook" href=""></a>
								<a class="hs-googleplus" href=""></a>
							</div>
							
						</article>
						
						<hr />
						<div class="tag_modal_body" style="display: none;" >
							<!--<label for="ddl_hadith_tags">Hadith Tags</label>-->
							<select class="ddl_hadith_tags form-control" multiple style="width: 20%; display: inline;" size="<?php echo count($tags); ?>">
								<?php if( !empty($hadith->hadith_tags) ): ?>
									<?php foreach( $hadith->hadith_tags as $hadith_tag ): ?>
										<option value="<?php echo $hadith_tag->tag_id; ?>"><?php echo $hadith_tag->tag_title_en; ?></option>
									<?php endforeach; ?>
								<?php endif; ?>
							</select>
							
							<span class="hadith_id" style="display: none;"><?php echo $hadith->hadith_id; ?></span>
							<span class="hadith_in_book_id" style="display: none;" ><?php echo $hadith->hadith_in_book_id; ?></span>
						</div>
					</div>
					<?php endforeach; ?>
				<?php else: ?>
					<div>
						<span class='text-error' style='margin-top: 50px; margin-bottom: 100px;'>
							Ahadith not found.
						</span>
					</div>
				<?php endif; ?>
		
				<p class="pagination">&nbsp;
					<?php echo $pages; ?>		
				</p>				
							
			</section>
			
		</section>
		
		<footer class="row">
			
		</footer>
	</div>
	
	<!--<footer>
		<p>A Project of <a href="http://mishkat.pk" target="_blank">Mishkat Welfare Trust</a>.</p>
	</footer>-->
	
	<div id="myModal" class="modal fade" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Tags for Hadith</h4>
				</div>
				<div class="modal-body">
					<span class="text-error"></span>
					<p>Here you can suggest modifications to the tags or add new ones.</p>
					<!--<label for="ddl_tags">Available Tags</label>-->
					<select multiple class="ddl_tags form-control" style="width: 20%; display: inline;">
						<?php if(!empty($tags)): ?>
							<?php foreach($tags as $tag): ?>
								<option value="<?php echo $tag->tag_id; ?>"><?php echo $tag->tag_title_en; ?></option>
							<?php endforeach; ?>
						<?php endif; ?>
					</select>
				
					<button class="btn_add">></button>
					<button class="btn_remove"><</button>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn_add_tag btn btn-primary">Add New Tag</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn_submit btn btn-primary">Save changes</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
	<div id="new_tag_modal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Add New Tag for Hadith</h4>
				</div>
				<div class="modal-body">
					<span class="text-error"></span>
					<p>Suggest a name for the tag.</p>
					<input name="txt_new_tag" id="txt_new_tag" value=""/>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn_back btn btn-default">Back</button>
					<button type="button" class="btn_suggest btn btn-primary">Suggest</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
	<div id="setting_modal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Change Display Options</h4>
				</div>
				<div class="modal-body">
                    <div class="center"><span id="message">&nbsp;</span></div>
                    <table>
                        <tbody>
							<tr>
								<td colspan="2">
									<span id="display_error" class="text-error"></span>
								</td>
							</tr>
                            <tr>
                                <td>
                                    <label for="chkDisplayChapters">
                                        Display Chapters (ابواب):</label>
                                </td>
                                <td>
                                    <input type="checkbox" name="chk_display_chapters" id="chk_display_chapters" <?php echo set_checkbox('chk_display_chapters', '1', empty($chapter_display) OR $chapter_display == 'false'? FALSE: TRUE ); ?> />
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="ddl_chapters_lang">
                                        Language of Chapters:</label>
                                </td>
                                <td>
                                    <select id="ddl_chapters_lang" name="ddl_chapters_lang">
										<option value="EN" <?php echo set_select('ddl_chapters_lang', 'EN', !empty( $chapter_language ) AND $chapter_language == 'EN'? TRUE:FALSE ); ?> >English</option>
                                        <option value="AR" <?php echo set_select('ddl_chapters_lang', 'AR', !empty( $chapter_language ) AND $chapter_language == 'AR'? TRUE:FALSE); ?> >Arabic</option>
                                        <option value="UR" <?php echo set_select('ddl_chapters_lang', 'UR', !empty( $chapter_language ) AND $chapter_language == 'UR'? TRUE:FALSE); ?>>Urdu</option>
                                    </select>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label>
                                        Display Hadith in the following languages: </label>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="checkbox" name="chk_arabic" id="chk_arabic" <?php echo set_checkbox('chk_arabic', '1', empty( $display_arabic_text ) OR $display_arabic_text != 'true'? FALSE: TRUE); ?> >
                                    <label for="chk_arabic">Arabic</label>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="checkbox" name="chk_english" id="chk_english" <?php echo set_checkbox('chk_english', '1', empty( $display_english_text ) OR $display_english_text != 'true'? FALSE: TRUE); ?>>
                                    <label for="chk_english">English</label>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="checkbox" name="chk_urdu" id="chk_urdu" <?php echo set_checkbox('chk_urdu', '1', empty( $display_urdu_text ) OR $display_urdu_text != 'true'? FALSE: TRUE); ?>>
                                    <label for="chk_urdu">Urdu</label>
                                </td>
                                <td></td>
				
							<?php $user_id = $this->session->userdata('user_id'); ?>
							<?php if( !empty($user_id) ): ?>
								<tr>
									<td><label for="chk_subscription">Subscribe For Alerts:</label></td>
									<td><input type="checkbox" name="chk_subscription" value="1" id="chk_subscription" <?php echo set_checkbox('chk_subscription', '1', empty($email_subscription) OR $email_subscription !='true' ? FALSE:TRUE); ?>></td>
								</tr>
							<?php endif; ?>
				
                            </tr>
                        </tbody>
                    </table>
                </div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" id="btn_save_changes" class="btn btn-primary">Save Options</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div> <!-- modal -->
	
	<div id="bm_Modal" class="modal fade">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <h4 class="modal-title">Bookmark Error!</h4>
			</div>
			<div class="modal-body">
			  Please <a href="<?php echo base_url(). 'user/signin'; ?>">Signin</a> or <a href="<?php echo base_url(). 'user/register'; ?>">Register</a>.
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		  </div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
	<div id="fm_Modal" class="modal fade">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <h4 class="modal-title">Report Error!</h4>
			</div>
			<div class="modal-body">
				<span class="text-error">fff</span>
				<!--<label>Please report.</label>-->
			  <textarea id="txt_error_report" cols="50">
			  </textarea>
			</div>
			<div class="modal-footer">
				<button type="button" id="btn_report" class="btn btn-primary">Report</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		  </div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
	
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-scrollspy.js"></script>
		
	<script type="text/javascript">
		
		$(document).ready(function(){	
			//if user is login, then apply User Settings
			<?php
				if( isset($user_id) && !empty($user_id) ):
					//session array is set
					if( !empty($chapter_display) ):
					
					if( $chapter_display == 'false' ):
			?>
						$('h3.chapters').css('display','none');
				<?php
					else:
				?>
						//display chapter by its language
						$('h3.chapters').css('display','block');
						$('h3.chapters p').css('display','none');
						$('h3.chapters').find('p[lang="<?php echo $chapter_language; ?>"]').css('display','block');
				<?php
					endif;
				?>
					//display tag by its language
					$('.hadith_tags').css('display','');
					$('.hadith_tags span').css('display','none');
					$('.hadith_tags').find('span[lang="'+$('#ddl_chapters_lang').val()+'"]').css('display','');
				
					//deafult
					$('article p').css('display','none');
					//check langauges for hadith
				<?php
					if( $display_arabic_text == 'true' ):	
				?>
						$('article').find('p[lang="AR"]').css('display','block');
				<?php
					endif;
				?>
				
				<?php
					if( $display_english_text == 'true' ):	
				?>
						$('article').find('p[lang="EN"]').css('display','block');
				<?php
					endif;
				?>
				
				<?php
					if( $display_urdu_text == 'true' ):	
				?>
						$('article').find('p[lang="UR"]').css('display','block');
				<?php
					endif;
				?>
			
			<?php
				endif;
				endif;
			?>
			
			//remove <hr> from last hadith
			$(".hadith").last().find('hr').remove();
			
			//cursor tag for add tag label
			$('.add_tag').css('cursor','pointer');
			
			
			function adjust_heights() {
				$('body > div.container > section.row > aside').height('auto');
				$('body > div.container > section.row > section').height('auto');
				
				if( $('body > div.container > section.row > aside').height() < $('body > div.container > section.row > section').height() ) {
					$('body > div.container > section.row > aside').height( $('body > div.container > section.row > section').height() );
				}
				else if( $('body > div.container > section.row > aside').height() > $('body > div.container > section.row > section').height() ) {
					$('body > div.container > section.row > section').height( $('body > div.container > section.row > aside').height() );
				}
			}
			
			$(window).resize(function() {
				adjust_heights();
			});
			
			adjust_heights();
			
			$('nav a:first-child').on('click', function() {
				//$('#myModal').modal('show');
				//return false;
			});
			
			
			$( ".hs-twitter" ).click(function() {
				window.open("http://twitter.com/share?url=" +document.URL+"&text="+$(this).parent().parent().find('p[lang="EN"]').text().substr(0,80)+'...','','location=1,status=1,scrollbars=1,  width=400,height=400');
			});
				
			$( ".hs-facebook" ).click(function() {
				window.open("http://www.facebook.com/sharer.php?s=100&p[url]="+document.URL+"&p[title]="+document.title+"&p[summary]="+document.getSelection(),'','location=1,status=1,scrollbars=1,  width=400,height=400');
			});
			$( ".hs-googleplus" ).click(function() {
				window.open("https://plus.google.com/share?url="+document.URL,'','location=1,status=1,scrollbars=1,  width=400,height=400');
			});
			
			
			var hadith_id='';
			
			$('.flag_link').on("click", function() {
				
				//if user is login
				<?php if( !empty($user_id) ): ?>
					
					hadith_id =$(this).parent().find('span').text(); 
					//clear fields
					$('#fm_Modal').find('.text-error').text('');
					$('#txt_error_report').val('');
					$('#fm_Modal').modal('show');
					
				//modal will appear to signin or register
				<?php else: ?>
					$('#bm_Modal').modal('show');
				<?php endif; ?>
				
				
			});
			
			$('.bookmark_link').on("click", function() {
				
				//if user is login
				<?php if( !empty($user_id) ): ?>
				
					var action='';
					//if bookmark is empty, then add
					if ($(this).find('span').hasClass('glyphicon-star-empty') == true) {
						$(this).find('span').removeClass('glyphicon-star-empty');
						$(this).find('span').addClass('glyphicon-star');
						action = 'add';
					//if bookmark is added, then delete
					}else{
						$(this).find('span').removeClass('glyphicon-star');
						$(this).find('span').addClass('glyphicon-star-empty');
						action = 'delete';
					}
					
					//get id of article tag
					var hadith_url = $(this).parent().parent().parent().attr('id');
					
					//prepare the data to be passed
					var result = {};
					result['task'] = 'hadith-bookmark';
					result['hadith_in_book_id'] = hadith_url.substring( hadith_url.lastIndexOf('/')+1 );
					result['hadith_book_id'] = hadith_url.substring( 0, hadith_url.indexOf('/') );
					result['book_mark'] = action;
				
					$.ajax({
						type: "POST",
						url: '<?php echo base_url(); ?>hadith_book/view',
						data: { data: result }						
					});
				//modal will appear to signin or register
				<?php else: ?>
					$('#bm_Modal').modal('show');
				<?php endif; ?>
				
				
			});
			
			$('#optn_setting').on("click", function() {
				$('#display_error').text('');
                $('#setting_modal').modal('show');   
            });
            
            $('#btn_save_changes').on("click", function() {
				
				if ( $('#chk_arabic').is(':checked') == false && $('#chk_english').is(':checked') == false && $('#chk_urdu').is(':checked') == false ) {
					$('#display_error').text('You must select atleast one language');
					return;
				}
				
				//if display chapters is disabled
				if ( $('#chk_display_chapters').is(':checked') == false ) {
					$('h3.chapters').css('display','none');
				//if display chapters is enabled
				}else{
				
					//display chapter by its language
					$('h3.chapters').css('display','block');
					$('h3.chapters p').css('display','none');
					$('h3.chapters').find('p[lang="'+$('#ddl_chapters_lang').val()+'"]').css('display','block');
				}
				
				//display tag by its language
				$('.hadith_tags').css('display','');
				$('.hadith_tags span').css('display','none');
				$('.hadith_tags').find('span[lang="'+$('#ddl_chapters_lang').val()+'"]').css('display','');
				
				$('article p').css('display','none');
				
				if ( $('#chk_arabic').is(':checked') == true ) {
					$('article').find('p[lang="AR"]').css('display','block');
				}
				
				if ( $('#chk_english').is(':checked') == true ) {
					$('article').find('p[lang="EN"]').css('display','block');
				}
				
				if ( $('#chk_urdu').is(':checked') == true ) {
					$('article').find('p[lang="UR"]').css('display','block');
				}
				
				$('#setting_modal').modal('hide');
	
				//if user is login, then save these settings
				<?php
					if( isset($user_id) && !empty($user_id) ):
				?>
						//prepare the data to be passed
						
						var result ={};
						
						result['task'] = 'user-settings';
						result['chapter_display'] = $('#chk_display_chapters').is(':checked');
						result['chapter_language'] = $('#ddl_chapters_lang').val();
						result['display_arabic_text'] = $('#chk_arabic').is(':checked');
						result['display_english_text'] = $('#chk_english').is(':checked');
						result['display_urdu_text'] = $('#chk_urdu').is(':checked');
						result['email_subscription'] = $('#chk_subscription').is(':checked');
					
						$.ajax({
							type: "POST",
							url: '<?php echo base_url(); ?>hadith_book/view',
							data: { data: result }
						});
				<?php
					endif;
				?>
            });
			
			$('#myModal').on('shown.bs.modal', function () {
				$('#myInput').focus()
			});
			
			$('#btn_report').on("click", function() {
				
				if ($('#txt_error_report').val().trim() == '') {
					$('#fm_Modal').find('.text-error').text('Please report the error.');
					return;
				}
				
				//prepare the data to be passed
				var result ={};
				
				result['task'] = 'report-error';
				result['error_text'] = $('#txt_error_report').val().trim();
				result['hadith_id'] = hadith_id;
				
				
				$.ajax({
					type: "POST",
					url: '<?php echo base_url(); ?>hadith_book/view',
					data: { data: result }
				});
				
				$('#fm_Modal').modal('hide');
			});
			
			//Scroll Spy code for ahadith
			
			//default scroll should be within div
			//var container_scroll = '#hadith-contents';
			//add class for div scroll
			//$('#scroll').addClass('scroll_div');
	
			//checkbox change event for
			//$('#checkbox_display').change(function() {
			//	
			//	if ( $(this).is(':checked') == true ) {
			//		$('#scroll').addClass('scroll_div');
			//		container_scroll = '#scroll';
			//	}else{
			//		$('#scroll').removeClass('scroll_div');
			//		container_scroll = window;
			//	}	
			
			//base url for window history
			var site_url="<?php echo base_url(); ?>";
			
			$('.hadith').each(function(i) {
		
				var position = $(this).position();
				console.log(position);
				console.log('min: ' + position.top + ' / max: ' + parseInt(position.top + $(this).height()));
				
				var element_url = $(this).find('article').attr('id');
				
				$(this).scrollspy({
					container: window,
					min: position.top,
					max: position.top + $(this).height(),
					onEnter: function(element, position) {
						//need complete URL
						//if(console) console.log('entering ' +  element_url);
						//element_id is 
							window.history.pushState(null,null,site_url+element_url);
							return false;
						},
						onLeave: function(element, position) {
							//if(console) console.log('leaving ' +  element_url);
						}
				});
			});
			
			//end Scroll Spy code for ahadith
			
			$('.add_tag').on('click', function() {
				//remove existing html for that hadith
				$('#myModal .modal-body').find('.ddl_hadith_tags').remove();
				$('#myModal .modal-body').find('.hadith_id').remove();
				$('#myModal .modal-body').find('.hadith_in_book_id').remove();
				//alert($(this).parent().parent().parent().find('.tag_modal_body').html());
				//add new html code for that hadith
				$('#myModal .modal-body').append($(this).parent().parent().parent().parent().find('.tag_modal_body').html());
				$('#myModal').modal('show');
			});
			
			$('.btn_add').on( "click", function() {
		
				//get tag_id from ddl_tags
				var tag_id = $(this).parent().parent().find('.ddl_tags').val();
				//get tag_text from ddl_tags
				var tag_text = $(this).parent().parent().find('.ddl_tags option:selected').text();
				
				//if ddl_tag is selected
				if( tag_id != null ){
					//if option is already not added in ddl_hadith_tags, then add
					if ( $(this).parent().parent().find('.ddl_hadith_tags').find('option[value="'+tag_id+'"]').length == '0' ) {
						$(this).parent().parent().find('.ddl_hadith_tags').append('<option value="'+tag_id+'">'+tag_text+'</option>');	
					}
				}
			});
			
			$('.btn_remove').on( "click", function() {
		
				//get tag_id from ddl_tags
				var hadith_tag_id = $(this).parent().parent().find('.ddl_hadith_tags').val();
				//get tag_text from ddl_tags
				var hadith_tag_text = $(this).parent().parent().find('.ddl_hadith_tags option:selected').text();
				
				//if ddl_tag is selected
				if( hadith_tag_id != null ){
					//if option is already not added in ddl_hadith_tags, then add
					//alert( $(this).parent().parent().find('.ddl_hadith_tags').find('option[value="'+hadith_tag_id+'"]').length );
					$(this).parent().parent().find('.ddl_hadith_tags').find('option[value="'+ hadith_tag_id +'"]').remove();

				}
			});
			
			$('.btn_back').on( "click", function() {
				//reset error
				$('#myModal .text-error').text('');
				//show modal with existing values
				$('#myModal').modal('show');
				$('#new_tag_modal').modal('hide');
			});
			
			$('.btn_suggest').on( "click", function() {
				
				//get trimed value of tag
				new_tag = $.trim( $('#txt_new_tag').val() );
				
				//check if that tag already exsiting in all tags drop down
				error="";
				error = $('.ddl_tags').find('option').map(function() { if($(this).text() == new_tag ){ return "Tag Already Exist"; } }).get().toString();
				
				if (error != '' ) {
					$('#new_tag_modal .text-error').text(error);
				}else if ( new_tag == '' ){
					$('#new_tag_modal .text-error').text('Tag cannot be empty string.');
				}else{
					//then add tag text
					$('#myModal').modal('show');
					$('#new_tag_modal').modal('hide');
					$('.ddl_tags').append('<option>'+ new_tag +'</option>')
				}
			});
	
			$('.btn_add_tag').on( "click", function() {
				$('#myModal').modal('hide');
				//reset value
				$('#txt_new_tag').val('');
				$('#new_tag_modal .text-error').text('');
				$('#new_tag_modal').modal('show');
				
			});
	
			$('.btn_submit').on( "click", function() {
				
				//hadith_id is stored in span which is not displayed
				hadith_in_book_id = $(this).parent().parent().find('.hadith_in_book_id').text();
				
				//prepare the data to be passed
				var result = {};
				result['task'] = 'hadith-tag';
				result['tags_id'] = $(this).parent().parent().find('.ddl_hadith_tags').find('option').map(function() { if($(this).val() != $(this).text() ){ return $(this).val();} }).get().toString();
				//hadith_id is stored in span which is not displayed
				result['hadith_id'] = $(this).parent().parent().find('.hadith_id').text();
				
				var all_tags = $(this).parent().parent().find('.ddl_tags').find('option').map(function() { return $(this).val() }).get().toString();
				
				//if both drop downs lists are empty, 
				if ( result['tags_id'] =='' && all_tags == '' ){					
					$('#myModal .text-error').text('Please add new Tag.');
					return false;
				}
				
				var new_tags = new Array();
				
				//loop through ddl_hadith_tags to get new tags
				$(this).parent().parent().find('.ddl_hadith_tags option').each(function() {
					//new tag 's value and option are same, in option tag
					if ( $(this).val() == $(this).text() ) {
						new_tags.push( $(this).text() );
					}
				});
				
				result['new_tags'] = new_tags.toString();
				
				var ddl_hadith_tags= $(this).parent().parent().find('.ddl_hadith_tags');
				
				$.ajax({
					type: "POST",
					url: '<?php echo base_url(); ?>hadith_book/view',
					data: { data: result },
					success: function(data) {
                        data = $.parseJSON( data );
						//if (data.message.type == 'success') {
							$('#'+hadith_in_book_id).find('.hadith_tags').html(data.hadith_tags_html);
							$('#'+hadith_in_book_id).find('.ddl_hadith_tags').html(data.hadith_tags_options);
						//}
					}   
				});
				$('#myModal').modal('hide');
			});
			
		});
	</script>	