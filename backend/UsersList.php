<!DOCTYPE html>
<html>
<head>
	<title>Пользователи | Панель управление</title>
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
			<h2>Пользователи</h2>
			<div class="clear"></div>
		</div>

		<?php foreach ($get as $user): ?>

			<div class="file-item">
				<div class="column-1 file-icon">
					<i class="fa fa-user"></i>
				</div>
				<div class="column-6 file-name">
					<h3><?php echo $user["name"]; ?></h3>
					<p>
					<a href="<?php uri(); ?>admin/user-view/id<?php echo $user["users_id"]; ?>">Посмотреть</a>
					<?php if($user["ban"] == 0): ?>
						<a href="<?php uri(); ?>admin/user-ban/id<?php echo $user["users_id"]; ?>" style="color:#000;">В бан лист</a>
					<?php else: ?>
						<a href="<?php uri(); ?>admin/user-normal/id<?php echo $user["users_id"]; ?>" style="color:#00800B;">Разбанить</a>
					<?php endif; ?>
					<a class="delete-file" href="<?php uri(); ?>admin/user-delete/id<?php echo $user["users_id"]; ?>">Удалить</a>
					</p>
				</div>
				
				
				<div class="column-3">
					<i style="float:left;margin-top: 11px;" class="fa fa-envelope"></i>
					<div style="float:left;margin-top: 13px;margin-left: 10px;"><?php echo $user["email"]; ?></div>
				</div>
				<div class="column-2 cntr">
					<?php if($user["ban"] == 1): ?>
						<p style="margin:8px 5px;background:#B20909;padding: 5px 10px;color:#fff;">В бан листе</p>
					<?php endif; ?>
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