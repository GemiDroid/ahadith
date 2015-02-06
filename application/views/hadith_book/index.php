<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>dispaly</title>
	
</head>
<body>
	<div id="container">
		<h1>All Hadith Books</h1>
		<p>
			<table border="1" width="100%">
				<tr>
					<th>ID</th>
					<th>Title ar</th>
					<th>Title en</th>
					<th>Title ur</th>
					<th>Action</th>
				</tr>
				<?php foreach ($hadith_books->result_array() as $hadith_book):  ?>
					<?php echo '<tr>';  ?>	
					<?php
					echo '<td>';
					echo $hadith_book['hadith_book_id'];
					echo '</td>';
					echo '<td>';
					echo $hadith_book['hadith_book_title_ar'];
					echo '</td>';

					echo '<td>';
					echo $hadith_book['hadith_book_title_en'];
					echo '</td>';

					echo '<td>';
					echo $hadith_book['hadith_book_title_ur'];
					echo '</td>';

					echo '<td>';
					$this->load->helper('url');
					echo anchor('hadith_book/' . 'edit/' . $hadith_book['hadith_book_id'] , 'Edit', '');
					echo ' / ';
					echo anchor('hadith_book/' . 'delete/' . $hadith_book['hadith_book_id'] , 'Delete', '');
					echo '</td>';
					?>
					<?php echo '</tr>';  ?>	
				<?php endforeach; ?>
			</table>
		</p>
		<p><a href="<?php echo $add_link; ?>">Add</a></p>
	</div>
</body>
</html>