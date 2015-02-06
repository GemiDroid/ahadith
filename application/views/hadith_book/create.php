<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Add ahadith book</title>
	
</head>
<body>
	<div id="container">
		<h1>Add hadith book</h1>
		<form action='<?php echo $url; ?>' method="post">
			<label for="hadith_book_id">Book ID</label>
			<input type="number" name="hadith_book_id"> 
			<br><br>
			<label for="hadith_book_title_ar">Title(ar)</label>
			<input type="text" name="hadith_book_title_ar" />
			<br><br>
			<label for="hadith_book_title_en">Title(en)</label>
			<input type="text" name="hadith_book_title_en" />
			<br><br>
			<label for="hadith_book_title_ur">Title(en)</label>
			<input type="text" name="hadith_book_title_ur" />
			<br><br>
			<input type="submit" />
		</form>
	</div>
</body>
</html>