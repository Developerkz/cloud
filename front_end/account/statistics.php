<!DOCTYPE html>
<html>
<head>
	<title>Статистика</title>

	<?php include_once(D.'front_end/template/external.php'); ?>

</head>
<body>

<?php include_once(D.'front_end/template/header.php'); ?>

<section>
	<div class="container">
		<div class="row">
		<div class="cntr pd30"><h1><?php echo $data["email"]; ?></h1></div>
		<?php include_once(D.'front_end/template/profile-menu.php'); ?>

			<div class="main-page pd30">
				<div class="myfiles">
						<p class="cntr">Статистика</p>
						<div class="pd30">
							<ul>
								<li class="column-4"><b>Файл</b></li>
								<li class="column-4"><b>Дата</b></li>
								<li class="column-4"><b>IP-адреса</b></li>
								<div class="clear"></div>
							</ul>
							<?php foreach($downloads as $download): ?>
								<ul>
									<li class="column-4"><?php echo substr($download["file_name"],0,20); ?></li>
									<li class="column-4"><?php echo $download["date_time"]; ?></li>
									<li class="column-4"><?php echo $download["user_ip"]; ?></li>
									<div class="clear"></div>
								</ul>
							<?php endforeach; ?>
						</div>

				</div>
			</div>

			
		</div>
	</div>
</section>


<?php include_once(D.'front_end/template/footer.php'); ?>
<?php include_once(D.'front_end/template/scripts.php'); ?>
</body>
</html>