<!DOCTYPE html>
<html>
<head>
	<title>Мои файлы</title>

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
					<?php if(!$myfiles): ?>
						<p class="pd30 cntr">Список файлов пуст</p>
					<?php else: ?>
						<ul>
							<li class="column-3"><b>Название</b></li>
							<li class="column-3"><b>Время загрузок</b></li>
							<li class="column-2"><b>Размер</b></li>
							<li class="column-2"><b>Скачивание</b></li>
							<li class="column-2"><b></b></li>
							<div class="clear"></div>
						</ul>
						<?php foreach ($myfiles as $obj): ?>
							<ul>
								<li class="column-3"><?php echo substr($obj["file_name"],0,20); ?></li>
								<li class="column-3"><?php echo $obj["date_time"]; ?></li>
								<li class="column-2"><?php echo toKBSize($obj["size"]); ?></li>
								<li class="column-2"><?php echo File::getCount($obj["file_id"]); ?></li>
								<li class="column-2"><a  target="_blank" href="<?php uri(); ?>file/<?php echo $obj["file_url"]; ?>">Перейти</a></li>
								<div class="clear"></div>
							</ul>
						<?php endforeach ?>

					<?php endif;?>
					
				</div>
			</div>

			
		</div>
	</div>
</section>


<?php include_once(D.'front_end/template/footer.php'); ?>
<?php include_once(D.'front_end/template/scripts.php'); ?>
</body>
</html>