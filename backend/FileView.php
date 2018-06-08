<!DOCTYPE html>
<html>
<head>
	<title><?php echo $file["file_name"]; ?>  | Панель управление</title>
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
			<h2><?php echo $file["file_name"]; ?></h2>
			<!--a href="">Добавить новый</a-->
			<div class="clear"></div>
		</div>

		<div class="container" style="margin-top:30px;">
			<div class="row">
				<div class="column-6 cntr pd30" style="border:1px solid #EAEAEA;">
					<p style="margin-bottom: 5px;"><b>Имя файла:</b></p>
					<p><i class="fa fa-file"></i>&nbsp;&nbsp;<?php echo $file["file_name"]; ?></p>
				</div>
				<div class="column-6 cntr pd30" style="border:1px solid #EAEAEA;">
					<p style="margin-bottom: 5px;"><b>Зашифровано в сервере:</b></p>
					<p><i class="fa fa-file-o"></i>&nbsp;&nbsp;<?php echo $file["path"]; ?></p>
				</div>
			</div>
			<div class="row">
				<div class="column-6 cntr pd30" style="border:1px solid #EAEAEA;">
					<p style="margin-bottom: 5px;"><b>Формат:</b></p>
					<p><i class="fa fa-cog"></i>&nbsp;&nbsp;<?php echo $file["format"]; ?></p>
				</div>
				<div class="column-6 cntr pd30" style="border:1px solid #EAEAEA;">
					<p style="margin-bottom: 5px;"><b>Размер:</b></p>
					<p><i class="fa fa-cogs"></i>&nbsp;&nbsp;<?php echo $file["size"]; ?></p>
				</div>
			</div>
			<div class="row">
				<div class="column-6 cntr pd30" style="border:1px solid #EAEAEA;">
					<p style="margin-bottom: 5px;"><b>URL адрес:</b></p>
					<p><i class="fa fa-share"></i>&nbsp;&nbsp;<?php echo $file["file_url"]; ?></p>
				</div>
				<div class="column-6 cntr pd30" style="border:1px solid #EAEAEA;">
					<p style="margin-bottom: 5px;"><b>Дата загрузки:</b></p>
					<p><i class="fa fa-calendar"></i>&nbsp;&nbsp;<?php echo $file["date_time"]; ?></p>
				</div>
			</div>
		</div>

		<div class="clear"></div>

		<div style="margin:50px 0 20px 0">
			<h3>Пользователь</h3>
			<div class="clear"></div>
		</div>

		<ul style="margin-bottom: 50px;">
			<li class="pd30 cntr column-4" style="border:1px solid #EAEAEA;">
				<p style="margin-bottom: 5px;"><b>Имя:</b></p>
				<p><i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo $user["name"]; ?></p>
			</li>
			<li class="pd30 cntr column-4" style="border:1px solid #EAEAEA;">
				<p style="margin-bottom: 5px;"><b>Email:</b></p>
				<p><i class="fa fa-envelope"></i>&nbsp;&nbsp;<?php echo $user["email"]; ?></p>
			</li>
			<li class="pd30 cntr column-4" style="border:1px solid #EAEAEA;">
				<p style="margin-bottom: 5px;"><b>Загрузки:</b></p>
				<p><i class="fa fa-download"></i>&nbsp;&nbsp;<?php echo File::getCount($user["users_id"]); ?></p>
			</li>
			<div class="clear"></div>
		</ul>

	</div>

	<?php include_once(D.'backend/template/footer.php'); ?>
</div>


<?php include_once(D.'backend/template/scripts.php'); ?>
</body>
</html>