<!DOCTYPE html>
<html>
<head>
	<title>Редактировать новость | Панель управление</title>
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
			<h2>Редактировать новость</h2>
			<a href="<?php uri(); ?>admin/news-add">Добавить новый</a>
			<div class="clear"></div>
		</div>

		<div class="forms" >
			<form method="POST" enctype="multipart/form-data">
				<input type="text" name="update_news_name" placeholder="Название" value="<?php echo $news["title"]; ?>"><br>
				<?php echo $news["img"]; ?> <input style="border:none;" type="file" name="update_news_file" value="<?php echo $news["img"]; ?>"><br>
				<textarea name="update_news_description" placeholder="Описание"><?php echo $news["body"]; ?></textarea><br><br>
				<button name="update_news_button" type="submit">Добавить</button>
			</form>
		</div>

	</div>

	<?php include_once(D.'backend/template/footer.php'); ?>
</div>


<?php include_once(D.'backend/template/scripts.php'); ?>
</body>
</html>