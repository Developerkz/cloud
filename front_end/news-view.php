<!DOCTYPE html>
<html>
<head>
	<title><?php echo $news["title"]; ?></title>

	<?php include_once(D.'front_end/template/external.php'); ?>

</head>
<body>

<?php include_once(D.'front_end/template/header.php'); ?>

<section>
	<div class="container">
		<div class="news-page">
			<div class="wrapper">
				<h1 class="news-title cntr"><?php echo $news["title"]; ?></h1>

				
				<div class="column-6 pd30">
					<p><?php echo $news["body"]; ?></p>
				</div>
				<div class="column-6 pd30">
					<img class="w100" src="<?php uri(); ?>files/news/<?php echo $news["img"]; ?>">
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