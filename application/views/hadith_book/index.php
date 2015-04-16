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
							Book: <?php echo $book_title_en; ?>
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
				<p class="pagination">&nbsp;<strong>1</strong>&nbsp;<a href="http://www.ahadith.net/muslim/book/1/chap/10">2</a>&nbsp;<a href="http://www.ahadith.net/muslim/book/1/chap/20">3</a>&nbsp;<a href="http://www.ahadith.net/muslim/book/1/chap/10">&gt;</a>&nbsp;&nbsp;<a href="http://www.ahadith.net/muslim/book/1/chap/90">Last ›</a></p>
				
				<?php $chapter_title_en = ''; $i=1; ?>
				<?php if(!empty($ahadith)): ?>				
					<?php foreach( $ahadith as $hadith ): ?>
					
					<?php if( $hadith->chapter_title_en != $chapter_title_en ): ?>
						<h3><?php echo $i++.'. '. $hadith->chapter_title_en; ?></h3>
					<?php endif; ?>
					
						<article>
							<div style="padding-top: 3px; padding-bottom: 3px;"><a id="<?php echo $hadith->hadith_book_id; ?>/book/<?php echo $hadith->book_id; ?>/chapter/<?php echo $hadith->chapter_id; ?>/hadith/<?php echo $hadith->hadith_in_book_id;?>">Hadith No: <?php echo $hadith->hadith_in_book_id;?></a><span style="padding-left: 30px;"><a name="b93" class="bookmark_link">Bookmark &nbsp;|&nbsp;&nbsp;<span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="position: relative; top: 3px;"></span></a></span>
								<?php foreach( $hadith->hadith_tags as $hadith_tag ): ?>
									<span class="label label-default pull-right" style="margin-left: 5px;"><?php echo $hadith_tag->tag_title_en; ?></span>
								<?php endforeach; ?>
								<span class="glyphicon glyphicon-plus pull-right" aria-hidden="true" style="position: relative; top: 3px; margin-left: 5px;"></span>
							</div>
							<p lang="ar"><?php echo $hadith->hadith_plain_ar; ?></p>
							<p><?php echo $hadith->hadith_plain_en; ?></p>
							<p lang="ur"><?php echo $hadith->hadith_plain_ur; ?></p>
						</article>
						
						<hr />
						<?php $chapter_title_en = $hadith->chapter_title_en; ?>
					<?php endforeach; ?>
				<?php endif; ?>
				
				<p class="pagination">&nbsp;<strong>1</strong>&nbsp;<a href="http://www.ahadith.net/muslim/book/1/chap/10">2</a>&nbsp;<a href="http://www.ahadith.net/muslim/book/1/chap/20">3</a>&nbsp;<a href="http://www.ahadith.net/muslim/book/1/chap/10">&gt;</a>&nbsp;&nbsp;<a href="http://www.ahadith.net/muslim/book/1/chap/90">Last ›</a></p>
			</section>
			
		</section>
		
		<footer class="row">
			
		</footer>
	</div>
	
	<!--<footer>
		<p>A Project of <a href="http://mishkat.pk" target="_blank">Mishkat Welfare Trust</a>.</p>
	</footer>-->
	
	<div id="myModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Modal title</h4>
				</div>
				<div class="modal-body">
					<p>One fine body&hellip;</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function() {
			
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
			
			setTimeout(adjust_heights, 1000);
			
			$('nav a:first-child').on('click', function() {
				//$('#myModal').modal('show');
				//return false;
			});
			
			$('#myModal').on('shown.bs.modal', function () {
				$('#myInput').focus()
			});
		});
	</script>	