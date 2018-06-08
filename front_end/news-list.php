<!DOCTYPE html>
<html>
<head>
	<title>News</title>

	<?php include_once(D.'front_end/template/external.php'); ?>

</head>
<body>

<?php include_once(D.'front_end/template/header.php'); ?>

<section>
	<div class="container">
		<div class="news-page">
			<div class="wrapper">
				<h1 class="news-title cntr">Новости</h1>

				
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
							<?php if($i%3 == 0):echo '</div><div class="row">';endif;?>
						<?php endforeach; ?>
					</div>
					


				<div class="clear"></div>
			</div>
		</div>
	</div>
</section>


<?php include_once(D.'front_end/template/footer.php'); ?>
<?php include_once(D.'front_end/template/scripts.php'); ?>
</body>
</html>