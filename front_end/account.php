<!DOCTYPE html>
<html>
<head>
	<title>Загрузить файл</title>

	<?php include_once(D.'front_end/template/external.php'); ?>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>

<?php include_once(D.'front_end/template/header.php'); ?>

<section>
	<div class="container">
		<div class="row">
		<div class="cntr pd30"><h1><?php echo $data["email"]; ?></h1></div>
		<?php include_once(D.'front_end/template/profile-menu.php'); ?>

			<div class="main-page pd30">
				<p class="main-page-logo"><i class="fa fa-cloud" aria-hidden="true"></i></p>

				<?php if(isset($url) ): ?>
					<center>

						<p><b>Ваша ссылка: </b><a target="_blank" href="<?php uri(); ?>file/<?php echo $url; ?>"><?php uri(); ?>file/<?php echo $url; ?></a>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="color:#0062FF" href="<?php uri(); ?>account"><i class="fa fa-repeat" aria-hidden="true"></i></a></p>
						
					</center>
				<?php else: ?>
					<form method="POST" enctype="multipart/form-data">
						<div class="div-upload"> 
							<label>
								<input type="file" name="upload_file" id="upload_file">
								<span>Выберите файл</span>
							</label>
						</div>
						<div id="file_name"></div>
						<center><div id="recaptcha" class="g-recaptcha" data-sitekey="6LciSzUUAAAAAFsoP5mMOcSY7Gvam5rkad8F6ox2"></div></center>
						<div class="cntr"><button type="submit" name="upload_button" id="send_button" class="send_button">Отправить</button></div>
					</form>
				<?php endif; ?>
			</div>

			<div class="news-page">
				<div class="wrapper">
					<h1 class="news-title cntr">Последние новости</h1>

						<div class="row">
							<?php $i=0; foreach ($news as $obj): $i++;?>
								<div class="column-4">
									<a href="<?php uri(); ?>news/<?php echo $obj["news_id"]; ?>">
										<div class="news-item">
											<img src="<?php uri(); ?>files/news/<?php echo $obj["img"]; ?>">
											<p><?php echo $obj["title"]; ?></p>
											<span class="news-date"><?php echo $obj["date"]; ?></span>
										</div>
									</a>
								</div>
								<?php if($i==3):break;endif;?>
							<?php endforeach; ?>
						</div>

						<div class="clear"></div>
				</div>
			</div>

		</div>
	</div>
</section>


<?php include_once(D.'front_end/template/footer.php'); ?>
<?php include_once(D.'front_end/template/scripts.php'); ?>
</body>
</html>