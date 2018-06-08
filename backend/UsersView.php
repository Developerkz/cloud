<!DOCTYPE html>
<html>
<head>
	<title>Пользватель <?php echo $user["name"]; ?> | Панель управление</title>
	<?php include_once(D.'backend/template/external.php'); ?>
</head>
<body>


<div class="column-3" style="height: 100%;">
	<?php $getPage = 'user'; ?>
	<?php include_once(D.'backend/template/sidebar.php'); ?>
</div>


<div class="column-9" style="height: 100%;">
	<?php include_once(D.'backend/template/header.php'); ?>
	<div class="top-container"></div>
	<div class="content">

		<div class="list-title">
			<h2><?php echo $user["name"]; ?></h2>
			<div class="clear"></div>
		</div>

		<div class="container" style="margin-top:20px;">
			<div class="row">
				<div class="column-6 cntr pd30" style="border:1px solid #EAEAEA;">
					<p style="margin-bottom:6px;"><b>Имя:</b></p>
					<p><i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo $user["name"]; ?></p>
				</div>
				<div class="column-6 cntr pd30" style="border:1px solid #EAEAEA;">
					<p style="margin-bottom:6px;"><b>Email:</b></p>
					<p><i class="fa fa-envelope"></i>&nbsp;&nbsp;<?php echo $user["email"]; ?></p>
				</div>
			</div>
			<div class="row">
				<div class="column-6 cntr pd30" style="border:1px solid #EAEAEA;">
					<p style="margin-bottom:6px;"><b>Тариф:</b></p>
					<p><i class="fa fa-feed"></i>&nbsp;&nbsp;<?php echo User::getPackage($user["users_id"]); ?></p>
				</div>
				<div class="column-6 cntr pd30" style="border:1px solid #EAEAEA;">
					<p style="margin-bottom:6px;"><b>Зароботок:</b></p>
					<p><i class="fa fa-money"></i>&nbsp;&nbsp;<?php echo File::getBounceById($user["users_id"]); ?></p>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="list-title" style="margin-top:50px">
			<h3>Файлы пользователя</h3>
			<div class="clear"></div>
		</div>
		<?php $files = File::getFileByID($user["users_id"]); ?>
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