<!DOCTYPE html>
<html>
<head>
	<title>Новости | Панель управление</title>
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
			<h2>Новости</h2>
			<a href="<?php uri(); ?>admin/news-add">Добавить новый</a>
			<div class="clear"></div>
		</div>

		<?php foreach ($get as $news): ?>

				<div class="file-item">
					<div class="column-1 file-icon" style="margin-right:30px;">
						<img width="100%" src="<?php uri(); ?>files/news/<?php echo $news["img"]; ?>">
					</div>
					<div class="column-6 file-name">
						<h3><?php echo $news["title"];?></h3>
						<p>
							<a href="<?php uri(); ?>admin/news-update/<?php echo $news["news_id"]; ?>">Редактировать</a>
							<a class="delete-file" href="<?php uri(); ?>admin/news-delete/<?php echo $news["news_id"]; ?>">Удалить</a>
							</p>
					</div>
					<div class="column-3 cntr">
						<p><b>Дата: </b><?php echo $news["date"];?></p>
					</div>
					<div class="clear"></div>
				</div>
	
		<?php endforeach; ?>

	</div>

	<?php include_once(D.'backend/template/footer.php'); ?>
</div>


<?php include_once(D.'backend/template/scripts.php'); ?>
</body>
</html>