<!DOCTYPE html>
<html>
<head>
	<title>Файлы | Панель управление</title>
	<?php include_once(D.'backend/template/external.php'); ?>
</head>
<body>


<div class="column-3" style="height: 100%;">
	<?php $getPage = 'file'; ?>
	<?php include_once(D.'backend/template/sidebar.php'); ?>
</div>


<div class="column-9" style="height: 100%;">
	<?php include_once(D.'backend/template/header.php'); ?>
	<div class="top-container"></div>
	<div class="content">

		<div class="list-title">
			<h2>Файлы</h2>
			<!--a href="">Добавить новый</a-->
			<div class="clear"></div>
		</div>

		<?php foreach ($files as $file): ?>

			<div class="file-item">
				<div class="column-1 file-icon">
					<i class="fa fa-file"></i>
				</div>
				<div class="column-7 file-name">
					<h3><?php echo $file["file_name"]; ?></h3>
					<p><a href="<?php uri(); ?>admin/file-view/<?php echo $file["file_url"]; ?>">Посмотреть</a><!--a href="">Редактировать</a-->
					<a class="delete-file" href="<?php uri(); ?>admin/file-delete/<?php echo $file["file_url"]; ?>">Удалить</a></p>
				</div>
				<div class="column-1 cntr">
					<i class="fa fa-download"></i>
					<span><?php echo File::getCount($file["file_id"]); ?></span>
				</div>
				<div class="column-1 cntr">
					<i class="fa fa-cogs"></i>
					<span><?php echo toKBSize($file["size"]); ?></span>
				</div>
				<div class="column-2 cntr">
					<i class="fa fa-calendar"></i>
					<span><?php echo $file["date_time"]; ?></span>
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