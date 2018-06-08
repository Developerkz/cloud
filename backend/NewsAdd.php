<!DOCTYPE html>
<html>
<head>
	<title>Добавить новость | Панель управление</title>
	<?php include_once(D.'backend/template/external.php'); ?>
</head>
<body>


<div class="column-3" style="height: 100%;">
	<?php $getPage = 'news'; ?>
	<?php include_once(D.'backend/template/sidebar.php'); ?>
</div>


<div class="column-9" style="height: 100%;">
	<?php include_once(D.'backend/template/header.php'); ?>
	<div class="top-container"></div>
	<div class="content">

		<div class="list-title">
			<h2>Добавить новость</h2>
			<a href="<?php uri(); ?>admin/news-add">Добавить новый</a>
			<div class="clear"></div>
		</div>

		<div class="forms" >
			<form method="POST" enctype="multipart/form-data">
				<input type="text" name="add_news_name" placeholder="Название"><br>
				Картинка: <input style="border:none;" type="file" name="add_news_file"><br>
				<textarea name="add_news_description" placeholder="Описание"></textarea><br><br>
				<button name="add_news_button" type="submit">Добавить</button>
			</form>
		</div>

	</div>

	<?php include_once(D.'backend/template/footer.php'); ?>
</div>


<?php include_once(D.'backend/template/scripts.php'); ?>
</body>
</html>