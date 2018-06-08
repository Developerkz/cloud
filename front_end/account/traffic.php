<!DOCTYPE html>
<html>
<head>
	<title>Трафик</title>

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
						<p class="cntr">Ваш текущий  трафик <b>Standart</b></p>
						<div class="pd30">
							<ul>
								<li class="column-3"><b>Тарифы</b></li>
								<li class="column-3"><b>Коэффициент</b></li>
								<li class="column-3"><b>Цена</b></li>
								<li class="column-3"></li>
								<div class="clear"></div>
							</ul>
							<?php foreach ($packages as $package): ?>
								<ul>
									<li class="column-3"><?php echo $package["title"]; ?></li>
									<li class="column-3"><?php echo $package["k"]; ?></li>
									<li class="column-3"><?php echo $package["price"]; ?></li>
									<li class="column-3"><a href="">Купить</a></li>
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